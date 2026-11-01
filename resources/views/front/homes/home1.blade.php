@extends('front.layouts.main')

@section('content')
<div class="page-wrapper">
 @include('front.homes.partials.home1_header')

    <!-- main-slider-start -->
    @include('front.homes.partials.home1_hero')
    <!-- main-slider-end -->

   @include('front.homes.partials.home1_features')
    <!-- About Start -->
   @include('front.homes.partials.home1_about')
    <!-- About End -->
    <!-- Tour Listing two Start -->
   @include('front.homes.partials.home1_featured_tours')
   @include('front.homes.partials.event_ads')
   @include('front.homes.partials.home1_featured_hotels')

   <section class="why-choose-three section-space">
    <div class="why-choose-three__bg" style="background-image: url({{ asset('front/assets/images/shapes/why-choose-3-bg.png') }});"></div>
    <!-- /.why-choose__bg -->
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="why-choose-three__content">
                    <div class="sec-title text-left">

                        <p class="sec-title__tagline">Our Benefits List</p><!-- /.sec-title__tagline -->

                        <h2 class="sec-title__title">{{ $settings['home_1_why_us_title'] ?? '' }}</h2><!-- /.sec-title__title -->
                    </div><!-- /.sec-title --><!-- /.sec-title -->
                    <p class="why-choose-three__content__text">
                        {{ $settings['home_1_why_us_description'] ?? '' }}
                    </p>
                    <div class="why-choose-three__box-wrapper">
                        <div class="why-choose-three__box wow fadeInUp" data-wow-delay="100ms">
                            <div class="why-choose-three__box__icon"><span class="{{ $settings['home_1_why_us_list_1_icon'] ?? '' }}"></span></div>
                            <h3 class="why-choose-three__box__title">{{ $settings['home_1_why_us_list_1_title'] ?? '' }}</h3>
                            <p class="why-choose-three__box__text">{{ $settings['home_1_why_us_list_1_description'] ?? '' }} </p>
                        </div><!-- /.why-choose-three__box -->
                        <div class="why-choose-three__box wow fadeInUp" data-wow-delay="200ms">
                            <div class="why-choose-three__box__icon"><span class="{{ $settings['home_1_why_us_list_2_icon'] ?? '' }}"></span></div>
                            <h3 class="why-choose-three__box__title">{{ $settings['home_1_why_us_list_2_title'] ?? '' }}</h3>
                            <p class="why-choose-three__box__text">{{ $settings['home_1_why_us_list_2_description'] ?? '' }} </p>
                        </div><!-- /.why-choose-three__box -->
                        <div class="why-choose-three__box wow fadeInUp" data-wow-delay="300ms">
                            <div class="why-choose-three__box__icon"><span class="{{ $settings['home_1_why_us_list_3_icon'] ?? '' }}"></span></div>
                            <h3 class="why-choose-three__box__title">{{ $settings['home_1_why_us_list_3_title'] ?? '' }}</h3>
                            <p class="why-choose-three__box__text">{{ $settings['home_1_why_us_list_3_description'] ?? '' }} </p>
                        </div><!-- /.why-choose-three__box -->
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow slideInRight" data-wow-delay="200ms">
                <div class="trevlo-stretch-element-inside-column">
                    <div class="why-choose-three__image">
                        <img src="{{ asset('storage/' . $settings['home_1_why_us_image']) }}" alt="Swahili Tour">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</section>
   @include('front.homes.partials.home1_destinations')
    <!-- Tour Listing two End -->
@include('front.homes.partials.home1_tours')
@include('front.homes.partials.event_ads2')


@include('front.homes.partials.home1_hotels')


@include('front.homes.partials.review')



</div><!-- /.page-wrapper -->
 <!-- CTA Two Start -->
 <section class="cta-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 wow fadeInUp" data-wow-delay="100ms">
                <h5 class="cta-two__sub-title">Book Your Trip Now</h5>
                <h3 class="cta-two__title">Are You Ready to Travel & Enjoy?</h3>
            </div>
            <div class="col-lg-3 cta-two__btn wow fadeInUp" data-wow-delay="200ms">
                <a href="{{ route('tours.index') }}" class="trevlo-btn"><span>Start Booking</span></a>
            </div>
        </div>
    </div><!-- /.container -->
</section>
<!-- CTA Two End -->
@include('front.partials.footer')

@endsection
