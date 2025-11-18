@php
use App\Models\Setting;
use App\Models\Gallery;

$settings = Setting::firstOrDefault();

$galleryItems = Gallery::where('is_active', true)
->latest()
->take(6)
->get();
@endphp

<footer class="site-footer">
    <div class="site-footer__bg-box">
        <div class="site-footer__bg" style="background-image: url('{{ asset('assets/images/backgrounds/site-footer-bg.jpg') }}')"></div>
    </div>

 
    <div class="site-footer__top">
        <div class="container">
            <div class="site-footer__top-inner">
                <div class="row" style="justify-content: space-around;">

                    {{-- 🏢 Əlaqə məlumatları --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="footer-widget__column footer-widget__contact">
                            <div class="footer-widget__title-box">
                                <h3 class="footer-widget__title">{{ \App\Models\Translation::getText('contact') }}</h3>
                            </div>
                            <div class="footer-widget__contact-inner">
                                <p class="footer-widget__contact-text">
                                    {{ $settings->address ?? '1234 Street Name, City, Country' }}
                                </p>
                                <ul class="footer-widget__contact-list list-unstyled">
                                    <li>
                                        <div class="icon"><span class="icon-envelope"></span></div>
                                        <div class="text"><p><a href="mailto:{{ $settings->email ?? 'info@example.com' }}">{{ $settings->email ?? 'info@example.com' }}</a></p></div>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="icon-telephone-symbol-button"></span></div>
                                        <div class="text"><p><a href="tel:{{ $settings->phone ?? '+994 50 000 00 00' }}">{{ $settings->phone ?? '+994 50 000 00 00' }}</a></p></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- 🔗 Keçidlər (statik linklər, çoxdilli) --}}
                    <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms"> 
                        <div class="footer-widget__column footer-widget__link">
                            <div class="footer-widget__title-box">
                                <h3 class="footer-widget__title">{{ \App\Models\Translation::getText('links') }}</h3>
                            </div>
                           <ul class="footer-widget__link-list list-unstyled">
                                <li>
                                    <a href="{{ route('about', ['locale' => app()->getLocale()]) }}">
                                        {{ \App\Models\Translation::getText('about') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services', ['locale' => app()->getLocale()]) }}">
                                        {{ \App\Models\Translation::getText('services') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('galleries', ['locale' => app()->getLocale()]) }}">
                                        {{ \App\Models\Translation::getText('gallery') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}">
                                        {{ \App\Models\Translation::getText('contact') }}
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                    {{-- 🖼️ Qalereya (bazadan son 6 şəkil) --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="footer-widget__column footer-widget__gallery">
                            <div class="footer-widget__title-box">
                                <h3 class="footer-widget__title">{{ \App\Models\Translation::getText('gallery') }}</h3>
                            </div>
                          <ul class="footer-widget__gallery-list list-unstyled clearfix">
                                @foreach ($galleryItems as $item)
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title ?? 'Gallery' }}">
                                            <a href="{{ route('galleries', ['locale' => app()->getLocale()]) }}">{{ \App\Models\Translation::getText('gallery') }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Alt hissə --}}
    <div class="site-footer__bottom">
        <div class="container">
            <div class="site-footer__bottom-inner">

                <div class="site-footer__bottom-logo-and-social">
                    <div class="site-footer__bottom-logo">
                        @if($settings->footer_logo)
                        <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">
                            <img src="{{ asset('storage/' . $settings->footer_logo) }}" alt="Footer Logo">
                        </a>
                        @else
                        <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">
                            <img src="{{ asset('assets/images/resources/site-footer-logo-1.png') }}" alt="Default Logo">
                        </a>
                        @endif
                    </div>

                    <div class="site-footer__social">
                        @if($settings->facebook_link)
                        <a href="{{ $settings->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($settings->twitter_link)
                        <a href="{{ $settings->twitter_link }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($settings->linkedin_link)
                        <a href="{{ $settings->linkedin_link }}" target="_blank"><i class="fab fa-tiktok"></i></a>
                        @endif
                        @if($settings->instagram_link)
                        <a href="{{ $settings->instagram_link }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if($settings->youtube_link)
                        <a href="{{ $settings->youtube_link }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        @endif
                    </div>
                </div>

                <p class="site-footer__bottom-text">
                    © {{ now()->year }} {{ $settings->footer_text ?? 'Sayt.az' }}
                </p>
            </div>
        </div>
    </div>

</footer>