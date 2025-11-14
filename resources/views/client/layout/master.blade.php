@php
use App\Models\Setting;

$settings = Setting::firstOrDefault();

@endphp

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
          <a href="mailto:{{ $settings->email ?? 'info@example.com' }}">{{ $settings->email ?? 'info@example.com' }}</a>
        </li>
        <li> 
          <i class="fa fa-phone-alt"></i>
          <a href="tel:{{ $settings->phone ?? '+994 50 000 00 00' }}">{{ $settings->phone ?? '+994 50 000 00 00' }}</a>
        </li>
      </ul><!-- /.mobile-nav__contact -->
      <div class="mobile-nav__top">
        <div class="mobile-nav__social">
          @if($settings->facebook_link)
                        <a href="{{ $settings->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($settings->twitter_link)
                        <a href="{{ $settings->twitter_link }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($settings->linkedin_link)
                        <a href="{{ $settings->linkedin_link }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if($settings->instagram_link)
                        <a href="{{ $settings->instagram_link }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if($settings->youtube_link)
                        <a href="{{ $settings->youtube_link }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        @endif
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