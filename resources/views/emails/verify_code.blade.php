<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            color: #333;
        }
        .button {
            display: block;
            width: max-content;
            background-color: #3490dc;
            padding: 10px 20px;
            text-align: center;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
        }
        .code {
            font-size: 24px;
            font-weight: bold;
            background-color: #eef;
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            display: inline-block;
        }
        footer {
            text-align: center;
            padding-top: 20px;
            font-size: 12px;
            color: grey;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Email Verification Required</h1>
        <p>Hello,</p>
        <p>Thank you for registering with us! Before you can start exploring all the features we offer, we just need to verify your email address. Please use the verification code below to complete your registration process:</p>
        <p class="code">{{ $code }}</p>
        <p>This code ensures that only you can access your account. If you didn't create an account using this email address, no further action is needed.</p>
        <a href="{{ route('verify.email', ['code' => $code]) }}" class="button">Verify Email</a>
        <p>If you have any questions or need further assistance, feel free to reply to this email or visit our Help Center.</p>
        <footer>
            Thanks for choosing us! We're excited to have you on board.<br>
            Warm regards,<br>
            {{ config('app.name') }} Team<br>
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </footer>
    </div>
</body>
</html>
