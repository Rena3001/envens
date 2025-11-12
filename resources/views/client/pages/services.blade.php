@extends('client.layout.master')
@section('page_title', __('services_page_title') ?? "Services")

@section('content')

<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }});"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>{{ __('services_title') }}</h2>
            <div class="thm-breadcrumb__box">
                <ul class="thm-breadcrumb list-unstyled">
                    <li>
                        <a href="{{ route('home', app()->getLocale()) }}">{{ __('breadcrumb_home') }}</a>
                    </li>
                    <li><span>-</span></li>
                    <li>{{ __('services_title') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="services-page">
    <div class="container">
        <div class="row">
            <!-- Sol tərəf: Kateqoriyalar -->
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__category">
                        <h3 class="sidebar__title">{{ __('service_categories') }}</h3>
                        @php
                            $locale = app()->getLocale();
                            $categoryField = 'category_' . $locale;
                        @endphp

                        <ul class="services-details__catagories-list list-unstyled">
                            @foreach($services->unique($categoryField) as $cat)
                                @php
                                    $category = $cat->$categoryField;

                                    // Həmin kateqoriyaya aid ilk aktiv xidməti tapırıq
                                    $firstInCategory = \App\Models\Service::where($categoryField, $category)
                                        ->where('is_active', true)
                                        ->orderBy('id')
                                        ->first();
                                @endphp

                                @if(!empty($category) && $firstInCategory)
                                    <li>
                                        <a href="{{ route('service.details', ['locale' => app()->getLocale(), 'id' => $firstInCategory->id]) }}">
                                            {{ $category }}
                                            <span class="icon-right-arrows"></span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sağ tərəf: Xidmətlər -->
            <div class="col-xl-8 col-lg-7">
                <div class="services-page__right">
                    @foreach($services as $service)
                        @php
                            $locale = app()->getLocale();
                            $title = $service->{'title_' . $locale} ?? $service->title;
                            $category = $service->{'category_' . $locale} ?? $service->category;
                            $description = $service->{'description_' . $locale} ?? $service->description;
                        @endphp

                        <div class="services-page__single">
                            <div class="services-page__img">
                                <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $title }}">
                                @if($service->date)
                                    <div class="services-page__date">
                                        <p>{{ \Carbon\Carbon::parse($service->date)->format('d M, Y') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="services-page__content">
                                <h3 class="services-page__title">
                                    <a href="{{ route('service.details', ['locale' => app()->getLocale(), 'id' => $service->id]) }}">
                                        {{ $title }}
                                    </a>
                                </h3>

                                <p class="services-page__text-1">{{ Str::limit($description, 150) }}</p>

                                <div class="services-page__btn-box">
                                    <a href="{{ route('service.details', ['locale' => app()->getLocale(), 'id' => $service->id]) }}" class="services-page__btn">
                                        {{ __('read_more') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="services-page__pagination">
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
