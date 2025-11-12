<!DOCTYPE html>
<html lang="az">

<head>
  {{-- Ümumi HEAD hissəsi --}}
  @include('client.layout.includes.head')

  {{-- Səhifəyə dinamik title ötürmək --}}
  <title>@yield('title', 'Envens')</title>

  {{-- Əlavə səhifəyə aid CSS faylları üçün yer --}}
  @stack('styles')
</head>

<body>
  <div class="page-wrapper">
    <!-- <div class="preloader">
      <div class="preloader__image"></div>
    </div> -->
    {{-- Header component (dinamik məlumatlarla gəlir) --}}
    <x-front-header-component :settings="$settings ?? null" />

    {{-- Əsas səhifə kontenti --}}
    @yield('content')

    {{-- Footer component --}}
    <x-front-footer-component />
  </div>
  <div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
      <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

      <div class="logo-box">
        <a href="index.php.html" aria-label="logo image"><img src="assets/images/resources/logo-1.png" width="150" alt=""></a>
      </div>
      <!-- /.logo-box -->
      <div class="mobile-nav__container"></div>
      <!-- /.mobile-nav__container -->

      <ul class="mobile-nav__contact list-unstyled">
        <li>
          <i class="fa fa-envelope"></i>
          <a href="mailto:needhelp@packageName__.com">needhelp@envens.com</a>
        </li>
        <li>
          <i class="fa fa-phone-alt"></i>
          <a href="tel:666-888-0000">666 888 0000</a>
        </li>
      </ul><!-- /.mobile-nav__contact -->
      <div class="mobile-nav__top">
        <div class="mobile-nav__social">
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-facebook-square"></a>
          <a href="#" class="fab fa-pinterest-p"></a>
          <a href="#" class="fab fa-instagram"></a>
        </div><!-- /.mobile-nav__social -->
      </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
  </div>
  <!-- /.mobile-nav__wrapper -->
  <div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
      <form action="#">
        <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
        <input type="text" id="search" placeholder="Search Here...">
        <button type="submit" aria-label="search submit" class="thm-btn">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </div>
    <!-- /.search-popup__content -->
  </div>
  {{-- Ümumi JS faylları --}}
  @include('client.layout.includes.foot')

  {{-- Əlavə səhifəyə aid JS-lər üçün yer --}}
  @stack('scripts')

</body>

</html>