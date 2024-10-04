<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="/" type="image/x-icon">

        <title>Connecteam - SIGNUP</title>
        <style>
            body{
                min-height: 100vh;
                background-image: url("./assets/images/bg1.png");
                background-repeat: none;
                background-size: cover;
            }
            .page{
                width: 100%;
                height: 100%;
            }
            .header{
                width: 100%;
                border-bottom: solid gray 2px;
                height: 10vh;
                margin-top: 0;
                margin-bottom: 5px;
                display: flex;
            }
            .web-img{
                margin-left: 20px;
                padding: 10px;
                width: 50px;
                height: 50px;
                border-radius: 50%;
            }
            .web-title{
                padding: 10px;
                justify-content: space-around;
                margin-left: 15px;
                align-items: center;
                font-size: 20px;
                font-family: Verdana;
                color: #5b3a9b;
            }
            .page-area{
                padding: 10px;
                margin-top: 10px;
                margin-bottom: 10px;
                
            }
            .container{
                width: 25vw;
                height: 50vh;
                padding: 40px;
                margin-left: auto;
                margin-right: auto;
                background-color: white;
                border-radius: 20px;
                margin-top: 30px;
                margin-bottom: 30px;
                box-shadow: black 0 0 5px;
            }
            .container-name{
                font-size: 18px;
                font-family: Verdana;
                text-align: center;
                color: rgb(0, 0, 0);
            }
            label{
                font-size: 14px;
                font-family: Verdana;
                color: rgb(0, 0, 0);
            } 
            input{
                width: 23vw;
                margin: 2px;
                margin-left: 10px;
                height: 25px;
                font-size: 14px;
                color: black;
                background: rgba(155, 62, 164, 0.5);
                border-radius: 10px;
            }
            button{
                margin-inline-start: 25%;
                width: 50%;
                height: 30px;
                font-size: 15px;
                color: white;
                background-color: rgb(100, 0, 153);
                border-radius: 10px;
            }
            button:hover{
                background-color: rgb(0, 0, 0);
                color: white;
                cursor: pointer;
            }
            p{
                font-size: 12px;
                font-family: Verdana;
                text-align: center;
                color: rgb(0, 0, 0);
                text-shadow: black 2px 2px 5px;
            }
            a{
                font-style: italic;
                color: rgb(0, 0, 0);
            }
            .footer-bar{
                margin-bottom: 0;
                height: 10vh;
                width: 100%;
                border-top: solid gray 2px;
                margin-top: -10px;
            }
            h4{
                font-size: 12px;
                text-align: center;
                padding: 20px;
                color:white;
            }
            .welcome{
                font-size: 45px;
                text-align: center;
                font-family: Tahoma;
            }
        </style>
    </head>
    <body>
        <div class = "page">
            <div class = "header">
                <!-- <div class = "navigation"></div> -->
                 <img src = "./assets/images/icon.png" class = "web-img">
                <h1 class = "web-title">Connecteam</h1>
            </div>
            <div class = "page-area">
                <h1 class = "welcome">CREATE AN ACCOUNT</h1>
                <div class = "container">
                    <label>Full Name</label><br>
                    <input type = "text" class = "input-box">
                    <br><br>
                    <label>Email</label><br>
                    <input type = "text"  class = "input-box">
                    <br><br>
                    <label>Password</label><br>
                    <input type = "password"  class = "input-box">
                    <br><br>
                    <label>Confirm Password</label><br>
                    <input type = "password"  class = "input-box">
                    <br><br><br>
                    <button type ="button" class = "login-btn">SIGN UP</button>
                    <p>Already have an account? <a href = "{{ route('frontend.login') }}">Log In</a></p>
                </div>
            </div>
        </div>
    </body>
    <footer>
        <div class = "footer-bar">
            <h4>©️ 2024 - Connecteam | All rights reserved.</h4>
        </div>
    </footer>
</html>