<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="#">Sites<img src="{{ asset('direngine/icon/favicon.png') }}" width="18px" alt="" srcset="">
      </i> Travel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{$active1}}"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
          <li class="nav-item {{$active2}}"><a href="{{ route('about') }}" class="nav-link">About</a></li>
          <li class="nav-item {{$active2}}"><a href="{{ route('service') }}" class="nav-link">Service</a></li>

          <li class="nav-item {{$active3}}"><a href="{{ route('tour') }}" class="nav-link">Tour</a></li>
          <li class="nav-item {{$active4}}"><a href="{{ route('hotel') }}" class="nav-link">Hotels</a></li>
          <li class="nav-item {{$active5}}"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>
          <li class="nav-item {{$active6}}"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-globe"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">AR</a>
              <a class="dropdown-item" href="#">EN</a>
            </div>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>