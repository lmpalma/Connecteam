<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Connecteam</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #5b3a9b;
            font-size: 24px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .credentials {
            background-color: #f0f4fa;
            padding: 10px;
            border-radius: 6px;
            margin: 15px 0;
        }
        .button {
            display: inline-block;
            background-color: #5b3a9b;
            color: #ffffff !important;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, {{ $user->name }}!</h1>
        <p>Thank you for joining Connecteam! Your account has been created successfully.</p>
        <p>Here are your login credentials:</p>
        <div class="credentials">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Password:</strong> {{ $password }}</p>
        </div>
        <p>You can now log in and start managing your tasks:</p>
        <a href="{{ route('frontend.login') }}" class="button">Log in to Connecteam</a>
        <p class="footer">Best regards,<br>Connecteam</p>
    </div>
</body>
</html>
