@extends('front.layouts.app')

@section('app')

<section class="page-header">
    <div class="container">
        <h2 class="page-header__title wow animated fadeInLeft">Payment</h2>
    </div>
</section>

<section class="checkout-page section-space">
    <div class="container">
        <h2 class="checkout-page__title">Upload Payment Proof</h2>
        <p> <strong>Lipa Number</strong> : {{ $settings['lipa_number'] }}</p>
        <p> <strong>Lipa Name</strong> : {{ $settings['lipa_name'] }}</p>
        <p> <strong>Lipa Company</strong> : {{ $settings['lipa_number_company'] }}</p>
        <form class="checkout-page__form form-one" method="POST" action="{{ route('user.event.bookings.storePaymentProof', ['bookingId' => $booking->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="col-12 mb-4">
                <div class="form-one__group">
                    <label for="payment_proof" class="form-label">Upload Payment Proof (JPEG, PNG, PDF)</label>
                    <input type="file" name="payment_proof" id="payment_proof" class="form-one__input" required>
                </div><!-- /.form-one__group -->
            </div>

            <div class="checkout-page__payment-btn-box">
                <button type="submit" class="checkout-page__payment-btn trevlo-btn trevlo-btn--base">
                    <span>Submit</span>
                </button>
            </div>
        </form>

    </div>
</section>

@endsection
