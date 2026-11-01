@extends('front.layouts.app')

@section('app')


<section class="page-header">
    {{-- <div class="page-header__bg"></div> --}}
    <!-- /.page-header__bg -->
    <div class="container">
        <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">
            Our Team</h2>
        <div class="page-header__breadcrumb-box">
            <ul class="trevlo-breadcrumb">
                {{-- <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>Tours</li> --}}
            </ul><!-- /.trevlo-breadcrumb -->
        </div><!-- /.page-header__breadcrumb-box -->
    </div><!-- /.container -->
</section>



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
