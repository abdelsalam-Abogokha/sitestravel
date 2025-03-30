<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" type="image/png" href="{{ asset('direngine/icon/favicon.jpg') }}">

    <title>شركه سايتس للسياحه || @yield('title')</title>

        <meta name="description" content="دليل السياحة العربية - شركه سايتس للسياحه">
        <meta name="keywords" content="السياحة, السياحة العربية, دليل السياحة, شركه سايتس للسياحه">
        <meta name="author" content="شركه سايتس للسياحه">
    
        <meta property="og:title" content="شركه سايتس للسياحه - دليل السياحة العربي">
        <meta property="og:description" content="دليل السياحة العربية - شركه سايتس للسياحه">
        <meta property="og:image" content="">
        <meta property="og:url" content="">
        <meta name="twitter:card" content="summary_large_image">
    
            {{--  Meta tags for Facebook, Google, YouTube and all search engines --}}
            <meta name="google-site-verification" content="YOUR_GOOGLE_SITE_VERIFICATION_CODE" />
            <meta name="robots" content="index, follow">
            <meta name="googlebot" content="index, follow">
    
            {{-- Facebook Open Graph tags --}}
            <meta property="og:type" content="website" />
            <meta property="og:site_name" content="شركه سايتس للسياحه" />
            {{--  <meta property="fb:app_id" content="YOUR_FACEBOOK_APP_ID" /> --}}
    
            {{--  YouTube Meta Tags --}}
            {{-- <meta name="title" content="شركه سايتس للسياحه - دليل السياحة العربي">
            <meta name="description" content="دليل السياحة العربية - شركه سايتس للسياحه"> --}}
    
            {{--  Google Analytics --}}
            {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=YOUR_GOOGLE_ANALYTICS_ID"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());
    
              gtag('config', 'YOUR_GOOGLE_ANALYTICS_ID');
            </script> --}}
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    {{-- الخطوط من جوجل --}}
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">


{{-- الملفات المحلية --}}
<link rel="stylesheet" href="{{ asset('direngine/css/open-iconic-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('direngine/css/animate.css') }}">

<link rel="stylesheet" href="{{ asset('direngine/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('direngine/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('direngine/css/magnific-popup.css') }}">

<link rel="stylesheet" href="{{ asset('direngine/css/aos.css') }}">

<link rel="stylesheet" href="{{ asset('direngine/css/ionicons.min.css') }}">

<link rel="stylesheet" href="{{ asset('direngine/css/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('direngine/css/jquery.timepicker.css') }}">

<link rel="stylesheet" href="{{ asset('direngine/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('direngine/css/icomoon.css') }}">
<link rel="stylesheet" href="{{ asset('direngine/css/style.css') }}">

<style>

   
    .icon-heart {
        color: white !important;
        transition: all 0.3s ease;
    }

    .scrolled .icon-heart {
        color: #f85959 !important;
    }
    .nav-item.dropdown .dropdown-menu {
  background-color: white !important;
}

/* لون الخلفية عند فتح القائمة */
.nav-item.dropdown.show .nav-link {
  background-color: white !important;
}

/* إزالة التأثيرات الخارجية عند النقر */
.nav-link.dropdown-toggle:focus {
  box-shadow: none !important;
}
</style>
  </head>
  <body>
    

    @yield('navbar')
    @yield('header')
    @yield('content')
    @yield('footer')
<x-chat-ai />
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"></circle><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"></circle></svg></div>


  <script src="{{ asset('direngine/js/jquery.min.js') }}"></script>
  <script src="{{ asset('direngine/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('direngine/js/popper.min.js') }}"></script>
  <script src="{{ asset('direngine/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('direngine/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('direngine/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('direngine/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('direngine/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('direngine/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('direngine/js/aos.js') }}"></script>
  <script src="{{ asset('direngine/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('direngine/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('direngine/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('direngine/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('direngine/js/google-map.js') }}"></script>
  <script src="{{ asset('direngine/js/main.js') }}"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="../../gtag/js-1?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('nav').addClass('scrolled');
        } else {
            $('nav').removeClass('scrolled');
        }
    });
</script>
  </body>
</html>