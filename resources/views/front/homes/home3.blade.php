@extends('front.layouts.main')

@section('content')
<div class="page-wrapper">
    <header class="main-header main-header--five sticky-header sticky-header--normal sticky-header--five">
        <div class="container">
            <div class="main-header__inner">
                <div class="main-header__logo">
                    <a href="{{ route('front.home') }}">
                        <img src="{{ asset('storage/' . ($settings['logo_light'] )) }}" alt="{{ $settings['site_name'] }}" width="187" class="main-header__logo__1">
                        <img src="{{ asset('storage/' . ($settings['logo_dark'] )) }}" alt="{{ $settings['site_name'] }}" width="187" class="main-header__logo__2">
                    </a>
                </div><!-- /.main-header__logo -->
                <div class="main-header__right">
                    @include('front.partials.navbar')
                    <div class="mobile-nav__btn mobile-nav__toggler">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- /.mobile-nav__toggler -->
                    <a href="index-5.html#" class="search-toggler main-header__search">
                        <i class="trevlo-one-icon-search" aria-hidden="true"></i>
                        <span class="sr-only">Search</span>
                    </a><!-- /.search-toggler -->
                    <a href="cart.html" class="main-header__cart">
                        <i class="trevlo-one-icon-cart" aria-hidden="true"></i>
                        <span class="sr-only">Shopping Cart</span>
                    </a><!-- /.search-toggler -->
                    <a href="tour-listing-side-filter-right.html" class="main-header__button trevlo-btn trevlo-btn--two trevlo-btn--base">
                        <span>Start Booking</span>
                        <i class="trevlo-one-icon-up-right-arrow"></i>
                    </a>
                </div><!-- /.main-header__right -->
            </div><!-- /.main-header__inner -->
        </div><!-- /.container-fluid -->
    </header><!-- /.main-header -->

    <!-- main-slider-start -->
    <section class="main-slider-five">
        <div class="main-slider-five__carousel trevlo-owl__carousel owl-carousel owl-theme" data-owl-options='{
    "items": 1,
    "margin": 0,
    "loop": true,
    "smartSpeed": 700,
    "animateOut": "fadeOut",
    "autoplayTimeout": 5000,
    "nav": true,
    "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
    "dots": false,
    "autoplay": true
    }'>
            <div class="item">
                <div class="main-slider-five__image" style="background-image: url(front/assets/images/backgrounds/slider-5-1.jpg);"></div>
                <div class="social-links">
                    <a href="https://facebook.com">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        <span class="sr-only">Facebook</span>
                    </a>
                    <a href="https://twitter.com">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                        <span class="sr-only">Twitter</span>
                    </a>
                    <a href="https://instagram.com">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <a href="https://youtube.com">
                        <i class="fab fa-youtube" aria-hidden="true"></i>
                        <span class="sr-only">Youtube</span>
                    </a>

                </div><!-- /.social-links -->
                <div class="container">
                    <div class="row gutter-y-50">
                        <div class="col-lg-10 mx-auto">
                            <div class="main-slider-five__content">
                                <h5 class="main-slider-five__sub-title">your best adventure partner</h5>
                                <h3 class="main-slider-five__title">Embark on Your Next <br>
                                    Adventure with Us!</h3>
                                <div class="main-slider-five__button">
                                    <a href="tour-listing-side-filter-right.html" class="trevlo-btn trevlo-btn--two trevlo-btn--base">
                                        <span>Start Booking</span>
                                        <i class="trevlo-one-icon-up-right-arrow"></i>
                                    </a><!-- /.trevlo-btn -->
                                </div><!-- /.main-slider-five__button -->
                            </div><!-- /.main-slider-five__content -->
                        </div><!-- /.col-lg-10 mx-auto -->
                    </div><!-- /.row -->
                </div>
                <img src="front/assets/images/shapes/slider-cloud-5-1.png" alt="cloud" class="main-slider-five__cloud">
                <div class="main-slider-five__shape">
                    <img src="front/assets/images/shapes/slider-shape-5-2.png" alt="shape" class="main-slider-five__shape__one">
                    <img src="front/assets/images/shapes/slider-shape-5-3.png" alt="shape" class="main-slider-five__shape__two">
                </div><!-- /.main-slider-five__shape -->
            </div><!-- item -->
            <div class="item">
                <div class="main-slider-five__image" style="background-image: url(front/assets/images/backgrounds/slider-5-2.jpg);"></div>
                <div class="social-links">
                    <a href="https://facebook.com">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        <span class="sr-only">Facebook</span>
                    </a>
                    <a href="https://twitter.com">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                        <span class="sr-only">Twitter</span>
                    </a>
                    <a href="https://instagram.com">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <a href="https://youtube.com">
                        <i class="fab fa-youtube" aria-hidden="true"></i>
                        <span class="sr-only">Youtube</span>
                    </a>

                </div><!-- /.social-links -->
                <div class="container">
                    <div class="row gutter-y-50">
                        <div class="col-lg-10 mx-auto">
                            <div class="main-slider-five__content">
                                <h5 class="main-slider-five__sub-title">your best adventure partner</h5>
                                <h3 class="main-slider-five__title">Experience the World <br> with trevlo Company</h3>
                                <div class="main-slider-five__button">
                                    <a href="tour-listing-side-filter-right.html" class="trevlo-btn trevlo-btn--two trevlo-btn--base">
                                        <span>Start Booking</span>
                                        <i class="trevlo-one-icon-up-right-arrow"></i>
                                    </a><!-- /.trevlo-btn -->
                                </div><!-- /.main-slider-five__button -->
                            </div><!-- /.main-slider-five__content -->
                        </div><!-- /.col-lg-10 mx-auto -->
                    </div><!-- /.row -->
                </div>
                <img src="front/assets/images/shapes/slider-cloud-5-1.png" alt="cloud" class="main-slider-five__cloud">
                <div class="main-slider-five__shape">
                    <img src="front/assets/images/shapes/slider-shape-5-2.png" alt="shape" class="main-slider-five__shape__one">
                    <img src="front/assets/images/shapes/slider-shape-5-3.png" alt="shape" class="main-slider-five__shape__two">
                </div><!-- /.main-slider-five__shape -->
            </div><!-- item -->
            <div class="item">
                <div class="main-slider-five__image" style="background-image: url(front/assets/images/backgrounds/slider-5-3.jpg);"></div>
                <div class="social-links">
                    <a href="https://facebook.com">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        <span class="sr-only">Facebook</span>
                    </a>
                    <a href="https://twitter.com">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                        <span class="sr-only">Twitter</span>
                    </a>
                    <a href="https://instagram.com">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <a href="https://youtube.com">
                        <i class="fab fa-youtube" aria-hidden="true"></i>
                        <span class="sr-only">Youtube</span>
                    </a>

                </div><!-- /.social-links -->
                <div class="container">
                    <div class="row gutter-y-50">
                        <div class="col-lg-10 mx-auto">
                            <div class="main-slider-five__content">
                                <h5 class="main-slider-five__sub-title">your best adventure partner</h5>
                                <h3 class="main-slider-five__title">Amazing tour places <br> around the world</h3>
                                <div class="main-slider-five__button">
                                    <a href="tour-listing-side-filter-right.html" class="trevlo-btn trevlo-btn--two trevlo-btn--base">
                                        <span>Start Booking</span>
                                        <i class="trevlo-one-icon-up-right-arrow"></i>
                                    </a><!-- /.trevlo-btn -->
                                </div><!-- /.main-slider-five__button -->
                            </div><!-- /.main-slider-five__content -->
                        </div><!-- /.col-lg-10 mx-auto -->
                    </div><!-- /.row -->
                </div>
                <img src="front/assets/images/shapes/slider-cloud-5-1.png" alt="cloud" class="main-slider-five__cloud">
                <div class="main-slider-five__shape">
                    <img src="front/assets/images/shapes/slider-shape-5-2.png" alt="shape" class="main-slider-five__shape__one">
                    <img src="front/assets/images/shapes/slider-shape-5-3.png" alt="shape" class="main-slider-five__shape__two">
                </div><!-- /.main-slider-five__shape -->
            </div><!-- item -->
        </div><!-- banner-slider -->
        <div class="banner-form banner-form--two banner-form--three wow fadeInUp" data-wow-delay="300ms">
            <div class="container">
                <form class="banner-form__wrapper" action="tour-listing-top-search.html">
                    <div class="row">
                        <div class="banner-form__col banner-form__col--1">
                            <div class="banner-form__control banner-form__control--location">
                                <div class="banner-form__icon">
                                    <span class="trevlo-one-icon-location"></span>
                                </div><!-- /.banner-form__icon -->
                                <label for="location">Location</label>
                                <select name="location" class="selectpicker" id="location">
                                    <option value="select">Australia</option>
                                    <option value="spain">Spain</option>
                                    <option value="africa">Africa</option>
                                    <option value="europe">Europe</option>
                                    <option value="thailand">Thailand</option>
                                    <option value="dubai">Dubai</option>
                                    <option value="swizerlan">Swizerlan</option>
                                </select>
                            </div>
                        </div>
                        <div class="banner-form__col banner-form__col--2">
                            <div class="banner-form__control banner-form__control--type">
                                <div class="banner-form__icon">
                                    <span class="trevlo-one-icon-bag"></span>
                                </div><!-- /.banner-form__icon -->
                                <label for="type">Activities Type</label>
                                <select name="type" class="selectpicker" id="type">
                                    <option value="select">Adventure</option>
                                    <option value="africa">Beach</option>
                                    <option value="europe">Discovery</option>
                                    <option value="thailand">Mountain</option>
                                    <option value="dubai">Hills</option>
                                    <option value="australia">Couple</option>
                                </select>
                            </div>
                        </div>
                        <div class="banner-form__col banner-form__col--3">
                            <div class="banner-form__control">
                                <div class="banner-form__icon">
                                    <span class="trevlo-one-icon-clock"></span>
                                </div><!-- /.banner-form__icon -->
                                <label for="date">Activate Day</label>
                                <input class="trevlo-multi-datepicker" id="date" type="text" name="date" placeholder="Select Date">
                                <span class="trevlo-one-icon-chevron-down banner-form__datepicker-icon"></span>
                            </div>
                        </div>
                        <div class="banner-form__col banner-form__col--4">
                            <div class="banner-form__control banner-form__control--traveler">
                                <div class="banner-form__icon">
                                    <span class="trevlo-one-icon-people"></span>
                                </div><!-- /.banner-form__icon -->
                                <label for="guests">Traveler</label>
                                <button class="banner-form__qty-minus sub">
                                    <i class="trevlo-one-icon-chevron-up"></i>
                                </button>
                                <input id="guests" type="number" value="2" name="guests" placeholder="2">
                                <button class="banner-form__qty-plus add">
                                    <i class="trevlo-one-icon-chevron-down"></i>
                                </button>
                            </div>
                        </div>
                        <div class="banner-form__col banner-form__col--5">
                            <button type="submit" aria-label="search submit" class="trevlo-btn trevlo-btn--base">
                                <span>Search</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- banner-form -->
    </section>
    <!-- main-slider-end -->

    <section class="about-six section-space">
        <div class="container">
            <div class="row gutter-y-50">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                    <div class="about-six__image">
                        <div class="about-six__image__one">
                            <img src="front/assets/images/about/about-6-1.jpg" alt="about">
                            <div class="about-six__experience">
                                <div class="about-six__experience__year">20+</div><!-- /.about-six__experience__year -->
                                <div class="about-six__experience__text">years of <br> experience</div>
                                <!-- /.about-six__experience__text -->
                            </div><!-- /.about-six__experience -->
                        </div><!-- /.about-six__image__one -->
                        <div class="about-six__image__two">
                            <img src="front/assets/images/about/about-6-2.jpg" alt="about">
                            <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="video-btn video-popup">
                                <i class="fas fa-play"></i>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div><!-- /.about-six__image__two -->
                    </div><!-- /.about-six__image -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="about-six__content">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">About Us</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">Experience the World <br> with Our trevio Company</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <p class="about-six__text wow fadeInUp" data-wow-duration="1500ms">It is a long established fact
                            that a reader will be distracted the readable content of a page when looking at layout the point
                            of using lorem the is Ipsum less normal distribution of letters.</p><!-- /.about-six__text -->
                        <div class="about-six__inner">
                            <div class="about-six__box wow fadeInUp" data-wow-duration="1500ms">
                                <div class="about-six__box__icon"><span class="trevlo-one-icon-hard-hat"></span></div>
                                <div class="about-six__box__content">
                                    <h3 class="about-six__box__title">Safety first always</h3>
                                    <p class="about-six__box__text">There are many variations of passages of Lorem Ipsum
                                        available, but the majority have suffere</p>
                                </div><!-- /.about-six__box__content -->
                            </div><!-- /.about-box -->
                            <div class="about-six__box wow fadeInUp" data-wow-duration="1500ms">
                                <div class="about-six__box__icon"><span class="trevlo-one-icon-low-price"></span></div>
                                <div class="about-six__box__content">
                                    <h3 class="about-six__box__title">Low price & friendly</h3>
                                    <p class="about-six__box__text">Travel agency Company also impressed us with their transpa regarding, Flexible Classes refers</p>
                                </div><!-- /.about-six__box__content -->
                            </div><!-- /.about-box -->
                        </div><!-- /.about-six__inner -->
                        <div class="about-six__bottom wow fadeInUp" data-wow-duration="1500ms">
                            <a href="about.html" class="trevlo-btn trevlo-btn--two trevlo-btn--base">
                                <span>more about us</span>
                                <i class="trevlo-one-icon-up-right-arrow"></i>
                            </a><!-- /.trevlo-btn -->
                            <div class="about-six__phone">
                                <div class="about-six__phone__icon">
                                    <span class="trevlo-one-icon-telephone"></span>
                                </div>
                                <div class="about-six__phone__text">
                                    <p class="about-six__phone__title">Call Us Now</p>
                                    <h4 class="about-six__phone__number"><a href="tel:+208-555-0112">+208-555-0112</a></h4>
                                </div>
                            </div><!-- /.about-six__phone -->
                        </div><!-- /.about-five__bottom -->
                    </div><!-- /.about-six__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row gutter-y-40 -->
        </div><!-- /.container -->
        <img src="front/assets/images/shapes/about-mountain-6-1.png" alt="mountain" class="about-six__mountain">
        <img src="front/assets/images/shapes/about-parashoot-6-1.png" alt="mountain" class="about-six__parashoot">
    </section><!-- /.about-six section-space -->

    <section class="tour-listing-five section-space">
        <div class="container">
            <div class="tour-listing-five__top">
                <div class="row gutter-y-40 align-items-center">
                    <div class="col-lg-8">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">festered tours</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">Amazing tour places around <br> the world</h2><!-- /.sec-title__title -->
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
                            <div class="item">
                                <div class="tour-listing-five__card">
                                    <div class="tour-listing-five__card__bg" style="background-image: url(front/assets/images/shapes/tour-shape-bg-5-1.png);"></div>
                                    <!-- /.tour-listing-five__card__bg -->
                                    <div class="tour-listing-five__card__inner">
                                        <a href="tour-listing-details-right.html" class="tour-listing-five__card__image">
                                            <img src="front/assets/images/tours/tour-7-1.jpg" alt="tour">
                                            <div class="tour-listing-five__card__featured">featured</div>
                                            <div class="tour-listing-five__card__overlay">
                                                <span class="tour-listing-five__card__plus">
                                                    <i class="icon-plus"></i>
                                                </span>
                                            </div><!-- /.tour-listing-five__card__overlay -->
                                        </a><!-- /.tour-listing-five__card__image -->
                                        <div class="tour-listing-five__card__content">
                                            <div class="tour-listing-five__card__ratings">
                                                <div class="trevlo-ratings">
                                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                </div>
                                                <p class="tour-listing-five__card__ratings__text">4.9 (5)</p>
                                            </div><!-- /.tour-listing-five__card__ratings -->
                                            <h3 class="tour-listing-five__card__title">
                                                <a href="tour-listing-details-right.html">Discovery Island Kayak Tour</a>
                                            </h3><!-- /.tour-listing-five__card__title -->
                                            <div class="tour-listing-five__card__location">
                                                <span class="tour-listing-five__card__location__icon">
                                                    <i class="trevlo-one-icon-maps-and-flags"></i>
                                                </span><!-- /.tour-listing-five__card__location__icon -->
                                                <p class="tour-listing-five__card__location__text">Main Street Brooklyn,
                                                    2569 003 NY</p><!-- /.tour-listing-five__card__location__text -->
                                            </div><!-- /.tour-listing-five__card__location -->
                                            <div class="tour-listing-five__card__bottom">
                                                <div class="tour-listing-five__card__price-box">
                                                    <p class="tour-listing-five__card__price-title">form</p>
                                                    <!-- /.tour-listing-five__card__price-title -->
                                                    <h4 class="tour-listing-five__card__price">$169</h4>
                                                    <!-- /.tour-listing-five__card__price -->
                                                </div><!-- /.tour-listing-five__card__price-box -->
                                                <div class="tour-listing-five__card__btn-group">
                                                    <a href="javascript:void(0);" class="tour-listing-five__card__popup-btn tour-listing-five__card__popup-btn--camera trevlo-image-popup" data-gallery-options='{
                                                "items": [
                                                  {
                                                    "src": "front/assets/images/tours/tour-7-1.jpg"
                                                  },
                                                  {
                                                    "src": "front/assets/images/tours/tour-7-2.jpg"
                                                  },
                                                  {
                                                    "src": "front/assets/images/tours/tour-7-3.jpg"
                                                  }
                                                ],
                                                "gallery": {
                                                  "enabled": true
                                                },
                                                "type": "image"
                                            }'>
                                                        <span class="icon-photo-camera-1"></span>
                                                    </a>
                                                    <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="tour-listing-five__card__popup-btn video-popup">
                                                        <span class="icon-video-camera-1-1"></span>
                                                    </a>
                                                </div><!-- /.tour-listing-five__card__btn-group -->
                                            </div><!-- /.tour-listing-five__card__bottom -->
                                        </div><!-- /.tour-listing-five__card__content -->
                                    </div><!-- /.tour-listing-five__card__inner -->
                                </div><!-- /.tour-listing-five__card -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="tour-listing-five__card">
                                    <div class="tour-listing-five__card__bg" style="background-image: url(front/assets/images/shapes/tour-shape-bg-5-1.png);"></div>
                                    <!-- /.tour-listing-five__card__bg -->
                                    <div class="tour-listing-five__card__inner">
                                        <a href="tour-listing-details-right.html" class="tour-listing-five__card__image">
                                            <img src="front/assets/images/tours/tour-7-2.jpg" alt="tour">
                                            <div class="tour-listing-five__card__discount">30% off</div>
                                            <div class="tour-listing-five__card__overlay">
                                                <span class="tour-listing-five__card__plus">
                                                    <i class="icon-plus"></i>
                                                </span>
                                            </div><!-- /.tour-listing-five__card__overlay -->
                                        </a><!-- /.tour-listing-five__card__image -->
                                        <div class="tour-listing-five__card__content">
                                            <div class="tour-listing-five__card__ratings">
                                                <div class="trevlo-ratings">
                                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                </div>
                                                <p class="tour-listing-five__card__ratings__text">4.9 (5)</p>
                                            </div><!-- /.tour-listing-five__card__ratings -->
                                            <h3 class="tour-listing-five__card__title">
                                                <a href="tour-listing-details-right.html">Beautiful Floating Villa</a>
                                            </h3><!-- /.tour-listing-five__card__title -->
                                            <div class="tour-listing-five__card__location">
                                                <span class="tour-listing-five__card__location__icon">
                                                    <i class="trevlo-one-icon-maps-and-flags"></i>
                                                </span><!-- /.tour-listing-five__card__location__icon -->
                                                <p class="tour-listing-five__card__location__text">6391 Elgin St. Celina, Delaware</p><!-- /.tour-listing-five__card__location__text -->
                                            </div><!-- /.tour-listing-five__card__location -->
                                            <div class="tour-listing-five__card__bottom">
                                                <div class="tour-listing-five__card__price-box">
                                                    <p class="tour-listing-five__card__price-title">form</p>
                                                    <!-- /.tour-listing-five__card__price-title -->
                                                    <h4 class="tour-listing-five__card__price">$180</h4>
                                                    <!-- /.tour-listing-five__card__price -->
                                                </div><!-- /.tour-listing-five__card__price-box -->
                                                <div class="tour-listing-five__card__btn-group">
                                                    <a href="javascript:void(0);" class="tour-listing-five__card__popup-btn tour-listing-five__card__popup-btn--camera trevlo-image-popup" data-gallery-options='{
                                                "items": [
                                                  {
                                                    "src": "front/assets/images/tours/tour-7-2.jpg"
                                                  },
                                                  {
                                                    "src": "front/assets/images/tours/tour-7-3.jpg"
                                                  },
                                                  {
                                                    "src": "front/assets/images/tours/tour-7-4.jpg"
                                                  }
                                                ],
                                                "gallery": {
                                                  "enabled": true
                                                },
                                                "type": "image"
                                            }'>
                                                        <span class="icon-photo-camera-1"></span>
                                                    </a>
                                                    <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="tour-listing-five__card__popup-btn video-popup">
                                                        <span class="icon-video-camera-1-1"></span>
                                                    </a>
                                                </div><!-- /.tour-listing-five__card__btn-group -->
                                            </div><!-- /.tour-listing-five__card__bottom -->
                                        </div><!-- /.tour-listing-five__card__content -->
                                    </div><!-- /.tour-listing-five__card__inner -->
                                </div><!-- /.tour-listing-five__card -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="tour-listing-five__card">
                                    <div class="tour-listing-five__card__bg" style="background-image: url(front/assets/images/shapes/tour-shape-bg-5-1.png);"></div>
                                    <!-- /.tour-listing-five__card__bg -->
                                    <div class="tour-listing-five__card__inner">
                                        <a href="tour-listing-details-right.html" class="tour-listing-five__card__image">
                                            <img src="front/assets/images/tours/tour-7-3.jpg" alt="tour">
                                            <div class="tour-listing-five__card__featured">featured</div>
                                            <div class="tour-listing-five__card__overlay">
                                                <span class="tour-listing-five__card__plus">
                                                    <i class="icon-plus"></i>
                                                </span>
                                            </div><!-- /.tour-listing-five__card__overlay -->
                                        </a><!-- /.tour-listing-five__card__image -->
                                        <div class="tour-listing-five__card__content">
                                            <div class="tour-listing-five__card__ratings">
                                                <div class="trevlo-ratings">
                                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                </div>
                                                <p class="tour-listing-five__card__ratings__text">4.9 (5)</p>
                                            </div><!-- /.tour-listing-five__card__ratings -->
                                            <h3 class="tour-listing-five__card__title">
                                                <a href="tour-listing-details-right.html">Visit The Maldives. Topping
                                                    the</a>
                                            </h3><!-- /.tour-listing-five__card__title -->
                                            <div class="tour-listing-five__card__location">
                                                <span class="tour-listing-five__card__location__icon">
                                                    <i class="trevlo-one-icon-maps-and-flags"></i>
                                                </span><!-- /.tour-listing-five__card__location__icon -->
                                                <p class="tour-listing-five__card__location__text">New York. USA, 2569 003 NY</p><!-- /.tour-listing-five__card__location__text -->
                                            </div><!-- /.tour-listing-five__card__location -->
                                            <div class="tour-listing-five__card__bottom">
                                                <div class="tour-listing-five__card__price-box">
                                                    <p class="tour-listing-five__card__price-title">form</p>
                                                    <!-- /.tour-listing-five__card__price-title -->
                                                    <h4 class="tour-listing-five__card__price">$120</h4>
                                                    <!-- /.tour-listing-five__card__price -->
                                                </div><!-- /.tour-listing-five__card__price-box -->
                                                <div class="tour-listing-five__card__btn-group">
                                                    <a href="javascript:void(0);" class="tour-listing-five__card__popup-btn tour-listing-five__card__popup-btn--camera trevlo-image-popup" data-gallery-options='{
                                                "items": [
                                                  {
                                                    "src": "front/assets/images/tours/tour-7-3.jpg"
                                                  },
                                                  {
                                                    "src": "front/assets/images/tours/tour-7-4.jpg"
                                                  },
                                                  {
                                                    "src": "front/assets/images/tours/tour-7-1.jpg"
                                                  }
                                                ],
                                                "gallery": {
                                                  "enabled": true
                                                },
                                                "type": "image"
                                            }'>
                                                        <span class="icon-photo-camera-1"></span>
                                                    </a>
                                                    <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="tour-listing-five__card__popup-btn video-popup">
                                                        <span class="icon-video-camera-1-1"></span>
                                                    </a>
                                                </div><!-- /.tour-listing-five__card__btn-group -->
                                            </div><!-- /.tour-listing-five__card__bottom -->
                                        </div><!-- /.tour-listing-five__card__content -->
                                    </div><!-- /.tour-listing-five__card__inner -->
                                </div><!-- /.tour-listing-five__card -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="tour-listing-five__card">
                                    <div class="tour-listing-five__card__bg" style="background-image: url(front/assets/images/shapes/tour-shape-bg-5-1.png);"></div>
                                    <!-- /.tour-listing-five__card__bg -->
                                    <div class="tour-listing-five__card__inner">
                                        <a href="tour-listing-details-right.html" class="tour-listing-five__card__image">
                                            <img src="front/assets/images/tours/tour-7-4.jpg" alt="tour">
                                            <div class="tour-listing-five__card__featured">featured</div>
                                            <div class="tour-listing-five__card__overlay">
                                                <span class="tour-listing-five__card__plus">
                                                    <i class="icon-plus"></i>
                                                </span>
                                            </div><!-- /.tour-listing-five__card__overlay -->
                                        </a><!-- /.tour-listing-five__card__image -->
                                        <div class="tour-listing-five__card__content">
                                            <div class="tour-listing-five__card__ratings">
                                                <div class="trevlo-ratings">
                                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                </div>
                                                <p class="tour-listing-five__card__ratings__text">4.9 (5)</p>
                                            </div><!-- /.tour-listing-five__card__ratings -->
                                            <h3 class="tour-listing-five__card__title">
                                                <a href="tour-listing-details-right.html">Barcelona, Spain. With
                                                    incredible</a>
                                            </h3><!-- /.tour-listing-five__card__title -->
                                            <div class="tour-listing-five__card__location">
                                                <span class="tour-listing-five__card__location__icon">
                                                    <i class="trevlo-one-icon-maps-and-flags"></i>
                                                </span><!-- /.tour-listing-five__card__location__icon -->
                                                <p class="tour-listing-five__card__location__text">30 Commercial Road, Australia</p><!-- /.tour-listing-five__card__location__text -->
                                            </div><!-- /.tour-listing-five__card__location -->
                                            <div class="tour-listing-five__card__bottom">
                                                <div class="tour-listing-five__card__price-box">
                                                    <p class="tour-listing-five__card__price-title">form</p>
                                                    <!-- /.tour-listing-five__card__price-title -->
                                                    <h4 class="tour-listing-five__card__price">$140</h4>
                                                    <!-- /.tour-listing-five__card__price -->
                                                </div><!-- /.tour-listing-five__card__price-box -->
                                                <div class="tour-listing-five__card__btn-group">
                                                    <a href="javascript:void(0);" class="tour-listing-five__card__popup-btn tour-listing-five__card__popup-btn--camera trevlo-image-popup" data-gallery-options='{
                                                "items": [
                                                  {
                                                    "src": "front/assets/images/tours/tour-7-4.jpg"
                                                  },
                                                  {
                                                    "src": "front/assets/images/tours/tour-7-1.jpg"
                                                  },
                                                  {
                                                    "src": "front/assets/images/tours/tour-7-2.jpg"
                                                  }
                                                ],
                                                "gallery": {
                                                  "enabled": true
                                                },
                                                "type": "image"
                                            }'>
                                                        <span class="icon-photo-camera-1"></span>
                                                    </a>
                                                    <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="tour-listing-five__card__popup-btn video-popup">
                                                        <span class="icon-video-camera-1-1"></span>
                                                    </a>
                                                </div><!-- /.tour-listing-five__card__btn-group -->
                                            </div><!-- /.tour-listing-five__card__bottom -->
                                        </div><!-- /.tour-listing-five__card__content -->
                                    </div><!-- /.tour-listing-five__card__inner -->
                                </div><!-- /.tour-listing-five__card -->
                            </div><!-- /.item -->
                        </div><!-- /.tour-listing-five__carousel -->
                    </div><!-- /.trevlo-stretch-element-inside-column -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <img src="front/assets/images/shapes/tour-shape-5-1.png" alt="shape" class="tour-listing-five__shape">
    </section><!-- /.tour-listing-five section-space -->

    <section class="feature-two section-space-bottom">
        <div class="container">
            <div class="feature-two__inner" style="background-image: url(front/assets/images/backgrounds/feature-bg-2-1.jpg);">
                <div class="feature-two__wrapper">
                    <div class="sec-title sec-title--two text-center">

                        <p class="sec-title__tagline">special features</p><!-- /.sec-title__tagline -->

                        <h2 class="sec-title__title">our tours features</h2><!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                    <div class="row gutter-y-30">
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <div class="feature-two__item">
                                <div class="feature-two__icon">
                                    <span class="trevlo-one-icon-secure-payment"></span>
                                </div><!-- /.feature-two__icon -->
                                <h3 class="feature-two__title">Best Security</h3><!-- /.feature-two__title -->
                            </div><!-- /.feature-two__item -->
                        </div><!-- /.col-xl-3 col-lg-4 col-md-6 -->
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                            <div class="feature-two__item">
                                <div class="feature-two__icon">
                                    <span class="trevlo-one-icon-wifi"></span>
                                </div><!-- /.feature-two__icon -->
                                <h3 class="feature-two__title">Free Internet</h3><!-- /.feature-two__title -->
                            </div><!-- /.feature-two__item -->
                        </div><!-- /.col-xl-3 col-lg-4 col-md-6 -->
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="400ms">
                            <div class="feature-two__item">
                                <div class="feature-two__icon">
                                    <span class="trevlo-one-icon-solar-panel"></span>
                                </div><!-- /.feature-two__icon -->
                                <h3 class="feature-two__title">Solar Energy</h3><!-- /.feature-two__title -->
                            </div><!-- /.feature-two__item -->
                        </div><!-- /.col-xl-3 col-lg-4 col-md-6 -->
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="600ms">
                            <div class="feature-two__item">
                                <div class="feature-two__icon">
                                    <span class="trevlo-one-icon-bicycle-rider"></span>
                                </div><!-- /.feature-two__icon -->
                                <h3 class="feature-two__title">hills Biking</h3><!-- /.feature-two__title -->
                            </div><!-- /.feature-two__item -->
                        </div><!-- /.col-xl-3 col-lg-4 col-md-6 -->
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <div class="feature-two__item">
                                <div class="feature-two__icon">
                                    <span class="trevlo-one-icon-swimming"></span>
                                </div><!-- /.feature-two__icon -->
                                <h3 class="feature-two__title">Swim & Fishing</h3><!-- /.feature-two__title -->
                            </div><!-- /.feature-two__item -->
                        </div><!-- /.col-xl-3 col-lg-4 col-md-6 -->
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                            <div class="feature-two__item">
                                <div class="feature-two__icon">
                                    <span class="trevlo-one-icon-gps"></span>
                                </div><!-- /.feature-two__icon -->
                                <h3 class="feature-two__title">proper guide</h3><!-- /.feature-two__title -->
                            </div><!-- /.feature-two__item -->
                        </div><!-- /.col-xl-3 col-lg-4 col-md-6 -->
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="400ms">
                            <div class="feature-two__item">
                                <div class="feature-two__icon">
                                    <span class="trevlo-one-icon-buddhist-yoga-pose"></span>
                                </div><!-- /.feature-two__icon -->
                                <h3 class="feature-two__title">GYM and Yoga</h3><!-- /.feature-two__title -->
                            </div><!-- /.feature-two__item -->
                        </div><!-- /.col-xl-3 col-lg-4 col-md-6 -->
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="600ms">
                            <div class="feature-two__item">
                                <div class="feature-two__icon">
                                    <span class="trevlo-one-icon-hiking"></span>
                                </div><!-- /.feature-two__icon -->
                                <h3 class="feature-two__title">long hikes</h3><!-- /.feature-two__title -->
                            </div><!-- /.feature-two__item -->
                        </div><!-- /.col-xl-3 col-lg-4 col-md-6 -->
                    </div><!-- /.row -->
                    <div class="feature-two__bottom">
                        <div class="feature-two__bottom__bg" style="background-image: url(front/assets/images/shapes/feature-author-bg-2-1.png);"></div>
                        <!-- /.feature-two__bottom__bg -->
                        <div class="feature-two__author">
                            <div class="feature-two__author__image">
                                <img src="front/assets/images/resources/author-1.png" alt="author">
                                <img src="front/assets/images/resources/author-2.png" alt="author">
                                <img src="front/assets/images/resources/author-3.png" alt="author">
                                <img src="front/assets/images/resources/author-4.png" alt="author">
                            </div><!-- /.feature-two__author__image -->
                            <div class="feature-two__author__text">
                                <h3 class="feature-two__author__total">38K +</h3><!-- /.feature-two__author__total -->
                                <h3 class="feature-two__author__title">Satisfied Customers</h3>
                                <!-- /.feature-two__author__title -->
                            </div><!-- /.feature-two__author__text -->
                        </div><!-- /.feature-two__author -->
                        <div class="feature-two__button">
                            <div class="feature-two__image">
                                <div class="feature-two__image__inner">
                                    <img src="front/assets/images/resources/feature-author-image-2-1.jpg" alt="feature author">
                                </div><!-- /.feature-two__image__inner -->
                            </div><!-- /.feature-two__image -->
                            <a href="contact.html" class="trevlo-btn trevlo-btn--two trevlo-btn--white">
                                <span>get started</span>
                                <i class="trevlo-one-icon-up-right-arrow"></i>
                            </a><!-- /.trevlo-btn -->
                        </div><!-- /.feature-two__button -->
                    </div><!-- /.feature-two__top -->
                </div><!-- /.feature-two__wrapper -->
            </div><!-- /.feature-two__inner -->
        </div><!-- /.container -->
    </section><!-- /.feature-two section-space-bottom -->

    <section class="destination-five section-space">
        <div class="destination-five__bg" style="background-image: url(front/assets/images/shapes/destination-bg-5-1.png);"></div>
        <!-- /.destination-five__bg -->
        <div class="container">
            <div class="destination-five__top">
                <div class="row gutter-y-40 align-items-center">
                    <div class="col-xl-6">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">top destinations</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">popular top destination in <br> the world</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                    </div><!-- /.col-xl-6 -->
                    <div class="col-xl-6">
                        <ul class="list-unstyled destination-five__filter-list owl-filter-bar">
                            <li class="item active" data-owl-filter="*">All</li>
                            <li class="item" data-owl-filter=".india">india</li>
                            <li class="item" data-owl-filter=".maldives">Maldives</li>
                            <li class="item" data-owl-filter=".mauritius">Mauritius</li>
                            <li class="item" data-owl-filter=".egypt">Egypt</li>
                            <li class="item" data-owl-filter=".switzerland">Switzerland</li>
                        </ul><!-- /.list-unstyledf -->
                    </div><!-- /.col-xl-6 -->
                </div><!-- /.row gutter-y-40 -->
            </div><!-- /.destination-five__top -->
        </div><!-- /.container -->
        <div class="container-fluid">
            <div class="destination-five__carousel trevlo-owl__carousel--filter trevlo-owl__carousel--basic-nav owl-carousel trevlo-owl__carousel--with-shadow" data-owl-filters-div=".destination-five__filter-list" data-owl-options='{
        "loop": false,
        "items": 5,
        "autoplay": true,
        "smartSpeed": 600,
        "nav": false,
        "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
        "dots": true,
        "margin": 30,
        "responsive": {
            "0": {
                "items": 1
            },
            "500": {
                "items": 2
            },
            "768": {
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
                <div class="destination-five__card choice item india">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-1-1.jpg);">
                            <h4 class="destination-five__card__name">india</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-1-1.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">india</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item maldives">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-2-1.jpg);">
                            <h4 class="destination-five__card__name">Maldives</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-2-1.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Maldives</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item mauritius">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-3-1.jpg);">
                            <h4 class="destination-five__card__name">Mauritius</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-3-1.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Mauritius</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item egypt">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-4-1.jpg);">
                            <h4 class="destination-five__card__name">Egypt</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-4-1.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Egypt</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item switzerland">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-5-1.jpg);">
                            <h4 class="destination-five__card__name">Switzerland</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-5-1.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Switzerland</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item india">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-1-2.jpg);">
                            <h4 class="destination-five__card__name">india</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-1-2.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">india</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item maldives">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-2-2.jpg);">
                            <h4 class="destination-five__card__name">Maldives</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-2-2.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Maldives</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item mauritius">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-3-2.jpg);">
                            <h4 class="destination-five__card__name">Mauritius</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-3-2.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Mauritius</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item egypt">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-4-2.jpg);">
                            <h4 class="destination-five__card__name">Egypt</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-4-2.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Egypt</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item switzerland">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-5-2.jpg);">
                            <h4 class="destination-five__card__name">Switzerland</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-5-2.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Switzerland</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item india">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-1-3.jpg);">
                            <h4 class="destination-five__card__name">india</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-1-3.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">india</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item maldives">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-2-3.jpg);">
                            <h4 class="destination-five__card__name">Maldives</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-2-3.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Maldives</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item mauritius">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-3-3.jpg);">
                            <h4 class="destination-five__card__name">Mauritius</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-3-3.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Mauritius</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item egypt">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-4-3.jpg);">
                            <h4 class="destination-five__card__name">Egypt</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-4-3.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Egypt</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item switzerland">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-5-3.jpg);">
                            <h4 class="destination-five__card__name">Switzerland</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-5-3.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Switzerland</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item india">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-1-4.jpg);">
                            <h4 class="destination-five__card__name">india</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-1-4.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">india</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item maldives">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-2-4.jpg);">
                            <h4 class="destination-five__card__name">Maldives</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-2-4.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Maldives</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item mauritius">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-3-4.jpg);">
                            <h4 class="destination-five__card__name">Mauritius</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-3-4.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Mauritius</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item egypt">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-4-4.jpg);">
                            <h4 class="destination-five__card__name">Egypt</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-4-4.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Egypt</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item switzerland">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(front/assets/images/destination/destination-5-5-4.jpg);">
                            <h4 class="destination-five__card__name">Switzerland</h4><!-- /.destination-five__card__name -->
                        </div><!-- /.accordian-title -->
                        <div class="destination-five__card__content">
                            <a href="destination-details-right.html" class="destination-five__card__image" style="background-image: url(front/assets/images/destination/destination-5-5-4.jpg);"></a>
                            <!-- /.destination-five__card__image -->
                            <div class="destination-five__card__content__inner">
                                <h4 class="destination-five__card__country">Switzerland</h4>
                                <!-- /.destination-five__card__country -->
                                <h3 class="destination-five__card__title">
                                    <a href="destination-details-right.html">Explore Go Wilds Real Adventure & Travels</a>
                                </h3><!-- /.destination-five__card__title -->
                                <p class="destination-five__card__text">There are many variations of passs of Lorem Ipsum
                                    available, but the majority have suffere</p><!-- /.destination-five__card__text -->
                                <ul class="destination-five__card__list">
                                    <li>5 Tour+</li>
                                    <li>1 Hotel</li>
                                    <li>2 Activity</li>
                                </ul><!-- /.destination-five__card__list -->
                                <a href="tour-listing-1.html" class="trevlo-btn trevlo-btn--border">
                                    <span>get started</span>
                                    <i class="trevlo-one-icon-up-right-arrow"></i>
                                </a><!-- /.trevlo-btn -->
                            </div><!-- /.destination-five__card__content__inner -->
                        </div><!-- /.destination-five__card__content -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
            </div><!-- /.destination-five__carousel -->
        </div><!-- /.container-fluid -->
    </section><!-- /.destination-five section-space -->

    <section class="why-choose-five section-space">
        <div class="container">
            <div class="row gutter-y-40">
                <div class="col-lg-6">
                    <div class="trevlo-accrodion why-choose-five__faq" data-grp-name="why-choose-five__faq">
                        <div class="accrodion active wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>How long does it take to get a visa?</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>Bring to the table win-win survival strategies to ensure proactive domination. At the
                                        end of the day, going forward, a new normal that has evolved from generation X is on
                                        the</p>
                                </div>
                            </div>
                        </div>

                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>When is the best time to book flights?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Bring to the table win-win survival strategies to ensure proactive domination. At the
                                        end of the day, going forward, a new normal that has evolved from generation X is on
                                        the</p>
                                </div>
                            </div>
                        </div>

                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>How much luggage can I bring?</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>TBring to the table win-win survival strategies to ensure proactive domination. At
                                        the end of the day, going forward, a new normal that has evolved from generation X
                                        is on the</p>
                                </div>
                            </div>
                        </div>
                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>How can I protect my finances while traveling?</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>Bring to the table win-win survival strategies to ensure proactive domination. At the
                                        end of the day, going forward, a new normal that has evolved from generation X is on
                                        the</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.why-choose-five__faq -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="why-choose-five__content">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">get to know us</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">Why You Should Choose <br> Our Company</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <div class="why-choose-five__text-box wow fadeInUp" data-wow-duration="1500ms">
                            <p class="why-choose-five__text">There are many variations of passages of Lorem Ipsum available,
                                but the majority have suffered alteradution in some form by injected humour, or randomised
                                words which</p><!-- /.why-choose-five__text -->
                        </div><!-- /.why-choose-five__text-box -->
                        <div class="why-choose-five__inner">
                            <div class="why-choose-five__item wow fadeInUp" data-wow-duration="1500ms">
                                <div class="why-choose-five__item__left">
                                    <div class="why-choose-five__item__icon">
                                        <span class="trevlo-one-icon-check"></span>
                                    </div><!-- /.why-choose-five__item__icon -->
                                    <h3 class="why-choose-five__item__title">fast & easy process</h3>
                                    <!-- /.why-choose-five__item__title -->
                                </div><!-- /.why-choose-five__item__left -->
                                <div class="why-choose-five__item__right">
                                    <p class="why-choose-five__item__text">Travel agency Company also impressed us with their transpa regarding</p><!-- /.why-choose-five__item__text -->
                                </div><!-- /.why-choose-five__item__right -->
                            </div><!-- /.why-choose-five__item -->
                            <div class="why-choose-five__item wow fadeInUp" data-wow-duration="1500ms">
                                <div class="why-choose-five__item__left">
                                    <div class="why-choose-five__item__icon">
                                        <span class="trevlo-one-icon-check"></span>
                                    </div><!-- /.why-choose-five__item__icon -->
                                    <h3 class="why-choose-five__item__title">save your money</h3>
                                    <!-- /.why-choose-five__item__title -->
                                </div><!-- /.why-choose-five__item__left -->
                                <div class="why-choose-five__item__right">
                                    <p class="why-choose-five__item__text">Flexible Classes refers to the process of acquiring is knowledge free</p><!-- /.why-choose-five__item__text -->
                                </div><!-- /.why-choose-five__item__right -->
                            </div><!-- /.why-choose-five__item -->
                        </div><!-- /.why-choose-five__inner -->
                    </div><!-- /.why-choose-five__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.why-choose-five section-space -->

    <section class="offer-three section-space">
        <div class="offer-three__bg trevlo-jarallax" data-jarallax data-speed="0.30" style="background-image: url(front/assets/images/backgrounds/offer-bg-3-1.jpg);"></div>
        <!-- /.offer-three__bg -->
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-8">
                    <div class="offer-three__content">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">special offer</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">grab up to 50% off on <br> your favourite destination</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <p class="offer-three__text">There are many variations of passages of Lorem Ipsum available, but the
                            majority have suffered alteradution in some form by injected humour, or randomised words which
                        </p><!-- /.offer-three__text -->
                        <a href="tour-listing-side-filter-right.html" class="offer-three__btn trevlo-btn trevlo-btn--two trevlo-btn--white">
                            <span>Book now</span>
                            <i class="trevlo-one-icon-up-right-arrow"></i>
                        </a>
                    </div><!-- /.offer-three__content -->
                </div><!-- /.col-xl-6 col-lg-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="offer-three__image">
            <div class="offer-three__image__inner"></div><!-- /.offer-three__image__inner -->
            <img src="front/assets/images/offer/offer-3-1.png" alt="offer" class="offer-three__image__one">
        </div><!-- /.offer-three__image -->
        <img src="front/assets/images/shapes/offer-border-3-2.png" alt="border" class="offer-three__border-one">
        <img src="front/assets/images/shapes/offer-border-3-3.png" alt="border" class="offer-three__border-two">
    </section><!-- /.offer-three section-space -->

    <section class="testimonial-four section-space">
        <div class="testimonial-four__bg trevlo-jarallax" data-jarallax data-speed="0.30" style="background-image: url(front/assets/images/backgrounds/testimonial-bg-4-1.jpg);">
        </div><!-- /.testimonial-four__bg -->
        <div class="container">
            <div class="sec-title sec-title--two text-center">

                <p class="sec-title__tagline">our testimonials</p><!-- /.sec-title__tagline -->

                <h2 class="sec-title__title">what peoples say about trevlo</h2><!-- /.sec-title__title -->
            </div><!-- /.sec-title -->
            <!-- /.sec-title -->
            <div class="testimonial-four__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav owl-theme owl-carousel" data-owl-options='{
        "items": 3,
        "margin": 30,
        "smartSpeed": 700,
        "loop":true,
        "autoplay": 6000,
        "nav":true,
        "dots":false,
        "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
        "responsive":{
            "0":{
                "items": 1
            },
            "768":{
                "items": 1
            },
            "992":{
                "items": 2
            }
        }
        }'>
                <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="testimonials-card-four">
                        <div class="trevlo-ratings">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <p class="testimonials-card-four__quote">travel agency Company also impressed us with their transpa regarding costs. The <span>trevlo</span> initial quote was. There are many variations of passages, but the majority have suffered.</p><!-- /.testimonials-card-four__quote -->
                        <div class="testimonials-card-four__identity">
                            <h5 class="testimonials-card-four__identity__name">Michael G. Ware</h5>
                            <p class="testimonials-card-four__identity__designation">managing director</p>
                        </div><!-- /.testimonials-card-four__identity -->
                        <div class="testimonials-card-four__quote-icon">
                            <span class="trevlo-one-icon-quote"></span>
                        </div><!-- /.testimonials-card-four__quote-icon -->
                        <div class="testimonials-card-four__image">
                            <img src="front/assets/images/testimonial/testimonial-4-1.jpg" alt="Michael G. Ware">
                        </div>
                    </div><!-- /.testimonials-card-four -->
                </div><!-- /.owl-slide-item-->
                <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <div class="testimonials-card-four">
                        <div class="trevlo-ratings">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <p class="testimonials-card-four__quote">Booking our vacation through <span>trevlo</span> Travel Agency was an absolute breeze! From start to finish, their team went above and beyond to ensure our trip was nothing short of spectacular.</p><!-- /.testimonials-card-four__quote -->
                        <div class="testimonials-card-four__identity">
                            <h5 class="testimonials-card-four__identity__name">Guy Hawkins</h5>
                            <p class="testimonials-card-four__identity__designation">Tourist</p>
                        </div><!-- /.testimonials-card-four__identity -->
                        <div class="testimonials-card-four__quote-icon">
                            <span class="trevlo-one-icon-quote"></span>
                        </div><!-- /.testimonials-card-four__quote-icon -->
                        <div class="testimonials-card-four__image">
                            <img src="front/assets/images/testimonial/testimonial-4-2.jpg" alt="Guy Hawkins">
                        </div>
                    </div><!-- /.testimonials-card-four -->
                </div><!-- /.owl-slide-item-->
                <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="testimonials-card-four">
                        <div class="trevlo-ratings">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <p class="testimonials-card-four__quote">travel agency Company also impressed us with their transpa regarding costs. The <span>trevlo</span> initial quote was. There are many variations of passages, but the majority have suffered.</p><!-- /.testimonials-card-four__quote -->
                        <div class="testimonials-card-four__identity">
                            <h5 class="testimonials-card-four__identity__name">Michael G. Ware</h5>
                            <p class="testimonials-card-four__identity__designation">managing director</p>
                        </div><!-- /.testimonials-card-four__identity -->
                        <div class="testimonials-card-four__quote-icon">
                            <span class="trevlo-one-icon-quote"></span>
                        </div><!-- /.testimonials-card-four__quote-icon -->
                        <div class="testimonials-card-four__image">
                            <img src="front/assets/images/testimonial/testimonial-4-1.jpg" alt="Michael G. Ware">
                        </div>
                    </div><!-- /.testimonials-card-four -->
                </div><!-- /.owl-slide-item-->
                <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <div class="testimonials-card-four">
                        <div class="trevlo-ratings">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <p class="testimonials-card-four__quote">Booking our vacation through <span>trevlo</span> Travel Agency was an absolute breeze! From start to finish, their team went above and beyond to ensure our trip was nothing short of spectacular.</p><!-- /.testimonials-card-four__quote -->
                        <div class="testimonials-card-four__identity">
                            <h5 class="testimonials-card-four__identity__name">Guy Hawkins</h5>
                            <p class="testimonials-card-four__identity__designation">Tourist</p>
                        </div><!-- /.testimonials-card-four__identity -->
                        <div class="testimonials-card-four__quote-icon">
                            <span class="trevlo-one-icon-quote"></span>
                        </div><!-- /.testimonials-card-four__quote-icon -->
                        <div class="testimonials-card-four__image">
                            <img src="front/assets/images/testimonial/testimonial-4-2.jpg" alt="Guy Hawkins">
                        </div>
                    </div><!-- /.testimonials-card-four -->
                </div><!-- /.owl-slide-item-->
            </div><!-- /.thm-owl__slider -->
        </div><!-- /.container -->
    </section><!-- /.testimonial-four section-space -->

    <div class="client-carousel-two client-carousel-two--home-5 @@extraClassName">
        <div class="client-carousel-two__bg" style="background-image: url(front/assets/images/shapes/client-carousel-shape-bg-2-1.png);"></div><!-- /.client-carousel-two__bg -->
        <div class="container">
            <div class="client-carousel-two__carousel trevlo-owl__carousel owl-theme owl-carousel" data-owl-options='{
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
                "items":2,
                "margin": 50
            },
            "413":{
                "items":3,
                "margin": 60
            },
            "500":{
                "items":3,
                "margin": 80
            },
            "576":{
                "items":3,
                "margin": 100
            },
            "768":{
                "items":4,
                "margin": 100
            },
            "992":{
                "items": 5,
                "margin": 100
            },
            "1200":{
                "items": 5,
                "margin": 160
            }
        }
        }'>
                <div class="client-carousel-two__item">
                    <img src="front/assets/images/resources/brand-4-1.png" alt="trevlo" class="client-carousel-two__image">
                    <img src="front/assets/images/resources/brand-4-1-hover.png" alt="trevlo" class="client-carousel-two__hover-image">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel-two__item">
                    <img src="front/assets/images/resources/brand-4-2.png" alt="trevlo" class="client-carousel-two__image">
                    <img src="front/assets/images/resources/brand-4-2-hover.png" alt="trevlo" class="client-carousel-two__hover-image">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel-two__item">
                    <img src="front/assets/images/resources/brand-4-3.png" alt="trevlo" class="client-carousel-two__image">
                    <img src="front/assets/images/resources/brand-4-3-hover.png" alt="trevlo" class="client-carousel-two__hover-image">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel-two__item">
                    <img src="front/assets/images/resources/brand-4-4.png" alt="trevlo" class="client-carousel-two__image">
                    <img src="front/assets/images/resources/brand-4-4-hover.png" alt="trevlo" class="client-carousel-two__hover-image">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel-two__item">
                    <img src="front/assets/images/resources/brand-4-5.png" alt="trevlo" class="client-carousel-two__image">
                    <img src="front/assets/images/resources/brand-4-5-hover.png" alt="trevlo" class="client-carousel-two__hover-image">
                </div><!-- /.owl-slide-item-->
            </div><!-- /.thm-owl__slider -->
        </div><!-- /.container -->
    </div><!-- /.client-carousel-two -->

    <section class="gallery-instagram-one gallery-instagram-one--home-5">
        <div class="container-fluid">
            <div class="gallery-instagram-one__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav owl-carousel" data-owl-options='{
        "loop": true,
        "items": 5,
        "autoplay": true,
        "smartSpeed": 600,
        "nav": false,
        "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
        "dots": true,
        "margin": 30,
        "responsive": {
            "0": {
                "items": 1
            },
            "500": {
                "items": 2
            },
            "768": {
                "items": 3
            },
            "1200": {
                "items": 4
            },
            "1400": {
                "items": 5,
                "dots": false
            }
        }
        }'>
                <div class="item">
                    <div class="gallery-instagram-one__image gallery-instagram-one__image--circle">
                        <img src="front/assets/images/gallery/gallery-instagram-1-1.png" alt="instagram">
                        <a href="https://www.instagram.com/" class="gallery-instagram-one__image__link">
                            <i class="trevlo-one-icon-instagram"></i>
                        </a><!-- /.gallery-instagram-one__image__link -->
                    </div><!-- /.gallery-instagram-one__image -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="gallery-instagram-one__image gallery-instagram-one__image--square">
                        <img src="front/assets/images/gallery/gallery-instagram-1-2.png" alt="instagram">
                        <a href="https://www.instagram.com/" class="gallery-instagram-one__image__link">
                            <i class="trevlo-one-icon-instagram"></i>
                        </a><!-- /.gallery-instagram-one__image__link -->
                    </div><!-- /.gallery-instagram-one__image -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="gallery-instagram-one__image gallery-instagram-one__image--circle">
                        <img src="front/assets/images/gallery/gallery-instagram-1-3.png" alt="instagram">
                        <a href="https://www.instagram.com/" class="gallery-instagram-one__image__link">
                            <i class="trevlo-one-icon-instagram"></i>
                        </a><!-- /.gallery-instagram-one__image__link -->
                    </div><!-- /.gallery-instagram-one__image -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="gallery-instagram-one__image gallery-instagram-one__image--square">
                        <img src="front/assets/images/gallery/gallery-instagram-1-4.png" alt="instagram">
                        <a href="https://www.instagram.com/" class="gallery-instagram-one__image__link">
                            <i class="trevlo-one-icon-instagram"></i>
                        </a><!-- /.gallery-instagram-one__image__link -->
                    </div><!-- /.gallery-instagram-one__image -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="gallery-instagram-one__image gallery-instagram-one__image--circle">
                        <img src="front/assets/images/gallery/gallery-instagram-1-5.png" alt="instagram">
                        <a href="https://www.instagram.com/" class="gallery-instagram-one__image__link">
                            <i class="trevlo-one-icon-instagram"></i>
                        </a><!-- /.gallery-instagram-one__image__link -->
                    </div><!-- /.gallery-instagram-one__image -->
                </div><!-- /.item -->
            </div><!-- /.gallery-instagram-one__carousel -->
        </div><!-- /.container-fluid -->
    </section><!-- /.gallery-instagram-one -->

    <div class="blog-four section-space">
        <div class="container">
            <div class="blog-four__top">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">our latest blog</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">our latest news</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                    </div><!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="blog-four__button">
                            <a href="blog-details-right.html" class="trevlo-btn trevlo-btn--border">
                                <span>view all blog</span>
                                <i class="trevlo-one-icon-up-right-arrow"></i>
                            </a><!-- /.trevlo-btn -->
                        </div><!-- /.blog-four__button -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.blog-four__top -->
            <div class="row gutter-y-30">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="blog-four__card">
                        <a href="blog-details-right.html" class="blog-four__card__image-link" style="background-image: url(front/assets/images/blog/blog-5-1.jpg);">
                            <div class="blog-four__card__date">
                                <span class="blog-four__card__date__day">25</span>
                                <span class="blog-four__card__date__month">june</span>
                            </div>
                            <div class="blog-four__card__overlay">
                                <span class="blog-four__card__plus">
                                    <i class="icon-plus"></i>
                                </span>
                            </div><!-- /.blog-four__card__overlay -->
                        </a><!-- /.blog-four__card__image-link -->
                        <div class="blog-four__card__content">
                            <h3 class="blog-four__card__title"><a href="blog-details-right.html">are produced by world-class creators</a></h3><!-- /.blog-four__card__title -->
                            <ul class="list-unstyled blog-four__card__meta">
                                <li>
                                    <a href="index-5.html#">
                                        <span class="blog-four__card__meta__icon">
                                            <i class="trevlo-one-icon-user"></i>
                                        </span>
                                        by Admin
                                    </a>
                                </li>
                                <li>
                                    <a href="index-5.html#">
                                        <span class="blog-four__card__meta__icon">
                                            <i class="trevlo-one-icon-comment"></i>
                                        </span>
                                        2 Comments
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.blog-four__card__content -->
                    </div><!-- /.blog-four__card -->
                </div><!-- /.col-lg-4 col-md-6 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <div class="blog-four__card">
                        <a href="blog-details-right.html" class="blog-four__card__image-link" style="background-image: url(front/assets/images/blog/blog-5-2.jpg);">
                            <div class="blog-four__card__date">
                                <span class="blog-four__card__date__day">20</span>
                                <span class="blog-four__card__date__month">june</span>
                            </div>
                            <div class="blog-four__card__overlay">
                                <span class="blog-four__card__plus">
                                    <i class="icon-plus"></i>
                                </span>
                            </div><!-- /.blog-four__card__overlay -->
                        </a><!-- /.blog-four__card__image-link -->
                        <div class="blog-four__card__content">
                            <h3 class="blog-four__card__title"><a href="blog-details-right.html">Nail Jelly To The Hothouse Wall Pixel</a></h3><!-- /.blog-four__card__title -->
                            <ul class="list-unstyled blog-four__card__meta">
                                <li>
                                    <a href="index-5.html#">
                                        <span class="blog-four__card__meta__icon">
                                            <i class="trevlo-one-icon-user"></i>
                                        </span>
                                        by Admin
                                    </a>
                                </li>
                                <li>
                                    <a href="index-5.html#">
                                        <span class="blog-four__card__meta__icon">
                                            <i class="trevlo-one-icon-comment"></i>
                                        </span>
                                        2 Comments
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.blog-four__card__content -->
                    </div><!-- /.blog-four__card -->
                </div><!-- /.col-lg-4 col-md-6 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                    <div class="blog-four__card">
                        <a href="blog-details-right.html" class="blog-four__card__image-link" style="background-image: url(front/assets/images/blog/blog-5-3.jpg);">
                            <div class="blog-four__card__date">
                                <span class="blog-four__card__date__day">15</span>
                                <span class="blog-four__card__date__month">june</span>
                            </div>
                            <div class="blog-four__card__overlay">
                                <span class="blog-four__card__plus">
                                    <i class="icon-plus"></i>
                                </span>
                            </div><!-- /.blog-four__card__overlay -->
                        </a><!-- /.blog-four__card__image-link -->
                        <div class="blog-four__card__content">
                            <h3 class="blog-four__card__title"><a href="blog-details-right.html">Collaboratively Pontificate Bleeding</a></h3><!-- /.blog-four__card__title -->
                            <ul class="list-unstyled blog-four__card__meta">
                                <li>
                                    <a href="index-5.html#">
                                        <span class="blog-four__card__meta__icon">
                                            <i class="trevlo-one-icon-user"></i>
                                        </span>
                                        by Admin
                                    </a>
                                </li>
                                <li>
                                    <a href="index-5.html#">
                                        <span class="blog-four__card__meta__icon">
                                            <i class="trevlo-one-icon-comment"></i>
                                        </span>
                                        2 Comments
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.blog-four__card__content -->
                    </div><!-- /.blog-four__card -->
                </div><!-- /.col-lg-4 col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.blog-four section-space -->

    @include('front.partials.footer')

</div><!-- /.page-wrapper -->
 
@endsection
