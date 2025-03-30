<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sites travel Chat</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f4f8;
        }

        #chat-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 25px;
        }

        #chat-messages {
            height: 500px;
            overflow-y: auto;
            padding: 15px;
            border: 2px solid #e0e7ff;
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: #f8fafc;
        }

        .message {
            margin-bottom: 15px;
            padding: 12px;
            border-radius: 8px;
            line-height: 1.6;
        }

        .user-message {
            background-color: #dbeafe;
            margin-left: 15%;
            border: 1px solid #bfdbfe;
            color: rgb(49, 49, 49);
            /* لون الرسائل المرسلة */
        }

        .assistant-message {
            background-color: #e0e1fecb;
            margin-right: 15%;
            border: 1px solid #bae6fd;
            color: rgb(49, 49, 49);
            /* لون الرسائل المستقبلة */
        }

        #input-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        #message-input {
            flex: 1;
            padding: 12px;
            border: 2px solid #cbd5e1;
            border-radius: 8px;
            font-size: 16px;
            background-color: #ffffff;
        }

        button {
            padding: 12px 24px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        button:hover {
            background-color: #2563eb;
        }

        .loading {
            display: none;
            color: #64748b;
            text-align: center;
            padding: 10px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
</head>

<body>
    <div id="chat-container">
        <div id="chat-messages"></div>
        <div class="loading" id="loading">جارٍ التفكير...</div>
        <div id="input-container">
            <input type="text" id="message-input" placeholder="اكتب رسالتك هنا...">
            <button onclick="sendMessage()">إرسال</button>
        </div>
    </div>

    <script>
        const GEMINI_API_KEY = 'AIzaSyAgMAJZ9iheZFcpnIShGilunsYMOOYOEcw'; // استبدل بالمفتاح الخاص بك
        const MODEL_NAME = 'gemini-2.0-flash'; // اسم النموذج
        const API_ENDPOINT = `https://generativelanguage.googleapis.com/v1beta/models/${MODEL_NAME}:generateContent`;
        let isGenerating = false;
        let chatHistory = [];

        async function sendMessage() {
            if (isGenerating) return;

            const input = document.getElementById('message-input');
            const message = input.value.trim();
            if (!message) return;

            input.value = '';
            addMessage('user', message);
            document.getElementById('loading').style.display = 'block';
            isGenerating = true;

            try {
                const response = await fetch(API_ENDPOINT + `?key=${GEMINI_API_KEY}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        contents: [...chatHistory, {
                            role: 'user',
                            parts: [{
                                text: message
                            }]
                        }],
                        generationConfig: {
                            temperature: 0.7, // تحكم في عشوائية الردود، قيم أعلى تعطي نتائج أكثر إبداعًا
                            topP: 0.9, // يحدد النسبة المئوية من الرموز التي يجب أخذها في الاعتبار
                            topK: 40, // يحدد عدد الرموز الأعلى احتمالاً التي يجب أخذها في الاعتبار
                            maxOutputTokens: 2048, // الحد الأقصى لعدد الرموز في الإخراج
                        },
                        safetySettings: [{
                                category: 'HARM_CATEGORY_HARASSMENT',
                                threshold: 'BLOCK_MEDIUM_AND_ABOVE'
                            },
                            {
                                category: 'HARM_CATEGORY_HATE_SPEECH',
                                threshold: 'BLOCK_MEDIUM_AND_ABOVE'
                            },
                            {
                                category: 'HARM_CATEGORY_SEXUALLY_EXPLICIT',
                                threshold: 'BLOCK_MEDIUM_AND_ABOVE'
                            },
                            {
                                category: 'HARM_CATEGORY_DANGEROUS_CONTENT',
                                threshold: 'BLOCK_MEDIUM_AND_ABOVE'
                            }
                        ]
                    })
                });

                const data = await response.json();

                if (data.error) {
                    console.error('API Error:', data.error);
                    addMessage('assistant', `حدث خطأ: ${data.error.message}`);
                    return;
                }

                // تنسيق استجابة النموذج
                let responseText = data.candidates[0].content.parts[0].text;
                responseText = responseText.replace(/أنا نموذج لغوي كبير، تم تدريبي بواسطة جوجل/g,
                    ' شركه أنا نموذج لغوي كبير، تم تدريبي بواسطة سايتس للسياحة');
                responseText = responseText.replace(/I am a large language model, trained by Google./g,
                    'I am a large language model, trained by Site Travel for tourism.');
                // استبدال الفواصل بنقطة وفصل لإنشاء فقرات منفصلة
                responseText = responseText.replace(/\n/g, '<br>');

                addMessage('assistant', responseText);

                // تحديث سجل الدردشة
                chatHistory.push({
                    role: 'user',
                    parts: [{
                        text: message
                    }]
                });
                chatHistory.push({
                    role: 'model',
                    parts: [{
                        text: responseText
                    }]
                });


            } catch (error) {
                console.error('Error:', error);
                addMessage('assistant', 'حدث خطأ في الاتصال بالخدمة');
            } finally {
                document.getElementById('loading').style.display = 'none';
                isGenerating = false;
            }
        }


        function addMessage(role, content) {
            const chatMessages = document.getElementById('chat-messages');
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${role}-message`;
            messageDiv.innerHTML = content; // استخدام innerHTML لعرض HTML بشكل صحيح
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // دعم إرسال الرسالة بزر Enter
        document.getElementById('message-input').addEventListener('keypress', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });

        function addMessage(role, content) {
            const chatMessages = document.getElementById('chat-messages');
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${role}-message`;
            messageDiv.innerHTML = content;

            // إضافة زر النسخ
            if (role === 'assistant') {
                const copyButton = document.createElement('i');
                copyButton.innerHTML = '<i class="fas fa-copy"></i>'; // استخدام أيقونة نسخ Font Awesome
                copyButton.className = 'copy-button';
                copyButton.addEventListener('click', () => {
                    navigator.clipboard.writeText(content.replace(/<br>/g,
                        '\n')) // استبدال <br> بـ \n لنسخ النص بشكل صحيح
                        .then(() => {
                            // يمكنك إضافة ملاحظة مرئية هنا بأن النص تم نسخه
                            console.log('Text copied to clipboard');
                        })
                        .catch(err => {
                            console.error('Failed to copy text: ', err);
                        });
                });
                messageDiv.appendChild(copyButton);
            }

            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // دعم إرسال الرسالة بزر Enter
        document.getElementById('message-input').addEventListener('keypress', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });
    </script>
    <style>
        .message.assistant-message {
            position: relative;
            padding-top: 33px;
        }

        /* الزر */
        .copy-button {
            position: absolute;
            top: 4px;
            left: 14px;
            /* ... باقي التنسيقات ... */
        }

  
    </style>
</body>
</body>

</html>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شات الموقع</title>
    <style>
        /* تنسيق الآيكونة */
        .chat-icon {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: #25d366;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            z-index: 1000;
            transition: transform 0.3s;
        }

        .chat-icon:hover {
            transform: scale(1.1);
        }

        /* نافذة الشات */
        .chat-window {
            position: fixed;
            bottom: 90px;
            left: 20px;
            width: 350px;
            height: 400px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            display: none;
            flex-direction: column;
            z-index: 1000;
        }

        /* هيدر النافذة */
        .chat-header {
            background-color: #075e54;
            color: white;
            padding: 15px;
            border-radius: 15px 15px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* منطقة الرسائل */
        .chat-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            background-color: #f0f0f0;
        }

        /* منطقة الإدخال */
        .chat-input {
            padding: 15px;
            background-color: white;
            border-top: 1px solid #ddd;
            display: flex;
            gap: 10px;
        }

        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
        }

        button {
            background-color: #25d366;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
        }

        /* زر الإغلاق */
        .close-btn {
            cursor: pointer;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <!-- آيكونة الشات -->
    <div class="chat-icon" onclick="toggleChat()">
        <i class="fas fa-comment-dots" style="font-size: 28px;"></i>
    </div>

    <!-- نافذة الشات -->
    <div class="chat-window" id="chatWindow">
        <div class="chat-header">
            <span>محادثة مباشرة</span>
            <span class="close-btn" onclick="toggleChat()">×</span>
        </div>
        <div class="chat-messages">
            <!-- الرسائل تظهر هنا -->
        </div>
        <div class="chat-input">
            <input type="text" placeholder="اكتب رسالتك...">
            <button onclick="sendMessage()">إرسال</button>
        </div>
    </div>

    <!-- رابط أيقونات Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script>
        function toggleChat() {
            const chatWindow = document.getElementById('chatWindow');
            if (chatWindow.style.display === 'none' || !chatWindow.style.display) {
                chatWindow.style.display = 'flex';
            } else {
                chatWindow.style.display = 'none';
            }
        }

        function sendMessage() {
            const input = document.querySelector('.chat-input input');
            const message = input.value.trim();
            
            if (message) {
                const messagesDiv = document.querySelector('.chat-messages');
                const newMessage = document.createElement('div');
                newMessage.textContent = message;
                newMessage.style.margin = '5px 0';
                newMessage.style.padding = '8px';
                newMessage.style.backgroundColor = 'white';
                newMessage.style.borderRadius = '10px';
                messagesDiv.appendChild(newMessage);
                
                input.value = '';
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
            }
        }
    </script>
</body>
</html>