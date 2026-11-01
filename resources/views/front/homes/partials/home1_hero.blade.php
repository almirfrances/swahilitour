<section class="main-slider-three">
    <div class="container">
        <div class="main-slider-three__content">
            <h5 class="main-slider-three__sub-title wow fadeInUp" data-wow-delay="200ms">{!! $heroSection->subtitle !!} </h5>
            <h3 class="main-slider-three__title wow fadeInUp" data-wow-delay="300ms">{!! $heroSection->title !!} </h3>
            <div class="main-slider-three__btn wow fadeInUp" data-wow-delay="400ms">
                    <a href="{{ $heroSection->button_link }}" class="trevlo-btn trevlo-btn--base"><span>{{ $heroSection->button_text }}</span></a>
            </div>
        </div>
        @include('front.homes.partials.home1_search')
        <div class="main-slider-three__customer wow fadeInUp" data-wow-delay="400ms">
            <div class="main-slider-three__customer__image">
                <img src="{{ asset('front/assets/images/resources/slider-3-author-1.png') }}" alt="trevlo">
                <img src="{{ asset('front/assets/images/resources/slider-3-author-2.png') }}" alt="trevlo">
                <img src="{{ asset('front/assets/images/resources/slider-3-author-3.png') }}" alt="trevlo">
                <img src="{{ asset('front/assets/images/resources/slider-3-author-4.png') }}" alt="trevlo">
                <img src="{{ asset('front/assets/images/resources/slider-3-author-5.png') }}" alt="trevlo">
                <img src="{{ asset('front/assets/images/resources/slider-3-author-6.png') }}" alt="trevlo">
                <div class="main-slider-three__customer__number">{{ $heroSection->satisfied_customers }}+</div>
            </div>
            <h5 class="main-slider-three__customer__title">Satisfied customers</h5>
        </div>
    </div>
    <!-- banner-form -->
    <div class="main-slider-three__shape-one" style="background-image: url({{ asset('front/assets/images/shapes/slider-3-shape-1.png') }});"></div>
    <div class="main-slider-three__image wow fadeInRight" data-wow-delay="200ms" style="background-image: url({{ Storage::url($heroSection->image) }});"></div>
</section>
