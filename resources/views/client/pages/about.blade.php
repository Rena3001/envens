@extends('client.layout.master')
@section('page_title', "About")
@section('content')

@php
    $about = \App\Models\About::where('is_active', true)->first();
@endphp

<div class="stricky-header stricked-menu main-menu main-menu-two">
    <div class="sticky-header__content"></div>
</div>

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header__bg" style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg.jpg') }}');"></div>
    <div class="page-header__shape-1"><img src="{{ asset('assets/images/shapes/page-header-shape-1.png') }}" alt=""></div>
    <div class="page-header__shape-2"><img src="{{ asset('assets/images/shapes/page-header-shape-2.png') }}" alt=""></div>
    <div class="page-header__shape-3"><img src="{{ asset('assets/images/shapes/page-header-shape-3.png') }}" alt=""></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>{{ \App\Models\Translation::getText('about') }}</h2>
            <div class="thm-breadcrumb__box">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">{!! ('breadcrumb_home') !!}</a></li>
                    <li><span>-</span></li>
                    <li>{{ \App\Models\Translation::getText('about') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Page Header End-->

@if($about)
<!--About Two Start-->
<section class="about-two">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="about-two__left">
                    <div class="about-two__img" 
                        style="background-image: url('{{ asset('storage/'.$about->image) }}');">
                    </div>
                </div>
            </div>

            <div class="col-xl-6 wow fadeInRight" data-wow-delay="300ms">
                <div class="about-two__right">
                    <div class="section-title text-left">
                        <h2 class="section-title__title">
                            {{ $about->getTranslated('title') }}
                            <span>{{ $about->getTranslated('subtitle') }}</span>
                        </h2>
                    </div>

                    <p class="about-two__text">{!! nl2br(e($about->getTranslated('description'))) !!}</p>

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
                    <p class="about-two__solition-text">{{ $text }}</p>
                </div>
            @endif
        @endforeach
    </div>
@endif



                    <div class="about-two__btn-and-client-info">
                        <div class="about-two__client-info">
                            <div class="about-two__client-img">
                                @if($about->ceo_image)
                                    <img src="{{ asset('storage/'.$about->ceo_image) }}" alt="{{ $about->ceo_name }}">
                                @endif
                            </div>
                            <div class="content">
                                <h4>{{ $about->ceo_name }}</h4>
                                <p>{{ $about->ceo_title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--About Two End-->
@endif


<!--Team Two Start (sabit dizayn, dinamikləşdirilə bilər) -->
@include('components.team', ['teams' => $teams])
<!--Team Two End-->

<!--Testimonial One Start (hazır dizayn saxlanılır) -->
@include('components.testimonial', ['testimonials' => $testimonials])
<!--Testimonial One End-->

@endsection

