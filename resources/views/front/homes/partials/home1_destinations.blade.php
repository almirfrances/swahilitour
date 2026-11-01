<section class="destination-five tour-listing-two--home-three mt-4 section-space">
    <div class="destination-five__bg" style="background-image: url({{ asset('front/assets/images/shapes/destination-bg-5-1.png') }});"></div>

    <div class="container">
        <div class="destination-five__top">
            <div class="row gutter-y-40 align-items-center">
                <div class="col-xl-6">
                    <div class="sec-title sec-title--two text-left">

                        <p class="sec-title__tagline">top destinations</p>

                        <h2 class="sec-title__title">popular top destination in <br> the world</h2>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="list-unstyled destination-five__filter-list owl-filter-bar">
                        <li class="item active" data-owl-filter="*">All</li>
                        @foreach($countries as $country)
                            <li class="item" data-owl-filter=".{{ strtolower($country) }}">{{ $country }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
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

        @foreach($featuredDestinations as $destination)
            <div class="destination-five__card choice item {{ strtolower($destination->country) }}">
                <div class="destination-five__card__inner">
                    @php
                        $image = Arr::random($destination->images);
                    @endphp
                    <div class="destination-five__card__top" style="background-image: url({{ Storage::url($image) }});">
                        <h4 class="destination-five__card__name">{{ $destination->name }}</h4>
                    </div>
                    <div class="destination-five__card__content">
                        <a href="{{ route('destination.show', $destination->slug) }}" class="destination-five__card__image" style="background-image: url({{ Storage::url($image) }});"></a>

                        <div class="destination-five__card__content__inner">
                            <h4 class="destination-five__card__country">{{ $destination->country }}</h4>

                            <h3 class="destination-five__card__title">
                                <a href="{{ route('destination.show', $destination->slug) }}">{{ $destination->name }}</a>
                            </h3>
                            <p class="destination-five__card__text">{{ Str::limit($destination->description, 100) }}</p>
                            <ul class="destination-five__card__list">
                                <li>{{ $destination->tours()->count() }} Tour+</li>
                                <li>{{ $destination->hotels()->count() }} Hotel+</li>

                            </ul>
                            <a href="{{ route('destination.show', $destination->slug) }}" class="trevlo-btn trevlo-btn--border">
                                <span>get started</span>
                                <i class="trevlo-one-icon-up-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach




        </div>
    </div>
</section>
