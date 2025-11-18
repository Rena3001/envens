
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ \App\Models\Translation::getText('home_title') }}
        @endif
    </title>


    </title>

    <!-- favicons Icons -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/' . $settings->header_logo) }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/' . $settings->header_logo) }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/' . $settings->header_logo) }}">

    <link rel="manifest" href="{{asset('assets/images/favicons/site.webmanifest')}}">
    <meta name="description" content="envens PHP Template ">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">


    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/animate/custom-animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/jarallax/jarallax.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/odometer/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/swiper/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/envens-icons/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/nice-select/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/jquery-ui/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/timepicker/timePicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/reey-font/stylesheet.css')}}">

    <!-- template styles -->
    <link rel="stylesheet" href="{{asset('assets/css/envens.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/envens-responsive.css')}}">

@stack('styles')