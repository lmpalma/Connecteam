<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>Connecteam - Profile</title>
        <style>
            body {
                min-height: 100vh;
                background-image: url('{{ asset('assets/images/bg2.png') }}');
                background-repeat: no-repeat;
                background-size: cover;
                margin: 0;
                font-family: Verdana, sans-serif;
            }
            .page {
                width: 100%;
                min-height: 90vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .header {
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
            .web-img {
                margin-left: 20px;
                padding: 10px;
                width: 50px;
                height: 50px;
                border-radius: 50%;
            }
            .web-title {
                justify-content: space-around;
                margin-top: auto;
                margin-bottom: auto;
                align-items: center;
                font-size: 20px;
                font-family: Verdana;
                color: white;
            }
            .page-area {
                padding: 10px;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            /* Left Menu (Profile) */
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
                min-width: 18vw;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                margin-top: 20px;
                box-shadow: rgb(58, 34, 82) 0 0 4px;
            }
            .menu-list{
                width: 100%;
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
            .dropdown-menu{
                position: relative;
                display: inline-block;
                margin-left: 24px;
            }
            .drop-btn:hover{
                cursor: pointer;
            }
            .show {display: block;}
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
                width: 100%;
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

            .img{
                height: 120px;
                width: 120px;
                margin: auto;
                margin-top: 50px;
                margin-bottom: 20px;
            }

            .img img {
                border-radius: 10px;
                border: 2px solid #5b3a9b;
                display: block;
                background-color: #f0f0f0;
            }
            
            .employee-name {
                font-size: 16px;
                font-family: Verdana;
                font-weight: bold;
                margin: 10px;
                color: black;
                text-align: center;
            }
            
            .container {
                width: 90%;
                max-width: 400px;
                padding: 40px;
                border: solid #5b3a9b 2px;
                background-color: #e3e8e8;
                border-radius: 20px;
                text-align: center;
            }
            .container-name{
                font-size: 18px;
                font-family: Verdana;
                text-align: center;
            }
            h2 {
                font-size: 24px;
                font-family: Verdana;
                color: #5b3a9b;
                margin-bottom: 20px;
            }
            .info {
                font-size: 16px;
                margin: 10px 0;
            }
            .censored {
                color: gray;
            }
            .edit-btn {
                margin: 25px auto 0; 
                display: block;
                width: 50%;
                height: 30px;
                font-size: 15px;
                background-color: rgb(46, 19, 83);
                border-radius: 10px;
                color: white;
                border: none;
            }
            .edit-btn:hover {
                background-color: rgb(255, 255, 255);
                color: rgb(0, 0, 0);
                cursor: pointer;
            }
            .footer-bar {
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
            h4 {
                font-size: 12px;
                text-align: center;
                padding: 20px;
                color: white;
            }
            
            .userdp {
                width: 70px;
                height: 70px;
                margin: 20px;
                border-radius: 20px;
                border: solid black 1px;
            }
            h3 {
                font-family: Verdana;
                font-size: 16px;
                margin-top: 40px;
            }
            p {
                margin: 20px;
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

            .notif-btn{
                color: white;
                font-size: 38px;
                border: none;
                cursor: pointer;
                background-color: transparent;
                font-stretch: wider;
                padding: 12px;
                position: relative;
            }

            .badge {
                position: absolute;
                top: 8px;
                right: 8px;
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background-color: red;
                display: inline-block;
                border: 1px solid white;
            }

            .dropdown-notif {
                position: relative;
                display: inline-block;
                margin-right: 50px;
                margin-left: auto;
            }

            .dropdown-notif .show {
                display: block;
            }
            
            .notif {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 15vw;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                margin-top: 10px;
                box-shadow: rgb(58, 34, 82) 0 0 4px;
                right: 0;
            }

            .notif-name{
                font-size: 16px;
                font-family: Verdana;
                font-weight: bold;
                margin: 10px;
                margin-top: 15px;
                color: black;
                text-align: center;
                border-bottom: 1px solid lightgray;
            }

            .notif-item {
                width: 100%;
                text-decoration: none;
                font-size: 16px;
                font-family: Verdana, sans-serif;
                list-style-type: none;
                padding: 12px 0;
                border-bottom: 1px solid lightgray;
                text-align: center;
                display: block;
                color: black;
                transition: background-color 0.2s;
            }

            .notif-item:hover {
                background: rgba(46, 19, 83, 0.3);
                color: rgb(41, 6, 75);
            }

            .view-all-notifications {
                text-decoration: underline;
                font-weight: normal;
                color: black;
                display: block;
                font-style: normal;
                padding: 12px 0;
                text-align: center;
            }

            .view-all-notifications:hover {
                background-color: #f0f0f0;
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
        <div class="header">
            <div class="dropdown-menu">
                <button type="button" class="drop-btn" onClick="menuFunction()"><i class="fa fa-bars"></i></button>
                <div class="menu" id="menuDropdown">
                    <div class="img">
                        <img
                            src="https://api.dicebear.com/9.x/thumbs/svg?seed={{ urlencode($user->name) }}"
                            alt="Avatar"
                            onerror="this.onerror=null; this.src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=120&background=random&color=fff';">
                    </div>
                    <h3 class="employee-name">{{ $user->name }}</h3>
                    <br><br>
                    <a class="menu-list" href="{{ route('employee.dashboard') }}">
                        <i class="fa fa-layer-group"></i>
                        <span style="margin-left: 10px; font-style: italic;">Dashboard</span>
                    </a>
                    <a class = "menu-list" href = "{{ route('employee.notifications') }}"><i class="fa-solid fa-bell"></i>
                    <span style="margin-left: 10px; font-style: italic;">Notifications</a>
                    <a class="menu-list" href="{{ route('employee.task.index') }}">
                        <i class="fa fa-rectangle-list"></i>
                        <span style="margin-left: 10px; font-style: italic;">My Tasks</span>
                    </a>
                    <a class="current-page" href="{{ route('employee.profile.index') }}">
                        <i class="fa fa-circle-user"></i>
                        <span style="margin-left: 10px; font-style: italic;">Profile</span>
                    </a>
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
            <h1 class="web-title">Connecteam</h1>

            <div class = "dropdown-notif">
                <button type = "button" class = "notif-btn" onClick = "notifFunction()"><i class="fa-solid fa-bell"></i><span id="notifBadge" class="badge" style="display: none;"></span></button>
                <div class = "notif" id = "notifDropdown">
                    <h3 class="notif-name">Notifications</h3>
                    <div id="notifContent">
                        <a class="notif-item">Loading notifications...</a>
                    </div>
                    <a class="view-all-notifications" href="{{ route('employee.notifications') }}">View All Notifications</a>
                </div>
            </div>

        </div>
        <div class="page">

            <div class="container">
                <h2>PROFILE</h2>
                <div class="info">
                    <strong>Full Name:</strong> {{ $user->name }}
                </div>
                <div class="info">
                    <strong>Email:</strong> {{ $user->email }}
                </div>
                <div class="info">
                    <strong>Password:</strong> <span class="censored">********</span>
                </div>
                <div class="info">
                    <strong>Joined At:</strong> {{ $user->created_at->format('M d, Y') }}
                </div>

                @if (session('success'))
                    <div class="alert-success" style="display: flex; justify-content: center; align-items: center; margin: 20px auto; width: fit-content;">
                        {{ session('success') }}
                    </div>
                @endif

                <button class="edit-btn" onclick="location.href='{{ route('employee.profile.edit') }}'">Edit Profile</button>
            </div>
        </div>
    </body>
    <footer>
        <div class="footer-bar">
            <h4>©️ 2024 - Connecteam | All rights reserved.</h4>
        </div>
    </footer>
    <script>
        let hasNewNotifications = false;

        function menuFunction() {
            document.getElementById("menuDropdown").classList.toggle("show");
        }

        function notifFunction() {
            const notifDropdown = document.getElementById("notifDropdown");
            const notifContent = document.getElementById("notifContent");
            const notifBadge = document.getElementById("notifBadge");

            notifDropdown.classList.toggle("show");

            if (notifDropdown.classList.contains("show")) {
                notifContent.innerHTML = '<a class="notif-item">Loading notifications...</a>';
                notifBadge.style.display = "none";

                fetch('{{ route('employee.notifications.fetch') }}')
                    .then(response => response.json())
                    .then(data => {
                        notifContent.innerHTML = "";

                        const notifications = data.notifications;

                        hasNewNotifications = data.hasNewNotifications;

                        if (notifications.length > 0) {
                            notifications.forEach(notification => {
                                const notifItem = document.createElement('a');
                                notifItem.classList.add('notif-item');
                                notifItem.href = '{{ route('employee.task.index') }}';
                                notifItem.innerHTML = notification.message;
                                notifContent.appendChild(notifItem);
                            });
                        } else {
                            notifContent.innerHTML = '<a class="notif-item">No new notifications</a>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching notifications:', error);
                        notifContent.innerHTML = '<a class="notif-item">Error loading notifications</a>';
                    });
            } else {
                notifBadge.style.display = "none"; 
                hasNewNotifications = false;
            }
        }

        function checkForNewNotifications() {
            fetch('{{ route('employee.notifications.fetch') }}')
                .then(response => response.json())
                .then(data => {
                    const notifications = data.notifications;

                    hasNewNotifications = data.hasNewNotifications;

                    const notifBadge = document.getElementById("notifBadge");
                    if (hasNewNotifications) {
                        notifBadge.style.display = "inline-block"; 
                    } else {
                        notifBadge.style.display = "none";
                    }
                })
                .catch(error => {
                    console.error('Error checking notifications on load:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            checkForNewNotifications();
        });

        window.onclick = function(event) {
            var menuDropdown = document.getElementById("menuDropdown");
            var menuButton = document.querySelector('.drop-btn');
            
            var notifDropdown = document.getElementById("notifDropdown");
            var notifButton = document.querySelector('.notif-btn');
            
            if (!menuButton.contains(event.target) && !menuDropdown.contains(event.target)) {
                if (menuDropdown.classList.contains('show')) {
                    menuDropdown.classList.remove('show');
                }
            }

            if (!notifButton.contains(event.target) && !notifDropdown.contains(event.target)) {
                if (notifDropdown.classList.contains('show')) {
                    notifDropdown.classList.remove('show');
                }
            }
        };

        function initNotificationBadge() {
            const notifBadge = document.getElementById("notifBadge");
            notifBadge.style.display = hasNewNotifications ? "inline-block" : "none";
        }

        document.addEventListener('DOMContentLoaded', initNotificationBadge);
    </script>
</html>
