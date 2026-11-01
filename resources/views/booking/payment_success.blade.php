@extends('front.layouts.app')

@section('app')

<section class="page-header">
    <div class="container">
        <h2 class="page-header__title wow animated fadeInLeft">Booking Review</h2>
    </div>
</section>

<section class="checkout-page section-space">
    <div class="container">
        <h2 class="checkout-page__title">Payment Submitted</h2>
        <div class="checkout-page__payment">
            <div class="checkout-page__payment-item checkout-page__payment-item--active">
                <h3 class="checkout-page__payment-title">Thank You for Your Payment</h3>
                <div class="checkout-page__payment-content">
                    <p>Your payment proof has been successfully submitted. Our team is reviewing your booking details. We will notify you via email once your booking is confirmed. This typically takes up to 24 hours. Thank you for choosing us and for your patience.</p>
                </div><!-- /.checkout__payment-content -->
            </div><!-- /.checkout__payment-item -->
        </div>
    </div>
</section>

@endsection
