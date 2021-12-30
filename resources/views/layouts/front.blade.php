<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mentor Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href=" {{ asset('assets/front/img/favicon.png') }}" rel="icon">
  <link href=" {{ asset('assets/front/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="{{ asset('assets/dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href=" {{ asset('assets/front/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href=" {{ asset('assets/front/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href=" {{ asset('assets/front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href=" {{ asset('assets/front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href=" {{ asset('assets/front/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href=" {{ asset('assets/front/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href=" {{ asset('assets/front/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
  <link href="{{ asset('assets/front/css/style.rtl.css') }}" rel="stylesheet">
  @else
  <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
  @endif

  <!-- =======================================================
  * Template Name: Mentor - v4.6.1
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Mentor</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a 
            @if(Route::currentRouteName() == 'index.home') class="active" @endif 
            href="{{ route('index.home')}}">{{__('Home')}}</a></li>
          <li><a @if(Route::currentRouteName() == 'about') class="active" @endif href="{{route('about')}}">{{__('About Us')}}</a></li>
          <li><a @if(Route::currentRouteName() == 'courses.show') class="active" @endif href="{{ route('courses.show') }}">{{__('Courses')}}</a></li>
          <li><a @if(Route::currentRouteName() == 'trainers.show') class="active" @endif href="{{ route('trainers.show') }}">{{__('Trainers')}}</a></li>
          <li><a @if(Route::currentRouteName() == 'payment') class="active" @endif href="{{ route('payment') }}">{{__('Payment')}}</a></li>
          
          <li><a @if(Route::currentRouteName() == 'contact') class="active" @endif href="{{ route('contact') }}">{{__('Contact')}}</a></li>
          
          @if (Route::has('login'))
          @auth
            
          <li><a href="{{ url('/dashboard') }}">{{__('Dashboard')}}</a></li>
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();"  >
              <span class="iconify" data-icon="ls:logout"></span> 
          </a>
          <form action="{{ route('logout') }}" method="post" style="display: none;" id="logout">
              @csrf
          </form>
          </li>
          


          @else
          @auth('trainer')
             <li> <a href="{{ route('courses.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{__('Dashboard')}}</a></li>
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();"  >
                  <span class="iconify" data-icon="ls:logout"></span> 
              </a>
              <form action="{{ route('logout') }}" method="post" style="display: none;" id="logout">
                  @csrf
              </form>
              </li>
              @else
          @auth('admin')
          <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{__('Dashboard')}}</a>
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();"  >
              <span class="iconify" data-icon="ls:logout"></span> 
          </a>
          <form action="{{ route('logout') }}" method="post" style="display: none;" id="logout">
              @csrf
          </form>
          </li>
          @else
              <li class="dropdown"><a href="#"><span>{{__('Log in')}}</span> <i class="bi bi-chevron-down"></i></a>
                  <ul>
                  <li><a href="{{ route('login') }}">{{__('Student')}}</a></li>
                  <li><a href="/trainer/login">{{__('Trainer')}}</a></li>
                  <li><a href="/admin/login">{{__('Admin')}}</a></li>
                  </ul>
              </li>
          @if (Route::has('register'))
              <li class="dropdown"><a href="#"><span>{{__('Register')}}</span> <i class="bi bi-chevron-down"></i></a>
                  <ul>
                  <li><a href="{{ route('register') }}">{{__('Student')}}</a></li>
                  <li><a href="/trainer/register">{{__('Trainer')}}</a></li>
                  </ul>
              </li>

          @endif
          @endauth
          @endauth
          @endauth

          <li class="dropdown">
            <a href="#"><span>{{__('Language')}}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <li>
                      <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                          {{ $properties['native'] }}
                      </a>
                  </li>
              @endforeach
          </ul>
          </li>
      
@endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      

      {{-- <a href="{{ route('courses.show') }}" class="get-started-btn">Get Started</a> --}}
    </div>

  
  </header><!-- End Header -->

  {{ $slot }}

  
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Mentor</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>{{__('Phone')}}:</strong> +1 5589 55488 55<br>
              <strong>{{__('Email')}}:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>{{__('Useful Links')}}</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{__('Home')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{__('About us')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{__('Services')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{__('Terms of service')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{__('Privacy policy')}}</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>{{__('Our Services')}}</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>{{__('Join Our Newsletter')}}</h4>
            <p>{{__('Enter your email.')}}</p>
            <form>
              <input type="email" name="email"><input type="submit" value="{{__('Subscribe')}}">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src=" {{ asset('assets/front/vendor/aos/aos.js') }}"></script>
  <script src=" {{ asset('assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src=" {{ asset('assets/front/vendor/php-email-form/validate.js') }}"></script>
  <script src=" {{ asset('assets/front/vendor/purecounter/purecounter.js') }}"></script>
  <script src=" {{ asset('assets/front/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/front/js/main.js') }}"></script>
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>

</body>

</html>