@extends('client.layout.master')
@section('page_title', __('home_title') )

@section('content')

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header --> <!--Main Slider Start-->

<section class="main-slider">
    <div class="swiper-container thm-swiper__slider swiper-container-fade"
         data-swiper-options='{
             "slidesPerView": 1,
             "loop": true,
             "effect": "fade",
             "pagination": {
                 "el": "#main-slider-pagination",
                 "type": "bullets",
                 "clickable": true
             },
             "navigation": {
                 "nextEl": "#main-slider__swiper-button-next",
                 "prevEl": "#main-slider__swiper-button-prev"
             },
             "autoplay": {
                 "delay": 8000
             }
         }'>
        <div class="swiper-wrapper">

          @foreach($banners as $banner)
                @if($banner->is_active)
                    <div class="swiper-slide">

                        {{-- Banner fon şəkli --}}
                        <div class="main-slider__bg" 
                            style="background-image: url('{{ asset('storage/' . $banner->image) }}');">
                        </div>

                        {{-- Əlavə şəkil (ön tərəf) --}}
                        <div class="main-slider__img">
                            <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->{'title_' . app()->getLocale()} }}">
                        </div>

                        {{-- Effekt formaları --}}
                        <div class="main-slider__shape-1"></div>
                        <div class="main-slider__shape-2">
                            <img src="{{ asset('assets/images/shapes/main-slider-shape-2.png') }}" alt="">
                        </div>
                        <div class="main-slider__shape-3"></div>

                        {{-- Banner mətni --}}
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider__content">

                                        {{-- ALT BAŞLIQ --}}
                                        @php 
                                            $subtitle = $banner->{'subtitle_' . app()->getLocale()} ?? $banner->subtitle_az; 
                                        @endphp
                                        @if($subtitle)
                                            <p class="main-slider__sub-title">{{ $subtitle }}</p>
                                        @endif

                                        {{-- BAŞLIQ --}}
                                        @php 
                                            $title = $banner->{'title_' . app()->getLocale()} ?? $banner->title_az; 
                                        @endphp
                                        @if($title)
                                            <h2 class="main-slider__title">{!! nl2br(e($title)) !!}</h2>
                                        @endif

                                        {{-- DÜYMƏ --}}
                                        @if($banner->button_link)
                                            <a href="{{ $banner->button_link }}" class="main-slider__curved-circle">
                                                <div class="curved-circle">Discover more work</div>
                                                <div class="main-slider__arrow-icon-box">
                                                    <div class="main-slider__arrow-icon">
                                                        <span class="icon-down-right"></span>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
          @endforeach

        </div>

        <div class="swiper-pagination" id="main-slider-pagination"></div>
    </div>
</section>
<!--Main Slider End-->

