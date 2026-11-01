@if($randomPromo && $randomPromo)
<section class="offer-two tour-listing-two--home-three mb-4 pb-4" id="offer">
    <div class="container">
        <div class="offer-two__inner"
            style="background-image: url({{ asset('front/assets/images/backgrounds/offer-bg-2-1.jpg') }});">
            <div class="offer-two__inner__row row">
                <div class="col-lg-7">
                    <div class="offer-two__content">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">{{ $randomPromo->title }}</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">{{ $randomPromo->sub_title }} <br> {{ $randomPromo->event->discount_percentage }}% Off</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <a href="{{ route('events.show', $randomPromo->event->slug) }}"
                            class="trevlo-btn trevlo-btn--two trevlo-btn--base">
                            <span>Book now</span>
                            <i class="trevlo-one-icon-up-right-arrow"></i>
                        </a><!-- /.trevlo-btn -->
                    </div><!-- /.offer-two__content -->
                </div><!-- /.col-lg-7 -->
            </div><!-- /.row -->
            <img src="{{ Storage::url($randomPromo->promo_image) }}" alt="offer" class="offer-two__image">
            <img src="{{ asset('front/assets/images/shapes/offer-border-2-1.png') }}" alt="border" class="offer-two__border-one">
            <img src="{{ asset('front/assets/images/shapes/offer-border-2-2.png') }}" alt="border" class="offer-two__border-two">
        </div><!-- /.offer-two__inner -->
    </div><!-- /.container -->
</section><!-- /.offer-two section-space -->
@endif
