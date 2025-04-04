<div class="col-lg-3 sidebar ftco-animate">
    <div class="sidebar-wrap bg-light ftco-animate">
        <h3 class="heading mb-4">Search City</h3>
        <form action="#">
            <div class="fields">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Destination, City">
                </div>
                <div class="form-group">
                    <div class="select-wrap one-third">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="" class="form-control"
                            placeholder="Keyword search">
                            <option value="">Select Location</option>
                            <option value="">San Francisco USA</option>
                            <option value="">Berlin Germany</option>
                            <option value="">Lodon United Kingdom</option>
                            <option value="">Paris Italy</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" id="checkin_date" class="form-control" placeholder="Date from">
                </div>
                <div class="form-group">
                    <input type="text" id="checkin_date" class="form-control" placeholder="Date to">
                </div>
                <div class="form-group">
                    <div class="range-slider">
                        <span>
                            <input type="number" value="25000" min="0" max="120000"> -
                            <input type="number" value="50000" min="0" max="120000">
                        </span>
                        <input value="1000" min="0" max="120000" step="500" type="range">
                        <input value="50000" min="0" max="120000" step="500" type="range">

                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                </div>
            </div>
        </form>
    </div>
 <x-star-rating />
</div>