<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="/" type="image/x-icon">

        <title>Connecteam - Dashboard</title>
        <style>
            body{
                min-height: 100vh;
                background-image: url("web bg2.jpg");
                background-repeat: none;
                background-size: cover;
            }
            .page{
                width: 100%;
                height: 100%;
                display: flex;
            }
            .header{
                width: 100%;
                background-color: rgb(130, 173, 225);
                height: 10vh;
                margin-top: 0;
                margin-bottom: 5px;
                border-radius: 10px;
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
            }
            .page-area{
                margin-top: 10px;
                margin-bottom: 10px;
            }
            .left-nav{
                width: 14vw;
                background: rgb(209, 216, 217, 0.6);
                padding: 20px;
                position: sticky;
                min-height: fit-content;
                color: white;
                
            }
            .img{
                height: 120px;
                width: 120px;
                border-radius: 10px;
                background-color: black;
                border: 2px black;
                margin: auto;
                margin-top: 50px;
            }
            .admin-name{
                font-size: 16px;
                font-family: Verdana;
                font-weight: bold;
                margin: 10px;
                text-align: center;
                color: black;
            }
            hr{
                margin-top: 30%;
                margin-bottom: 30%;
            }
            li{
                text-decoration: none;
                font-size: 14px;
                font-family: Verdana;
                list-style-type: none;
                margin-top: 30px;
                font-style: italic;
                color: black;

            }
            .container{
                width: 25vw;
                height: 50vh;
                padding: 40px;
                margin-left: auto;
                margin-right: auto;
                background-color: lightgray;
                border-radius: 20px;
                margin-top: 30px;
                margin-bottom: 30px;
            }
            .container-name{
                font-size: 18px;
                font-family: Verdana;
                text-align: center;
            }
            label{
                font-size: 12px;
                font-family: Verdana;
            }
            input{
                width: 23vw;
                margin: 2px;
                margin-left: 10px;
                height: 25px;
                font-size: 12px;
            }
            button{
                align-items: center;
                width: 100%;
                height: 30px;
                font-size: 12px;
                background-color: darkgray;
            }
            p{
                font-size: 12px;
                font-family: Verdana;
                text-align: center;
            }
            a{
                font-style: italic;
                color: black;
            }
            section{
                display: inline-block;
            }
            .dashboard{
                width:100%;
                display: flex;
                margin-left: 50px;
            }
            .box{
                width: 20vw;
                height: 25vh;
                border-radius: 10px;
                margin: 40px;
                background-color: darkseagreen;
                opacity: 70%;
                display: inline-block;
                border: solid black 2px;
            }
            
            .footer-bar{
                margin-bottom: 0;
                height: 10vh;
                width: 100%;
                background-color: rgb(130, 173, 225);
                margin-top: -10px;
            }
            h4{
                font-size: 12px;
                text-align: center;
                padding: 30px;
            }
            a{
                text-decoration: none;
            }
            a:hover{
                text-shadow: rgb(115, 115, 151) 2px 2px 4px;
            }
        </style>
    </head>
    <body>
        <div class = "header">
            <!-- <div class = "navigation"></div> -->
            <img src = "connecteam.png" class = "web-img">
            <h1 class = "web-title">Connecteam</h1>
        </div>
        <div class = "page">
            
            <div class = "left-nav">
                <div class = "nav-container">
                    <div class = "img"></div>
                    <h3 class = "admin-name">{{ $user->name }}</h3>
                    <hr>
                    <ul class = "nav">
                        <li><b>Dashboard</b></li>
                        <li><a href = "createTask.html">Create Task</li>
                        <li><a href = "manageUsers.html">Manage Users</a></li>
                        <li><a href = "allTask.html">All Tasks</a></li>
                        <li><a href = "login.html">Log Out</a></li>
                    </ul>
                </div>
            </div>
            <!-- <section>
                <div class = "dashboard">
                    <div class = "box"></div>
                    <div class = "box"></div>
                    <div class = "box"></div>
                </div>
                <div class = "dashboard">
                    <div class = "box"></div>
                    <div class = "box"></div>
                    <div class = "box"></div>
                </div>
            </section> -->
        </div>
    </body>
    <footer>
        <div class = "footer-bar">
            <h4>©️ 2024 - Connecteam | All rights reserved.</h4>
        </div>
    </footer>
</html>