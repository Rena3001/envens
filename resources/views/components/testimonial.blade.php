@if(isset($testimonials) && count($testimonials))
<section class="testimonial-one">
    <div class="testimonial-one__shape-1 img-bounce">
        <img src="{{ asset('assets/images/shapes/testimonial-one-shape-1.png') }}" alt="">
    </div>
    <div class="testimonial-one__shape-2 float-bob-x">
        <img src="{{ asset('assets/images/shapes/testimonial-one-shape-2.png') }}" alt="">
    </div>

    <div class="container">
        <div class="testimonial-one__top">
            <div class="section-title text-left">
                {{-- ✅ Başlıq artıq admin paneldə tərcümə sistemindən gəlir --}}
                <h2 class="section-title__title">{!! ('testimonial_title') !!}</h2>
            </div>
            <div class="testimonial-one__dot-style">
                <div class="swiper-dot-style1"></div>
            </div>
        </div>

        <div class="testimonial-one__bottom">
            <div class="thm-swiper__slider swiper-container"
                data-swiper-options='{
                    "slidesPerView": 1,
                    "spaceBetween": 0,
                    "speed": 2000,
                    "loop": true,
                    "pagination": {
                        "el": ".swiper-dot-style1",
                        "type": "bullets",
                        "clickable": true
                    },
                    "autoplay": { "delay": 9000 },
                    "breakpoints": {
                        "0": { "slidesPerView": 1, "spaceBetween": 0 },
                        "375": { "slidesPerView": 1, "spaceBetween": 0 },
                        "575": { "slidesPerView": 1, "spaceBetween": 0 },
                        "768": { "slidesPerView": 1, "spaceBetween": 24 },
                        "992": { "slidesPerView": 2, "spaceBetween": 24 },
                        "1344": { "slidesPerView": 3, "spaceBetween": 24 }
                    }
                }'>
                <div class="swiper-wrapper">
                    @foreach($testimonials as $item)
                        @php
                            $locale = app()->getLocale();
                            $name = $item->{'name_' . $locale} ?? $item->name;
                            $position = $item->{'position_' . $locale} ?? $item->position;
                            $message = $item->{'message_' . $locale} ?? $item->message;
                        @endphp

                        <div class="swiper-slide">
                            <div class="testimonial-one__single">
                                <div class="testimonial-one__quote">
                                    <span class="icon-quotation"></span>
                                </div>
                                <div class="testimonial-one__ratting">
                                    @for($i = 1; $i <= ($item->rating ?? 5); $i++)
                                        <span class="icon-star"></span>
                                    @endfor
                                </div>
                                <p class="testimonial-one__text">{{ $message }}</p>
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client-img">
                                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $name }}">
                                    </div>
                                    <div class="testimonial-one__client-content">
                                        <h3>{{ $name }}</h3>
                                        <p>{{ $position }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
