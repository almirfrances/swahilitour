

<section class="tour-listing-one tour-listing-one--home-two section-space" style="background-image: url(front/assets/images/shapes/tour-bg-2.png);">
    <div class="container">
        <div class="sec-title text-center">

            <p class="sec-title__tagline">Random Hotels</p><!-- /.sec-title__tagline -->

            <h2 class="sec-title__title">Amazing Hotels around the world</h2><!-- /.sec-title__title -->
        </div><!-- /.sec-title --><!-- /.sec-title -->
        <div class="tour-listing-one__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav trevlo-owl__carousel--with-shadow owl-theme owl-carousel" data-owl-options='{
                        "items": 4,
                        "margin": 30,
                        "smartSpeed": 700,
                        "loop":false,
                        "autoplay": 6000,
                        "nav":false,
                        "dots":true,
                        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                        "responsive":{
                            "0":{
                                "items": 1
                            },
                            "500":{
                                "items": 2
                            },
                            "1200":{
                                "items": 3
                            },
                            "1400":{
                                "items": 4
                            }
                        }
                        }'>

        @foreach($randomHotels as $hotel)
            <div class="item">
                <div class="tour-listing__card">
                    <a href="{{ route('hotels.show', $hotel->slug) }}" class="tour-listing__card-image-box">
                        @php
                        // Directly access images as an array
                        $images = $hotel->images ?? []; // Ensure it's an array with fallback
                        $image = !empty($images) ? Arr::random($images) : 'default-image.jpg'; // Fallback to a default

                        @endphp

                                <img src="{{ url($image) }}" alt="{{ $hotel->name }}"
                                    class="tour-listing__card-image" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">

                        <div class="tour-listing__card-btn-group">

                                    @if($hotel->featured)
                                    <div class="tour-listing__card-featured">Featured</div>
                                    @endif
                                </div>
                        <div class="tour-listing__card-image-overlay"></div><!-- /.tour-listing__card-image-overlay -->
                    </a><!-- /.tour-listing__card-image-box -->

                    <div class="tour-listing__card-content">
                        <div class="tour-listing__card-camera-group">
                            <a href="javascript:void(0);" class="tour-listing__card-camera-btn trevlo-image-popup" data-gallery-options='{
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


                        </div><!-- /.tour-listing__card-camera-group -->
                        <h3 class="tour-listing__card-title"><a
                            href="{{ route('hotels.show', $hotel->slug) }}">{{ Str::limit($hotel->name, 20) }}</a>
                    </h3>
                    <p class="tour-listing__card-text text-small">{{ Str::limit($hotel->overview, 30) }}</p>
                     <div class="tour-listing__card-inner-content">
                        <div class="tour-listing__card-review-box">
                            @php
                                $totalReviews = $hotel->reviews->count();
                                $averageRating = $totalReviews > 0
                                    ? $hotel->reviews->avg('average_rating')
                                    : 0; // Calculate average rating if reviews are present
                            @endphp

                            <span class="icon-star"></span>
                            <p class="tour-listing__card-review-text text-small">
                                {{ number_format($averageRating, 1) }}
                                ({{ $totalReviews }} {{ Str::plural('Review', $totalReviews) }})
                            </p>
                        </div>
                            <div class="tour-listing__card-location-box">
                                <span class="icon-location-1"></span>
                                <p class="tour-listing__card-location-text text-small">{{ $hotel->destination->name }}</p>
                            </div><!-- /.tour-listing__card-location-box -->
                            {{-- <div class="tour-listing__card-location-box">
                                <span class="{{ $tour->type->icon ?? 'N/A' }}"></span>
                                <p class="tour-listing__card-location-text text-small">
                                    {{ $tour->type->name ?? 'N/A' }}</p>
                            </div> --}}
                            <div class="tour-listing__card-divider"></div><!-- /.tour-listing__card-divider -->
                            <div class="tour-listing__card-bottom">
                                {{-- <div class="tour-listing__card-bottom-left">
                                    <div class="tour-listing__card-day">
                                        <span class="icon-clock-1"></span>
                                        <p class="tour-listing__card-day-text text-small">{{ $tour->duration }}
                                        </p>
                                    </div><!-- /.tour-listing__card-day -->
                                    <div class="tour-listing__card-people">
                                        <span class="icon-Duration"></span>
                                        <p class="tour-listing__card-people-text text-small">
                                            {{ $tour->min_age }}+</p>
                                    </div>

                                </div><!-- /.tour-listing__card-bottom-left --> --}}
                                <div class="tour-listing__card-bottom-right">

                                    <h4 class="tour-listing__card-price">
                                        ${{ $hotel->starting_price }}
                                    </h4>


                                </div><!-- /.tour-listing__card-bottom-right -->
                            </div><!-- /.tour-listing__card-bottom -->
                        </div><!-- /.tour-listing__card-inner-content -->
                    </div><!-- /.tour-listing__card-content -->
                </div><!-- /.tour-listing__card -->
            </div><!-- /.item -->
        @endforeach
        </div><!-- /.tour-listing-one__carousel -->
    </div><!-- /.container -->

<!-- Counter Three Start -->
</section>
