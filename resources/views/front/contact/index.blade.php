@extends('front.layouts.app')

@section('app')


<section class="page-header">
    {{-- <div class="page-header__bg"></div> --}}
    <!-- /.page-header__bg -->
    <div class="container">
        <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">
            Contact Us</h2>
        <div class="page-header__breadcrumb-box">
            <ul class="trevlo-breadcrumb">
                {{-- <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>Tours</li> --}}
            </ul><!-- /.trevlo-breadcrumb -->
        </div><!-- /.page-header__breadcrumb-box -->
    </div><!-- /.container -->
</section>



 <!-- Contact Page Start -->
 <section class="contact-page section-space-top">
    <div class="container">
        <div class="sec-title text-center">

            <p class="sec-title__tagline">Contact Us</p><!-- /.sec-title__tagline -->

            <h2 class="sec-title__title">Feel Free to Write us Anytime</h2><!-- /.sec-title__title -->
        </div><!-- /.sec-title -->
        <!-- /.sec-title -->
        <form action="{{ route('contact.submit') }}" method="POST"
            class="contact-page__form form-one row gutter-20 contact-form-validated">
            @csrf
            <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                <div class="form-one__group">
                    <input type="text" name="name" id="form-one-name-input" placeholder="Your Name"
                        class="form-one__input" required>
                </div><!-- /.form-one__group -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                <div class="form-one__group">
                    <input type="email" name="email" id="form-one-email-input" placeholder="Email Address"
                        class="form-one__input" required>
                </div><!-- /.form-one__group -->
            </div><!-- /.col-md-6 -->

            <div class="col-12 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                <div class="form-one__group">
                    <input type="text" name="subject" id="form-one-subject-input" placeholder="Subject"
                        class="form-one__input" required>
                </div><!-- /.form-one__group -->
            </div><!-- /.col-md-6 -->
            <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                <div class="form-one__group">
                    <textarea name="message" id="form-one-message-input" cols="30" rows="10"
                        placeholder="Write a Message" class="form-one__message form-one__input" required></textarea>
                </div><!-- /.form-one__group -->
            </div><!-- /.col-12-->
            <div class="col-12 wow animated fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                <div class="form-one__btn-box">
                    <button type="submit" class="form-one__btn trevlo-btn trevlo-btn--base"><span>Send
                            Message</span></button>
                </div><!-- /.form-one__btn-box -->
            </div><!-- /.col-12-->
        </form>

        <!-- /.row -->
        <div class="result"></div><!-- /.result -->
    </div><!-- /.container -->
    <div class="contact-page__info">
        <div class="contact-page__info-container container">
            <div class="contact-page__info-top">
                <p class="contact-page__info-top-title">Contact Information</p>
            </div><!-- /.contact-page__info-top -->
            <div class="contact-page__info-row row">
                <div class="col-lg-4 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                    <div class="contact-page__info-box">
                        <div class="contact-page__info-icon-box">
                            <span class="icon-phone-1"></span>
                        </div>
                        <div class="contact-page__info-text-box">
                            <p class="contact-page__info-title">Have any question?</p>
                            <a href="tel:{{ $settings['site_phone'] }}">
                                <h4 class="contact-page__info-text contact-page__info-text-link">Call  {{ $settings['site_phone'] }}
                                </h4>
                            </a>
                        </div>
                    </div><!-- /.contact-page__info-box -->
                </div>
                <div class="col-lg-3 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                    <div class="contact-page__info-box">
                        <div class="contact-page__info-icon-box">
                            <span class="icon-envelope"></span>
                        </div>
                        <div class="contact-page__info-text-box">
                            <p class="contact-page__info-title">Send Email</p>
                            <a href="mailto:{{ $settings['site_email'] }}">
                                <h4 class="contact-page__info-text contact-page__info-text-link">{{ $settings['site_email'] }}
                                </h4>
                            </a>
                        </div>
                    </div><!-- /.contact-page__info-box -->
                </div>
                <div class="col-lg-5 wow animated fadeInUp" data-wow-delay="0.6s" data-wow-duration="1500ms">
                    <div class="contact-page__info-box contact-page__info-box--three">
                        <div class="contact-page__info-icon-box">
                            <span class="icon-location-1"></span>
                        </div>
                        <div class="contact-page__info-text-box">
                            <p class="contact-page__info-title">Visit Anytime</p>
                            <h4 class="contact-page__info-text">{{ $settings['address'] }}</h4>
                        </div>
                    </div><!-- /.contact-page__info-box -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.contact-page__info -->
    {{-- <div class="google-map google-map__@@extraClassName">
        <iframe title="template google map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
            class="map__@@extraClassName" allowfullscreen></iframe>
    </div> --}}
    <!-- /.google-map -->
</section>
<!-- Contact Page End -->

@endsection
