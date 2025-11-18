@php
    use App\Models\Setting;
    use App\Models\Translation;

    $facebook = Setting::get('facebook_link');
    $twitter  = Setting::get('twitter_link');
    $linkedin = Setting::get('linkedin_link');
    $instagram = Setting::get('instagram_link');
    $currentLang = app()->getLocale(); // cari dil
@endphp
@php
    $currentLocale = app()->getLocale();
    $segments = request()->segments();
    $segments[0] = '__LANG__'; // birinci seqmenti dil kimi əvəz edirik
    $urlTemplate = url(implode('/', $segments));
@endphp

<header class="main-header">
    <nav class="main-menu">
        <div class="main-menu__wrapper">
            <div class="main-menu__wrapper-inner">
                <div class="main-menu__left">
                    {{-- Logo --}}
                    <div class="main-menu__logo">
                        <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">
                            <img src="{{ asset('assets/images/resources/logo-1.png') }}" alt="Logo">
                        </a>
                    </div>

                   {{-- Dil seçimi --}}
                    <div class="main-menu__language" style="margin-left: 20px;">
                        <div class="select-box">
                            <select onchange="window.location.href='/' + this.value + window.location.pathname.substring(3)">
                                <option value="az" {{ app()->getLocale() == 'az' ? 'selected' : '' }}>AZ</option>
                                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                                <option value="ru" {{ app()->getLocale() == 'ru' ? 'selected' : '' }}>RU</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="main-menu__right"> 
                    {{-- Navigation menu --}}
                    <div class="main-menu__main-menu-box">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}">{{ \App\Models\Translation::getText('home') }}</a></li>
                            <li><a href="{{ route('about', ['locale' => app()->getLocale()]) }}">{{ \App\Models\Translation::getText('about') }}</a></li>
                            <li><a href="{{ route('galleries', ['locale' => app()->getLocale()]) }}">{{ \App\Models\Translation::getText('gallery') }}</a></li>
                            <li>
                                <a href="{{ route('services', ['locale' => app()->getLocale()]) }}">{{ \App\Models\Translation::getText('services') }}</a>
                                @php
                                    $firstService = \App\Models\Service::where('is_active', true)->orderBy('id')->first();
                                @endphp
                                <ul>
                                    @if($firstService)
                                        <li>
                                            <a href="{{ route('service.details', ['locale' => app()->getLocale(), 'id' => $firstService->id]) }}">
                                                {{ \App\Models\Translation::getText('service_details') }}
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <li><a href="{{ route('contact', ['locale' => app()->getLocale()]) }}">{{ \App\Models\Translation::getText('contact') }}</a></li>
                        </ul> 
                    </div>

                    {{-- Social Media --}}
                    <div class="main-menu__social-and-search-box">
                        <div class="main-menu__social">
                            @if($facebook)
                                <a href="{{ $facebook }}" target="_blank"><span class="fab fa-facebook-f"></span></a>
                            @endif
                            @if($instagram)
                                <a href="{{ $instagram }}" target="_blank"><span class="fab fa-instagram"></span></a>
                            @endif
                            @if($linkedin)
                                <a href="{{ $linkedin }}" target="_blank"><span class="fab fa-tiktok"></span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
