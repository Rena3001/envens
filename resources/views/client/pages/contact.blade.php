@extends('client.layout.master')
@section('page_title', __('contact_page_title') ?? "Contact Page")
@section('content')

<!-- Sticky Header -->
<div class="stricky-header stricked-menu main-menu main-menu-two">
    <div class="sticky-header__content"></div>
</div>

<!-- Page Header Start -->
<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }});"></div>
    <div class="page-header__shape-1">
        <img src="{{ asset('assets/images/shapes/page-header-shape-1.png') }}" alt="">
    </div>
    <div class="page-header__shape-2">
        <img src="{{ asset('assets/images/shapes/page-header-shape-2.png') }}" alt="">
    </div>
    <div class="page-header__shape-3">
        <img src="{{ asset('assets/images/shapes/page-header-shape-3.png') }}" alt="">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <h2>{{ __('contact_title') }}</h2>
            <div class="thm-breadcrumb__box">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('home', app()->getLocale()) }}">{{ __('breadcrumb_home') }}</a></li>
                    <li><span>-</span></li>
                    <li>{{ __('contact_title') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Page Header End -->


<!-- Quick Contact Start -->
<section class="quick-contact">
    <div class="container">
        @php
            $locale = app()->getLocale();
        @endphp
        <div class="row">
            <!-- Visit Office -->
            <div class="col-xl-4 col-lg-4">
                <div class="quick-contact__single">
                    <h4 class="quick-contact__title">{{ $contact->{'visit_title_'.$locale} ?? __('contact_visit_title') }}</h4>
                    <p class="quick-contact__text">{{ $contact->{'visit_text_'.$locale} ?? __('contact_visit_text') }}</p>
                    <div class="quick-contact__contact-list">
                        <p>{!! $contact->{'address_'.$locale} ?? __('contact_default_address') !!}</p>
                    </div>
                    <div class="quick-contact__icon">
                        <span class="icon-pin"></span>
                    </div>
                </div>
            </div>

            <!-- Make a Call -->
            <div class="col-xl-4 col-lg-4">
                <div class="quick-contact__single">
                    <h4 class="quick-contact__title">{{ $contact->{'call_title_'.$locale} ?? __('contact_call_title') }}</h4>
                    <p class="quick-contact__text">{{ $contact->{'call_text_'.$locale} ?? __('contact_call_text') }}</p>
                    <div class="quick-contact__contact-list">
                        @if($contact->phone_1)
                            <p><a href="tel:{{ $contact->phone_1 }}">{{ $contact->phone_1 }}</a></p>
                        @endif
                        @if($contact->phone_2)
                            <p><a href="tel:{{ $contact->phone_2 }}">{{ $contact->phone_2 }}</a></p>
                        @endif
                    </div>
                    <div class="quick-contact__icon">
                        <span class="icon-phone-call"></span>
                    </div>
                </div>
            </div>

            <!-- Send Email -->
            <div class="col-xl-4 col-lg-4">
                <div class="quick-contact__single">
                    <h4 class="quick-contact__title">{{ $contact->{'email_title_'.$locale} ?? __('contact_email_title') }}</h4>
                    <p class="quick-contact__text">{{ $contact->{'email_text_'.$locale} ?? __('contact_email_text') }}</p>
                    <div class="quick-contact__contact-list">
                        @if($contact->email_1)
                            <p><a href="mailto:{{ $contact->email_1 }}">{{ $contact->email_1 }}</a></p>
                        @endif
                        @if($contact->email_2)
                            <p><a href="mailto:{{ $contact->email_2 }}">{{ $contact->email_2 }}</a></p>
                        @endif
                    </div>
                    <div class="quick-contact__icon">
                        <span class="icon-email"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Quick Contact End -->


<!-- Contact Two Start -->
<section class="contact-two">
    <div class="container">
        <div class="row">
            <!-- Map -->
            <div class="col-xl-5">
                <div class="contact-two__left">
                    <iframe 
                        src="{{ $contact->map_url ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d...' }}" 
                        class="contact-two__google-map"
                        allowfullscreen="">
                    </iframe>
                </div>
            </div>

            <!-- Form -->
            <div class="col-xl-7">
                <div class="contact-two__right">
                    <div class="section-title text-left">
                     
                        <h2 class="section-title__title">
                            {{ __('contact_form_title_line1') }} <br>
                            <span>{{ __('contact_form_title_line2') }}</span>
                        </h2>
                    </div>

                    <div class="contact-two__form-box">
                        <div class="contact-two__form-img">
                            <img src="{{ asset('assets/images/resources/contact-two-form-img.jpg') }}" alt="">
                        </div>

                        <form class="contact-two__form" action="{{ route('contact.store', app()->getLocale()) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact-two__input-box">
                                        <input type="text" name="name" placeholder="{{ __('contact_form_name') }}" required value="{{ old('name') }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact-two__input-box">
                                        <input type="email" name="email" placeholder="{{ __('contact_form_email') }}" required value="{{ old('email') }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-two__input-box">
                                        <input type="text" name="subject" placeholder="{{ __('contact_form_subject') }}" value="{{ old('subject') }}">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-page__input-box text-message-box">
                                        <textarea name="message" placeholder="{{ __('contact_form_message') }}">{{ old('message') }}</textarea>
                                        @error('message')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="contact-two__btn-box">
                                        <button type="submit" class="thm-btn contact-two__btn">
                                            {{ __('contact_form_send_btn') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @if(session('success'))
                            <div class="alert alert-success mt-4">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Two End -->

@endsection
