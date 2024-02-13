<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Company Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('frontend') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('frontend') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/assets/vendor/owl.carousel/{{ asset('frontend') }}/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('frontend') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('frontend') }}/assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .form-control:focus {
            border-color: #1bbd36;
            box-shadow: none;
        }
    </style>

  <!-- =======================================================
  * Template Name: Company - v2.1.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ route('home.page') }}"><span>AJ</span>Amir</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="{{ route('home.page') }}" class="logo mr-auto"><img src="{{ asset('frontend') }}/assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="{{ \Request::route()->getName() == 'home.page' ? 'active' : '' }}"><a href="{{ route('home.page') }}">Home</a></li>

          <li class="{{ \Request::route()->getName() == 'frontend.about' ? 'active' : '' }}"><a href="{{ route('frontend.about') }}">About</a></li>
          <li class="{{ \Request::route()->getName() == 'frontend.services' ? 'active' : '' }}"><a href="{{ route('frontend.services') }}">Services</a></li>
          <li class="{{ \Request::route()->getName() == 'frontend.portfolios' ? 'active' : '' }}"><a href="{{ route('frontend.portfolios') }}">Portfolio</a></li>
          <li class="{{ \Request::route()->getName() == 'frontend.blogs' ? 'active' : '' }}"><a href="{{ route('frontend.blogs') }}">Blog</a></li>
          <li class="{{ \Request::route()->getName() == 'frontend.contact' ? 'active' : '' }}"><a href="{{ route('frontend.contact') }}">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        <a href="https://www.facebook.com/amirhosen.65" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.linkedin.com/in/aj-amir/" class="linkedin"><i class="icofont-linkedin"></i></i></a>
        <a href="https://github.com/Amirhosen65" class="github"><i class="icofont-github"></i></i></a>
        <a href="https://youtube.com/@AJAmir" class="youtube"><i class="icofont-youtube"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->

  @yield('home_content')

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Company</h3>
            <p>
                {{ $footer_contact->address }}<br><br>
              <strong>Phone:</strong> {{ $footer_contact->phone }}<br>
              <strong>Email:</strong> {{ $footer_contact->email }}<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home.page') }}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('frontend.about') }}">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('frontend.services') }}">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          @php
              echo date("Y");
          @endphp &copy; Copyright <strong><span>AJ Amir</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          Developed by <a href="https://www.facebook.com/amirhosen.65">AJ Amir</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        @foreach ($social_link as $link)
            <a href="{{ $link->url }}" class="{{ $link->account }}"><i class="bx bxl-{{ $link->account }}"></i></a>
        @endforeach
        {{-- <a href="https://www.linkedin.com/in/aj-amir/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        <a href="https://github.com/Amirhosen65" class="github"><i class="bx bxl-github"></i></a>
        <a href="https://youtube.com/@AJAmir/" class="youtube"><i class="bx bxl-youtube"></i></a>
        <a href="https://youtube.com/@AJAmir/" class="twitter"><i class="bx bxl-twitter"></i></a> --}}
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend') }}/assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('frontend') }}/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="{{ asset('frontend') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/vendor/venobox/venobox.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontend') }}/assets/js/main.js"></script>
  @yield('footer_script')

</body>

</html>
