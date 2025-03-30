<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قاعدة بيانات المطارات العالمية</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background: #f8f9fa;
        }
        .container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 15px;
        }
        .search-box {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        #airportsTable_wrapper {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .dataTables_filter input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        table.dataTable thead th {
            background: #0984e3;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">دليل المطارات الدولي 🛩️</h1>
        
        <div class="search-box">
            <div class="input-group mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="ابحث بأي حقل (اسم، مدينة، رمز، دولة...)">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="loadData()">تحديث البيانات</button>
                </div>
            </div>
        </div>

        <table id="airportsTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الرمز</th>
                    <th>المدينة</th>
                    <th>الدولة</th>
                    <th>المنطقة الزمنية</th>
                    <th>الإحداثيات</th>
                    <th>الموقع</th>
                </tr>
            </thead>
            <tbody id="tableBody"></tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        const API_KEY = '568ae248003da36feec8efc2e76616ef';
        let table;

        async function fetchData() {
            try {
                const response = await fetch(`https://api.aviationstack.com/v1/airports?access_key=${API_KEY}`);
                const data = await response.json();
                
                if(data.error) {
                    throw new Error(data.error.info);
                }
                
                return data.data;
            } catch (error) {
                console.error('Error:', error);
                alert('حدث خطأ في جلب البيانات: ' + error.message);
                return [];
            }
        }

        function renderTable(data) {
            const tbody = document.getElementById('tableBody');
            tbody.innerHTML = '';
            
            data.forEach(airport => {
                const row = `
                    <tr>
                        <td>${airport.airport_name || 'غير متوفر'}</td>
                        <td>${airport.iata_code || '---'}</td>
                        <td>${airport.city_name || 'غير معروف'}</td>
                        <td>${airport.country_name || '---'}</td>
                        <td>${airport.timezone || '---'}</td>
                        <td>${airport.latitude}, ${airport.longitude}</td>
                        <td>
                            <a href="https://www.google.com/maps?q=${airport.latitude},${airport.longitude}" 
                               target="_blank" 
                               class="btn btn-sm btn-success">
                               عرض الخريطة
                            </a>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });
        }

        async function initializeDataTable() {
            if ($.fn.DataTable.isDataTable('#airportsTable')) {
                $('#airportsTable').DataTable().destroy();
            }
            
            table = $('#airportsTable').DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json"
                },
                pageLength: 25,
                responsive: true
            });
        }

        async function loadData() {
            const data = await fetchData();
            renderTable(data);
            initializeDataTable();
        }

        // البحث اللحظي
        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        // التحميل الأولي للبيانات
        $(document).ready(() => {
            loadData();
        });
    </script>
</body>
</html>