<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Connecteam</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Thank you for joining Connecteam! Your account has been created successfully.</p>
    <p>Your login credentials are as follows:</p>
    <p>Email: {{ $user->email }}</p>
    <p>Password: {{ $password }}</p>

    <p>Feel free to log in and start managing your tasks.</p>
    <p>Best Regards,<br>Connecteam</p>
</body>
</html>
