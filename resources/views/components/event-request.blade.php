<section class="contact-one">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="section-title__title">
                {{ __('event_request_title') }} <span>{{ __('event_request_highlight') }}</span>
            </h2>
        </div>

        <div class="contact-one__inner wow fadeInUp" data-wow-delay="300ms">
            <form class="contact-one__form" action="{{ route('event.request.store', app()->getLocale()) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-4"> 
                        <div class="contact-one__input-box">
                            <input type="text" name="name" placeholder="{{ __('name_surname') }}" required>
                            <div class="contact-one__input-box-icon">
                                <span class="far fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="contact-one__input-box">
                            <input type="email" name="email" placeholder="{{ __('email_address') }}" required>
                            <div class="contact-one__input-box-icon">
                                <span class="far fa-envelope-open"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="contact-one__input-box">
                            <input type="text" name="event_type" placeholder="{{ __('event_type_placeholder') }}">
                            <div class="contact-one__input-box-icon">
                                <span class="fas fa-calendar-check"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="contact-one__input-box">
                            <input type="number" name="guests" placeholder="{{ __('guest_count_placeholder') }}">
                            <div class="contact-one__input-box-icon">
                                <span class="fas fa-users"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="contact-one__input-box">
                            <input type="text" name="date" placeholder="{{ __('event_date_placeholder') }}" id="datepicker">
                            <div class="contact-one__input-box-icon">
                                <span class="fas fa-calendar-alt"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="contact-one__input-box">
                            <textarea name="message" placeholder="{{ __('additional_notes_placeholder') }}"></textarea>
                        </div>
                        <div class="contact-one__btn-box text-center mt-3">
                            <button type="submit" class="thm-btn contact-one__btn">
                                <span class="fas fa-arrow-circle-right"></span> {{ __('send_button') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            @if(session('success'))
                <div class="alert alert-success mt-4 text-center">
                    {{ __('form_success_message') }}
                </div>
            @endif
        </div>
    </div>
</section>
