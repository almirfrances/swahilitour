<section class="testimonial-three section-space-bottom tour-listing-one--home-two section-space mt-4" id="testimonials">

    <div class="container">
        <div class="sec-title sec-title--two text-center">

            <p class="sec-title__tagline">Reviews</p><!-- /.sec-title__tagline -->

            <h2 class="sec-title__title">How people rate our services</h2><!-- /.sec-title__title -->
        </div><!-- /.sec-title -->
        <!-- /.sec-title -->
        <div class="testimonial-three__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav trevlo-owl__carousel--with-shadow owl-theme owl-carousel"
            data-owl-options='{
                "items": 3,
                "margin": 30,
                "smartSpeed": 700,
                "loop":true,
                "autoplay": 6000,
                "nav":false,
                "dots":true,
                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                "responsive":{
                    "0":{
                        "items": 1
                    },
                    "768":{
                        "items": 2
                    },
                    "1200":{
                        "items": 3,
                        "dots": false
                    }
                }
            }'>
        @foreach($reviews as $review)
            <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <div class="testimonials-card-three">
                    <div class="testimonials-card-three__image">
                        <img src="{{ $review->user->profile_image ?? asset('storage/' . $settings['favicon']) }}" alt="{{ $review->user->full_name }}">
                    </div>
                    <div class="testimonials-card-three__inner">
                        <div class="testimonials-card-three__quote-icon">
                            <span class="trevlo-one-icon-quote"></span>
                        </div><!-- /.testimonials-card-three__quote-icon -->
                        <div class="testimonials-card-three__identity">
                            <h5 class="testimonials-card-three__identity__name">{{ $review->user->full_name }}</h5>

                            <p class="testimonials-card-three__identity__designation"> Rated in:
                                @if($review->reviewable instanceof App\Models\Tour)
                                    <a href="{{ route('tours.show', $review->reviewable->slug) }}" class="custom-link">{{ $review->reviewable->name }}</a>
                                @elseif($review->reviewable instanceof App\Models\Hotel)
                                    <a href="{{ route('hotels.show', $review->reviewable->slug) }}" class="custom-link">{{ $review->reviewable->name }}</a>
                                @endif
                                <style>
                                    .custom-link {
                                        color: black; /* Initial color */
                                    }
                                    .custom-link:hover {
                                        color: white; /* Color on hover */
                                    }
                                </style>

                            </p>

                        </div><!-- /.testimonials-card-three__identity -->
                       <p class="testimonials-card-three__quote">
    {{ Str::limit($review->comment, 160, '...') }}

   @if($review->reviewable instanceof App\Models\Tour)
                                    <a href="{{ route('tours.show', $review->reviewable->slug) }}" class="custom-link">Read More</a>
                                @elseif($review->reviewable instanceof App\Models\Hotel)
                                    <a href="{{ route('hotels.show', $review->reviewable->slug) }}" class="custom-link">Read More</a>
                                @endif
</p>
 
                        <!-- /.testimonials-card-three__quote -->
                        <div class="trevlo-ratings">
                            @for ($i = 1; $i <= 5; $i++) <i
                                                class="fa {{ $i <= $review->average_rating ? 'fa-star' : 'fa-star-o' }}">
                                                </i>
                                                @endfor
                        </div>
                    </div><!-- /.testimonials-card-three__inner -->
                </div><!-- /.testimonials-card-three -->
            </div><!-- /.owl-slide-item-->
        @endforeach
        </div><!-- /.thm-owl__slider -->
    </div><!-- /.container -->
</section><!-- /.testimonial-three section-space-bottom -->
