<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <title>Connecteam - Edit Profile</title>
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
                min-height: 72vh;
                animation: fadeIn 2s;
            }
            @keyframes fadeIn {
                0% { opacity: 0; }
                100% { opacity: 1; }
            }
            .header{
                width: 100%;
                background: #382E90;
                align-items: center;
                height: 10vh;
                margin-top: 0;
                margin-bottom: 5px;
                display: flex;
                z-index: 1;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.6)
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
                font-size: 22px;
                font-family: Verdana;
                color: white;
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
                margin-left: 26px;
            }
            .menu{
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 18vw;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                margin-top: 5px;
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
                display: block;
                color: black;
            }
            .dropdown-menu{
                position: relative;
                display: inline-block;
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
            
            .employee-name{
                font-size: 16px;
                font-family: Verdana;
                font-weight: bold;
                margin: 10px;
                color: black;
                text-align: center;
            }

            section {
                width: 40vw;
                align-items: center;
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
                margin-bottom: 50px;
                padding: 30px;
                background-color: white;
                border-radius: 20px;
                box-shadow:purple 0 0 4px;
                
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
            label {
                font-size: 14px;
                font-family: Verdana;
                color: rgb(50, 50, 50);
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            input[type="text"], input[type="email"], input[type="password"] {
                width: 96%;
                padding: 12px;
                margin-bottom: 15px; 
                border-radius: 10px;
                border: solid 1px #cccccc;
                background: rgba(252, 252, 252, 0.9);
                font-family: Verdana;
                font-size: 16px;
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

            .update-button {
                margin: 25px auto 0; 
                display: block;
                width: 50%;
                height: 30px;
                font-size: 16px;
                color: white;
                background-color: #5b3a9b;;
                border-radius: 10px;
                cursor: pointer;
                border: none;
                transition: background-color 0.3s;
                outline: 1px solid #5b3a9b;
            }

            .update-button:hover {
                color: #5b3a9b;
                background-color: white;
                cursor: pointer;
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
            h2{
                font-size: 25px;
                font-family: Verdana;
                text-align: center;
                margin-left: 20px;
                color: #5b3a9b;
            }
            
            .footer-bar{
                height: 8vh;
                background-color: #382E90;
                color: white;
                text-align: center;
                padding: 30px;
                margin-top: 8%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            h4{
                font-size: 12px;
                text-align: center;
                padding: 30px;
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

            /*notification-css-employee*/
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
                margin-right: 20px;
                margin-left: auto;
            }

            .dropdown-notif .show {
                display: block;
            }
            
            .notif {
                display: none;
                position: absolute;
                background-color: #DFB2FF;
                min-width: 20vw;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                margin-top: 5px;
                box-shadow: rgb(58, 34, 82) 0 0 4px;
                right: 0;
                border-radius: 5px;
                padding: 6px;
            }

            .notif-name{
                font-size: 18px;
                font-family: Verdana;
                font-weight: bold;
                padding-bottom: 16px;
                color: black;
                text-align: center;
                border-radius: 5px;
                border-bottom: 2px solid white;
            }

            .notif-item {
                width: 100%;
                text-decoration: none;
                font-size: 15px;
                font-family: Verdana, sans-serif;
                list-style-type: none;
                border-bottom: 2px solid white;
                text-align: center;
                display: inline-block;
                color: black;
                transition: background-color 0.2s;
                padding-bottom: 16px;
                padding-top: 10px;
            }

            .notif-item:hover {
                background-color: #f0f0f0;
                color: #382E90;
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
            
            /*web-responsiveness*/
            @media only screen and (max-width: 768px) {
                .left-nav {
                    flex: 0 0 30vw;
                }
                .box {
                    width: 80vw;
                }
                .drop-btn {
                    font-size: 28px;
                    padding: 10px;
                    margin-left: 20px;
                }
                .notif-btn {
                    font-size: 30px;
                }
                .notif-name, .view-all-notifications {
                    font-size: 16px;
                }
                .notif-item {
                    font-size: 14px;
                }
                .menu, .notif{
                    min-width: 60vw;
                }
                .menu-list {
                    font-size: 14px;
                    padding-top: 16px;
                    padding-bottom: 16px;
                }
                .current-page {
                    font-size: 14px;
                    padding-top: 16px;
                    padding-bottom: 16px;
                }
                .img {
                    height: 100px;
                    width: 100px;
                    margin-top: 30px;
                    margin-bottom: 15px;
                }
                .employee-name {
                    font-size: 14px;
                }
                td {
                    font-size: 14px;
                }
                h2{
                    font-size: 26px;
                }
                section {
                    width: 70%;
                }
                label, input[type="email"], input[type="text"], input[type="password"], .update-button {
                    font-size: 14px;
                }
            }

            @media only screen and (max-width: 480px) {
                .web-img {
                    margin-left: 10px;
                    width: 36px;
                    height: 36px;
                }
                .drop-btn {
                    font-size: 24px;
                    padding: 8px;
                    margin-left: 15px;
                }
                .notif-btn {
                    font-size: 28px;
                }
                .badge {
                    width: 6px;
                    height: 6px;
                }

                .menu-list {
                    font-size: 12px;
                    padding-top: 14px;
                    padding-bottom: 14px;
                }
                .current-page {
                    font-size: 12px;
                    padding-top: 14px;
                    padding-bottom: 14px;
                }
                .img {
                    height: 80px;
                    width: 80px;
                    margin-top: 20px;
                    margin-bottom: 10px;
                }
                .employee-name {
                    font-size: 12px;
                }
            }

        </style>
    </head>
    <body>
        <div class = "header">
            <div class = "dropdown-menu">
                <button type = "button" class = "drop-btn" onClick = "menuFunction()"><i class="fa fa-bars"></i></button>
                <div class = "menu" id = "menuDropdown">
                    <div class="img">
                        <img
                            src="https://api.dicebear.com/9.x/thumbs/svg?seed={{ urlencode($user->name) }}"
                            alt="Avatar"
                            onerror="this.onerror=null; this.src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=120&background=random&color=fff';">
                    </div>
                    <h3 class = "employee-name">{{ $user->name }}</h3>
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
            <img src="{{ asset('assets/images/icon2.png') }}" class="web-img" alt="Connecteam Logo">
            <h1 class = "web-title">Connecteam</h1>

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
        <div class = "page">

        @if ($errors->any())
            <div class="alert-error" style="display: flex; justify-content: center; align-items: center; margin: 20px auto; width: fit-content;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section>
        <h2>EDIT PROFILE</h2>
            <form action="{{ route('employee.profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" name="name" id="name" class="input-box" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="input-box" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="input-box" placeholder="Leave blank to keep current password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="input-box" placeholder="Leave blank to keep current password">
                </div>
                <div class = "show-pw-section">
                    <input type="checkbox" onclick="myFunction()"><span class ="show-pw">Show Password</span>
                </div>

                <div style="display: flex; justify-content: center; margin-top: 20px;">
                    <button type="submit" class="update-button">UPDATE PROFILE</button>
                </div>
            </form>
        </section>
        </div>
    </body>
    <footer>
        <div class = "footer-bar">
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

        /*show password function*/
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
</html>