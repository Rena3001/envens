@if(isset($teams) && count($teams))
<section class="team-two">
    <div class="team-two__bg" style="background-image: url('{{ asset('assets/images/backgrounds/team-two-bg.jpg') }}');"></div>
    <div class="container">
        <div class="team-two__top">
            <div class="section-title text-left">
                {{-- Başlıq artıq admin paneldə tərcümə edilə bilər --}}
                <h2 class="section-title__title">{!! ('team_title') !!}</h2>
            </div>
        </div>

        <div class="row">
            @foreach($teams as $member)
                @php
                    $locale = app()->getLocale();
                    $name = $member->{'name_' . $locale} ?? $member->name;
                    $position = $member->{'position_' . $locale} ?? $member->position;
                @endphp

                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp">
                    <div class="team-two__single">
                        <div class="team-two__img">
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $name }}">
                        </div>

                        <div class="team-two__social">
                            @if($member->twitter)
                                <a href="{{ $member->twitter }}"><span class="fab fa-twitter"></span></a>
                            @endif
                            @if($member->facebook)
                                <a href="{{ $member->facebook }}"><span class="fab fa-facebook-f"></span></a>
                            @endif
                            @if($member->instagram)
                                <a href="{{ $member->instagram }}"><span class="fab fa-instagram"></span></a>
                            @endif
                        </div>

                        <div class="team-two__content">
                            <p class="team-two__sub-title">{{ $position }}</p>
                            <h3 class="team-two__title">{{ $name }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
