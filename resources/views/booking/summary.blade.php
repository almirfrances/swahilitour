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
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Booking ID</td>
                                <td>#{{ session('booking_data')['bookable_id'] }}</td>
                            </tr>
                            <tr>
                                <td>Booked As</td>
                                <td>{{ Auth::user()->full_name }}</td>
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
                                @if(session('booking_data')['discount'])
                                    <tr>
                                        <td>Discount Applied</td>
                                        <td>{{ session('booking_data')['discount'] }}%</td>
                                    </tr>
                                @endif

                                <tr class="total">
                                    <td><strong>Total Price</strong></td>
                                    <td><strong>${{ number_format(session('booking_data')['total_price'], 2) }}</strong></td>
                                </tr>
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
                                    <td>Room Name</td>
                                    <td>{{ session('booking_data')['room_name'] ?? 'N/A' }}</td>
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

                                <tr class="total">
                                    <td><strong>Total Price</strong></td>
                                    <td><strong>${{ number_format(session('booking_data')['total_price'], 2) }}</strong></td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>



                <div class="col-lg-6">
                    <div class="checkout-page__billing-address">
                        <h2 class="checkout-page__title">Billing Details</h2>
                        <form class="checkout-page__form form-one" method="POST" action="{{ route('user.booking.submit') }}">
                            @csrf
                            <input type="hidden" name="bookable_type" value="{{ session('booking_data')['bookable_type'] }}">
                            <input type="hidden" name="bookable_id" value="{{ session('booking_data')['bookable_id'] }}">
                            <input type="hidden" name="guests" value="{{ session('booking_data')['guests'] }}">
                            <input type="hidden" name="total_price" value="{{ session('booking_data')['total_price'] }}">
                            <input type="hidden" name="room_id" value="{{ session('booking_data')['room_id'] ?? '' }}">
                            <input type="hidden" name="start_date" value="{{ session('booking_data')['start_date'] ?? '' }}">
                            <input type="hidden" name="end_date" value="{{ session('booking_data')['end_date'] ?? '' }}">
                            <input type="hidden" name="guest_type" value="{{ session('booking_data')['guest_type'] ?? '' }}">
                            <input type="hidden" name="children_count" value="{{ session('booking_data')['children_count'] ?? '0' }}">
                            <input type="hidden" name="tour_name" value="{{ session('booking_data')['tour_name'] ?? '' }}">
                            <input type="hidden" name="discount" value="{{ session('booking_data')['discount'] ?? '0' }}">
                            <input type="hidden" name="destination" value="{{ session('booking_data')['destination'] ?? '' }}">
                            <input type="hidden" name="room_type" value="{{ session('booking_data')['room_type'] ?? '' }}">
                            <input type="hidden" name="room_name" value="{{ session('booking_data')['room_name'] ?? '' }}">
                            <input type="hidden" name="room_price" value="{{ session('booking_data')['room_price'] ?? '' }}">
                            <input type="hidden" name="hotel_name" value="{{ session('booking_data')['hotel_name'] ?? '' }}">


                            <div class="row gutter-20 mb-4">
                                <div class="col-12">
                                    <div class="form-one__group">
                                        <input type="text" name="full_name" id="full_name" placeholder="Full Name" class="form-one__input" required value="{{ Auth::user()->full_name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-one__group">
                                        <input type="text" name="phone" id="phone" placeholder="Phone Number" class="form-one__input" required value="{{ Auth::user()->phone }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-one__group">
                                        <input type="email" name="email" id="email" placeholder="Email Address" class="form-one__input" required value="{{ Auth::user()->email }}" disabled>
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
