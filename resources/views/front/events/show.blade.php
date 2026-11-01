@extends('front.layouts.app')

@section('app')


<section class="page-header">
    {{-- <div class="page-header__bg"></div> --}}
    <!-- /.page-header__bg -->
    <div class="container">
        <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">
            {{ $event->name }}</h2>
        <div class="page-header__breadcrumb-box">
            <ul class="trevlo-breadcrumb">
                {{-- <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>Tours</li> --}}
            </ul><!-- /.trevlo-breadcrumb -->
        </div><!-- /.page-header__breadcrumb-box -->
    </div><!-- /.container -->
</section>


<section class="tour-listing-details">
    <div class="tour-listing-details__destination">
        <div class="container">
            <div class="tour-listing-details__destination-row row">
                <div class="col-xl-4 wow animated fadeInLeft" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <div class="tour-listing-details__destination-left">
                        <h3 class="tour-listing-details__dastination-title">{{ $event->name }}</h3>
                        <h4 class="tour-listing-details__dastination-price"><span>${{ $event->residential_price_single }}</span><span
                                class="tour-listing-details__dastination-person">/ Per Person</span></h4>
                    </div><!-- /.tour-listing-details__daetination-left -->
                </div><!-- /.col-xl-4 -->
                <div class="col-xl-8">
                    <div class="tour-listing-details__destination-right">
                        <div class="tour-listing-details__destination-info wow animated fadeInUp"
                            data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <span class="icon-clock-1"></span>
                            <div class="tour-listing-details__destination-info-title">
                                <h4 class="tour-listing-details__destination-info-top">Duration</h4>
                                <h4 class="tour-listing-details__destination-info-bottom">{{ $event->duration }}</h4>
                            </div>
                        </div><!-- /.tour-listing-details__destination-info -->
                        {{-- <div class="tour-listing-details__destination-info wow animated fadeInUp"
                            data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <span class="icon-Duration"></span>
                            <div class="tour-listing-details__destination-info-title">
                                <h4 class="tour-listing-details__destination-info-top">Min Age</h4>
                                <h4 class="tour-listing-details__destination-info-bottom">12+</h4>
                            </div>
                        </div><!-- /.tour-listing-details__destination-info --> --}}
                        <div class="tour-listing-details__destination-info wow animated fadeInUp"
                            data-wow-delay="0.5s" data-wow-duration="1500ms">
                            <span class="icon-plane"></span>
                            <div class="tour-listing-details__destination-info-title">
                                <h4 class="tour-listing-details__destination-info-top">Tour Type</h4>
                                <h4 class="tour-listing-details__destination-info-bottom">{{ $event->type->name }}</h4>
                            </div>
                        </div><!-- /.tour-listing-details__destination-info -->
                        <div class="tour-listing-details__destination-info wow animated fadeInUp"
                            data-wow-delay="0.7s" data-wow-duration="1500ms">
                            <span class="icon-location-1"></span>
                            <div class="tour-listing-details__destination-info-title">
                                <h4 class="tour-listing-details__destination-info-top">Location</h4>
                                <h4 class="tour-listing-details__destination-info-bottom">{{ $event->destination->name }}</h4>
                            </div>
                        </div><!-- /.tour-listing-details__destination-info -->
                    </div><!-- /.tour-listing-details__destination-right -->
                </div><!-- /.col-xl-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.tour-listing-details__destination -->


    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <aside class="tour-listing-details__sidebar">
                    <div class="tour-listing-details__sidebar-book-tours tour-listing-details__sidebar-single wow animated fadeInUp"
                        data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <h3 class="tour-listing-details__sidebar-title">Book This Package</h3>
                        <form action="{{ route('user.events.book', $event->slug) }}" method="POST" class="tour-listing-details__sidebar-form contact-form-validated">
                            @csrf
                            <div class="tour-listing-details__sidebar-form-input">
                                <input type="text" placeholder="Full Name" name="full_name" value="{{ old('full_name', auth()->user()?->full_name ?? '') }}" {{ auth()->check() ? 'disabled' : '' }} required>
                            </div>
                            <div class="tour-listing-details__sidebar-form-input">
                                <input type="text" placeholder="Email" name="email" value="{{ old('email', auth()->user()?->email ?? '') }}" {{ auth()->check() ? 'disabled' : '' }} required>
                            </div>
                            <div class="tour-listing-details__sidebar-form-input">
                                <input type="text" placeholder="Phone" name="phone" value="{{ old('phone', auth()->user()?->phone ?? '') }}" {{ auth()->check() ? 'disabled' : '' }} required>
                            </div>
                            <div class="tour-listing-details__sidebar-form-input">
                                <select class="selectpicker" name="booking_type" required aria-label="Booking Type" id="bookingTypeSelect">
                                    <option disabled selected>Booking Type</option>
                                    <option value="residential_single" data-price="{{ $event->residential_price_single }}">Residential Single</option>
                                    <option value="foreign_single" data-price="{{ $event->foreign_price_single }}">Foreign Single</option>
                                    <option value="residential_couple" data-price="{{ $event->couple_residential_price }}">Couple Residential</option>
                                    <option value="foreign_couple" data-price="{{ $event->couple_foreign_price }}">Couple Foreign</option>
                                </select>
                            </div>
                            <div class="price-display">
                                Total Price: <span id="totalPrice">Please select a booking type.</span>
                            </div>
                            <div class="discount-display">
                                Discount: <span id="discountDisplay">{{ $event->discount_percentage ? $event->discount_percentage . '%' : 'No discount available' }} Applied</span>
                            </div>
                            <button type="submit" class="tour-listing-details__sidebar-btn trevlo-btn trevlo-btn--base"><span>Book Now</span></button>
                        </form>

                        <div class="result"></div><!-- /.result -->
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const bookingTypeSelect = document.getElementById('bookingTypeSelect');
                            const totalPriceDisplay = document.getElementById('totalPrice');
                            const discountDisplay = document.getElementById('discountDisplay');

                            bookingTypeSelect.addEventListener('change', function() {
                                const selectedOption = this.options[this.selectedIndex];
                                const price = selectedOption.getAttribute('data-price');
                                const discount = {{ $event->discount_percentage / 100 }}; // Convert percentage to decimal for calculation

                                const discountedPrice = price * (1 - discount);
                                totalPriceDisplay.textContent = price ? `$${parseFloat(discountedPrice).toFixed(2)}` : 'Invalid selection';
                            });
                        });
                        </script>

                    {{-- <div class="tour-listing-details__sidebar-post-box tour-listing-details__sidebar-single wow animated fadeInUp"
                        data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <h3
                            class="tour-listing-details__sidebar-title tour-listing-details__sidebar-post-title">
                            Last Minute</h3>
                        <ul class="tour-listing-sidebar-post">
                            <li class="tour-listing-sidebar-post__item">
                                <div class="tour-listing-sidebar-post__image">
                                    <img src="assets/images/tours/tour-listing-details-post-1.jpg"
                                        alt="last-post">
                                </div>
                                <div class="tour-listing-sidebar-post__content">
                                    <p class="tour-listing-sidebar-post__price">$380</p>
                                    <h5 class="tour-listing-sidebar-post__link"><a
                                            href="tour-listing-details-right.html">The Complete Web</a></h5>
                                    <div class="tour-listing-sidebar-post__location">
                                        <span class="icon-location-1"></span>
                                        <p class="tour-listing-sidebar-post__location-text text-small">Main
                                            Street, Brooklyn, NY</p>
                                    </div>
                                </div>
                            </li>
                            <li class="tour-listing-sidebar-post__item">
                                <div class="tour-listing-sidebar-post__image">
                                    <img src="assets/images/tours/tour-listing-details-post-2.jpg"
                                        alt="last-post">
                                </div>
                                <div class="tour-listing-sidebar-post__content">
                                    <p class="tour-listing-sidebar-post__price">$380</p>
                                    <h5 class="tour-listing-sidebar-post__link"><a
                                            href="tour-listing-details-right.html">The Complete Web</a></h5>
                                    <div class="tour-listing-sidebar-post__location">
                                        <span class="icon-location-1"></span>
                                        <p class="tour-listing-sidebar-post__location-text text-small">Main
                                            Street, Brooklyn, NY</p>
                                    </div>
                                </div>
                            </li>
                            <li class="tour-listing-sidebar-post__item">
                                <div class="tour-listing-sidebar-post__image">
                                    <img src="assets/images/tours/tour-listing-details-post-3.jpg"
                                        alt="last-post">
                                </div>
                                <div class="tour-listing-sidebar-post__content">
                                    <p class="tour-listing-sidebar-post__price">$380</p>
                                    <h5 class="tour-listing-sidebar-post__link"><a
                                            href="tour-listing-details-right.html">The Complete Web</a></h5>
                                    <div class="tour-listing-sidebar-post__location">
                                        <span class="icon-location-1"></span>
                                        <p class="tour-listing-sidebar-post__location-text text-small">Main
                                            Street, Brooklyn, NY</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
                </aside>
            </div><!-- /.col-xl-4 -->
            <div class="col-xl-8">
                <div class="tour-listing-details__slider">
                    <div class="tour-listing-details__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav owl-theme owl-carousel"
                        data-owl-options='{
                                            "items": 2,
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
                                                "768":{
                                                    "items": 2
                                                }
                                            }
                    }'>

                    @foreach ($event->images as $image)
                    <div class="tour-listing-details__carousel-item item">
                        <div class="tour-listing-details__carousel-image-box">
                            <img src="{{ Storage::url($image) }}"
                                 alt="tour-listing-details-slide"
                                 class="tour-listing-details__carousel-image">
                        </div>
                    </div>
                @endforeach


                    </div><!-- /.tour-listing-details__carousel -->
                </div><!-- /.tour-listing-details__slider -->
                <div class="tour-listing-details__explore">
                    <div class="wow animated fadeIn" data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <h3 class="tour-listing-details__title tour-listing-details__explore-title">Explore
                            Our Package</h3>
                    </div>
                    <p class="tour-listing-details__explore-text wow animated fadeInUp" data-wow-delay="0.1s"
                        data-wow-duration="1500ms">{{ $event->overview }}</p>
                </div><!-- /.tour-listing-details__explore -->

                <div class="tour-listing-details__amenities">
                    <h3 class="tour-listing-details__title tour-listing-details__amenities-title">Package Amenities</h3>
                    <div class="tour-listing-details__amenities-row row">
                        @if(!empty($event->amenities))
                        @foreach ($event->amenities as $index => $amenityId)
                            @php
                                $amenity = \App\Models\Amenity::find($amenityId);
                            @endphp
                            @if($amenity)
                                <div class="col-xl-4 col-lg-4 col-sm-6 wow animated fadeInUp" data-wow-delay="{{ 0.1 * ($index % 3) }}s" data-wow-duration="1500ms">
                                    <div class="tour-listing-details__amenities-content tour-listing-details__amenities-content--{{ $index + 1 }}">
                                        <span class="{{ $amenity->icon }}"></span>
                                        <h4 class="tour-listing-details__amenities-content-title">{{ $amenity->name }}</h4>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif


                    </div><!-- /.tour-listing-details__amenities-row -->
                </div>
                <div class="tour-listing-details__included">
                    <h3 class="tour-listing-details__title tour-listing-details__included-title">
                        Included/Exclude</h3>
                    <div class="row">

                        <div class="col-lg-6 col-md-7 wow animated fadeInUp" data-wow-delay="0.1s"
                            data-wow-duration="1500ms">
                            <ul class="tour-listing-details__included-list-one">
                                @if(!empty($event->includes))
                                @php
                                    $includes = json_decode($event->includes, true);
                                @endphp
                                @foreach ($includes as $include)
                                    <li>
                                        <i class="fas fa-check-circle"></i>
                                        <p>{{ $include }}</p>
                                    </li>
                                @endforeach
                            @endif


                            </ul><!-- /.tour-listing-details__included-list-one -->
                        </div><!-- /.col-lg-6 col-md-7 -->
                        <div class="col-lg-6 col-md-5 wow animated fadeInUp" data-wow-delay="0.3s"
                            data-wow-duration="1500ms">
                            <ul class="tour-listing-details__included-list-two">

                                @if(!empty($event->excludes))
                                @php
                                    $excludes = json_decode($event->excludes, true);
                                @endphp
                                @foreach ($excludes as $exclude)
                                <li>
                                    <i class="fas fa-times"></i>
                                    <p>{{ $exclude }}</p>
                                </li>
                                @endforeach
                            @endif
                            </ul><!-- /.tour-listing-details__included-list-one -->
                        </div><!-- /.col-lg-6 col-md-5 -->
                    </div><!-- /.row -->
                </div>


                <div class="tour-listing-details__plan">
                    <h3 class="tour-listing-details__title tour-listing-details__plan-title">Tour Plan</h3>
                    <div class="trevlo-accrodion tour-listing-details__faq" data-grp-name="tour-listing-details__faq">

                        @if(is_array($event->event_plan))
                        @foreach ($event->event_plan as $index => $day)
                        <div class="accrodion {{ $index == 0 ? 'active' : '' }} wow animated fadeInUp"
                            data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4><span>Day {{ $index + 1 }}</span> {{ $day['title'] }}</h4>
                            </div>
                            <div class="accrodion-content" style="{{ $index == 0 ? '' : 'display: none;' }}">
                                <div class="inner">
                                    <p>{{ $day['description'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>No event plan available.</p>
                        @endif



                    </div>
                </div>


                <div class="tour-listing-details__location">
                    <h3 class="tour-listing-details__title tour-listing-details__location-title">Destination</h3>
                    <div class="google-map google-map__@@extraClassName">
                        @if($event->destination)
                            <iframe title="template google map"
                                src="https://www.google.com/maps?q={{ urlencode($event->destination->name) }}&output=embed"
                                class="map__@@extraClassName" allowfullscreen></iframe>
                        @else
                            <p>Destination not available.</p>
                        @endif

                    </div>
                    <!-- /.google-map -->
                </div><!-- /.tour-listing-details__location -->

            </div><!-- /.col-xl-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>






@endsection
