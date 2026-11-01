
<section class="tour-listing-five tour-listing-two--home-three mb-4">
    <div class="container">
        <div class="tour-listing-five__top">
            <div class="row gutter-y-40 align-items-center">
                <div class="col-lg-8">
                    <div class="sec-title sec-title--two text-left">

                        <p class="sec-title__tagline">Featured Hotels</p><!-- /.sec-title__tagline -->

                        <h2 class="sec-title__title">Amazing Hotels around <br> the world</h2><!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                </div><!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="tour-listing-five__custom-navs"></div><!-- /.tour-listing-five__custom-navs -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row gutter-y-40 -->
        </div><!-- /.tour-listing-five__top -->
        <div class="row g-0">
            <div class="col-lg-12">
                <div class="trevlo-stretch-element-inside-column">
                    <div class="tour-listing-five__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav trevlo-owl__carousel--with-shadow owl-theme owl-carousel" data-owl-options='{
                            "items": 3,
                            "margin": 30,
                            "smartSpeed": 700,
                            "loop":true,
                            "autoplay": 6000,
                            "nav":true,
                            "dots":false,
                            "navContainer": ".tour-listing-five__custom-navs",
                            "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
                            "responsive":{
                                "0":{
                                    "items": 1
                                },
                                "576":{
                                    "items": 1.4
                                },
                                "768":{
                                    "items": 1.9
                                },
                                "992":{
                                    "items": 2.4
                                },
                                "1200":{
                                    "items": 2.9
                                },
                                "1400":{
                                    "items": 3.3
                                },
                                "1600":{
                                    "items": 3.9
                                }
                            }
                            }'>
                @foreach($hotels as $hotel)
                    @if ($hotel->featured)
                        <div class="item">
                            <div class="tour-listing-five__card">
                                <div class="tour-listing-five__card__bg" style="background-image: url({{ asset('front/assets/images/shapes/tour-shape-bg-5-1.png') }});"></div>
                                <!-- /.tour-listing-five__card__bg -->
                                <div class="tour-listing-five__card__inner">
                                    <a href="{{ route('hotels.show', $hotel->slug) }}" class="tour-listing-five__card__image">
                                        @php
                                        // Directly access images as an array
                                        $images = $hotel->images ?? []; // Ensure it's an array with fallback
                                        $image = !empty($images) ? Arr::random($images) : 'default-image.jpg'; // Fallback to a default

                                        @endphp
                                        <img src="{{ url($image) }}" alt="{{ $hotel->name }}" loading="lazy" decoding="async" fetchpriority="low" style="width: 100%; height: 290px; object-fit: cover; border-radius: 8px;">
                                        @if($hotel->featured)
                                            <div class="tour-listing-five__card__featured">featured</div>
                                        @endif
                                        <div class="tour-listing-five__card__overlay">
                                            <span class="tour-listing-five__card__plus">
                                                <i class="icon-plus"></i>
                                            </span>
                                        </div><!-- /.tour-listing-five__card__overlay -->
                                    </a><!-- /.tour-listing-five__card__image -->
                                    <div class="tour-listing-five__card__content">
                                        <div class="tour-listing-five__card__ratings">
                                            <div class="trevlo-ratings">

                                                @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($totalAverageRating)) <!-- Full Star -->
                                                <i class="fa fa-star"></i>
                                                @elseif ($i == ceil($totalAverageRating) && $totalAverageRating -
                                                floor($totalAverageRating) >= 0.5)
                                                <!-- Half Star -->
                                                <i class="fa fa-star"></i>
                                                @else
                                                <!-- Empty Star -->
                                                <i class="fa fa-star"></i>
                                                @endif
                                                @endfor
                                            </div>
                                            @php
                                                $totalReviews = $hotel->reviews->count();
                                                $averageRating = $totalReviews > 0
                                                    ? $hotel->reviews->avg('average_rating')
                                                    : 0; // Calculate average rating if reviews are present
                                            @endphp
                                            <p class="tour-listing-five__card__ratings__text">{{ number_format($averageRating, 1) }}
                                                ({{ $totalReviews }} {{ Str::plural('Review', $totalReviews) }})</p>
                                        </div><!-- /.tour-listing-five__card__ratings -->
                                        <h3 class="tour-listing-five__card__title">
                                            <a href="{{ route('hotels.show', $hotel->slug) }}">{{ $hotel->name }}</a>
                                        </h3><!-- /.tour-listing-five__card__title -->
                                        <div class="tour-listing-five__card__location">
                                            <span class="tour-listing-five__card__location__icon">
                                                <i class="trevlo-one-icon-maps-and-flags"></i>
                                            </span><!-- /.tour-listing-five__card__location__icon -->
                                            <p class="tour-listing-five__card__location__text">{{ $hotel->destination->name }}</p><!-- /.tour-listing-five__card__location__text -->
                                        </div><!-- /.tour-listing-five__card__location -->
                                        <div class="tour-listing-five__card__bottom">
                                            <div class="tour-listing-five__card__price-box">
                                                <p class="tour-listing-five__card__price-title">form</p>
                                                <!-- /.tour-listing-five__card__price-title -->
                                                <h4 class="tour-listing-five__card__price"> ${{ $hotel->starting_price }}</h4>
                                                <!-- /.tour-listing-five__card__price -->
                                            </div><!-- /.tour-listing-five__card__price-box -->
                                            <div class="tour-listing-five__card__btn-group">
                                                <a href="javascript:void(0);" class="tour-listing-five__card__popup-btn tour-listing-five__card__popup-btn--camera trevlo-image-popup" data-gallery-options='{
                                            "items": [
                                           @foreach($images as $img)
                                           {
                                               "src": "{{ url($image) }}"
                                           }@if(!$loop->last),@endif
                                           @endforeach
                                       ],
                                            "gallery": {
                                              "enabled": true
                                            },
                                            "type": "image"
                                        }'>
                                                    <span class="icon-photo-camera-1"></span>
                                                </a>

                                            </div><!-- /.tour-listing-five__card__btn-group -->
                                        </div><!-- /.tour-listing-five__card__bottom -->
                                    </div><!-- /.tour-listing-five__card__content -->
                                </div><!-- /.tour-listing-five__card__inner -->
                            </div><!-- /.tour-listing-five__card -->
                        </div><!-- /.item -->
                    @endif
                @endforeach

                    </div><!-- /.tour-listing-five__carousel -->
                </div><!-- /.trevlo-stretch-element-inside-column -->
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <img src="front/assets/images/shapes/tour-shape-5-1.png" alt="shape" class="tour-listing-five__shape" loading="lazy" decoding="async">
</section><!-- /.tour-listing-five section-space -->
