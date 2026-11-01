<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Update</title>
</head>
<body>
    <h1>Your Ticket Has Been Updated</h1>
    <p>Hello,</p>
    <p>Your ticket titled "<strong>{{ $ticketTitle }}</strong>" has been updated to "<strong>{{ $ticketStatus }}</strong>".</p>
    <p>You can view the ticket details <a href="{{ url('/tickets/' . $ticketId) }}">here</a>.</p>
    <p>Thank you for using our support system.</p>
</body>
</html>
