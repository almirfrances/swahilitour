@if($randomPromo && $randomPromo)

<section class="offer-three section-space mt-4">
    <div class="offer-three__bg trevlo-jarallax" data-jarallax data-speed="0.30" style="background-image: url({{ asset('front/assets/images/backgrounds/offer-bg-3-1.jpg') }});"></div>
    <!-- /.offer-three__bg -->
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8">
                <div class="offer-three__content">
                    <div class="sec-title sec-title--two text-left">

                        <p class="sec-title__tagline">{{ $randomPromo->title }}</p><!-- /.sec-title__tagline -->

                        <h2 class="sec-title__title">{{ $randomPromo->sub_title }} <br> {{ $randomPromo->event->discount_percentage }}% Off</h2><!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                    <p class="offer-three__text">{{ $randomPromo->short_description }}
                    </p><!-- /.offer-three__text -->
                    <a href="{{ route('events.show', $randomPromo->event->slug) }}" class="offer-three__btn trevlo-btn trevlo-btn--two trevlo-btn--white">
                        <span>Book now</span>
                        <i class="trevlo-one-icon-up-right-arrow"></i>
                    </a>
                </div><!-- /.offer-three__content -->
            </div><!-- /.col-xl-6 col-lg-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <div class="offer-three__image">
        <div class="offer-three__image__inner"></div><!-- /.offer-three__image__inner -->
        <img src="{{ Storage::url($randomPromo->promo_image) }}" alt="offer" class="offer-three__image__one">
    </div><!-- /.offer-three__image -->
    <img src="{{ asset('front/assets/images/shapes/offer-border-3-2.png') }}" alt="border" class="offer-three__border-one">
    <img src="{{ asset('front/assets/images/shapes/offer-border-3-3.png') }}" alt="border" class="offer-three__border-two">
</section><!-- /.offer-three section-space -->
@endif
