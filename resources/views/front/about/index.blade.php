@extends('front.layouts.app')

@section('app')

<!-- About Four Start -->
<section class="about-four section-space-top">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 about-four__img-column wow animated fadeInLeft" data-wow-delay="0.1s"
                data-wow-duration="1500ms">
                <div class="about-four__img-box">
                    <div class="about-four__inner-img-box-one">
                        <img src="{{ asset('storage/' . $settings['about_big_image']) }}" alt="about image"
                            class="about-four__img-one">
                        <img src="{{ asset('front/assets/images/shapes/about-shape-4-1.png') }}" alt="about-shape"
                            class="about-four__shape-one">
                        <img src="{{ asset('front/assets/images/shapes/about-shape-4-2.png') }}" alt="about-shape"
                            class="about-four__shape-two">
                    </div><!-- /.about-four__inner-img-box-one -->
                    <div class="about-four__inner-img-box-two">
                        <img src="{{ asset('storage/' . $settings['about_small_image']) }}" alt="about image"
                            class="about-four__img-two">
                        <div class="about-four__discount">
                            <div class="about-four__discount-inner">
                                <h3 class="about-four__discount-percentage">{{ $settings['home_1_about_discount'] }}<span></span></h3>
                                <h4 class="about-four__discount-title">Discount</h4>
                            </div><!-- /.about-four__discount-inner -->
                        </div><!-- /.about-four__discount-box -->
                    </div><!-- /.about-four__inner-img-box-two -->
                </div><!-- /.about-four__img-box -->
            </div><!-- /.col-xl-6 col-lg-6 -->
            <div class="col-xl-6 col-lg-6 about-four__content-column">
                <div class="about-four__content">
                    <div class="sec-title text-left">

                        <p class="sec-title__tagline">GET TO KNOW US</p><!-- /.sec-title__tagline -->

                        <h2 class="sec-title__title">{{ $settings['about_title'] ?? '' }}</h2>
                        <!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                    <!-- /.sec-title -->
                    <p class="about-four__text">{{ $settings['about_description'] ?? '' }}</p>
                    <div class="about-four__service">
                        <div class="about-four__service-box wow animated fadeInUp" data-wow-delay="0s"
                            data-wow-duration="1500ms">
                            <div class="about-four__service-icon">
                                <span class="{{ $settings['about_list_1_icon'] ?? '' }}"></span>
                            </div><!-- /.about-four__service-icon -->
                            <div class="about-four__service-content">
                                <h4 class="about-four__service-title">{{ $settings['about_list_1_title'] ?? '' }}</h4>
                            </div><!-- /.about-four__service-content -->
                        </div><!-- /.about-four__service-box -->
                        <div class="about-four__service-box wow animated fadeInUp" data-wow-delay="0.3s"
                            data-wow-duration="1500ms">
                            <div class="about-four__service-icon">
                                <span class="{{ $settings['about_list_2_icon'] ?? '' }}"></span>
                            </div><!-- /.about-four__service-icon -->
                            <div class="about-four__service-content">
                                <h4 class="about-four__service-title">{{ $settings['about_list_2_title'] ?? '' }}</h4>
                            </div><!-- /.about-four__service-content -->
                        </div><!-- /.about-four__service-box -->
                    </div><!-- /.about-four__service -->
                    <div class="trevlo-progress about-four__progress">
                        <h4 class="trevlo-progress__title">Experience</h4>
                        <div class="trevlo-progress__bar">
                            <div class="trevlo-progress__inner count-bar counted" data-percent="{{ $settings['about_experience_percentages'] ?? '' }}%">
                                <p class="trevlo-progress__number count-text">{{ $settings['about_experience_percentages'] ?? '' }}%</p>
                            </div>
                        </div>
                    </div><!-- /.trevlo-progress -->
                    <div class="about-four__btn-box wow animated fadeInUp" data-wow-delay="0s"
                        data-wow-duration="1500ms">
                        <a href="{{ route('tours.index') }}" class="about-four__btn trevlo-btn"><span>Discover More</span></a>
                    </div><!-- /.about-four__btn-box -->
                </div><!-- /.about-four__content -->
            </div><!-- /.col-xl-6 col-lg-6 -->
        </div><!-- /.row -->
    </div>
</section>
<!-- About Four End -->

@include('front.homes.partials.event_ads2')

