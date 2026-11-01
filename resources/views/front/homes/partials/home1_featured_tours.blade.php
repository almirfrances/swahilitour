<section class="tour-listing-two tour-listing-two--home-three">
    <div class="container">
        <div class="sec-title text-center">

            <p class="sec-title__tagline">Featured tour packages</p><!-- /.sec-title__tagline -->

            <h2 class="sec-title__title">Most Favorite Tour Place</h2><!-- /.sec-title__title -->
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
        @foreach($tours as $tour)
        @if ($tour->featured)
        <div class="item">
            <div class="tour-listing-two__card tour-listing__card">
                <a href="{{ route('tours.show', $tour->slug) }}" class="tour-listing__card-image-box">
                    @php
                            // Ensure images are decoded into an array
                            $images = json_decode($tour->images, true) ?? []; // Decode and ensure it's an array
                            $image = !empty($images) ? Arr::random($images) : 'default-image.jpg'; // Fallback to a

                    @endphp
                    <img src="{{ Storage::url($image) }}" alt="{{ $tour->name }}" class="tour-listing__card-image" style="width: 100%; height: 500px; object-fit: cover; border-radius: 8px;">
                    <div class="tour-listing__card-btn-group @@extraClassName">
                        @if($tour->pricing && $tour->pricing->current_month_pricing['discount'])
                            <div class="tour-listing__card-discount @@innerExtraClassName">{{ $tour->pricing->current_month_pricing['discount'] }}% Off</div>

                        @endif

                        @if($tour->featured)
                                <div class="tour-listing__card-featured">Featured</div>
                        @endif
                    </div><!-- /.tour-listing__card-btn-group -->
                    <div class="tour-listing__card-image-overlay"></div><!-- /.tour-listing__card-image-overlay -->
                </a><!-- /.tour-listing__card-image-box -->
                <a href="javascript:void(0)" class="tour-listing__card-wishlist"><span class="icon-heart"></span></a>
                <div class="tour-listing-two__card-show-content">
                    <div class="tour-listing-two__card-show-title-box">
                        <h3 class="tour-listing-two__card-show-title tour-listing__card-title"><a href="{{ route('tours.show', $tour->slug) }}">{{ $tour->name }}</a></h3>
                        <div class="tour-listing__card-camera-group">
                                        <a href="#" class="tour-listing-two__card-show-camera-btn tour-listing__card-camera-btn trevlo-image-popup" data-gallery-options='{
                                            "items": [
                                               @foreach($images as $img)
                                               {
                                                   "src": "{{ Storage::url($img) }}"
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
                            @if($tour->video_link)
                            <a href="{{ $tour->video_link }}" class="tour-listing-two__card-show-camera-btn tour-listing__card-camera-btn video-popup">
                                <span class="icon-video-camera-1-1"></span>
                            </a>
                                @endif

                        </div><!-- /.tour-listing__card-camera-group -->
                    </div><!-- /.tour-listing-two__card-show-title-box -->
                    <div class="tour-listing-two__card-show-divider"></div><!-- /.tour-listing-two__card-show-divider -->
                    <div class="tour-listing__card-bottom">
                        <div class="tour-listing__card-bottom-left">
                            <div class="tour-listing__card-day">
                                <span class="icon-clock-1"></span>
                                <p class="tour-listing-two__card-show-day-text tour-listing__card-day-text text-small">{{ $tour->duration }}</p>
                            </div><!-- /.tour-listing__card-day -->
                            <div class="tour-listing__card-people">
                                <span class="icon-Duration"></span>
                                <p class="tour-listing-two__card-show-people-text tour-listing__card-people-text text-small">
                                    {{ $tour->min_age }}+ Yrs</p>
                            </div><!-- /.tour-listing__card-people -->
                        </div><!-- /.tour-listing__card-bottom-left -->
                        <div class="tour-listing__card-bottom-right">
                            @if($tour->pricing &&
                                        $tour->pricing->current_month_pricing['resident_price'])

                                        <h4 class="tour-listing-two__card-show-price tour-listing__card-price">${{ $tour->pricing->current_month_pricing['resident_price'] }}</h4>
                            @endif

                        </div><!-- /.tour-listing__card-bottom-right -->
                    </div><!-- /.tour-listing__card-bottom -->
                </div><!-- /.tour-listing__card-show-content -->
                <div class="tour-listing-two__card-hover-content tour-listing__card-content">
                    <h3 class="tour-listing__card-title"><a href="{{ route('tours.show', $tour->slug) }}">{{ $tour->name }}</a></h3>
                    <p class="tour-listing__card-text text-small">{{ Str::limit($tour->overview, 30) }}</p>
                    <div class="tour-listing-two__card-info">
                        <div>
                            <div class="tour-listing__card-review-box">
                                <span class="icon-star"></span>
                                @php
                                        $totalReviews = $tour->reviews->count();
                                        $averageRating = $totalReviews > 0
                                            ? $tour->reviews->avg('average_rating')
                                            : 0; // Calculate average rating if reviews are present
                                    @endphp
                                <p class="tour-listing__card-review-text text-small">{{ number_format($averageRating, 1) }}
                                    ({{ $totalReviews }} {{ Str::plural('Review', $totalReviews) }})</p>
                            </div><!-- /.tour-listing__card-review-box -->
                            <div class="tour-listing__card-location-box">
                                <span class="icon-location-1"></span>
                                <p class="tour-listing__card-location-text text-small">{{ $tour->destination->name }}</p>
                            </div><!-- /.tour-listing__card-location-box -->
                        </div>
                        <div class="tour-listing__card-camera-group">
                            <a href="#" class="tour-listing__card-camera-btn trevlo-image-popup" data-gallery-options='{
                                "items": [
                                               @foreach($images as $img)
                                               {
                                                   "src": "{{ Storage::url($img) }}"
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


                            @if($tour->video_link)
                            <a href="{{ $tour->video_link }}" class="tour-listing__card-camera-btn video-popup">
                                <span class="icon-video-camera-1-1"></span>
                            </a>

                            @endif
                        </div><!-- /.tour-listing__card-camera-group -->
                    </div><!-- /.tour-listing-two__card-info -->
                    <div class="tour-listing__card-divider"></div><!-- /.tour-listing__card-divider -->
                    <div class="tour-listing__card-bottom">
                        <div class="tour-listing__card-bottom-left">
                            <div class="tour-listing__card-day">
                                <span class="icon-clock-1"></span>
                                <p class="tour-listing__card-day-text text-small">{{ $tour->duration }}</p>
                            </div><!-- /.tour-listing__card-day -->
                            <div class="tour-listing__card-people">
                                <span class="icon-Duration"></span>
                                <p class="tour-listing__card-people-text text-small">{{ $tour->min_age }}+ Yrs</p>
                            </div><!-- /.tour-listing__card-people -->
                        </div><!-- /.tour-listing__card-bottom-left -->
                        <div class="tour-listing__card-bottom-right">
                            @if($tour->pricing &&
                                        $tour->pricing->current_month_pricing['resident_price'])

                                        <h4 class="tour-listing-two__card-show-price tour-listing__card-price"> ${{ $tour->pricing->current_month_pricing['resident_price'] }}</h4>
                            @endif

                        </div><!-- /.tour-listing__card-bottom-right -->
                    </div><!-- /.tour-listing__card-bottom -->
                </div><!-- /.tour-listing__card-content -->
            </div><!-- /.tour-listing__card -->
        </div><!-- /.item -->
        @endif
    @endforeach


        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
