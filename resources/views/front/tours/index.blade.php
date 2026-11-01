@extends('front.layouts.app')

@section('app')


<section class="page-header">
    {{-- <div class="page-header__bg"></div> --}}
    <!-- /.page-header__bg -->
    <div class="container">
        <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">
            Tour Packages</h2>
        <div class="page-header__breadcrumb-box">
            <ul class="trevlo-breadcrumb">
                {{-- <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>Tours</li> --}}
            </ul><!-- /.trevlo-breadcrumb -->
        </div><!-- /.page-header__breadcrumb-box -->
    </div><!-- /.container -->
</section>


<!-- Tour Listing Filter Page Start -->
<section class="tour-listing-filter tour-listing section-space">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <aside class="tour-listing-sidebar">

                    <form action="{{ route('tours.index') }}" method="GET"
                        class="tour-listing-sidebar__form tour-listing-sidebar__item wow animated fadeInUp"
                        data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <div class="banner-form">
                            <div class="banner-form__control">
                                <label for="location">Destination</label>
                                <select name="location" class="selectpicker" id="location">
                                    <option value="">Where to Next?</option>
                                    @foreach($destinations as $destination)
                                    <option value="{{ $destination->id }}"
                                        {{ request('location') == $destination->id ? 'selected' : '' }}>
                                        {{ $destination->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <i class="icon-location-2"></i>
                            </div>

                            <div class="banner-form__control">
                                <label for="type">Type</label>
                                <select name="type" class="selectpicker" id="type">
                                    <option value="">Booking Type</option>
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ request('type') == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <i class="icon-hiking"></i>
                            </div>

                            <div class="banner-form__control">
                                <label for="price_range">Price Range</label>
                                <select name="price_range" class="selectpicker" id="price_range">
                                    <option value="">Select Price Range</option>
                                    <option value="0-50" {{ request('price_range') == '0-50' ? 'selected' : '' }}>0 - 50
                                    </option>
                                    <option value="50-100" {{ request('price_range') == '50-100' ? 'selected' : '' }}>50
                                        - 100</option>
                                    <option value="100-200" {{ request('price_range') == '100-200' ? 'selected' : '' }}>
                                        100 - 200</option>
                                    <option value="200-500" {{ request('price_range') == '200-500' ? 'selected' : '' }}>
                                        200 - 500</option>
                                    <option value="500+" {{ request('price_range') == '500+' ? 'selected' : '' }}>500+
                                    </option>
                                </select>
                                <i class="icon-low-price"></i>
                            </div>
                        </div>

                        <div class="tour-listing-sidebar__amenities">
                            <h3 class="tour-listing-sidebar__title tour-listing-sidebar__amenities-title">Amenities</h3>
                            <div class="tour-listing-sidebar__amenities-box">
                                @foreach($amenities as $amenity)
                                <div class="form-checked-box">
                                    <input type="checkbox" name="amenities[]" id="amenity-{{ $amenity->id }}"
                                        value="{{ $amenity->id }}"
                                        {{ in_array($amenity->id, request('amenities', [])) ? 'checked' : '' }}>
                                    <label for="amenity-{{ $amenity->id }}"><span></span>{{ $amenity->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tour-listing-sidebar__btn-box">
                            <button type="submit" class="tour-listing-sidebar__btn trevlo-btn trevlo-btn--base">
                                <span class="icon-search"></span>
                                <span>Search</span>
                            </button>
                        </div>
                    </form>






                    <div class="tour-listing-sidebar__post-box tour-listing-sidebar__item wow animated fadeInUp"
                        data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <h3 class="tour-listing-sidebar__post-title">Last Minute</h3>
                        <ul class="tour-listing-sidebar-post">
                            @foreach($randomTours as $tour)
                            <li class="tour-listing-sidebar-post__item">
                                <div class="tour-listing-sidebar-post__image">

                                    @php
                                    // Ensure images are decoded into an array
                                    $images = json_decode($tour->images, true) ?? []; // Decode and ensure it's an array
                                    $image = !empty($images) ? Arr::random($images) : 'default-image.jpg'; // Fallback


                                    @endphp

                                    <img src="{{ Storage::url($image) }}" alt="{{ $tour->name }}"
                                        style="width: 70px; height: 70px; object-fit: cover;">
                                </div>
                                <div class="tour-listing-sidebar-post__content">
                                    <p class="tour-listing-sidebar-post__price">
                                        ${{ number_format($tour->pricing->current_month_pricing['resident_price'], 2) }}
                                    </p>
                                    <h5 class="tour-listing-sidebar-post__link">
                                        <a href="{{ route('tours.show', $tour->slug) }}">{{ $tour->name }}</a>
                                    </h5>
                                    <div class="tour-listing-sidebar-post__location">
                                        <span class="icon-location-1"></span>
                                        <p class="tour-listing-sidebar-post__location-text text-small">
                                            {{ $tour->destination->name }}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>



                </aside><!-- /.tour-listing-sidebar -->
            </div><!-- /.col-xl-4 -->
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-12">
                        <div class="showing-result tour-listing-one__showing-result">
                            <div class="showing-result__info-top">
                                <div class="showing-result__text-box">
                                    <h3 class="showing-result__text">Showing {{ $tours->count() }} Results</h3>
                                </div>
                                <div class="showing-result__sort">
                                    <form action="{{ route('tours.index') }}" method="GET">
                                        <select name="sort" class="selectpicker" aria-label="Sort by popular"
                                            onchange="this.form.submit()">
                                            <option value="" selected>Sort by popular</option>
                                            <option value="1" {{ request('sort') == 1 ? 'selected' : '' }}>Sort by view
                                            </option>
                                            <option value="2" {{ request('sort') == 2 ? 'selected' : '' }}>Sort by price
                                            </option>
                                            <option value="3" {{ request('sort') == 3 ? 'selected' : '' }}>Sort by
                                                latest</option>
                                            <option value="4" {{ request('sort') == 4 ? 'selected' : '' }}>Sort by older
                                            </option>
                                            <option value="5" {{ request('sort') == 5 ? 'selected' : '' }}>Sort randomly
                                            </option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div><!-- /.showing-result -->
                    </div>




                    <!-- /.col-12 -->
                    @foreach($tours as $tour)
                    <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <div class="tour-listing__card">
                            <a href="{{ route('tours.show', $tour->slug) }}" class="tour-listing__card-image-box">
                                @php
                                // Ensure images are decoded into an array
                                $images = json_decode($tour->images, true) ?? []; // Decode and ensure it's an array
                                $image = !empty($images) ? Arr::random($images) : 'default-image.jpg'; // Fallback to a

                                @endphp
                                
                                <img 
    src="{{ Storage::url($image) }}" 
    alt="{{ $tour->name }}" 
    style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">

                                
                                <div class="tour-listing__card-btn-group">

                                    @if($tour->pricing && $tour->pricing->current_month_pricing['discount'])
                                    <div class="tour-listing__card-discount">
                                        {{ $tour->pricing->current_month_pricing['discount'] }}% Off
                                    </div>
                                    @endif

                                    @if($tour->featured)
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
                                    <a href="javascript:void(0);"
                                        class="tour-listing__card-camera-btn trevlo-image-popup" data-gallery-options='{
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
                                <h3 class="tour-listing__card-title"><a
                                        href="{{ route('tours.show', $tour->slug) }}">{{ Str::limit($tour->name, 20) }}</a>
                                </h3>
                                <p class="tour-listing__card-text text-small">{{ Str::limit($tour->overview, 30) }}</p>
                                <div class="tour-listing__card-inner-content">
                                    <div class="tour-listing__card-review-box">
                                        @php
                                            $totalReviews = $tour->reviews->count();
                                            $averageRating = $totalReviews > 0
                                                ? $tour->reviews->avg('average_rating')
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
                                            {{ $tour->destination->name }}</p>
                                    </div>

                                    <div class="tour-listing__card-location-box">
                                        <span class="{{ $tour->type->icon ?? 'N/A' }}"></span>
                                        <p class="tour-listing__card-location-text text-small">
                                            {{ $tour->type->name ?? 'N/A' }}</p>
                                    </div>
                                    <!-- /.tour-listing__card-location-box -->
                                    <div class="tour-listing__card-divider"></div><!-- /.tour-listing__card-divider -->
                                    <div class="tour-listing__card-bottom">
                                        <div class="tour-listing__card-bottom-left">
                                            <div class="tour-listing__card-day">
                                                <span class="icon-clock-1"></span>
                                                <p class="tour-listing__card-day-text text-small">{{ $tour->duration }}
                                                </p>
                                            </div><!-- /.tour-listing__card-day -->
                                            <div class="tour-listing__card-people">
                                                <span class="icon-Duration"></span>
                                                <p class="tour-listing__card-people-text text-small">
                                                    {{ $tour->min_age }}+ Yrs</p>
                                            </div>

                                        </div><!-- /.tour-listing__card-bottom-left -->
                                        <div class="tour-listing__card-bottom-right">
                                            @if($tour->pricing &&
                                            $tour->pricing->current_month_pricing['resident_price'])
                                            <h4 class="tour-listing__card-price">
                                                ${{ $tour->pricing->current_month_pricing['resident_price'] }}
                                            </h4>
                                            @endif

                                        </div><!-- /.tour-listing__card-bottom-right -->
                                    </div><!-- /.tour-listing__card-bottom -->
                                </div><!-- /.tour-listing__card-inner-content -->
                            </div><!-- /.tour-listing__card-content -->
                        </div><!-- /.tour-listing__card -->
                    </div><!-- /.col-md-6 -->
                    @endforeach
                </div><!-- /.row -->
                {{-- <ul class="post-pagination tour-listing-filter__pagination">
                    <li>
                        <a href="tour-listing-side-filter-left.html">1</a>
                    </li>
                    <li>
                        <a href="tour-listing-side-filter.html">2</a>
                    </li>
                    <li>
                        <a href="tour-listing-side-filter-right.html"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
                <!-- /.post-pagination --> --}}
                <ul class="post-pagination tour-listing-filter__pagination">
                    {{-- Previous Page Link --}}
                    @if ($tours->onFirstPage())
                    <li class="disabled active" aria-disabled="true">
                        <span><i class="fas fa-chevron-left"></i></span>
                    </li>
                    @else
                    <li>
                        <a href="{{ $tours->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($tours->getUrlRange(1, $tours->lastPage()) as $page => $url)
                    @if ($page == $tours->currentPage())
                    <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($tours->hasMorePages())
                    <li>
                        <a href="{{ $tours->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                    </li>
                    @else
                    <li class="disabled active" aria-disabled="true">
                        <span><i class="fas fa-chevron-right"></i></span>
                    </li>
                    @endif
                </ul>
                <!-- /.post-pagination -->
            </div><!-- /.col-xl-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
<!-- Tour Listing Filter Page End -->


@endsection
