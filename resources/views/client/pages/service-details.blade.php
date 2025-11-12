@extends('client.layout.master')

@section('page_title', $service->{'title_' . app()->getLocale()} ?? $service->title)

@section('content')

<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }});"></div>
    <div class="container">
        <div class="page-header__inner">
            @php
                $locale = app()->getLocale();
                $title = $service->{'title_' . $locale} ?? $service->title;
            @endphp
            <h2>{{ $title }}</h2>
            <div class="thm-breadcrumb__box">
                <ul class="thm-breadcrumb list-unstyled">
                    <li>
                        <a href="{{ route('home', app()->getLocale()) }}">{{ __('breadcrumb_home') }}</a>
                    </li>
                    <li><span>-</span></li>
                    <li>{{ __('service_details') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="services-details">
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <!-- Categories -->
                    <div class="sidebar__single sidebar__category">
                        <h3 class="sidebar__title">{{ __('service_categories') }}</h3>

                        @php
                            $locale = app()->getLocale();
                            $categoryField = 'category_' . $locale;
                        @endphp

                        <ul class="services-details__catagories-list list-unstyled">
                            @foreach(\App\Models\Service::where('is_active', true)->distinct()->pluck($categoryField) as $cat)
                                @if(!empty($cat))
                                    @php
                                        $firstInCategory = \App\Models\Service::where($categoryField, $cat)
                                            ->where('is_active', true)
                                            ->orderBy('id')
                                            ->first();
                                    @endphp
                                    @if($firstInCategory)
                                        <li class="{{ $cat == ($service->$categoryField ?? '') ? 'active' : '' }}">
                                            <a href="{{ route('service.details', ['locale' => app()->getLocale(), 'id' => $firstInCategory->id]) }}">
                                                {{ $cat }} <span class="icon-right-arrows"></span>
                                            </a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <!-- Recent Services -->
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">{{ __('recent_services') }}</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            @foreach(\App\Models\Service::where('is_active', true)->latest()->take(3)->get() as $recent)
                                @php
                                    $titleRecent = $recent->{'title_' . $locale} ?? $recent->title;
                                @endphp
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{ asset('storage/'.$recent->image) }}" alt="{{ $titleRecent }}">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="{{ route('service.details', ['locale' => app()->getLocale(), 'id' => $recent->id]) }}">
                                                {{ Str::limit($titleRecent, 45) }}
                                            </a>
                                        </h3>
                                        @if($recent->date)
                                            <span class="sidebar__post-content-date">
                                                {{ \Carbon\Carbon::parse($recent->date)->format('d M, Y') }}
                                            </span>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-xl-8 col-lg-7">
                @php
                    $category = $service->{'category_' . $locale} ?? $service->category;
                    $description = $service->{'description_' . $locale} ?? $service->description;
                    $details = $service->{'details_' . $locale} ?? $service->details;
                @endphp

                <div class="services-details__right">
                    <div class="services-details__img">
                        <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $title }}">
                    </div>

                    <div class="services-details__content">
                        <ul class="services-details__meta list-unstyled">
                            <li>
                                <div class="icon"><span class="fas fa-tag"></span></div>
                                <a href="#">
                                    {{ $category ?? __('general_category') }}
                                </a>
                            </li>

                            @if($service->date)
                            <li>
                                <div class="icon"><span class="fas fa-calendar"></span></div>
                                <a href="#">{{ \Carbon\Carbon::parse($service->date)->format('d M, Y') }}</a>
                            </li>
                            @endif
                        </ul>

                        <h3 class="services-details__title-1">{{ $title }}</h3>
                        <p class="services-details__text-1">{{ $description }}</p>

                        @if($details)
                        <div class="services-details__quote-and-text">
                            <div class="services-details__quote">
                                <span class="fas fa-quote-left"></span>
                            </div>
                            <p class="services-details__quote-text">{!! nl2br(e($details)) !!}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
