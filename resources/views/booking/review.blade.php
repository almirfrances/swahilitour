@extends('front.layouts.app')

@section('app')

<section class="page-header">
    <div class="container">
        <h2 class="page-header__title wow animated fadeInLeft">Booking Review</h2>
    </div>
</section>

<section class="checkout-page section-space">
    <div class="container">


        <div class="checkout-page__payment">
            <div class="checkout-page__payment-item checkout-page__payment-item--active">
                <h3 class="checkout-page__payment-title">Your Booking Request is Received</h3>
                <div class="checkout-page__payment-content" style="display: none;">
                    <p>We have received your booking request. Our team is currently reviewing the details and will send you an email confirmation once the review is complete. Thank you for your patience.</p>

                </div><!-- /.checkout__payment-content -->
            </div><!-- /.checkout__payment-item -->

        </div>
    </div>
</section>


@endsection