@include('front.homes.partials.review')
<!-- Why Choose Two Start -->
<section class="why-choose-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-6 wow fadeInLeft" data-wow-delay="200ms">
                <div class="why-choose-two__content">
                    <div class="sec-title text-left">

                        <p class="sec-title__tagline">Are you ready to travel</p><!-- /.sec-title__tagline -->

                        <h2 class="sec-title__title">{{ $settings['about_why_us_title'] ?? '' }}</h2>
                        <!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                    <p class="why-choose-two__text">
                        {{ $settings['about_why_us_description'] ?? '' }}
                    </p>
                    <div class="trevlo-progress why-choose-two__progress">
                        <h4 class="trevlo-progress__title">Experience</h4>
                        <div class="trevlo-progress__bar">
                            <div class="trevlo-progress__inner count-bar counted" data-percent="{{ $settings['about_experience_percentages'] ?? '' }}%">
                                <p class="trevlo-progress__number count-text">{{ $settings['about_experience_percentages'] ?? '' }}%</p>
                            </div>
                        </div>
                    </div><!-- /.trevlo-progress -->
                    <div class="why-choose-two__box-wrapper">
                        <div class="why-choose-two__box">
                            <div class="why-choose-two__box__icon">
                                <span class="{{ $settings['about_why_us_list_1_icon'] ?? '' }}"></span>
                            </div><!-- /.why-choose-two__box__icon -->
                            <h4 class="why-choose-two__box__title">{{ $settings['about_why_us_list_1_title'] ?? '' }}</h4>
                        </div><!-- /.why-choose-two__box -->
                        <div class="why-choose-two__box">
                            <div class="why-choose-two__box__icon">
                                <span class="{{ $settings['about_why_us_list_2_icon'] ?? '' }}"></span>
                            </div><!-- /.why-choose-two__box__icon -->
                            <h4 class="why-choose-two__box__title">{{ $settings['about_why_us_list_2_title'] ?? '' }}</h4>
                        </div><!-- /.why-choose-two__box -->
                    </div><!-- /.why-choose-two__service -->
                    <a href="{{ route('tours.index') }}" class="trevlo-btn trevlo-btn--base"><span>Discover More</span></a>
                </div><!-- /.why-choose-two__content -->
            </div><!-- /.col-lg-6 col-xl-6 -->
            <div class="col-lg-6 col-xl-6">
                <div class="why-choose-two__img">
                    <div class="why-choose-two__img__one wow fadeInUp" data-wow-delay="200ms">
                        <div class="trevlo-tilt"
                            data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                            <img src="{{ asset('storage/' . $settings['about_why_image_1']) }}" alt="why-choose">
                        </div>
                        <div class="trevlo-tilt"
                            data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                            <img src="{{ asset('storage/' . $settings['about_why_image_2']) }}" alt="why-choose">
                        </div>
                    </div><!-- /.why-choose-two__img__one -->
                    <div class="why-choose-two__img__two wow fadeInUp" data-wow-delay="300ms">
                        <div class="trevlo-tilt"
                            data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                            <img src="{{ asset('storage/' . $settings['about_why_image_3']) }}" alt="why-choose">
                        </div>
                        <div class="trevlo-tilt"
                            data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                            <img src="{{ asset('storage/' . $settings['about_why_image_4']) }}" alt="why-choose">
                        </div>
                    </div><!-- /.why-choose-two__img__two -->
                </div><!-- /.why-choose-two__img-box -->
            </div><!-- /.col-lg-6 col-xl-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
<!-- Why Choose Two End -->



@include('front.homes.partials.event_ads')

<section class="guide-one guide-one-carousel-page section-space-bottom">
    <div class="container">
        <div class="guide-one__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav owl-theme owl-carousel"
            data-owl-options='{
    "items": 5,
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
        },
        "992":{
            "items": 3
        }
    }
    }'>

    @foreach($tourGuides as $guide)
            <div class="guide-one__carousel-item item">
                <div class="guide-single">
                    <div class="guide-single__image-box">
                        <img src="{{ asset('storage/' . $guide->picture) }}" alt="{{ $guide->name }}"
                            class="guide-single__image">
                    </div>
                    <!-- /.guide-single__image-box -->
                    <div class="guide-single__info">
                        <h4 class="guide-single__name">{{ $guide->name }}</h4>
                        <p class="guide-single__title">{{ $guide->title }}</p>
                        <div class="guide-single__social-box">
                            <a href="javascript:void(0);" class="guide-single__share-btn"><span
                                    class="fas fa-share-alt"></span></a>
                            <ul class="guide-single__social list-unstyled">
                                <li><a href="{{ $guide->instagram_link }}"><span
                                            class="fab fa-instagram"></span></a></li>

                                <li><a href="{{ $guide->twitter_link }}"><span class="fab fa-twitter"></span></a>
                                </li>
                                <li><a href="{{ $guide->facebook_link }} "><span
                                            class="fab fa-facebook-f"></span></a></li>
                            </ul><!-- /.guide-single__social -->
                        </div><!-- /.guide-single__social-box -->
                    </div><!-- /.guide-single__info -->
                </div><!-- /.guide-single -->
            </div><!-- /.guide-one__carousel-item item -->
    @endforeach

        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

@endsection
