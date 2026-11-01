@extends('front.layouts.app')

@section('app')


<section class="page-header">
    {{-- <div class="page-header__bg"></div> --}}
    <!-- /.page-header__bg -->
    <div class="container">
        <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">
            Frequently Asked Questions</h2>
        <div class="page-header__breadcrumb-box">
            <ul class="trevlo-breadcrumb">
                {{-- <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>Tours</li> --}}
            </ul><!-- /.trevlo-breadcrumb -->
        </div><!-- /.page-header__breadcrumb-box -->
    </div><!-- /.container -->
</section>



 <!-- FAQ Page Start -->
 <section class="faq-page section-space">
    <div class="container">
        <div class="sec-title text-left">

            <p class="sec-title__tagline">FREQUENTLY ASKED QUESTIONS</p><!-- /.sec-title__tagline -->

            <h2 class="sec-title__title">Frequently asked Questions & Answers Here</h2>
            <!-- /.sec-title__title -->
        </div><!-- /.sec-title -->
        <!-- /.sec-title -->
        <div class="row">
            <div class="col-xl-3 col-lg-4 wow animated fadeInLeft" data-wow-delay="0.1s"
                data-wow-duration="1500ms">
                <div class="faq-page__contact">
                    <div class="faq-page__contact-icon">
                        <span class="icon-phone-1"></span>
                    </div><!-- /.faq-page__contact-icon -->
                    <h3 class="faq-page__contact-title">Do You Still Have Question?</h3>
                    <div class="faq-page__contact-number">
                        <p class="faq-page__contact-number-title">Call Anytime</p>
                        <a href="tel:{{ $settings['site_phone'] }}" class="faq-page__contact-number-text">{{ $settings['site_phone'] }}</a>
                    </div><!-- /.faq-page__phone -->
                </div><!-- /.faq-page__contact -->
            </div><!-- /.col-xl-3 col-lg-4 -->
            <div class="col-xl-9 col-lg-8">
                <div class="trevlo-accrodion faq-page__faq" data-grp-name="faq-page__faq">
                    @foreach ($faqs as $faq)
                    <div class="accrodion wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <div class="accrodion-title">
                            <h4>{{ $faq->question }}</h4>
                        </div>
                        <div class="accrodion-content" style="display: none;">
                            <div class="inner">
                                <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- /.col-xl-9 col-lg-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
<!-- FAQ Page End -->


@endsection
