<section class="about-three">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="200ms">
                <div class="about-three__content">
                    <div class="sec-title text-left">

                        <p class="sec-title__tagline">GET TO KNOW US</p><!-- /.sec-title__tagline -->

                        <h2 class="sec-title__title">{{ $settings['home_1_about_title'] }}</h2><!-- /.sec-title__title -->
                    </div><!-- /.sec-title --><!-- /.sec-title -->
                    <p class="about-three__content__text">
                        {{ $settings['home_1_about_description'] }}
                    </p>
                    <h5 class="about-three__content__quote">{{ $settings['home_1_about_subtitle'] }}</h5>
                    <ul class="about-three__content__list">
                        <li><span class="fas fa-check-circle"></span>{{ $settings['home_1_about_list_1'] }}</li>
                        <li><span class="fas fa-check-circle"></span>{{ $settings['home_1_about_list_2'] }}</li>
                    </ul>
                    <a href="{{ $settings['home_1_about_button'] }}" class="trevlo-btn trevlo-btn--base"><span>Discover More</span></a>
                </div><!-- /.about-four__content -->
            </div><!-- /.col-xl-6 col-lg-6 -->
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms">
                <div class="about-three__image">
                    <div class="about-three__image__one trevlo-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 3, "speed": 700, "scale": 1 }'>
                        <img src="{{ $settings['home_1_about_big_image'] ? asset('storage/' . $settings['home_1_about_big_image']) : '' }}" alt="trevlo">
                    </div>
                    <div class="about-three__image__right wow fadeInUp" data-wow-delay="400ms">
                        <div class="about-three__counter" style="background-image: url(front/assets/images/shapes/about-1-shape-4.png);">
                            <div class="about-three__counter__number count-box"><span class="count-text" data-stop="{{ $settings['home_1_about_discount'] }}" data-speed="1500"></span></div><!-- /.counter__number -->
                            <p class="about-three__counter__title">Discount</p><!-- /.counter__title -->
                        </div><!-- /.discount -->
                        <div class="about-three__image__two">
                            <img src="{{ $settings['home_1_about_small_image'] ? asset('storage/' . $settings['home_1_about_small_image']) : '' }}" alt="trevlo">
                        </div>
                    </div>
                    <div class="about-three__info wow fadeInUp" data-wow-delay="400ms">
                        <div class="about-three__info__icon"><span class="icon-telephone-call-1"></span></div>
                        <h5 class="about-three__info__title">Do You Still Have Question?</h5>
                        <p class="about-three__info__text">Call Anytime</p>
                        <h4 class="about-three__info__number"><a href="tel:{{ $settings['site_phone'] }}">{{ $settings['site_phone'] }}</a></h4>
                    </div>
                </div><!-- /.about-three__image -->
            </div><!-- /.col-xl-6 col-lg-6 -->
        </div><!-- /.row -->
    </div>
</section>
