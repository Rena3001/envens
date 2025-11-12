@extends('client.layout.master')
@section('page_title', ('gallery_page_title') ?? "Gallery")

@section('content')
<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }});"></div>
    <div class="container">
        <div class="page-header__inner">
            {{-- ✅ Başlıq tərcümədən gəlir --}}
            <h2>{!! ('gallery_title') !!}</h2>
            <div class="thm-breadcrumb__box">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('home', app()->getLocale()) }}">{!! ('breadcrumb_home') !!}</a></li>
                    <li><span>-</span></li>
                    <li>{!! ('gallery') !!}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="gallery-page">
    <div class="gallery-two__bottom">
        <div class="container">
            <div class="row masonary-layout">
                @foreach($galleries as $item)
                    @php
                        $locale = app()->getLocale();
                        $title = $item->{'title_' . $locale} ?? $item->title;
                        $category = $item->{'category_' . $locale} ?? $item->category;
                    @endphp

                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->index * 100 }}ms">
                        <div class="gallery-two__single">
                            <div class="gallery-two__img">
                                <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $title }}">
                                <div class="gallery-two__content">
                                    <div class="gallery-two__content-shape-1"
                                        style="background-image: url({{ asset('assets/images/shapes/gallery-two-content-shape-1.png') }});">
                                    </div>
                                    <div class="gallery-two__zoom-and-link">
                                        <a href="{{ asset('storage/'.$item->image) }}" class="img-popup">
                                            <span class="icon-zoom"></span>
                                        </a>
                                    </div>
                                    <div class="gallery-two__content-text">
                                        <p>{{ $category }}</p>
                                        <h5>{{ $title }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
