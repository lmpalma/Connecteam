<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <title>Connecteam - Add User</title>
        <style>
            body{
                min-height: 100vh;
                background-image: url('{{ asset('assets/images/bg3.png') }}');
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

            .admin-name{
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
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                
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
                width: 100%;
                padding: 12px;
                margin-bottom: 15px; 
                border-radius: 10px;
                border: solid 1px #cccccc;
                background: rgba(252, 252, 252, 0.9);
                font-family: Verdana;
                font-size: 16px;
                transition: border-color 0.3s ease;
            }
            input[type="text"]:focus, textarea:focus, input[type="email"]:focus, input[type="password"]:focus {
                border-color: #5b3a9b;
                outline: none;
            }

            /* .input-box{
                min-width: 38vw;
                max-width: 38vw;
                margin: 2px;
                margin-left: 10px;
                height: 25px;
                font-size: 14px;
                background: rgba(252, 252, 252, 0.7);
                border-radius: 10px;
                border: solid black 2px;
            }
            .input-box2{
                min-width: 38vw;
                max-width: 38vw;
                margin: 2px;
                margin-left: 10px;
                height: 10vh;
                font-size: 14px;
                background: rgba(252, 252, 252, 0.7);
                border-radius: 10px;
                border: solid black 2px;
            }
            .input-box3{
                width: 15vw;
                margin: 2px;
                margin-left: 10px;
                height: 25px;
                font-size: 14px;
                background: rgba(252, 252, 252, 0.7);
                border-radius: 10px;
                border: solid black 2px;
            } */
            .update-button {
                width: 50%;
                padding: 10px;
                font-size: 16px;
                color: #5b3a9b;
                background-color: white;
                border-radius: 10px;
                border: none;
                font-family: Verdana;
                cursor: pointer;
                transition: background-color 0.3s ease;
                outline: 1px solid #5b3a9b;
            }

            .update-button:hover {
                color: white;
                background-color: #5b3a9b;
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
                    <div class="img">
                        <img
                            src="https://api.dicebear.com/9.x/thumbs/svg?seed={{ urlencode($user->name) }}"
                            alt="Avatar"
                            onerror="this.onerror=null; this.src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=120&background=random&color=fff';">
                    </div>
                    <h3 class = "admin-name">{{ $user->name }}</h3>
                    <br><br>
                    <a class = "menu-list" href = "{{ route('admin.dashboard') }}"><i class="fa fa-layer-group"></i>
                    <span style="margin-left: 10px; font-style: italic;">Dashboard</span></a>
                    <a class = "menu-list" href = "{{ route('admin.notifications') }}"><i class="fa-solid fa-bell"></i>
                    <span style="margin-left: 10px; font-style: italic;">Notifications</a>
                    <a class = "menu-list" href = "{{ route('admin.task.create') }}"><i class="fa fa-plus"></i>
                    <span style="margin-left: 10px; font-style: italic;">Create Task</a>
                    <a class = "current-page" href = "{{ route('admin.user.index') }}"><i class="fa fa-users"></i>
                    <span style="margin-left: 10px; font-style: italic;">Manage Users</a>
                    <a class = "menu-list" href = "{{ route('admin.task.index') }}"><i class="fa fa-list-check"></i>
                    <span style="margin-left: 10px; font-style: italic;">All Tasks</a>
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
        <h2>Edit User</h2>
            <form action="{{ route('admin.user.update', $editUser->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" name="name" id="name" class="input-box" value="{{ old('name', $editUser->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="input-box" value="{{ old('email', $editUser->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="input-box" placeholder="Leave blank to keep current password">
                </div>

                <div style="display: flex; justify-content: center; margin-top: 20px;">
                    <button type="submit" class="update-button">UPDATE USER</button>
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