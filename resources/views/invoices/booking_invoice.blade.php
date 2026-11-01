<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $booking->id }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            line-height: 24px;
        }
        .header-section {
            border-bottom: 2px solid #ddd;
            padding-bottom: 20px;
        }
        .header-section h1 {
            color: #333;
            font-size: 24px;
        }
        .content-section table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .content-section th {
            background-color: #f8f8f8;
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .content-section td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .total-line {
            margin-top: 20px;
            text-align: right;
            font-size: 20px;
        }
        .footer-section {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header-section">
            <h1>Invoice #{{ $booking->id }}</h1>
            <p>Date: {{ $booking->created_at }}</p>
        </div>

        <div class="content-section">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Type</td>
                        <td>{{ ucfirst($booking->bookable_type) }}</td>
                    </tr>

                    <tr>
                        <td>Destination</td>
                        <td>{{ $booking->destination }}</td>
                    </tr>
                    @if($booking->bookable_type == 'hotel')
                    <tr>
                        <td>Hotel Name</td>
                        <td>{{ $booking->hotel_name }}</td>
                    </tr>
                        <tr>
                            <td>Room Type</td>
                            <td>{{ $booking->room_type }}</td>
                        </tr>
                        <tr>
                            <td>Room Name</td>
                            <td>{{ $booking->room_name }}</td>
                        </tr>
                        <tr>
                            <td>Guests</td>
                            <td>{{ $booking->guests }}</td>
                        </tr>
                        <tr>
                            <td>Dates</td>
                            <td>{{ $booking->start_date }} to {{ $booking->end_date }}</td>
                        </tr>
                        <tr>
                            <td>Price Per Night</td>
                            <td>$ {{ number_format($booking->room_price, 2) }}</td>
                        </tr>
                    @else
                        <tr>
                            <td>Package</td>
                            <td>{{ $booking->tour_name }}</td>
                        </tr>
                        <tr>
                            <td>Guests Type</td>
                            <td>{{ $booking->guest_type }}</td>
                        </tr>
                        <tr>
                            <td>Guests</td>
                            <td>{{ $booking->guests }}</td>
                        </tr>
                        <tr>
                            <td>Children</td>
                            <td>{{ $booking->children_count }}</td>
                        </tr>
                        <tr>
                            <td>Arrival Date</td>
                            <td>{{ $booking->start_date }}</td>
                        </tr>
                        <tr>
                            <td>Discount</td>
                            <td>{{ $booking->discount_amount }}</td>
                        </tr>
                    @endif



                </tbody>
            </table>
        </div>

        <div class="total-line">
            Total Due: ${{ number_format($booking->total_price, 2) }}
        </div>

        <div class="footer-section">
            <p>Terms & Conditions apply. Full payment is required 7 days before the stay/tour. Cancellation policies apply.</p>
            <p>Thank you for choosing our services!</p>
        </div>
    </div>
</body>
</html>
