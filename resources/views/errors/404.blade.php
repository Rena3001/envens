@extends('client.layout.master')
@section('page_title', "404 Error")
@section('content')

<div class="stricky-header stricked-menu main-menu main-menu-two">
      <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
  <!--Page Header Start-->
  <section class="page-header">
      <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg);">
      </div>
      <div class="page-header__shape-1">
          <img src="assets/images/shapes/page-header-shape-1.png" alt="">
      </div>
      <div class="page-header__shape-2">
          <img src="assets/images/shapes/page-header-shape-2.png" alt="">
      </div>
      <div class="page-header__shape-3">
          <img src="assets/images/shapes/page-header-shape-3.png" alt="">
      </div>
      <div class="container">
          <div class="page-header__inner">
              <h2>Error</h2>
              <div class="thm-breadcrumb__box">
                  <ul class="thm-breadcrumb list-unstyled">
                      <li><a href="index.php.html">Home</a></li>
                      <li><span>-</span></li>
                      <li>Error</li>
                  </ul>
              </div>
          </div>
      </div>
  </section>
  <!--Page Header End-->
  <!--Error Page Start-->
  <section class="error-page">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="error-page__inner">
                      <div class="error-page__title-box">
                          <h2 class="error-page__title">404</h2>
                      </div>
                      <h3 class="error-page__tagline">Sorry we can't find that page!</h3>
                      <p class="error-page__text">The page you are looking for was never existed.</p>
                      <form class="error-page__form">
                          <div class="error-page__form-input">
                              <input type="search" placeholder="Search here">
                              <button type="submit"><i class="icon-loupe"></i></button>
                          </div>
                      </form>
                      <a href="index.php.html" class="thm-btn error-page__btn"><span class="fas fa-arrow-circle-right"></span> Back to home</a>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection