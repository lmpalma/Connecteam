<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/" type="image/x-icon">
    <title>Connecteam - LOGIN</title>
    <style>
        body {
            min-height: 100vh;
            background-image: url("./assets/images/bg1.png");
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
            padding: 0 20px;
        }
        .web-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
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
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            font-size: 14px;
            font-family: Verdana;
            color: rgb(0, 0, 0);
            align-self: flex-start;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            height: 40px; 
            font-size: 16px;
            margin: 10px 0; 
            padding: 0 10px; 
            background: rgba(155, 62, 164, 0.5);
            border: 2px solid rgb(100, 0, 153);
            border-radius: 10px;
            outline: none;
        }
        button {
            margin-top: 15px;
            width: 100%;
            height: 40px;
            font-size: 16px; 
            color: white;
            background-color: rgb(100, 0, 153);
            border-radius: 10px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: rgb(0, 0, 0);
        }
        p {
            font-size: 12px;
            font-family: Verdana;
            color: rgb(0, 0, 0);
            text-align: center;
            margin: 10px 0;
        }
        a {
            font-style: italic;
            color: rgb(0, 0, 0);
        }
        .footer-bar {
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
        }
        .intro {
            font-size: 18px;
            font-family: Tahoma;
            text-align: center;
            margin: 0;
            margin-bottom: 30px; 
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 30px;
            }
            .welcome {
                font-size: 30px;
            }
            .intro {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="./assets/images/icon.png" class="web-img" alt="Logo">
        <h1 class="web-title">Connecteam</h1>
    </div>
    <div class="page-area">
        <h1 class="welcome">WELCOME BACK!</h1>
        <p class="intro">We are glad to see you again.</p>
        <div class="container">
            <label for="email">Email:</label>
            <input type="text" id="email" class="input-box" placeholder="Enter your email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" class="input-box" placeholder="Enter your password" required>
            <p>Forgot password? <a href="signup.html">Click Here</a></p>
            <p>Don't have an account? <a href="{{ route('frontend.signup') }}">Sign Up</a></p>
            <button type="button" class="login-btn">LOGIN</button>
        </div>
    </div>
    <footer>
        <div class="footer-bar">
            <h4>©️ 2024 - Connecteam | All rights reserved.</h4>
        </div>
    </footer>
</body>
</html>