<!--About One Start-->
<section class="about-one">
    <div class="about-one__shape-2 zoominout">
        <img src="{{ asset('assets/images/shapes/about-one-shape-2.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="300ms">
                <div class="about-one__left">
                    @if($about)
                        <div class="section-title text-left">
                            <h2 class="section-title__title">
                                {{ $about->{'title_' . app()->getLocale()} ?? $about->title_az }}
                            </h2>
                        </div>

                        <p class="about-one__text">
                            {{ $about->{'description_' . app()->getLocale()} ?? $about->description_az }}
                        </p>

                        @php
                            // Əgər repeater arraydirsə birbaşa götür, əks halda JSON-dan decode et
                            $points = is_array($about->points) ? $about->points : json_decode($about->points, true);

                            // Əgər modeldə tərcümə funksiyası yoxdursa, sadəcə bu kod işləyəcək
                        @endphp

                        @if(!empty($points))
                            <div class="about-two__solution-box">
                                @foreach($points as $point)
                                    @php
                                        // Hər bir point əgər çoxdillidirsə (məs: ['az'=>'...', 'en'=>'...'])
                                        if (is_array($point)) {
                                            $text = $point[app()->getLocale()] ?? $point['az'] ?? '';
                                        } else {
                                            $text = $point;
                                        }
                                    @endphp

                                    @if(!empty($text))
                                        <div class="about-two__solution-single">
                                            <div class="icon">
                                                <span class="icon-check-1"></span>
                                            </div>
                                            <p class="about-two__solution-text">{{ $text }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                    @endif
                </div>
            </div>

            <div class="col-xl-6 wow fadeInRight" data-wow-delay="300ms">
                <div class="about-one__right">
                    <div class="about-one__img-box custom-about-img">
                        @if($about)
                            <div class="about-one__img">
                                <img src="{{ asset('storage/' . $about->image) }}" alt="">
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</section>

<!--About One End--> 

<!-- Sliding Text One Start -->
<section class="sliding-text-one">
    <div class="sliding-text-one__wrap">
        <ul class="sliding-text__list list-unstyled marquee_mode">
            <li>
                <h2 data-hover="{{ __('sliding_text_1') }}" class="sliding-text__title">
                    {{ __('sliding_text_1') }} <span>/</span>
                </h2>
            </li>
            <li>
                <h2 data-hover="{{ __('sliding_text_2') }}" class="sliding-text__title">
                    {{ __('sliding_text_2') }} <span>/</span>
                </h2>
            </li>
            <li>
                <h2 data-hover="{{ __('sliding_text_3') }}" class="sliding-text__title">
                    {{ __('sliding_text_3') }} <span>/</span>
                </h2>
            </li>
        </ul>
    </div>
</section>

<!-- Sliding Text One End --> 
 
<!-- Venue One Start -->
<section class="venue-one">
    <div class="venue-one__shape"></div>
    <div class="venue-one__shape-2"></div>
    <div class="venue-one__shape-3 float-bob-y">
        <img src="{{ asset('assets/images/shapes/venue-one-shape-3.png') }}" alt="">
    </div>

    <div class="venue-one__bg-box">
        <div class="venue-one__bg" style="background-image: url({{ asset('assets/images/backgrounds/venue-one-bg.jpg') }});"></div>
    </div>

    <div class="container">
        @php
            $locale = app()->getLocale();
            $contact = $contactInfo ?? null;
        @endphp

        @if($contact)
        <div class="section-title text-center">
            <h2 class="section-title__title">
                {{ $contact->{'visit_title_' . $locale} ?? $contact->visit_title_az }}
            </h2>
        </div>

        <div class="row">
            {{-- SOL BLOK: Ünvan və əlaqə məlumatları --}}
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="300ms">
                <div class="venue-one__left">

                    {{-- Ünvan --}}
                    <ul class="list-unstyled venue-one__address">
                        @if($contact->{'address_' . $locale})
                            <li>
                                <div class="icon">
                                    <div class="venue-one__address-shape-1"
                                         style="background-image: url({{ asset('assets/images/shapes/venue-one-address-icon-shape-2.png') }});"></div>
                                    <span class="icon-placeholder1"></span>
                                </div>
                                <div class="content">
                                    <h4>{{ __('Address') }}</h4>
                                    <p>{!! nl2br(e($contact->{'address_' . $locale})) !!}</p>
                                </div>
                            </li>
                        @endif
                    </ul>

                    {{-- Əlaqə məlumatları (Call və Email blokları) --}}
                    <ul class="list-unstyled venue-one__address-two">

                        {{-- Telefon bloku --}}
                        <li>
                            <h4>{{ $contact->{'call_title_' . $locale} ?? $contact->call_title_az }}</h4>
                            <p>{{ $contact->{'call_text_' . $locale} ?? $contact->call_text_az }}</p>

                            @if($contact->phone_1)
                                <p><a href="tel:{{ $contact->phone_1 }}">{{ $contact->phone_1 }}</a></p>
                            @endif
                            @if($contact->phone_2)
                                <p><a href="tel:{{ $contact->phone_2 }}">{{ $contact->phone_2 }}</a></p>
                            @endif
                        </li>

                        {{-- Email bloku --}}
                        <li>
                            <h4>{{ $contact->{'email_title_' . $locale} ?? $contact->email_title_az }}</h4>
                            <p>{{ $contact->{'email_text_' . $locale} ?? $contact->email_text_az }}</p>

                            @if($contact->email_1)
                                <p><a href="mailto:{{ $contact->email_1 }}">{{ $contact->email_1 }}</a></p>
                            @endif
                            @if($contact->email_2)
                                <p><a href="mailto:{{ $contact->email_2 }}">{{ $contact->email_2 }}</a></p>
                            @endif
                        </li>
                    </ul>

                </div>
            </div>

            {{-- SAĞ BLOK: Xəritə və ya şəkil --}}
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="300ms">
                <div class="venue-one__right">
                        {{-- Əgər xəritə yoxdursa, sadəcə şəkil --}}
                        <div class="venue-one__img img-bounce">
                            <img src="{{ asset('assets/images/resources/venue-one-img-1.png') }}" alt="">
                        </div>
                   

                </div>
            </div>
        </div>
        @endif
    </div>
</section>


<!-- Venue One End --> 
 
<!--Gallery One Start-->
<section class="gallery-one">
    <div class="gallery-one__shape-1 zoominout">
        <img src="{{ asset('assets/images/shapes/gallery-one-shape-1.png') }}" alt="">
    </div>

    <div class="container">
        <div class="gallery-one__top">
            <div class="section-title text-left">
                <h2 class="section-title__title">
                    {{ __('memories_of_last') }} <br><span>{{ __('year') }}</span>
                </h2>
            </div>

            <div class="gallery-one__btn-box">
                <a href="{{ route('galleries', ['locale' => app()->getLocale()]) }}" class="gallery-one__btn thm-btn">
                    <span class="fas fa-arrow-circle-right"></span> {{ __('see_more_gallery') }}
                </a>
            </div>
        </div>

        <div class="row">
            @foreach($galleries->take(4) as $index => $gallery)
                @php
                    $locale = app()->getLocale();
                    $title = $gallery->{'title_' . $locale} ?: ($gallery->title ?? '');
                    $category = $gallery->{'category_' . $locale} ?: ($gallery->category ?? '');
                    $image = $gallery->image ? asset('storage/' . $gallery->image) : asset('assets/images/gallery/default.jpg');
                @endphp

                <div class="col-xl-6 col-lg-6 wow {{ $index % 2 == 0 ? 'fadeInLeft' : 'fadeInRight' }}" data-wow-delay="{{ ($index + 1) * 100 }}ms">
                    <div class="gallery-one__single gallery-one__single-{{ $index + 1 }}">
                        <div class="gallery-one__img-box">
                            <div class="gallery-one__img">
                                <img src="{{ $image }}" alt="{{ $title }}">
                            </div>
                        </div>

                        <div class="gallery-one__title-box">
                            @if($category)
                                <p><span class="icon-marker"></span> {{ $category }}</p>
                            @endif
                            @if($title)
                                <h3><a href="{{ route('galleries', ['locale' => app()->getLocale()]) }}">{{ $title }}</a></h3>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!--Gallery One End--> 

<!--Contact One Start-->
<x-event-request />

<!--Contact One End--> 

<!-- Services One Start -->
<section class="services-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="section-title text-left">
                    <h2 class="section-title__title">
                        {{ __('services_title') }}
                    </h2>
                </div>
               
                <a href="{{ route('services', app()->getLocale()) }}" class="thm-btn">
                    <span class="fas fa-arrow-circle-right"></span> {{ __('see_all') }}
                </a>

                
            </div>

            <div class="col-xl-8">
                <ul class="list-unstyled services-one__list">
                    @foreach($services as $service)
                        @php
                            $title = $service->{'title_' . app()->getLocale()} ?? $service->title_az;
                            $desc = $service->{'description_' . app()->getLocale()} ?? $service->description_az;
                        @endphp
                        <li class="wow fadeInUp">
                            <div class="services-one__single">
                                <div class="services-one__img">
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $title }}">
                                </div>
                                <div class="services-one__content">
                                    <h3 class="services-one__title">
                                        <a href="{{ route('service.details', ['locale' => app()->getLocale(), 'id' => $firstService->id]) }}">{{ $title }}</a>
                                    </h3>
                                    <p>{{ Str::limit($desc, 100) }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- services One End --> 
 
<!-- Brand One Start -->
<section class="brand-one">
    <div class="brand-one__shape-1 zoominout">
        <img src="{{ asset('assets/images/shapes/brand-one-shape-1.png') }}" alt="">
    </div>

    <div class="container text-center">
        <ul class="list-unstyled brand-one__list" id="brandList">
            @php $visible = 0; @endphp
            @foreach($brands as $brand)
                @if($brand->is_active)
                    <li class="brand-item {{ $visible >= 5 ? 'hidden-brand' : '' }}">
                        <div class="brand-one__img">
                            <a href="{{ $brand->link ?? '#' }}" target="_blank" rel="noopener">
                                <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}">
                            </a>
                        </div>
                    </li>
                    @php $visible++; @endphp
                @endif
            @endforeach
        </ul>
            @if($brands->count() > 5)
                <button id="seeMoreBtn" class="thm-btn mt-4" data-more="@lang('messages.see_more')" data-less="@lang('messages.see_less')">
                    @lang('messages.see_more')
                </button>
            @endif

    </div>
</section>

<!-- Brand One End --> 
 


@endsection

@push('scripts')
<script>
window.addEventListener("load", function () {
    const btn = document.getElementById("seeMoreBtn");
    const hiddenItems = document.querySelectorAll(".hidden-brand");
    let expanded = false;

    if (btn && hiddenItems.length > 0) {
        const seeMoreText = btn.dataset.more;
        const seeLessText = btn.dataset.less;

        btn.addEventListener("click", () => {
            expanded = !expanded;

            hiddenItems.forEach(item => {
                if (expanded) {
                    item.classList.remove("hidden-brand");
                } else {
                    item.classList.add("hidden-brand");
                }
            });

            btn.textContent = expanded ? seeLessText : seeMoreText;
        });
    }
});
</script>

@endpush