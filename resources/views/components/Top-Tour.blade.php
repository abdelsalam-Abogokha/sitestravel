<div class="col-sm col-md-6 col-lg ftco-animate">
    <div class="destination">
        <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
            style="background-image: url({{ asset($image) }});">
            <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-search2"></span>
            </div>
        </a>
        <div class="text p-3">
            <div class="d-flex">
                <div class="one">
                    <h3><a href="#">{{$text}}</a></h3>
                    <p class="rate">
                        <i class="icon-star{{$star1}}"></i>
                        <i class="icon-star{{$star2}}"></i>
                        <i class="icon-star{{$star3}}"></i>
                        <i class="icon-star{{$star4}}"></i>
                        <i class="icon-star{{$star5}}"></i>
                        <span>{{$Rating}}</span>
                    </p>
                </div>
                <div class="two">
                    <span class="price">{{$price}}</span>
                </div>
            </div>
            <p>{{$pragraphe}}</p>
            <p class="days"><span>{{$days}}</span></p>
            <hr>
            <p class="bottom-area d-flex">
                <span><i class="icon-map-o"></i> {{$text2}}</span>
                <span class="ml-auto"><a href="#">{{$text3}}</a></span>
            </p>
        </div>
    </div>
</div>