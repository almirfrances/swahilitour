@extends('front.layouts.app')

@section('app')

<section class="page-header">
    {{-- <div class="page-header__bg"></div> --}}
    <!-- /.page-header__bg -->
    <div class="container">
        <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">
            Hotels</h2>
        <div class="page-header__breadcrumb-box">
            <ul class="trevlo-breadcrumb">
                {{-- <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>Tours</li> --}}
            </ul><!-- /.trevlo-breadcrumb -->
        </div><!-- /.page-header__breadcrumb-box -->
    </div><!-- /.container -->
</section>







<section class="tour-search">
    <div class="banner-form wow fadeInUp" data-wow-delay="300ms">
        <div class="container">
            <form class="banner-form__wrapper" action="{{ route('hotels.index') }}" method="GET">
                <div class="row">
                    <!-- Location / Destination -->
                    <div class="col-lg-4">
                        <div class="banner-form__control">
                            <label for="location">Destination</label>
                            <select name="location" class="selectpicker" id="location">
                                <option value="select">Where to Next?</option>
                                @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ request('location') == $destination->id ? 'selected' : '' }}>
                                    {{ $destination->name }}
                                </option>
                                @endforeach
                            </select>
                            <i class="icon-location-2"></i>
                        </div>
                    </div>

                    <!-- Price Range -->
                    <div class="col-lg-2">
                        <div class="banner-form__control">
                            <label for="price_range">Price Range</label>
                            <select name="price_range" class="selectpicker" id="price_range">
                                <option value="">Select Price Range</option>
                                <option value="0-50" {{ request('price_range') == '0-50' ? 'selected' : '' }}>0 - 50
                                </option>
                                <option value="50-100" {{ request('price_range') == '50-100' ? 'selected' : '' }}>50 -
                                    100</option>
                                <option value="100-200" {{ request('price_range') == '100-200' ? 'selected' : '' }}>100
                                    - 200</option>
                                <option value="200-500" {{ request('price_range') == '200-500' ? 'selected' : '' }}>200
                                    - 500</option>
                                <option value="500-" {{ request('price_range') == '500-' ? 'selected' : '' }}>500+
                                </option>
                            </select>
                            <i class="icon-low-price"></i>
                        </div>
                    </div>

                    <!-- Amenities -->
                    <div class="col-lg-2">
                        <div class="banner-form__control">
                            <label for="amenities">Amenities</label>
                            <select name="amenities[]" class="selectpicker" id="amenities" multiple>
                                @foreach($amenities as $amenity)
                                <option value="{{ $amenity->id }}"
                                    {{ in_array($amenity->id, request('amenities', [])) ? 'selected' : '' }}>
                                    {{ $amenity->name }}
                                </option>
                                @endforeach
                            </select>
                            <i class="icon-amenity"></i>
                        </div>
                    </div>

                    <!-- Guests -->
                    <div class="col-lg-3">
                        <div class="banner-form__control">
                            <label for="guests">Guests</label>
                            <button type="button" class="banner-form__qty-minus sub">
                                <i class="icon-minus-3"></i>
                            </button>
                            <input id="guests" type="number" value="{{ request('guests', 2) }}" name="guests"
                                placeholder="2" min="1">
                            <button type="button" class="banner-form__qty-plus add">
                                <i class="icon-plus-3"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Search Button -->
                    <div class="col-lg-1">
                        <div class="banner-form__btn">
                            <button type="submit" aria-label="search submit" class="trevlo-btn trevlo-btn--base">
                                <span><i class="icon-search"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>




<section class="tour-listing-search tour-listing-one tour-listing section-space-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="showing-result tour-listing-one__showing-result">
                    <div class="showing-result__info-top">
                        <div class="showing-result__text-box">
                            <h3 class="showing-result__text">Showing {{ $hotels->count() }} Results</h3>
                        </div>
                        {{-- <div class="showing-result__sort">
                            <select class="selectpicker" aria-label="Sort by popular">
                                <option selected>Sort by popular</option>
                                <option value="1">Sort by view</option>
                                <option value="2">Sort by price</option>
                                <option value="3">Sort by ratings</option>
                            </select>
                        </div> --}}
                    </div>
                </div><!-- /.showing-result -->
            </div><!-- /.col-12 -->


            @foreach($hotels as $hotel)
            <div class="col-xl-4 col-md-6 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                <div class="tour-listing__card">
                    <a href="{{ route('hotels.show', $hotel->slug) }}" class="tour-listing__card-image-box">
                        @php
                        // Directly access images as an array
                        $images = $hotel->images ?? []; // Ensure it's an array with fallback
                        $image = !empty($images) ? Arr::random($images) : 'default-image.jpg'; // Fallback to a default

                        @endphp

                        <img src="{{ url($image) }}" alt="{{ $hotel->name }}" class="tour-listing__card-image" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                        <div class="tour-listing__card-btn-group">



                            @if($hotel->featured)
                            <div class="tour-listing__card-featured">Featured</div>
                            @endif
                        </div><!-- /.tour-listing__card-btn-group -->
                        <div class="tour-listing__card-image-overlay"></div>
                        <!-- /.tour-listing__card-image-overlay -->
                    </a><!-- /.tour-listing__card-image-box -->
                    <a href="javascript:void(0);" class="tour-listing__card-wishlist"><span
                            class="icon-heart"></span></a>
                    <div class="tour-listing__card-content">
                        <div class="tour-listing__card-camera-group">
                            <a href="javascript:void(0);" class="tour-listing__card-camera-btn trevlo-image-popup"
                                data-gallery-options='{
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
                                <p class="tour-listing__card-location-text text-small">
                                    {{ $hotel->destination->name }}</p>
                            </div>


                            <!-- /.tour-listing__card-location-box -->
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
    </div><!-- /.col-md-6 -->
    @endforeach
    </div>
    <ul class="post-pagination tour-listing-filter__pagination">
        {{-- Previous Page Link --}}
        @if ($hotels->onFirstPage())
        <li class="disabled active" aria-disabled="true">
            <span><i class="fas fa-chevron-left"></i></span>
        </li>
        @else
        <li>
            <a href="{{ $hotels->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($hotels->getUrlRange(1, $hotels->lastPage()) as $page => $url)
        @if ($page == $hotels->currentPage())
        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
        @else
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($hotels->hasMorePages())
        <li>
            <a href="{{ $hotels->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
        </li>
        @else
        <li class="disabled active" aria-disabled="true">
            <span><i class="fas fa-chevron-right"></i></span>
        </li>
        @endif
    </ul><!-- /.row -->
    </div><!-- /.container -->
</section>

@endsection
