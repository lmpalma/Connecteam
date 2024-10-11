<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <title>Connecteam - My Tasks</title>
        <style>
            body{
                min-height: 100vh;
                background-image: url('{{ asset('assets/images/bg2.png') }}');
                background-repeat: no-repeat;
                background-size: cover;
                margin: 0;
                font-family: Verdana, sans-serif;
            }
            .page{
                width: 100%;
                min-height: 90vh;
            }
            .header{
                width: 100%;
                background-color: #5b3a9b;
                align-items: center;
                height: 10vh;
                margin-top: 0;
                margin-bottom: 5px;
                display: flex;
                padding: 0 20px;
                z-index: 1;
            }
            .web-img{
                margin-left: 20px;
                padding: 10px;
                width: 50px;
                height: 50px;
                border-radius: 50%;
            }
            .web-title{
                justify-content: space-around;
                margin-top: auto;
                margin-bottom: auto;
                align-items: center;
                font-size: 20px;
                font-family: Verdana;
                color: white;
            }
            .page-area{
                padding: 10px;
                margin-top: 10px;
                margin-bottom: 10px;
                
            }
            .drop-btn{
                color: white;
                font-size: 38px;
                border: none;
                cursor: pointer;
                background-color: transparent;
                font-stretch: wider;
                padding: 12px;
            }
            .menu{
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 12vw;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                margin-top: 20px;
                box-shadow: rgb(58, 34, 82) 0 0 4px;
            }
            .dropdown-menu{
                position: relative;
                display: inline-block;
                margin-left: 24px;
            }
            .drop-btn:hover{
                cursor: pointer;
            }
            .show {display: block;}

            .img{
                height: 120px;
                width: 120px;
                border-radius: 10px;
                background-color: black;
                border: 2px black;
                margin: auto;
                margin-top: 50px;
            }
            .employee-name{
                font-size: 16px;
                font-family: Verdana;
                font-weight: bold;
                margin: 10px;
                color: black;
                text-align: center;
            }
            .menu-list{
                width: 15vw;
                text-decoration: none;
                font-size: 16px;
                font-family: Verdana;
                list-style-type: none;
                padding-top: 18px;
                padding-bottom: 18px;
                border: solid lightgray 2px;
                text-align: center;
                display: inline-block;
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
            .input-box{
                width: 28vw;
                margin: 2px;
                margin-left: 10px;
                height: 25px;
                font-size: 14px;
            }
            .input-box2{
                min-width: 28vw;
                max-width: 28vw;
                margin: 2px;
                margin-left: 10px;
                height: 10vh;
                font-size: 14px;
            }
            select{
                width: 18vw;
                margin: 2px;
                margin-left: 10px;
                height: 25px;
                font-size: 14px;
            }
            p{
                font-size: 12px;
                font-family: Verdana;
                text-align: center;
            }
            .nav{
                font-style: italic;
                color: black;
            }
            /* section{
                padding: 20px;
                display: inline-block;
                align-items: center;
                width: 70vw;
            } */
            .dashboard-row{
                width: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
            }
            .box{
                width: 20%;
                min-height: 280px;
                border-radius: 10px;
                margin: auto;
                background-color: rgb(183, 121, 255);
                opacity: 90%;
                display: flex;
                flex-wrap: wrap;
                border: solid black 2px;
                margin-bottom: 30px;
            }
            h2{
                font-size: 24px;
                font-family: Verdana;
                text-align: center;
                margin-top: 50px;
                color: #5b3a9b;

            }
            
            .footer-bar{
                height: 10vh;
                background-color: #5b3a9b;
                color: white;
                text-align: center;
                padding: 30px;
                margin-top: auto;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            h4{
                font-size: 12px;
                text-align: center;
                padding: 20px;
                color:white;
            }
            a{
                text-decoration: none;
            }
            a:hover{
                background: rgba(46, 19, 83, 0.3);
                color: rgb(41, 6, 75);
            }
            .current-page{
                background: rgba(46, 19, 83, 0.5);
                text-decoration: none;
                width: 15vw;
                font-size: 16px;
                font-family: Verdana;
                font-weight: bold;
                list-style-type: none;
                padding-top: 18px;
                padding-bottom: 18px;
                border: solid lightgray 2px;
                text-align: center;
                display: inline-block;
                color: rgb(41, 6, 75);
            }
            .userdp{
                width: 70px;
                height: 70px;
                margin: 20px;
                border-radius: 20px;
                border: solid black 1px;
            }
            h3{
                font-family: Verdana;
                font-size: 16px;
                margin-top: 40px;
            }
            p{
                margin: 20px;
            }
            .view-btn{
                margin-top: 25px;
                margin-inline-start: 25%;
                width: 50%;
                height: 30px;
                font-size: 15px;
                background-color: rgb(46, 19, 83);
                border-radius: 10px;
                color: white;
            }
            .view-btn:hover{
                background-color: rgb(255, 255, 255);
                color: rgb(0, 0, 0);
                cursor: pointer;
            }
            .btn-container{
                width: 100%;
                height: 50px;
            }
            .createTask{
                margin: auto;
                display: block;
                width: 120px;
                height: 30px;
                font-size: 15px;
                background: rgba(46, 19, 83, 0.8);
                border-radius: 10px;
                color: white;
            }
            .createTask:hover{
                background-color: rgb(255, 255, 255);
                color: black;
                cursor: pointer;
            }

            .filter-container {
                text-align: center;
                margin: 20px 0;
            }

            .filter-link {
                margin: 0 15px;
                text-decoration: underline;
                font-family: Verdana, sans-serif;
                font-size: 16px;
                color: #5b3a9b;
                cursor: pointer;
            }

            .filter-link:hover {
                color: rgb(46, 19, 83);
            }

            .filter-link.active {
                font-style: italic;
                font-weight: bold;
            }

            .main-table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: lightgray;
            border-radius: 10px;
            overflow: hidden;
            }
            .main-table th, .main-table td {
                border: 1px solid #ddd;
                padding: 12px;
                text-align: center;
            }
            .main-table th {
                background-color: #5b3a9b;
                color: white;
            }
            .edit-btn, .delete-btn {
                text-decoration: none;
                padding: 5px 10px;
                border-radius: 5px;
                color: white;
                transition: background-color 0.3s;
            }
            .edit-btn {
                background-color: rgb(46, 19, 83);
            }
            .edit-btn:hover {
                background-color: rgb(255, 255, 255);
                color: rgb(0, 0, 0);
            }
            .delete-btn {
                background-color: red;
            }
            .delete-btn:hover {
                background-color: rgb(255, 255, 255);
                color: rgb(0, 0, 0);
            }

            .alert-success {
                padding: 10px;
                margin: 10px 0; 
                background-color: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
                border-radius: 5px;
                width: 100%;
                max-width: 350px;
                text-align: center;
                font-family: Tahoma;
                font-size: 16px;
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
                .left-nav {
                    flex: 0 0 30vw;
                }
                .box {
                    width: 80vw;
                }
            }

        </style>
    </head>
    <body>
        <div class = "header">
            <div class = "dropdown-menu">
                <button type = "button" class = "drop-btn" onClick = "menuFunction()"><i class="fa fa-bars"></i></button>
                <div class = "menu" id = "menuDropdown">
                    <div class = "img"></div>
                    <h3 class = "employee-name">{{ $user->name }}</h3>
                    <br><br>
                    <a class = "menu-list" href = "{{ route('employee.dashboard') }}"><i class="fa fa-layer-group"></i>
                    <span style="margin-left: 10px; font-style: italic;">Dashboard</span></a>
                    <a class = "current-page" href = "{{ route('employee.notifications') }}"><i class="fa-solid fa-bell"></i>
                    <span style="margin-left: 10px; font-style: italic;">Notifications</a>
                    <a class = "menu-list" href = "{{ route('employee.task.index') }}"><i class="fa fa-rectangle-list"></i>
                    <span style="margin-left: 10px; font-style: italic;">My Tasks</a>
                    <a class = "menu-list" href = "{{ route('employee.profile.index') }}"><i class="fa fa-circle-user"></i>
                    <span style="margin-left: 10px; font-style: italic;">Profile</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                    <a class="menu-list" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-arrow-right-to-bracket"></i>
                        <span style="margin-left: 10px; font-style: italic;">Log Out</span>
                    </a>            
                </div>
            </div>
            <img src="{{ asset('assets/images/icon.png') }}" class="web-img" alt="Connecteam Logo">
            <h1 class = "web-title">Connecteam</h1>
        </div>
        <div class = "page">
            <!-- <section> -->
                <h2>NOTIFICATIONS</h2>

                @if (session('success'))
                    <div class="alert-success" style="display: flex; justify-content: center; align-items: center; margin: 20px auto; width: fit-content;">
                        {{ session('success') }}
                    </div>
                @endif
                
                <table class="main-table">
                    <tr>
                        <th>#</th>
                        <th>Message</th>
                        <th>Type</th>
                        <th>Date</th>

                    </tr>
                    
                </table>
            <!-- </section> -->
        </div>
    </body>
    <footer>
        <div class = "footer-bar">
            <h4>©️ 2024 - Connecteam | All rights reserved.</h4>
        </div>
    </footer>
    <script>
        function menuFunction() {
            document.getElementById("menuDropdown").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.drop-btn')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

    </script>
</html>