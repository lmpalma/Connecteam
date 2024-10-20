<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Connecteam - SIGNUP</title>
    <style>
        body {
            min-height: 100vh;
            background-image: url("{{ asset('assets/images/bg1.png') }}");
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .header {
            width: 100%;
            border-bottom: solid gray 2px;
            height: 10vh;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.8);
            z-index: 1;
        }
        .web-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-left: 24px;
        }
        .web-title {
            margin-left: 15px;
            font-size: 24px;
            font-family: Verdana;
            color: #5b3a9b;
        }
        .page-area {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            width: 90%;
            max-width: 400px;
            padding: 40px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form{
            width: 100%;
        }
        .container-name {
            font-size: 18px;
            font-family: Verdana;
            text-align: center;
            color: rgb(0, 0, 0);
            margin-bottom: 20px;
        }
        label {
            font-size: 14px;
            font-family: Verdana;
            color: rgb(0, 0, 0);
            
            margin-bottom: 5px;
        } 
        input[type="text"], input[type="password"], input[type = "email"] {
            width: 98%;
            margin-left: auto;
            margin-right:auto;
            height: 40px; 
            font-size: 16px;
            margin: 10px 0; 
            background: white;
            border: solid 1px #cccccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s ease;
        }
        
        .show-pw-section{
            display: flex;
        }
        
        input[type="checkbox"]:checked{
            background-color: purple;
        }
        .show-pw{
            font-family: Verdana;
            font-size: 14px;
            color: black;
        }
        input:focus{
                border-color: #5b3a9b;
                outline: none;
            }
        button {
            margin-top: 15px;
            width: 100%;
            height: 40px;
            font-size: 16px; 
            color: white;
            background-color: #5b3a9b;;
            border-radius: 10px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
            outline: 1px solid #5b3a9b;;
        }
        button:hover {
            color: #5b3a9b;;
            background-color: white;
        }
        p {
            font-size: 12px;
            font-family: Verdana;
            text-align: center;
            color: rgb(0, 0, 0);
            margin: 10px 0;
        }
        a {
            font-style: italic;
            color: rgb(0, 0, 0);
        }
        .footer-bar {
            margin-top: 20px;
            height: 10vh;
            width: 100%;
            border-top: solid gray 2px;
            text-align: center;
        }
        h4 {
            font-size: 12px;
            padding: 20px;
            color: white;
            font-family: Georgia;
        }
        .welcome {
            font-size: 35px;
            font-family: Tahoma;
            text-align: center;
            margin: 0;
            margin-bottom: 20px;
            padding-top: 20px;
        }
        .intro {
            font-size: 18px;
            font-family: Tahoma;
            text-align: center;
            margin: 0;
            margin-bottom: 30px; 
            color: #5b3a9b;
        }

        .alert-error {
            padding: 10px;
            margin: 10px 0;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            width: 100%;
            max-width: 350px;
            text-align: center;
            font-family: Tahoma;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 30px;
            }
            .welcome {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('assets/images/icon.png') }}" class="web-img" alt="Logo">
        <h1 class="web-title">Connecteam</h1>
    </div>
    <div class="page-area">
        <h1 class="welcome">BE PART OF THE TEAM</h1>
        <p class="intro">Sign up your account to proceed.</p>

        @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" class="input-box" placeholder="Enter your full name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="input-box" placeholder="Enter your email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="input-box" placeholder="Enter your password" required>
                
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="input-box" placeholder="Confirm your password" required>
                <div class = "show-pw-section">
                    <input type="checkbox" onclick="myFunction()"><span class ="show-pw">Show Password</span>
                </div>
                <button type="submit" class="signup-btn">SIGN UP</button>
            </form>
            <p>Already have an account? <a href="{{ route('frontend.login') }}">Log In</a></p>
        </div>
    </div>
    <footer>
        <div class="footer-bar">
            <h4>©️ 2024 - Connecteam | All rights reserved.</h4>
        </div>
    </footer>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            var y = document.getElementById("password_confirmation");
            if (x.type === "password" && y.type === "password") {
                x.type = "text";
                y.type = "text"
            } else {
                x.type = "password";
                y.type = "password";
            }
        }
    </script>
</body>
</html>
