@extends('front.layouts.app')

@section('app')
@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

<section class="page-header">
    <div class="container">
        <h2 class="page-header__title wow animated fadeInLeft">Booking Summary</h2>
    </div>
</section>







<section class="checkout-page section-space">
    <div class="container">
        <div class="checkout-page__your-order">
            <div class="row">
                <div class="col-xl-6">
                    <h2 class="checkout-page__title">Your Booking Details</h2>
                    <table class="checkout-page__order-table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th class="right">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Booking ID</td>
                                <td>#{{ session('booking_data')['bookable_id'] }}</td>
                            </tr>
                            @if(session('booking_data')['bookable_type'] == 'tour')

                                <tr>
                                    <td>Destination</td>
                                    <td>{{ session('booking_data')['destination'] ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>Tour Name</td>
                                    <td>{{ session('booking_data')['tour_name'] ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>Arrival Date</td>
                                    <td>{{ session('booking_data')['start_date'] }}</td>
                                </tr>
                                <tr>
                                    <td>Number of Guests</td>
                                    <td>{{ session('booking_data')['guests'] }}</td>
                                </tr>
                                <tr>
                                    <td>Number of Children</td>
                                    <td>{{ session('booking_data')['children_count'] }}</td>
                                </tr>

                                @if(session('booking_data')['discount'] ?? 0 > 0)
                                <tr>
                                    <td>Discount</td>
                                    <td>{{ session('booking_data')['discount'] }}% (-${{ number_format(session('booking_data')['discount_amount'], 2) }})</td>
                                </tr>
                            @endif



                            @elseif(session('booking_data')['bookable_type'] == 'hotel')
                                <tr>
                                    <td>Hotel Name</td>
                                    <td>{{ session('booking_data')['hotel_name'] ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>Room Type</td>
                                    <td>{{ session('booking_data')['room_type'] ?? 'N/A' }}</td>
                                </tr>

                                <tr>
                                    <td>Room Price Per Night</td>
                                    <td>{{ session('booking_data')['room_price'] ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>Check-in Date</td>
                                    <td>{{ session('booking_data')['start_date'] }}</td>
                                </tr>
                                <tr>
                                    <td>Check-out Date</td>
                                    <td>{{ session('booking_data')['end_date'] }}</td>
                                </tr>
                                <tr>
                                    <td>Number of Guests</td>
                                    <td>{{ session('booking_data')['guests'] }}</td>
                                </tr>
                            @endif
                            <tr class="total">
                                <td><strong>Total Price</strong></td>
                                <td><strong>${{ number_format(session('booking_data')['total_price'], 2) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <div class="checkout-page__billing-address">
                        <h2 class="checkout-page__title">Billing Details</h2>
                        <form class="checkout-page__form form-one" method="POST" action="{{ route('user.booking.registerGuest') }}">
                            @csrf
                            <div class="row gutter-20 mb-4">
                                <div class="col-12">
                                    <div class="form-one__group">
                                        <input type="text" name="full_name" id="full_name" placeholder="Full Name" class="form-one__input" required>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-one__group">
                                        <input type="text" name="phone" id="phone" placeholder="Phone Number" class="form-one__input" required>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-one__group">
                                        <input type="email" name="email" id="email" placeholder="Email Address" class="form-one__input" required>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-page__payment">
                                <div class="checkout-page__payment-item checkout-page__payment-item--active">
                                    <h3 class="checkout-page__payment-title">Booking Note</h3>
                                    <div class="checkout-page__payment-content" style="display: none;">
                                        <p>{{ $settings['booking_note'] }}</p>
                                    </div><!-- /.checkout__payment-content -->
                                </div><!-- /.checkout__payment-item -->

                            </div>

                            <div class="checkout-page__payment-btn-box">
                                <button type="submit" class="checkout-page__payment-btn trevlo-btn trevlo-btn--base">
                                    <span>Confirm Booking</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
