@extends('front.layouts.main')

@section('content')
<div class="page-wrapper">
    <header class="main-header sticky-header sticky-header--normal">
        <div class="container">
            <div class="main-header__inner">
                <div class="main-header__left">
                    <div class="main-header__logo">
                        <a href="{{ route('front.home') }}">
                            <img src="{{ asset('storage/' . ($settings['logo_dark'] )) }}" alt="{{ $settings['site_name'] }}" width="146">
                        </a>
                    </div><!-- /.main-header__logo -->
                     @include('front.partials.navbar')
                </div><!-- /.main-header__left -->

                <div class="main-header__right">
                    <div class="mobile-nav__btn mobile-nav__toggler">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- /.mobile-nav__toggler -->
                    <a href="#" class="main-header__booking-btn trevlo-btn trevlo-btn--white-two"><span>Start Booking</span></a><!-- /.main-header__btn -->
                    <div class="main-header__right-right">
                        <div class="main-header__phone">
                            <div class="main-header__phone-icon">
                                <span class="icon-phone-1"></span>
                            </div>
                            <div class="main-header__phone-text">
                                <p class="main-header__phone-title">Call Anytime</p>
                                <h4 class="main-header__phone-number"><a href="tel:(303)555-0105">(303) 555-0105</a></h4>
                            </div>
                        </div><!-- /.main-header__phone -->
                        <div class="main-header__divider"></div>
                        <ul class="main-header__search-user">
                            <li class="main-header__search-user-item">
                                <a href="index-2.html#" class="main-header__search search-toggler">
                                    <span class="icon-search"></span>
                                </a>
                            </li>
                            <li class="main-header__search-user-item">
                                <a href="login.html" class="main-header__user">
                                    <span class="icon-user-1"></span>
                                </a>
                            </li>
                        </ul><!-- /.main-header__search-user -->
                    </div><!-- /.main-header__right-right -->
                </div><!-- /.main-header__right -->
            </div><!-- /.main-header__inner -->
        </div><!-- /.container-fluid -->
    </header><!-- /.main-header -->

    <!-- main-slider-start -->
    <section class="main-slider-two">
        <div class="main-slider-two__shape-one" style="background-image: url(front/assets/images/shapes/slider-2-shape-1.png);"></div>
        <div class="main-slider-two__shape-two" style="background-image: url(front/assets/images/shapes/slider-2-shape-2.png);"></div>
        <div class="main-slider-two__carousel trevlo-owl__carousel owl-carousel owl-theme" data-owl-options='{
    "items": 1,
    "margin": 0,
    "loop": true,
    "smartSpeed": 700,
    "animateOut": "fadeOut",
    "autoplayTimeout": 5000,
    "nav": false,
    "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
    "dots": false,
    "autoplay": true
    }'>
            <div class="item">
                <div class="main-slider-two__image" style="background-image: url(front/assets/images/backgrounds/slider-2-1.jpg);"></div>
                <div class="container">
                    <div class="main-slider-two__content">
                        <div class="main-slider-two__text-one">Let’s Travel</div>
                        <div class="main-slider-two__text-two">Last Minutes Deals</div>
                        <h5 class="main-slider-two__sub-title">Amazing places to relax</h5>
                        <h3 class="main-slider-two__title">Travel Journey <br>Begins Here</h3>
                        <div class="main-slider-two__btn">
                            <a href="contact.html" class="trevlo-btn trevlo-btn--base"><span>Start Booking</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="main-slider-two__image" style="background-image: url(front/assets/images/backgrounds/slider-2-2.jpg);"></div>
                <div class="container">
                    <div class="main-slider-two__content">
                        <div class="main-slider-two__text-one">Let’s Travel</div>
                        <div class="main-slider-two__text-two">Last Minutes Deals</div>
                        <h5 class="main-slider-two__sub-title">Amazing places to relax</h5>
                        <h3 class="main-slider-two__title">Travel Journey <br>Begins Here</h3>
                        <div class="main-slider-two__btn">
                            <a href="contact.html" class="trevlo-btn trevlo-btn--base"><span>Start Booking</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- banner-slider -->
        <div class="banner-form wow fadeInUp" data-wow-delay="300ms">
            <div class="container">
                <form class="banner-form__wrapper" action="tour-listing-top-search.html">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="banner-form__control">
                                <label for="location">Location</label>
                                <select name="location" class="selectpicker" id="location">
                                    <option value="select">Where to Next?</option>
                                    <option value="spain">Spain</option>
                                    <option value="africa">Africa</option>
                                    <option value="europe">Europe</option>
                                    <option value="thailand">Thailand</option>
                                    <option value="dubai">Dubai</option>
                                    <option value="australia">Australia</option>
                                    <option value="swizerlan">Swizerlan</option>
                                </select>
                                <i class="icon-location-2"></i>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="banner-form__control">
                                <label for="type">Type</label>
                                <select name="type" class="selectpicker" id="type">
                                    <option value="select">Booking Type</option>
                                    <option value="spain">Adventure</option>
                                    <option value="africa">Beach</option>
                                    <option value="europe">Discovery</option>
                                    <option value="thailand">Mountain</option>
                                    <option value="dubai">Hills</option>
                                    <option value="australia">Couple</option>
                                </select>
                                <i class="icon-hiking"></i>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="banner-form__control">
                                <label for="date">Date From</label>
                                <input class="trevlo-multi-datepicker" id="date" type="text" name="date" placeholder="Select Date">
                                <i class="icon-calendar-5"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="banner-form__control">
                                <label for="guests">Guests</label>
                                <button class="banner-form__qty-minus sub">
                                    <i class="icon-minus-3"></i>
                                </button>
                                <input id="guests" type="number" value="2" name="guests" placeholder="2">
                                <button class="banner-form__qty-plus add">
                                    <i class="icon-plus-3"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="banner-form__btn">
                                <div class="banner-form__filter"><span class="icon-filter"></span></div>
                                <button type="submit" aria-label="search submit" class="trevlo-btn trevlo-btn--base">
                                    <span><i class="icon-search"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="banner-form__popup">
                <div class="banner-form__popup__slider-wrapper">
                    <form action="index-2.html#" method="get" class="clearfix">
                        <div id="slider-ranger"></div>
                    </form>
                </div>
                <h3 class="banner-form__popup__title">Language</h3>
                <ul class="banner-form__popup__checkbox">
                    <li>
                        <input type="checkbox" name="english" id="english">
                        <label for="english"><span></span>English</label>
                    </li>
                    <li>
                        <input type="checkbox" name="french" id="french">
                        <label for="french"><span></span>French</label>
                    </li>
                    <li>
                        <input type="checkbox" name="german" id="german">
                        <label for="german"><span></span>German</label>
                    </li>
                    <li>
                        <input type="checkbox" name="japanese" id="japanese">
                        <label for="japanese"><span></span>Japanese</label>
                    </li>
                    <li>
                        <input type="checkbox" name="thailand" id="thailand">
                        <label for="thailand"><span></span>Thailand</label>
                    </li>
                    <li>
                        <input type="checkbox" name="arabic" id="arabic">
                        <label for="arabic"><span></span>Arabic</label>
                    </li>
                </ul>
                <h3 class="banner-form__popup__title">Amenities</h3>
                <ul class="banner-form__popup__checkbox">
                    <li>
                        <input type="checkbox" name="Accepts" id="Accepts">
                        <label for="Accepts"><span></span>Accepts Credit Cards</label>
                    </li>
                    <li>
                        <input type="checkbox" name="Parking" id="Parking">
                        <label for="Parking"><span></span>Car Parking</label>
                    </li>
                    <li>
                        <input type="checkbox" name="Coupons" id="Coupons">
                        <label for="Coupons"><span></span>Free Coupons</label>
                    </li>
                    <li>
                        <input type="checkbox" name="Laundry" id="Laundry">
                        <label for="Laundry"><span></span>Laundry Service</label>
                    </li>
                    <li>
                        <input type="checkbox" name="Outdoor" id="Outdoor">
                        <label for="Outdoor"><span></span>Outdoor Seating</label>
                    </li>
                    <li>
                        <input type="checkbox" name="Reservations" id="Reservations">
                        <label for="Reservations"><span></span>Reservations</label>
                    </li>
                    <li>
                        <input type="checkbox" name="Restaurant" id="Restaurant">
                        <label for="Restaurant"><span></span>Restaurant</label>
                    </li>
                    <li>
                        <input type="checkbox" name="Smoking" id="Smoking">
                        <label for="Smoking"><span></span>Smoking Allowed</label>
                    </li>
                    <li>
                        <input type="checkbox" name="Internet" id="Internet">
                        <label for="Internet"><span></span>Wireless Internet</label>
                    </li>
                </ul>
            </div>
        </div>
        <!-- banner-form -->
    </section>
    <!-- main-slider-end -->
    <!-- Feature Start -->
    <section class="feature-one">
        <div class="feature-one__bg" style="background-image: url(front/assets/images/shapes/feature-bg-1.png);"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="feature-one__box">
                        <div class="feature-one__box__icon"><span class="icon-lowest-price-1-1"></span></div>
                        <h3 class="feature-one__box__title">Best Pirce Gurnatee</h3>
                        <p class="feature-one__box__text">There are many variations of passages of Lorem Ipsum available.</p>
                    </div><!-- feature-item -->
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="feature-one__box">
                        <div class="feature-one__box__icon"><span class="icon-Booking"></span></div>
                        <h3 class="feature-one__box__title">Easy & Quick Booking</h3>
                        <p class="feature-one__box__text">There are many variations of passages of Lorem Ipsum available.</p>
                    </div><!-- feature-item -->
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="feature-one__box">
                        <div class="feature-one__box__icon"><span class="icon-Group"></span></div>
                        <h3 class="feature-one__box__title">Best Tour Selection</h3>
                        <p class="feature-one__box__text">There are many variations of passages of Lorem Ipsum available.</p>
                    </div><!-- feature-item -->
                </div>
            </div>
        </div>
    </section>
    <!-- Feature End -->
    <!-- About Start -->
    <section class="about-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 wow fadeInLeft" data-wow-delay="200ms">
                    <div class="about-two__image">
                        <div class="about-two__image__one trevlo-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 3, "speed": 700, "scale": 1 }'>
                            <img src="front/assets/images/resources/about-2-1.jpg" alt="trevlo">
                        </div>
                        <div class="about-two__image__two trevlo-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 2, "speed": 700, "scale": 1 }'>
                            <img src="front/assets/images/resources/about-2-2.jpg" alt="trevlo">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 196 76">
                                <path d="M1 0V4C1 43.2122 32.7878 75 72 75H196" />
                            </svg>
                        </div>
                        <div class="about-two__image__content">
                            <img src="front/assets/images/shapes/about-2-shape.png" alt="trevlo">
                            <h5 class="about-two__image__content__title">We have more than<br> 10 years of experience</h5>
                        </div>
                    </div><!-- /.about-two__image -->
                </div><!-- /.col-xl-6 col-lg-6 -->
                <div class="col-xl-6 col-lg-6 wow fadeInRight" data-wow-delay="200ms">
                    <div class="about-two__content">
                        <div class="sec-title text-left">

                            <p class="sec-title__tagline">GET TO KNOW US</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">Plan Your Next Trip with Tevlo Agency</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title --><!-- /.sec-title -->
                        <p class="about-two__content__text">
                            There are many variations of passages of Lorem Ipsum available, but the majority have passages of suffered
                            alteration in There are many variations of passages.
                        </p>
                        <h5 class="about-two__content__heading">An Excellent Opportunity to Travel and Experience Adventure</h5>
                        <ul class="about-two__content__list">
                            <li><span class="fas fa-check-circle"></span>Many variations of passages of Lorem Ipsum</li>
                            <li><span class="fas fa-check-circle"></span>Many variations of passages of Lorem</li>
                            <li><span class="fas fa-check-circle"></span>Expert Many variations Teacher</li>
                        </ul>
                        <a href="about.html" class="trevlo-btn trevlo-btn--base"><span>Discover More</span></a>
                    </div><!-- /.about-four__content -->
                </div><!-- /.col-xl-6 col-lg-6 -->
            </div><!-- /.row -->
        </div>
    </section>
    <!-- About End -->
    <!-- Destination Start -->
    <section class="destination-two">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="200ms">
                <div class="col-xl-4">
                    <div class="destination-two__content">
                        <div class="sec-title text-left">

                            <p class="sec-title__tagline">Destination list</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">Explore the Beautiful Places Around World</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title --><!-- /.sec-title -->
                        <p class="destination-two__text">Flexible Classes refers to the process<br> of acquiring is knowledge free</p>
                        <a href="about.html" class="trevlo-btn"><span>Discover More</span></a><!-- /.button -->
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="trevlo-stretch-element-inside-column">
                        <div class="destination-two__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav trevlo-owl__carousel--with-shadow owl-theme owl-carousel" data-owl-options='{
                    "items": 4,
                    "margin": 30,
                    "smartSpeed": 700,
                    "loop":false,
                    "autoplay": 6000,
                    "nav":false,
                    "dots":false,
                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                    "responsive":{
                        "0":{
                            "items": 1
                        },
                        "500":{
                            "items": 2
                        },
                        "768":{
                            "items": 3
                        },
                        "1400":{
                            "items": 4
                        }
                    }
                    }'>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--round">
                                        <img src="front/assets/images/destination/destination-2-1.jpg" alt="destination" class="destination-two__card-img destination-two__card-img--round">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--round">
                                            <a href="front/assets/images/destination/destination-2-1.jpg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--round -->
                                        <div class="destination-two__card-btn">
                                            <a href="destination-details-right.html" class="trevlo-btn trevlo-btn--base-three"><span>7 TOURS</span></a>
                                        </div>
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="destination-details-right.html">Spain</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--circle">
                                        <img src="front/assets/images/destination/destination-2-2.jpg" alt="destination" class="destination-two__card-img destination-two__card-img--circle">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--circle">
                                            <a href="front/assets/images/destination/destination-2-2.jpg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--circle -->
                                        <div class="destination-two__card-btn">
                                            <a href="destination-details-right.html" class="trevlo-btn trevlo-btn--base-three"><span>10 TOURS</span></a>
                                        </div>
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="destination-details-right.html">Thailand</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--round">
                                        <img src="front/assets/images/destination/destination-2-3.jpg" alt="destination" class="destination-two__card-img destination-two__card-img--round">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--round">
                                            <a href="front/assets/images/destination/destination-2-3.jpg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--round -->
                                        <div class="destination-two__card-btn">
                                            <a href="destination-details-right.html" class="trevlo-btn trevlo-btn--base-three"><span>12 TOURS</span></a>
                                        </div>
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="destination-details-right.html">Australia</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--circle">
                                        <img src="front/assets/images/destination/destination-2-4.jpg" alt="destination" class="destination-two__card-img destination-two__card-img--circle">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--circle">
                                            <a href="front/assets/images/destination/destination-2-4.jpg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--circle -->
                                        <div class="destination-two__card-btn">
                                            <a href="destination-details-right.html" class="trevlo-btn trevlo-btn--base-three"><span>10 TOURS</span></a>
                                        </div>
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="destination-details-right.html">Italy</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--round">
                                        <img src="front/assets/images/destination/destination-2-5.jpg" alt="destination" class="destination-two__card-img destination-two__card-img--round">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--round">
                                            <a href="front/assets/images/destination/destination-2-5.jpg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--round -->
                                        <div class="destination-two__card-btn">
                                            <a href="destination-details-right.html" class="trevlo-btn trevlo-btn--base-three"><span>7 TOURS</span></a>
                                        </div>
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="destination-details-right.html">Egypt</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--circle">
                                        <img src="front/assets/images/destination/destination-2-6.jpg" alt="destination" class="destination-two__card-img destination-two__card-img--circle">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--circle">
                                            <a href="front/assets/images/destination/destination-2-6.jpg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--circle -->
                                        <div class="destination-two__card-btn">
                                            <a href="destination-details-right.html" class="trevlo-btn trevlo-btn--base-three"><span>10 TOURS</span></a>
                                        </div>
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="destination-details-right.html">England</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--round">
                                        <img src="front/assets/images/destination/destination-2-7.jpg" alt="destination" class="destination-two__card-img destination-two__card-img--round">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--round">
                                            <a href="front/assets/images/destination/destination-2-7.jpg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--round -->
                                        <div class="destination-two__card-btn">
                                            <a href="destination-details-right.html" class="trevlo-btn trevlo-btn--base-three"><span>12 TOURS</span></a>
                                        </div>
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="destination-details-right.html">Sweden</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--circle">
                                        <img src="front/assets/images/destination/destination-2-8.jpg" alt="destination" class="destination-two__card-img destination-two__card-img--circle">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--circle">
                                            <a href="front/assets/images/destination/destination-2-8.jpg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--circle -->
                                        <div class="destination-two__card-btn">
                                            <a href="destination-details-right.html" class="trevlo-btn trevlo-btn--base-three"><span>7 TOURS</span></a>
                                        </div>
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="destination-details-right.html">Dubai</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </section>
    <!-- Destination End -->
    <!-- Tour Listing One Start -->
    <section class="tour-listing-one tour-listing-one--home-two" style="background-image: url(front/assets/images/shapes/tour-bg-2.png);">
        <div class="container">
            <div class="sec-title text-center">

                <p class="sec-title__tagline">Featured tours</p><!-- /.sec-title__tagline -->

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
                <div class="item">
                    <div class="tour-listing__card">
                        <a href="tour-listing-details-right.html" class="tour-listing__card-image-box">
                            <img src="front/assets/images/tours/tour-2-1.jpg" alt="front/assets/images/tours/tour-2-1.jpg" class="tour-listing__card-image">
                            <div class="tour-listing__card-btn-group">

                                <div class="tour-listing__card-discount @@innerExtraClassName">10% Off</div>


                                <div class="tour-listing__card-featured">Featured</div>

                            </div><!-- /.tour-listing__card-btn-group -->
                            <div class="tour-listing__card-image-overlay"></div><!-- /.tour-listing__card-image-overlay -->
                        </a><!-- /.tour-listing__card-image-box -->
                        <a href="javascript:void(0);" class="tour-listing__card-wishlist"><span class="icon-heart"></span></a>
                        <div class="tour-listing__card-content">
                            <div class="tour-listing__card-camera-group">
                                <a href="javascript:void(0);" class="tour-listing__card-camera-btn trevlo-image-popup" data-gallery-options='{
            "items": [
              {
                "src": "front/assets/images/tours/tour-2-1.jpg"
              },
              {
                "src": "front/assets/images/tours/tour-2-2.jpg"
              },
              {
                "src": "front/assets/images/tours/tour-2-3.jpg"
              }
            ],
            "gallery": {
              "enabled": true
            },
            "type": "image"
        }'>
                                    <span class="icon-photo-camera-1"></span>
                                </a>
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="tour-listing__card-camera-btn video-popup">
                                    <span class="icon-video-camera-1-1"></span>
                                </a>
                            </div><!-- /.tour-listing__card-camera-group -->
                            <h3 class="tour-listing__card-title"><a href="tour-listing-details-right.html">Turkey Balloons flying</a></h3>
                            <p class="tour-listing__card-text text-small">There are many variations of passages of Lorem Ipsum aagtilable</p>
                            <div class="tour-listing__card-inner-content">
                                <div class="tour-listing__card-review-box">
                                    <span class="icon-star"></span>
                                    <p class="tour-listing__card-review-text text-small">4.5 (30 Reviews)</p>
                                </div><!-- /.tour-listing__card-review-box -->
                                <div class="tour-listing__card-location-box">
                                    <span class="icon-location-1"></span>
                                    <p class="tour-listing__card-location-text text-small">Main Street, Brooklyn, NY</p>
                                </div><!-- /.tour-listing__card-location-box -->
                                <div class="tour-listing__card-divider"></div><!-- /.tour-listing__card-divider -->
                                <div class="tour-listing__card-bottom">
                                    <div class="tour-listing__card-bottom-left">
                                        <div class="tour-listing__card-day">
                                            <span class="icon-clock-1"></span>
                                            <p class="tour-listing__card-day-text text-small">3 Day</p>
                                        </div><!-- /.tour-listing__card-day -->
                                        <div class="tour-listing__card-people">
                                            <span class="icon-Duration"></span>
                                            <p class="tour-listing__card-people-text text-small">12+</p>
                                        </div><!-- /.tour-listing__card-people -->
                                    </div><!-- /.tour-listing__card-bottom-left -->
                                    <div class="tour-listing__card-bottom-right">
                                        <h4 class="tour-listing__card-price">$160</h4>
                                    </div><!-- /.tour-listing__card-bottom-right -->
                                </div><!-- /.tour-listing__card-bottom -->
                            </div><!-- /.tour-listing__card-inner-content -->
                        </div><!-- /.tour-listing__card-content -->
                    </div><!-- /.tour-listing__card -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="tour-listing__card">
                        <a href="tour-listing-details-right.html" class="tour-listing__card-image-box">
                            <img src="front/assets/images/tours/tour-2-2.jpg" alt="front/assets/images/tours/tour-2-2.jpg" class="tour-listing__card-image">
                            <div class="tour-listing__card-btn-group">


                                <div class="tour-listing__card-featured">Featured</div>

                            </div><!-- /.tour-listing__card-btn-group -->
                            <div class="tour-listing__card-image-overlay"></div><!-- /.tour-listing__card-image-overlay -->
                        </a><!-- /.tour-listing__card-image-box -->
                        <a href="javascript:void(0);" class="tour-listing__card-wishlist"><span class="icon-heart"></span></a>
                        <div class="tour-listing__card-content">
                            <div class="tour-listing__card-camera-group">
                                <a href="javascript:void(0);" class="tour-listing__card-camera-btn trevlo-image-popup" data-gallery-options='{
            "items": [
              {
                "src": "front/assets/images/tours/tour-2-2.jpg"
              },
              {
                "src": "front/assets/images/tours/tour-2-3.jpg"
              },
              {
                "src": "front/assets/images/tours/tour-2-4.jpg"
              }
            ],
            "gallery": {
              "enabled": true
            },
            "type": "image"
        }'>
                                    <span class="icon-photo-camera-1"></span>
                                </a>
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="tour-listing__card-camera-btn video-popup">
                                    <span class="icon-video-camera-1-1"></span>
                                </a>
                            </div><!-- /.tour-listing__card-camera-group -->
                            <h3 class="tour-listing__card-title"><a href="tour-listing-details-right.html">Adventure Tour Go Way</a></h3>
                            <p class="tour-listing__card-text text-small">There are many variations of passages of Lorem Ipsum agtilable</p>
                            <div class="tour-listing__card-inner-content">
                                <div class="tour-listing__card-review-box">
                                    <span class="icon-star"></span>
                                    <p class="tour-listing__card-review-text text-small">4.5 (30 Reviews)</p>
                                </div><!-- /.tour-listing__card-review-box -->
                                <div class="tour-listing__card-location-box">
                                    <span class="icon-location-1"></span>
                                    <p class="tour-listing__card-location-text text-small">Main Street, Brooklyn, NY</p>
                                </div><!-- /.tour-listing__card-location-box -->
                                <div class="tour-listing__card-divider"></div><!-- /.tour-listing__card-divider -->
                                <div class="tour-listing__card-bottom">
                                    <div class="tour-listing__card-bottom-left">
                                        <div class="tour-listing__card-day">
                                            <span class="icon-clock-1"></span>
                                            <p class="tour-listing__card-day-text text-small">3 Day</p>
                                        </div><!-- /.tour-listing__card-day -->
                                        <div class="tour-listing__card-people">
                                            <span class="icon-Duration"></span>
                                            <p class="tour-listing__card-people-text text-small">12+</p>
                                        </div><!-- /.tour-listing__card-people -->
                                    </div><!-- /.tour-listing__card-bottom-left -->
                                    <div class="tour-listing__card-bottom-right">
                                        <h4 class="tour-listing__card-price">$150</h4>
                                    </div><!-- /.tour-listing__card-bottom-right -->
                                </div><!-- /.tour-listing__card-bottom -->
                            </div><!-- /.tour-listing__card-inner-content -->
                        </div><!-- /.tour-listing__card-content -->
                    </div><!-- /.tour-listing__card -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="tour-listing__card">
                        <a href="tour-listing-details-right.html" class="tour-listing__card-image-box">
                            <img src="front/assets/images/tours/tour-2-3.jpg" alt="front/assets/images/tours/tour-2-3.jpg" class="tour-listing__card-image">
                            <div class="tour-listing__card-btn-group">


                            </div><!-- /.tour-listing__card-btn-group -->
                            <div class="tour-listing__card-image-overlay"></div><!-- /.tour-listing__card-image-overlay -->
                        </a><!-- /.tour-listing__card-image-box -->
                        <a href="javascript:void(0);" class="tour-listing__card-wishlist"><span class="icon-heart"></span></a>
                        <div class="tour-listing__card-content">
                            <div class="tour-listing__card-camera-group">
                                <a href="javascript:void(0);" class="tour-listing__card-camera-btn trevlo-image-popup" data-gallery-options='{
            "items": [
              {
                "src": "front/assets/images/tours/tour-2-3.jpg"
              },
              {
                "src": "front/assets/images/tours/tour-2-4.jpg"
              },
              {
                "src": "front/assets/images/tours/tour-2-1.jpg"
              }
            ],
            "gallery": {
              "enabled": true
            },
            "type": "image"
        }'>
                                    <span class="icon-photo-camera-1"></span>
                                </a>
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="tour-listing__card-camera-btn video-popup">
                                    <span class="icon-video-camera-1-1"></span>
                                </a>
                            </div><!-- /.tour-listing__card-camera-group -->
                            <h3 class="tour-listing__card-title"><a href="tour-listing-details-right.html">Moscow Red City Land</a></h3>
                            <p class="tour-listing__card-text text-small">There are many variations of passages of Lorem Ipsum agtilable</p>
                            <div class="tour-listing__card-inner-content">
                                <div class="tour-listing__card-review-box">
                                    <span class="icon-star"></span>
                                    <p class="tour-listing__card-review-text text-small">4.5 (30 Reviews)</p>
                                </div><!-- /.tour-listing__card-review-box -->
                                <div class="tour-listing__card-location-box">
                                    <span class="icon-location-1"></span>
                                    <p class="tour-listing__card-location-text text-small">Main Street, Brooklyn, NY</p>
                                </div><!-- /.tour-listing__card-location-box -->
                                <div class="tour-listing__card-divider"></div><!-- /.tour-listing__card-divider -->
                                <div class="tour-listing__card-bottom">
                                    <div class="tour-listing__card-bottom-left">
                                        <div class="tour-listing__card-day">
                                            <span class="icon-clock-1"></span>
                                            <p class="tour-listing__card-day-text text-small">3 Day</p>
                                        </div><!-- /.tour-listing__card-day -->
                                        <div class="tour-listing__card-people">
                                            <span class="icon-Duration"></span>
                                            <p class="tour-listing__card-people-text text-small">12+</p>
                                        </div><!-- /.tour-listing__card-people -->
                                    </div><!-- /.tour-listing__card-bottom-left -->
                                    <div class="tour-listing__card-bottom-right">
                                        <h4 class="tour-listing__card-price">$130</h4>
                                    </div><!-- /.tour-listing__card-bottom-right -->
                                </div><!-- /.tour-listing__card-bottom -->
                            </div><!-- /.tour-listing__card-inner-content -->
                        </div><!-- /.tour-listing__card-content -->
                    </div><!-- /.tour-listing__card -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="tour-listing__card">
                        <a href="tour-listing-details-right.html" class="tour-listing__card-image-box">
                            <img src="front/assets/images/tours/tour-2-4.jpg" alt="front/assets/images/tours/tour-2-4.jpg" class="tour-listing__card-image">
                            <div class="tour-listing__card-btn-group">


                            </div><!-- /.tour-listing__card-btn-group -->
                            <div class="tour-listing__card-image-overlay"></div><!-- /.tour-listing__card-image-overlay -->
                        </a><!-- /.tour-listing__card-image-box -->
                        <a href="javascript:void(0);" class="tour-listing__card-wishlist"><span class="icon-heart"></span></a>
                        <div class="tour-listing__card-content">
                            <div class="tour-listing__card-camera-group">
                                <a href="javascript:void(0);" class="tour-listing__card-camera-btn trevlo-image-popup" data-gallery-options='{
            "items": [
              {
                "src": "front/assets/images/tours/tour-2-4.jpg"
              },
              {
                "src": "front/assets/images/tours/tour-2-2.jpg"
              },
              {
                "src": "front/assets/images/tours/tour-2-1.jpg"
              }
            ],
            "gallery": {
              "enabled": true
            },
            "type": "image"
        }'>
                                    <span class="icon-photo-camera-1"></span>
                                </a>
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="tour-listing__card-camera-btn video-popup">
                                    <span class="icon-video-camera-1-1"></span>
                                </a>
                            </div><!-- /.tour-listing__card-camera-group -->
                            <h3 class="tour-listing__card-title"><a href="tour-listing-details-right.html">Iran Gilan Province City</a></h3>
                            <p class="tour-listing__card-text text-small">There are many variations of passages of Lorem Ipsum agtilable</p>
                            <div class="tour-listing__card-inner-content">
                                <div class="tour-listing__card-review-box">
                                    <span class="icon-star"></span>
                                    <p class="tour-listing__card-review-text text-small">4.5 (30 Reviews)</p>
                                </div><!-- /.tour-listing__card-review-box -->
                                <div class="tour-listing__card-location-box">
                                    <span class="icon-location-1"></span>
                                    <p class="tour-listing__card-location-text text-small">Main Street, Brooklyn, NY</p>
                                </div><!-- /.tour-listing__card-location-box -->
                                <div class="tour-listing__card-divider"></div><!-- /.tour-listing__card-divider -->
                                <div class="tour-listing__card-bottom">
                                    <div class="tour-listing__card-bottom-left">
                                        <div class="tour-listing__card-day">
                                            <span class="icon-clock-1"></span>
                                            <p class="tour-listing__card-day-text text-small">3 Day</p>
                                        </div><!-- /.tour-listing__card-day -->
                                        <div class="tour-listing__card-people">
                                            <span class="icon-Duration"></span>
                                            <p class="tour-listing__card-people-text text-small">12+</p>
                                        </div><!-- /.tour-listing__card-people -->
                                    </div><!-- /.tour-listing__card-bottom-left -->
                                    <div class="tour-listing__card-bottom-right">
                                        <h4 class="tour-listing__card-price">$140</h4>
                                    </div><!-- /.tour-listing__card-bottom-right -->
                                </div><!-- /.tour-listing__card-bottom -->
                            </div><!-- /.tour-listing__card-inner-content -->
                        </div><!-- /.tour-listing__card-content -->
                    </div><!-- /.tour-listing__card -->
                </div><!-- /.item -->
            </div><!-- /.tour-listing-one__carousel -->
        </div><!-- /.container -->
    </section>
    <!-- Tour Listing One End -->
    <div class="clearfix"></div>
    <!-- Benefit Two Start -->
    <section class="benefit-two">
        <div class="benefit-two__bg" style="background-image: url(front/assets/images/shapes/benefit-bg-2.png);"></div><!-- /.benefit-bg -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 noPadding">
                    <div class="benefit-two__left-content" style="background-image: url(front/assets/images/resources/benefit-2-1.jpg);">
                        <div class="benefit-two__left-content__inner wow fadeInUp" data-wow-delay="200ms">
                            <h2 class="benefit-two__left-content__title">The Best Travel<br> & Adventure</h2>
                            <a href="about.html" class="trevlo-btn"><span>Learn More</span></a><!-- /.button -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="200ms">
                    <div class="benefit-two__content">
                        <div class="sec-title text-left">

                            <p class="sec-title__tagline">Our Benefits List</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">Why You Should Choose<br> Our Trevelo?</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title --><!-- /.sec-title -->
                        <div class="benefit-two__box">
                            <div class="benefit-two__box__icon"><span class="icon-airplane-1"></span></div>
                            <h3 class="benefit-two__box__title">Best Price Guarantee</h3>
                            <p class="benefit-two__box__text">
                                There are many variations of passages of Lorem<br> Ipsum avagtilable, but the majority
                            </p>
                        </div><!-- /.benefit-box -->
                        <div class="benefit-two__box">
                            <div class="benefit-two__box__icon"><span class="icon-ticket-1"></span></div>
                            <h3 class="benefit-two__box__title">Easy & Quick Booking</h3>
                            <p class="benefit-two__box__text">
                                There are many variations of passages of Lorem<br> Ipsum avagtilable, but the majority
                            </p>
                        </div><!-- /.benefit-box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Benefit Two End -->
    <!-- Testimonial Two Start -->
    <section class="testimonial-two">
        <div class="testimonial-two__bg trevlo-splax" style="background-image: url(front/assets/images/backgrounds/tetsimonial-1-bg.png);" data-para-options='{
    "orientation": "down",
    "scale": 1.5,
    "delay": ".3",
    "transition": "cubic-bezier(0,0,0,1)",
    "overflow": true
    }'>
        </div><!-- /.testimonial-one__bg -->
        <div class="container">
            <div class="sec-title text-center">

                <p class="sec-title__tagline">Testimonial</p><!-- /.sec-title__tagline -->

                <h2 class="sec-title__title">See What They’re Talking<br> About Tevlo Agency</h2><!-- /.sec-title__title -->
            </div><!-- /.sec-title --><!-- /.sec-title -->
        </div><!-- /.container -->
        <div class="container">
            <div class="testimonial-two__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav trevlo-owl__carousel--with-shadow owl-theme owl-carousel" data-owl-options='{
        "items": 2,
        "margin": 30,
        "smartSpeed": 700,
        "loop":false,
        "autoplay": true,
        "nav":false,
        "dots":false,
        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
        "responsive":{
            "0":{
                "items": 1
            },
            "992":{
                "items": 2
            }
        }
        }'>
                <div class="item">
                    <div class="testimonials-card-two">
                        <div class="testimonials-card-two__bg"></div>
                        <div class="testimonials-card-two__meta">
                            <div class="testimonials-card-two__image">
                                <img src="front/assets/images/testimonial/testimonial-2-1.jpg" alt="Jacob Jones">
                            </div><!-- /.testimonials-card-two__image -->
                            <h5 class="testimonials-card-two__meta__name">Jacob Jones</h5>
                            <p class="testimonials-card-two__meta__designation">Tourist</p>
                        </div><!-- /.testimonials-card-two__meta -->
                        <div class="testimonials-card-two__ratings">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div><!-- /.testimonials-card-two__ratings -->
                        <div class="testimonials-card-two__quote">Flexible Classes refers to the during process of acquiring is knowledge free or skills through the free use of process the digital technologies and the hope internet. Flexible Classes Flexible Classes refers to the process of acquiring is knowledge free or skills</div><!-- /.testimonials-card-two__quote -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 46">
                            <path d="M11.1405 24.5206L6.97303 45.9985L10.1686 45.9985L23.8104 17.8707C23.9528 17.5973 24.0927 17.3215 24.2152 17.0358C24.8373 15.5784 25.1846 13.9819 25.1846 12.3023C25.1846 5.50594 19.5455 -0.00146534 12.5922 -0.00146594C5.63634 -0.00146655 -0.000269211 5.50838 -0.000269805 12.3023C-0.000270357 18.6178 4.8693 23.8151 11.1405 24.5206Z" />
                            <path d="M39.956 24.5206L35.7885 45.9985L38.9865 45.9985L52.6283 17.8707C52.7707 17.5973 52.9107 17.3215 53.0331 17.0358C53.6527 15.5784 54 13.9819 54 12.3047C54 5.50838 48.3609 0.00097607 41.4076 0.000975462C34.4518 0.000974854 28.8152 5.51082 28.8152 12.3047C28.8152 18.6178 33.6847 23.8151 39.956 24.5206Z" />
                        </svg>
                    </div><!-- /.testimonials-card-two -->
                </div><!-- /.owl-slide-item-->
                <div class="item">
                    <div class="testimonials-card-two">
                        <div class="testimonials-card-two__bg"></div>
                        <div class="testimonials-card-two__meta">
                            <div class="testimonials-card-two__image">
                                <img src="front/assets/images/testimonial/testimonial-2-2.jpg" alt="Robert Tiny">
                            </div><!-- /.testimonials-card-two__image -->
                            <h5 class="testimonials-card-two__meta__name">Robert Tiny</h5>
                            <p class="testimonials-card-two__meta__designation">Tourist</p>
                        </div><!-- /.testimonials-card-two__meta -->
                        <div class="testimonials-card-two__ratings">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div><!-- /.testimonials-card-two__ratings -->
                        <div class="testimonials-card-two__quote">Flexible Classes refers to the during process of acquiring is knowledge free or skills through the free use of process the digital technologies and the hope internet. Flexible Classes Flexible Classes refers to the process of acquiring is knowledge free or skills</div><!-- /.testimonials-card-two__quote -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 46">
                            <path d="M11.1405 24.5206L6.97303 45.9985L10.1686 45.9985L23.8104 17.8707C23.9528 17.5973 24.0927 17.3215 24.2152 17.0358C24.8373 15.5784 25.1846 13.9819 25.1846 12.3023C25.1846 5.50594 19.5455 -0.00146534 12.5922 -0.00146594C5.63634 -0.00146655 -0.000269211 5.50838 -0.000269805 12.3023C-0.000270357 18.6178 4.8693 23.8151 11.1405 24.5206Z" />
                            <path d="M39.956 24.5206L35.7885 45.9985L38.9865 45.9985L52.6283 17.8707C52.7707 17.5973 52.9107 17.3215 53.0331 17.0358C53.6527 15.5784 54 13.9819 54 12.3047C54 5.50838 48.3609 0.00097607 41.4076 0.000975462C34.4518 0.000974854 28.8152 5.51082 28.8152 12.3047C28.8152 18.6178 33.6847 23.8151 39.956 24.5206Z" />
                        </svg>
                    </div><!-- /.testimonials-card-two -->
                </div><!-- /.owl-slide-item-->
                <div class="item">
                    <div class="testimonials-card-two">
                        <div class="testimonials-card-two__bg"></div>
                        <div class="testimonials-card-two__meta">
                            <div class="testimonials-card-two__image">
                                <img src="front/assets/images/testimonial/testimonial-2-3.jpg" alt="Mike Hardson">
                            </div><!-- /.testimonials-card-two__image -->
                            <h5 class="testimonials-card-two__meta__name">Mike Hardson</h5>
                            <p class="testimonials-card-two__meta__designation">Customer</p>
                        </div><!-- /.testimonials-card-two__meta -->
                        <div class="testimonials-card-two__ratings">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div><!-- /.testimonials-card-two__ratings -->
                        <div class="testimonials-card-two__quote">Flexible Classes refers to the during process of acquiring is knowledge free or skills through the free use of process the digital technologies and the hope internet. Flexible Classes Flexible Classes refers to the process of acquiring is knowledge free or skills</div><!-- /.testimonials-card-two__quote -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 46">
                            <path d="M11.1405 24.5206L6.97303 45.9985L10.1686 45.9985L23.8104 17.8707C23.9528 17.5973 24.0927 17.3215 24.2152 17.0358C24.8373 15.5784 25.1846 13.9819 25.1846 12.3023C25.1846 5.50594 19.5455 -0.00146534 12.5922 -0.00146594C5.63634 -0.00146655 -0.000269211 5.50838 -0.000269805 12.3023C-0.000270357 18.6178 4.8693 23.8151 11.1405 24.5206Z" />
                            <path d="M39.956 24.5206L35.7885 45.9985L38.9865 45.9985L52.6283 17.8707C52.7707 17.5973 52.9107 17.3215 53.0331 17.0358C53.6527 15.5784 54 13.9819 54 12.3047C54 5.50838 48.3609 0.00097607 41.4076 0.000975462C34.4518 0.000974854 28.8152 5.51082 28.8152 12.3047C28.8152 18.6178 33.6847 23.8151 39.956 24.5206Z" />
                        </svg>
                    </div><!-- /.testimonials-card-two -->
                </div><!-- /.owl-slide-item-->
                <div class="item">
                    <div class="testimonials-card-two">
                        <div class="testimonials-card-two__bg"></div>
                        <div class="testimonials-card-two__meta">
                            <div class="testimonials-card-two__image">
                                <img src="front/assets/images/testimonial/testimonial-2-1.jpg" alt="Jacob Jones">
                            </div><!-- /.testimonials-card-two__image -->
                            <h5 class="testimonials-card-two__meta__name">Jacob Jones</h5>
                            <p class="testimonials-card-two__meta__designation">Tourist</p>
                        </div><!-- /.testimonials-card-two__meta -->
                        <div class="testimonials-card-two__ratings">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div><!-- /.testimonials-card-two__ratings -->
                        <div class="testimonials-card-two__quote">Flexible Classes refers to the during process of acquiring is knowledge free or skills through the free use of process the digital technologies and the hope internet. Flexible Classes Flexible Classes refers to the process of acquiring is knowledge free or skills</div><!-- /.testimonials-card-two__quote -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 46">
                            <path d="M11.1405 24.5206L6.97303 45.9985L10.1686 45.9985L23.8104 17.8707C23.9528 17.5973 24.0927 17.3215 24.2152 17.0358C24.8373 15.5784 25.1846 13.9819 25.1846 12.3023C25.1846 5.50594 19.5455 -0.00146534 12.5922 -0.00146594C5.63634 -0.00146655 -0.000269211 5.50838 -0.000269805 12.3023C-0.000270357 18.6178 4.8693 23.8151 11.1405 24.5206Z" />
                            <path d="M39.956 24.5206L35.7885 45.9985L38.9865 45.9985L52.6283 17.8707C52.7707 17.5973 52.9107 17.3215 53.0331 17.0358C53.6527 15.5784 54 13.9819 54 12.3047C54 5.50838 48.3609 0.00097607 41.4076 0.000975462C34.4518 0.000974854 28.8152 5.51082 28.8152 12.3047C28.8152 18.6178 33.6847 23.8151 39.956 24.5206Z" />
                        </svg>
                    </div><!-- /.testimonials-card-two -->
                </div><!-- /.owl-slide-item-->
                <div class="item">
                    <div class="testimonials-card-two">
                        <div class="testimonials-card-two__bg"></div>
                        <div class="testimonials-card-two__meta">
                            <div class="testimonials-card-two__image">
                                <img src="front/assets/images/testimonial/testimonial-2-2.jpg" alt="Robert Tiny">
                            </div><!-- /.testimonials-card-two__image -->
                            <h5 class="testimonials-card-two__meta__name">Robert Tiny</h5>
                            <p class="testimonials-card-two__meta__designation">Tourist</p>
                        </div><!-- /.testimonials-card-two__meta -->
                        <div class="testimonials-card-two__ratings">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div><!-- /.testimonials-card-two__ratings -->
                        <div class="testimonials-card-two__quote">Flexible Classes refers to the during process of acquiring is knowledge free or skills through the free use of process the digital technologies and the hope internet. Flexible Classes Flexible Classes refers to the process of acquiring is knowledge free or skills</div><!-- /.testimonials-card-two__quote -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 46">
                            <path d="M11.1405 24.5206L6.97303 45.9985L10.1686 45.9985L23.8104 17.8707C23.9528 17.5973 24.0927 17.3215 24.2152 17.0358C24.8373 15.5784 25.1846 13.9819 25.1846 12.3023C25.1846 5.50594 19.5455 -0.00146534 12.5922 -0.00146594C5.63634 -0.00146655 -0.000269211 5.50838 -0.000269805 12.3023C-0.000270357 18.6178 4.8693 23.8151 11.1405 24.5206Z" />
                            <path d="M39.956 24.5206L35.7885 45.9985L38.9865 45.9985L52.6283 17.8707C52.7707 17.5973 52.9107 17.3215 53.0331 17.0358C53.6527 15.5784 54 13.9819 54 12.3047C54 5.50838 48.3609 0.00097607 41.4076 0.000975462C34.4518 0.000974854 28.8152 5.51082 28.8152 12.3047C28.8152 18.6178 33.6847 23.8151 39.956 24.5206Z" />
                        </svg>
                    </div><!-- /.testimonials-card-two -->
                </div><!-- /.owl-slide-item-->
                <div class="item">
                    <div class="testimonials-card-two">
                        <div class="testimonials-card-two__bg"></div>
                        <div class="testimonials-card-two__meta">
                            <div class="testimonials-card-two__image">
                                <img src="front/assets/images/testimonial/testimonial-2-3.jpg" alt="Mike Hardson">
                            </div><!-- /.testimonials-card-two__image -->
                            <h5 class="testimonials-card-two__meta__name">Mike Hardson</h5>
                            <p class="testimonials-card-two__meta__designation">Customer</p>
                        </div><!-- /.testimonials-card-two__meta -->
                        <div class="testimonials-card-two__ratings">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div><!-- /.testimonials-card-two__ratings -->
                        <div class="testimonials-card-two__quote">Flexible Classes refers to the during process of acquiring is knowledge free or skills through the free use of process the digital technologies and the hope internet. Flexible Classes Flexible Classes refers to the process of acquiring is knowledge free or skills</div><!-- /.testimonials-card-two__quote -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 46">
                            <path d="M11.1405 24.5206L6.97303 45.9985L10.1686 45.9985L23.8104 17.8707C23.9528 17.5973 24.0927 17.3215 24.2152 17.0358C24.8373 15.5784 25.1846 13.9819 25.1846 12.3023C25.1846 5.50594 19.5455 -0.00146534 12.5922 -0.00146594C5.63634 -0.00146655 -0.000269211 5.50838 -0.000269805 12.3023C-0.000270357 18.6178 4.8693 23.8151 11.1405 24.5206Z" />
                            <path d="M39.956 24.5206L35.7885 45.9985L38.9865 45.9985L52.6283 17.8707C52.7707 17.5973 52.9107 17.3215 53.0331 17.0358C53.6527 15.5784 54 13.9819 54 12.3047C54 5.50838 48.3609 0.00097607 41.4076 0.000975462C34.4518 0.000974854 28.8152 5.51082 28.8152 12.3047C28.8152 18.6178 33.6847 23.8151 39.956 24.5206Z" />
                        </svg>
                    </div><!-- /.testimonials-card-two -->
                </div><!-- /.owl-slide-item-->
            </div><!-- /.thm-owl__slider -->
        </div><!-- /.container -->
    </section>
    <!-- Testimonial Two End -->
    <!-- Counter Two Start -->
    <section class="counter-two">
        <div class="counter-two__bg" style="background-image: url(front/assets/images/shapes/counter-bg-2.png);"></div>
        <div class="counter-two__shape"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="counter-two__box @@extraClassName">
                        <div class="counter-two__box__icon">
                            <span class="icon-happy-Travel"></span>
                        </div><!-- /.counter-box__icon -->
                        <p class="counter-two__box__title">Happy Traveller</p>
                        <h3 class="counter-two__box__number count-box"><span class="count-text" data-stop="30.3" data-speed="1500"></span>k</h3>
                    </div>
                </div><!-- /.col-xl-3 col-md-6 -->
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="counter-two__box @@extraClassName">
                        <div class="counter-two__box__icon">
                            <span class="icon-tent-1"></span>
                        </div><!-- /.counter-box__icon -->
                        <p class="counter-two__box__title">Tent Sites</p>
                        <h3 class="counter-two__box__number count-box"><span class="count-text" data-stop="40.5" data-speed="1500"></span>k</h3>
                    </div>
                </div><!-- /.col-xl-3 col-md-6 -->
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="counter-two__box @@extraClassName">
                        <div class="counter-two__box__icon">
                            <span class="icon-satisfied"></span>
                        </div><!-- /.counter-box__icon -->
                        <p class="counter-two__box__title">Satisfaction Rate</p>
                        <h3 class="counter-two__box__number count-box"><span class="count-text" data-stop="88.9" data-speed="1500"></span>%</h3>
                    </div>
                </div><!-- /.col-xl-3 col-md-6 -->
                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="counter-two__box counter-box--no-border">
                        <div class="counter-two__box__icon">
                            <span class="icon-online-chat-1"></span>
                        </div><!-- /.counter-box__icon -->
                        <p class="counter-two__box__title">Year Of Service</p>
                        <h3 class="counter-two__box__number count-box"><span class="count-text" data-stop="6.30" data-speed="1500"></span>+</h3>
                    </div>
                </div><!-- /.col-xl-3 col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- Counter Two End -->
    <!-- Why Choose Two Start -->
    <section class="why-choose-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6 wow fadeInLeft" data-wow-delay="200ms">
                    <div class="why-choose-two__content">
                        <div class="sec-title text-left">

                            <p class="sec-title__tagline">Are you ready to travel</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">Choose Our Tour Types & Enjoy Now</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <p class="why-choose-two__text">
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteradution in some
                            form by injected humour, some form
                        </p>
                        <div class="trevlo-progress why-choose-two__progress">
                            <h4 class="trevlo-progress__title">Experience</h4>
                            <div class="trevlo-progress__bar">
                                <div class="trevlo-progress__inner count-bar counted" data-percent="80%">
                                    <p class="trevlo-progress__number count-text">80%</p>
                                </div>
                            </div>
                        </div><!-- /.trevlo-progress -->
                        <div class="why-choose-two__box-wrapper">
                            <div class="why-choose-two__box">
                                <div class="why-choose-two__box__icon">
                                    <span class="icon-low-price"></span>
                                </div><!-- /.why-choose-two__box__icon -->
                                <h4 class="why-choose-two__box__title">Low Price Friendly</h4>
                            </div><!-- /.why-choose-two__box -->
                            <div class="why-choose-two__box">
                                <div class="why-choose-two__box__icon">
                                    <span class="icon-safety-First"></span>
                                </div><!-- /.why-choose-two__box__icon -->
                                <h4 class="why-choose-two__box__title">Safety First always</h4>
                            </div><!-- /.why-choose-two__box -->
                        </div><!-- /.why-choose-two__service -->
                        <a href="about.html" class="trevlo-btn trevlo-btn--base"><span>Discover More</span></a>
                    </div><!-- /.why-choose-two__content -->
                </div><!-- /.col-lg-6 col-xl-6 -->
                <div class="col-lg-6 col-xl-6">
                    <div class="why-choose-two__img">
                        <div class="why-choose-two__img__one wow fadeInUp" data-wow-delay="200ms">
                            <div class="trevlo-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                <img src="front/assets/images/why-choose/why-choose-2-1.jpg" alt="why-choose">
                            </div>
                            <div class="trevlo-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                <img src="front/assets/images/why-choose/why-choose-2-2.jpg" alt="why-choose">
                            </div>
                        </div><!-- /.why-choose-two__img__one -->
                        <div class="why-choose-two__img__two wow fadeInUp" data-wow-delay="300ms">
                            <div class="trevlo-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                <img src="front/assets/images/why-choose/why-choose-2-3.jpg" alt="why-choose">
                            </div>
                            <div class="trevlo-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                <img src="front/assets/images/why-choose/why-choose-2-4.jpg" alt="why-choose">
                            </div>
                        </div><!-- /.why-choose-two__img__two -->
                    </div><!-- /.why-choose-two__img-box -->
                </div><!-- /.col-lg-6 col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- Why Choose Two End -->
    <section class="gallery-one gallery-one--home-two">
        <div class="container">
            <div class="gallery-one__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav owl-carousel" data-owl-options='{
        "loop": true,
        "items": 5,
        "autoplay": true,
        "smartSpeed": 600,
        "nav": false,
        "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
        "dots": true,
        "margin": 10,
        "responsive": {
            "0": {
                "items": 1
            },
            "576": {
                "items": 2
            },
            "992": {
                "items": 3
            },
            "1200": {
                "items": 4
            },
            "1400": {
                "items": 5
            }
        }
        }'>
                <div class="item">
                    <div class="gallery-single">
                        <div class="gallery-single__img-box">
                            <img src="front/assets/images/gallery/gallery-1-1.jpg" alt="gallery" class="gallery-single__img">
                            <div class="gallery-single__overlay">
                                <a href="front/assets/images/gallery/gallery-1-1.jpg" class="gallery-single__btn trevlo-btn trevlo-btn--base-three img-popup"><span class="icon-plus"></span></a>
                            </div><!-- /.gallery-single__overlay -->
                        </div><!-- /.gallery-single__img-box -->
                    </div><!-- /.gallery-single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="gallery-single">
                        <div class="gallery-single__img-box">
                            <img src="front/assets/images/gallery/gallery-1-2.jpg" alt="gallery" class="gallery-single__img">
                            <div class="gallery-single__overlay">
                                <a href="front/assets/images/gallery/gallery-1-2.jpg" class="gallery-single__btn trevlo-btn trevlo-btn--base-three img-popup"><span class="icon-plus"></span></a>
                            </div><!-- /.gallery-single__overlay -->
                        </div><!-- /.gallery-single__img-box -->
                    </div><!-- /.gallery-single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="gallery-single">
                        <div class="gallery-single__img-box">
                            <img src="front/assets/images/gallery/gallery-1-3.jpg" alt="gallery" class="gallery-single__img">
                            <div class="gallery-single__overlay">
                                <a href="front/assets/images/gallery/gallery-1-3.jpg" class="gallery-single__btn trevlo-btn trevlo-btn--base-three img-popup"><span class="icon-plus"></span></a>
                            </div><!-- /.gallery-single__overlay -->
                        </div><!-- /.gallery-single__img-box -->
                    </div><!-- /.gallery-single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="gallery-single">
                        <div class="gallery-single__img-box">
                            <img src="front/assets/images/gallery/gallery-1-4.jpg" alt="gallery" class="gallery-single__img">
                            <div class="gallery-single__overlay">
                                <a href="front/assets/images/gallery/gallery-1-4.jpg" class="gallery-single__btn trevlo-btn trevlo-btn--base-three img-popup"><span class="icon-plus"></span></a>
                            </div><!-- /.gallery-single__overlay -->
                        </div><!-- /.gallery-single__img-box -->
                    </div><!-- /.gallery-single -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="gallery-single">
                        <div class="gallery-single__img-box">
                            <img src="front/assets/images/gallery/gallery-1-5.jpg" alt="gallery" class="gallery-single__img">
                            <div class="gallery-single__overlay">
                                <a href="front/assets/images/gallery/gallery-1-5.jpg" class="gallery-single__btn trevlo-btn trevlo-btn--base-three img-popup"><span class="icon-plus"></span></a>
                            </div><!-- /.gallery-single__overlay -->
                        </div><!-- /.gallery-single__img-box -->
                    </div><!-- /.gallery-single -->
                </div><!-- /.item -->
            </div>
        </div>
    </section>
    <!-- tab-section-start -->
    <section class="tab-one">
        <div class="tab-one__bg" style="background-image: url(front/assets/images/shapes/tab-bg-1.png);"></div>
        <div class="container">
            <div class="sec-title text-left">

                <p class="sec-title__tagline">Activity</p><!-- /.sec-title__tagline -->

                <h2 class="sec-title__title">Feel Real Adventure and Very<br> Close to Nature</h2><!-- /.sec-title__title -->
            </div><!-- /.sec-title -->
            <div class="row tabs-box">
                <div class="col-xl-5 col-lg-5">
                    <ul class="list-unstyled tab-buttons tab-one__list">
                        <li data-tab="#tent_camping" class="tab-btn"><span class="icon-tent-1"></span>Tent Camping</li>
                        <li data-tab="#adventure_travel" class="tab-btn active-btn"><span class="icon-traveling-1"></span>Adventure Travel</li>
                        <li data-tab="#mountain_biking" class="tab-btn"><span class="icon-mountain-bike-1"></span>Mountain Biking</li>
                        <li data-tab="#discovery_world" class="tab-btn"><span class="icon-world-1"></span>Discovery World</li>
                        <li data-tab="#fishing_swimming" class="tab-btn"><span class="icon-fishing-net-1"></span>Fishing & Swimming</li>
                        <li data-tab="#paragliding_tours" class="tab-btn"><span class="icon-paragliding-1"></span>Paragliding Tours</li>
                    </ul><!-- /.list-unstyledf -->
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="tabs-content">
                        <div class="tab fadeInUp animated" id="tent_camping">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="front/assets/images/resources/tab-1-1.jpg" alt="travel">
                                    <div class="tab-one__content__icon"><span class="icon-tent-1"></span></div>
                                </div>
                                <h4 class="tab-one__content__title">Tent Camping</h4>
                                <p class="tab-one__content__text">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteradution in some form by injected humour, some form
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>Most Adventure Tour Ever</li>
                                    <li><span class="far fa-check-circle"></span>Real Tour Starts from Here</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated active-tab" id="adventure_travel">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="front/assets/images/resources/tab-1-2.jpg" alt="travel">
                                    <div class="tab-one__content__icon"><span class="icon-traveling-1"></span></div>
                                </div>
                                <h4 class="tab-one__content__title">Adventure Travel</h4>
                                <p class="tab-one__content__text">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteradution in some form by injected humour, some form
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>Most Adventure Tour Ever</li>
                                    <li><span class="far fa-check-circle"></span>Real Tour Starts from Here</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="mountain_biking">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="front/assets/images/resources/tab-1-3.jpg" alt="travel">
                                    <div class="tab-one__content__icon"><span class="icon-mountain-bike-1"></span></div>
                                </div>
                                <h4 class="tab-one__content__title">Mountain Biking</h4>
                                <p class="tab-one__content__text">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteradution in some form by injected humour, some form
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>Most Adventure Tour Ever</li>
                                    <li><span class="far fa-check-circle"></span>Real Tour Starts from Here</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="discovery_world">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="front/assets/images/resources/tab-1-4.jpg" alt="travel">
                                    <div class="tab-one__content__icon"><span class="icon-world-1"></span></div>
                                </div>
                                <h4 class="tab-one__content__title">Discovery World</h4>
                                <p class="tab-one__content__text">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteradution in some form by injected humour, some form
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>Most Adventure Tour Ever</li>
                                    <li><span class="far fa-check-circle"></span>Real Tour Starts from Here</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="fishing_swimming">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="front/assets/images/resources/tab-1-5.jpg" alt="travel">
                                    <div class="tab-one__content__icon"><span class="icon-fishing-net-1"></span></div>
                                </div>
                                <h4 class="tab-one__content__title">Fishing & Swimming</h4>
                                <p class="tab-one__content__text">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteradution in some form by injected humour, some form
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>Most Adventure Tour Ever</li>
                                    <li><span class="far fa-check-circle"></span>Real Tour Starts from Here</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="paragliding_tours">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="front/assets/images/resources/tab-1-6.jpg" alt="travel">
                                    <div class="tab-one__content__icon"><span class="icon-paragliding-1"></span></div>
                                </div>
                                <h4 class="tab-one__content__title">Paragliding Tours</h4>
                                <p class="tab-one__content__text">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteradution in some form by injected humour, some form
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>Most Adventure Tour Ever</li>
                                    <li><span class="far fa-check-circle"></span>Real Tour Starts from Here</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="client-carousel @@extraClassName">
            <div class="container">
                <h5 class="client-carousel__title"><span>2k + Brands Trust Us</span></h5>
                <div class="client-carousel__one trevlo-owl__carousel owl-theme owl-carousel" data-owl-options='{
        "items": 5,
        "margin": 65,
        "smartSpeed": 700,
        "loop":true,
        "autoplay": 6000,
        "nav":false,
        "dots":false,
        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
        "responsive":{
            "0":{
                "items":1,
                "margin": 0
            },
            "450":{
                "items":2,
                "margin": 0
            },
            "768":{
                "items":3,
                "margin": 40
            },
            "992":{
                "items": 4,
                "margin": 40
            },
            "1200":{
                "items": 5
            }
        }
        }'>
                    <div class="client-carousel__one__item">
                        <img class="client-carousel__one__item__normal" src="front/assets/images/resources/brand-2-normal.png" alt="trevlo">
                        <img class="client-carousel__one__item__hover" src="front/assets/images/resources/brand-2-hover.png" alt="trevlo">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img class="client-carousel__one__item__normal" src="front/assets/images/resources/brand-2-normal.png" alt="trevlo">
                        <img class="client-carousel__one__item__hover" src="front/assets/images/resources/brand-2-hover.png" alt="trevlo">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img class="client-carousel__one__item__normal" src="front/assets/images/resources/brand-2-normal.png" alt="trevlo">
                        <img class="client-carousel__one__item__hover" src="front/assets/images/resources/brand-2-hover.png" alt="trevlo">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img class="client-carousel__one__item__normal" src="front/assets/images/resources/brand-2-normal.png" alt="trevlo">
                        <img class="client-carousel__one__item__hover" src="front/assets/images/resources/brand-2-hover.png" alt="trevlo">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img class="client-carousel__one__item__normal" src="front/assets/images/resources/brand-2-normal.png" alt="trevlo">
                        <img class="client-carousel__one__item__hover" src="front/assets/images/resources/brand-2-hover.png" alt="trevlo">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img class="client-carousel__one__item__normal" src="front/assets/images/resources/brand-2-normal.png" alt="trevlo">
                        <img class="client-carousel__one__item__hover" src="front/assets/images/resources/brand-2-hover.png" alt="trevlo">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img class="client-carousel__one__item__normal" src="front/assets/images/resources/brand-2-normal.png" alt="trevlo">
                        <img class="client-carousel__one__item__hover" src="front/assets/images/resources/brand-2-hover.png" alt="trevlo">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img class="client-carousel__one__item__normal" src="front/assets/images/resources/brand-2-normal.png" alt="trevlo">
                        <img class="client-carousel__one__item__hover" src="front/assets/images/resources/brand-2-hover.png" alt="trevlo">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img class="client-carousel__one__item__normal" src="front/assets/images/resources/brand-2-normal.png" alt="trevlo">
                        <img class="client-carousel__one__item__hover" src="front/assets/images/resources/brand-2-hover.png" alt="trevlo">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img class="client-carousel__one__item__normal" src="front/assets/images/resources/brand-2-normal.png" alt="trevlo">
                        <img class="client-carousel__one__item__hover" src="front/assets/images/resources/brand-2-hover.png" alt="trevlo">
                    </div><!-- /.owl-slide-item-->
                </div><!-- /.thm-owl__slider -->
            </div><!-- /.container -->
        </div><!-- /.client-carousel -->
    </section>
    <!-- tab-section-end -->
    <!-- blog-one Start -->
    <div class="blog-one blog-one--home-two">
        <div class="container">
            <div class="sec-title text-center">

                <p class="sec-title__tagline">Articles</p><!-- /.sec-title__tagline -->

                <h2 class="sec-title__title">Latest News & Articles from<br> the Blog Posts</h2><!-- /.sec-title__title -->
            </div><!-- /.sec-title -->
            <div class="blog-page__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav owl-theme owl-carousel" data-owl-options='{
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
            "1200":{
                "items": 3
            }
        }
        }'>
                <div class="item">
                    <div class="blog-card">
                        <a href="blog-details-right.html" class="blog-card__image-link">
                            <img src="front/assets/images/blog/blog-1-7.jpg" alt="You Should See Things when visiting Japan" class="blog-card__image">
                            <div class="blog-card__overlay">
                                <span class="blog-card__plus icon-plus"></span>
                            </div><!-- /.blog-card__overlay -->
                        </a><!-- /.blog-card__image-link -->
                        <div class="blog-card__content">
                            <div class="blog-card__date">
                                <h4 class="blog-card__date-number">30</h4>
                                <h4 class="blog-card__date-month">aug</h4>
                            </div><!-- /.blog-card__date -->
                            <ul class="blog-card__meta">
                                <li>
                                    <span class="blog-card__meta-icon icon-user"></span>
                                    <span class="blog-card__meta-author">By Admin</span>
                                </li>
                                <li>
                                    <span class="blog-card__meta-icon icon-chat"></span>
                                    <span class="blog-card__meta-author">2 Comment</span>
                                </li>
                            </ul><!-- /.blog-card__meta -->
                            <h3 class="blog-card__title"><a href="blog-details-right.html">You Should See Things when visiting Japan</a></h3><!-- /.blog-card__title -->
                            <a href="blog-details-right.html" class="blog-card__link">
                                Read more
                                <i class="fas fa-arrow-right"></i>
                            </a><!-- /.blog-card__link -->
                        </div><!-- /.blog-card__content -->
                    </div><!-- /.blog-card -->
                </div><!-- /.col-md-6 col-xl-4 -->
                <div class="item">
                    <div class="blog-card">
                        <a href="blog-details-right.html" class="blog-card__image-link">
                            <img src="front/assets/images/blog/blog-1-8.jpg" alt="You Should See Things when visiting Japan" class="blog-card__image">
                            <div class="blog-card__overlay">
                                <span class="blog-card__plus icon-plus"></span>
                            </div><!-- /.blog-card__overlay -->
                        </a><!-- /.blog-card__image-link -->
                        <div class="blog-card__content">
                            <div class="blog-card__date">
                                <h4 class="blog-card__date-number">15</h4>
                                <h4 class="blog-card__date-month">sep</h4>
                            </div><!-- /.blog-card__date -->
                            <ul class="blog-card__meta">
                                <li>
                                    <span class="blog-card__meta-icon icon-user"></span>
                                    <span class="blog-card__meta-author">By Admin</span>
                                </li>
                                <li>
                                    <span class="blog-card__meta-icon icon-chat"></span>
                                    <span class="blog-card__meta-author">2 Comment</span>
                                </li>
                            </ul><!-- /.blog-card__meta -->
                            <h3 class="blog-card__title"><a href="blog-details-right.html">You Should See Things when visiting Japan</a></h3><!-- /.blog-card__title -->
                            <a href="blog-details-right.html" class="blog-card__link">
                                Read more
                                <i class="fas fa-arrow-right"></i>
                            </a><!-- /.blog-card__link -->
                        </div><!-- /.blog-card__content -->
                    </div><!-- /.blog-card -->
                </div><!-- /.col-md-6 col-xl-4 -->
                <div class="item">
                    <div class="blog-card">
                        <a href="blog-details-right.html" class="blog-card__image-link">
                            <img src="front/assets/images/blog/blog-1-9.jpg" alt="You Should See Things when visiting Japan" class="blog-card__image">
                            <div class="blog-card__overlay">
                                <span class="blog-card__plus icon-plus"></span>
                            </div><!-- /.blog-card__overlay -->
                        </a><!-- /.blog-card__image-link -->
                        <div class="blog-card__content">
                            <div class="blog-card__date">
                                <h4 class="blog-card__date-number">12</h4>
                                <h4 class="blog-card__date-month">oct</h4>
                            </div><!-- /.blog-card__date -->
                            <ul class="blog-card__meta">
                                <li>
                                    <span class="blog-card__meta-icon icon-user"></span>
                                    <span class="blog-card__meta-author">By Admin</span>
                                </li>
                                <li>
                                    <span class="blog-card__meta-icon icon-chat"></span>
                                    <span class="blog-card__meta-author">2 Comment</span>
                                </li>
                            </ul><!-- /.blog-card__meta -->
                            <h3 class="blog-card__title"><a href="blog-details-right.html">You Should See Things when visiting Japan</a></h3><!-- /.blog-card__title -->
                            <a href="blog-details-right.html" class="blog-card__link">
                                Read more
                                <i class="fas fa-arrow-right"></i>
                            </a><!-- /.blog-card__link -->
                        </div><!-- /.blog-card__content -->
                    </div><!-- /.blog-card -->
                </div><!-- /.col-md-6 col-xl-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.blog-one -->
    <!-- blog-one End -->
    <section class="cta-one">
        <div class="container">
            <div class="cta-one__wrapper" style="background-image: url(front/assets/images/shapes/cta-bg-1.png);">
                <div class="cta-one__shape-one"><img src="front/assets/images/shapes/cta-1-shape-1.png" alt="trevlo"></div>
                <div class="cta-one__shape-two"><img src="front/assets/images/shapes/cta-1-shape-2.png" alt="trevlo"></div>
                <div class="cta-one__shape-three"><img src="front/assets/images/shapes/cta-1-shape-3.png" alt="trevlo"></div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="cta-one__content">
                            <h5 class="cta-one__sub-title">Special offer for you</h5>
                            <h3 class="cta-one__title">Start your Journey with a Single Click</h3>
                            <a href="contact.html" class="trevlo-btn trevlo-btn--primary"><span>Start Booking</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="200ms">
                        <div class="cta-one__thumb">
                            <img src="front/assets/images/resources/cta-1-1.jpg" alt="trevlo" />
                        </div><!-- /.cta-thumb-one -->
                    </div>
                </div>
                <div class="cta-one__counter" style="background-image: url(front/assets/images/shapes/cta-1-shape-offer.png);">
                    <div class="cta-one__counter__number count-box"><span class="count-text" data-stop="30" data-speed="1500"></span>%</div><!-- /.counter__number -->
                    <p class="cta-one__counter__title">Discount</p><!-- /.counter__title -->
                </div><!-- /.counter__offer -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 74 400">
                    <path d="M55.6658 499C38.0502 496.746 13.7298 478.248 16.6503 460.626C19.1286 445.639 31.7361 432.041 28.1883 417.28C24.7845 403.096 7.52885 394.769 6.12001 380.255C4.41296 362.571 27.2423 350.27 27.0366 332.504C26.8309 315.242 5.02996 303.826 5.46187 286.575C5.88349 269.549 27.7153 259.163 28.6305 242.148C29.7 222.385 2.11974 209.621 3.8268 189.899C5.36932 172.029 30.5227 161.324 28.1266 143.547C25.998 127.757 2.81902 120.068 3.42574 104.144C3.97077 89.548 24.7537 81.3544 24.0235 66.7687C23.6122 58.6369 16.5577 52.6975 10.4699 47.2935C4.39239 41.8894 -1.73656 34.3032 0.453818 26.4596C2.71618 18.3792 12.3826 15.0956 17.5347 8.47697C23.4168 0.901009 22.481 -10.3085 17.8226 -18.6977C15.262 -23.3194 11.7862 -27.2824 7.9299 -30.916C2.78817 -35.7539 2.73675 -43.9166 7.79622 -48.8471L8.97882 -50H58.7097C58.9874 -46.9326 60.3448 -43.9475 62.7717 -41.6726C66.8439 -37.8435 70.5151 -33.6643 73.2197 -28.7852C78.1249 -19.9329 58.5452 -8.10575 52.3339 -0.118046C46.9043 6.87119 41.3858 9.96675 39 18.5C36.6862 26.7759 38.4718 35.1369 44.8887 40.8395C51.3056 46.5421 58.7508 52.8005 59.1827 61.3852C59.954 76.7739 45.4646 85.9144 44.8887 101.313C44.2511 118.112 61.26 125.729 63.5121 142.384C66.0418 161.139 46.5135 174.067 44.8887 192.925C43.0891 213.738 65.1677 225.555 64.0468 246.42C63.0802 264.361 52.7864 276.353 52.3339 294.315C51.8712 312.514 62.1444 323.538 62.3603 341.737C62.5866 360.481 49.5985 375.51 51.3981 394.161C52.879 409.478 59.9848 416.22 63.5841 431.177C67.3272 446.761 54.0204 461.11 51.3981 476.91C50.1436 484.538 51.8815 492.309 55.6658 499Z" />
                </svg><!-- /.middle-white-svg -->
            </div>
        </div><!-- /.container -->
    </section><!-- /.cta-one -->
    @include('front.partials.footer')

</div><!-- /.page-wrapper -->

@endsection
