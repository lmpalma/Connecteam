<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <title>Connecteam - All Tasks</title>
        <style>
            body{
                min-height: 100vh;
                background-image: url('{{ asset('assets/images/bg.png') }}');
                background-repeat: no-repeat;
                background-size: cover;
                margin: 0;
                font-family: Verdana, sans-serif;
            }
            .page{
                width: 100%;
                min-height: 90vh;
                animation: fadeIn 1s;
            }
            @keyframes fadeIn {
                0% { opacity: 0; }
                100% { opacity: 1; }
            }
            .header{
                width: 100%;
                background: white;
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
                color: #5b3a9b;
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
            /* Left Menu (Profile) */
            .drop-btn{
                color: #5b3a9b;
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
            
            .admin-name{
                font-size: 16px;
                font-family: Verdana;
                font-weight: bold;
                margin: 10px;
                color: black;
                text-align: center;
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
                font-size: 30px;
                font-family: Verdana;
                text-align: center;
                margin-top: 50px;
                color: #3b3a6b;
            }
            
            .footer-bar {
                height: 8vh;
                background-color: white;
                color: #5b3a9b;
                text-align: center;
                padding: 30px;
                margin-top: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                box-shadow: black 2px 0 5px;
            }
            h4{
                font-size: 12px;
                text-align: center;
                padding: 20px;
                color: #5b3a9b;
            }            
            
            .userdp{
                width: 70px;
                height: 70px;
                margin: 20px;
                border-radius: 20px;
                border: solid black 1px;
                background-image: url('assets/images/default.jpg');
            }
            h3{
                font-family: Verdana;
                font-size: 16px;
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
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .createTask, .exportTasks, .exportUsersAndTasks {
                margin: 0 10px;
                display: block;
                width: 180px;
                height: 30px;
                font-size: 15px;
                background: #5b3a9b;
                border-radius: 5px;
                transition: background-color 0.3s ease;
                color: white;
                border:none;
            }
            .createTask:hover, .exportTasks:hover, .exportUsersAndTasks:hover {
                background: white;
                color: #5b3a9b;
                cursor: pointer;
                outline: 1px solid #5b3a9b;
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
                color: #3b3a6b;
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
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.5);
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
            .action-btns{
                display: flex;
                justify-content: center;
                height: auto;
            }
            .edit-btn, .delete-btn {
                text-decoration: none;
                padding: 5px 10px;
                border-radius: 5px;
                color: white;
                transition: background-color 0.3s;
            }
            .edit-btn {
                width: 20px;
                font-size: 16px;
                color: white;
                background-color: #5b3a9b;
                border-radius: 10px;
                border: none;
                font-family: Verdana;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            .edit-btn:hover {
                color: #5b3a9b;
                background-color: white;
                outline: 1px solid #5b3a9b;
            }
            .delete-btn {
                font-size: 16px;
                width: 20px;
                color: white;
                background-color: rgb(220,53,69);
                border-radius: 10px;
                border: none;
                font-family: Verdana;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            .delete-btn:hover {
                background-color: white;
                color: rgb(220,53,69);
                outline: 1px solid rgb(220,53,69);
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

            /*notification-dropdown-css*/
            .notif-btn{
                color: #5b3a9b;
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
                background-color: #6a4a9b;
                min-width: 20vw;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                margin-top: 5px;
                box-shadow: rgb(58, 34, 82) 0 0 4px;
                right: 0;
                border-radius: 5px;
                padding: 5px;
            }

            .notif-name{
                font-size: 18px;
                font-family: Verdana;
                font-weight: bold;
                padding-bottom: 16px;
                color: white;
                text-align: center;
                border-radius: 5px;
                border-bottom: 2px solid lightgray;
            }

            .notif-item {
                width: 100%;
                text-decoration: none;
                font-size: 15px;
                font-family: Verdana, sans-serif;
                list-style-type: none;
                border-bottom: 2px solid lightgray;
                text-align: center;
                display: inline-block;
                color: white;
                transition: background-color 0.2s;
                padding-bottom: 16px;
                padding-top: 10px;
            }


            .notif-item:hover {
                background: rgba(200, 190, 240, 0.3);
                color: white;
            }

            .view-all-notifications {
                text-decoration: underline;
                font-weight: normal;
                color: white;
                display: block;
                font-style: normal;
                padding: 12px 0;
                text-align: center;
            }

            .view-all-notifications:hover {
                background-color: #f0f0f0;
            }

            .view-all-notifications:hover {
                background-color: #f0f0f0;
            }
            
            
            /*web-responsiveness*/
            @media only screen and (max-width: 820px) {
                .menu, .notif{
                    min-width: 50vw;
                }
                .main-table {
                    width: 80%;
                }
            }

            @media only screen and (max-width: 768px) {
                .header, .page, .footer-bar{
                    width: 180%;
                }
                
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
                
            }

            @media only screen and (max-width: 480px) {
                .header, .page, .footer-bar{
                    width: 200%;
                }

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
                    <h3 class = "admin-name">{{ $user->name }}</h3>
                    <br><br>
                    <a class = "menu-list" href = "{{ route('admin.dashboard') }}"><i class="fa fa-layer-group"></i>
                    <span style="margin-left: 10px; font-style: italic;">Dashboard</span></a>
                    <a class = "menu-list" href = "{{ route('admin.notifications') }}"><i class="fa-solid fa-bell"></i>
                    <span style="margin-left: 10px; font-style: italic;">Notifications</a>
                    <a class = "menu-list" href = "{{ route('admin.task.create') }}"><i class="fa fa-plus"></i>
                    <span style="margin-left: 10px; font-style: italic;">Create Task</a>
                    <a class = "menu-list" href = "{{ route('admin.user.index') }}"><i class="fa fa-users"></i>
                    <span style="margin-left: 10px; font-style: italic;">Manage Users</a>
                    <a class = "current-page" href = "{{ route('admin.task.index') }}"><i class="fa fa-list-check"></i>
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
            <h1 class = "web-title">Admin Panel</h1>

            <div class = "dropdown-notif">
                <button type = "button" class = "notif-btn" onClick = "notifFunction()"><i class="fa-solid fa-bell"></i><span id="notifBadge" class="badge" style="display: none;"></span></button>
                <div class = "notif" id = "notifDropdown">
                    <h3 class="notif-name">Notifications</h3>
                    <div id="notifContent">
                        <a class="notif-item">Loading notifications...</a>
                    </div>
                    <a class="view-all-notifications" href="{{ route('admin.notifications') }}">View All Notifications</a>
                </div>
            </div>

        </div>
        <div class = "page">
            <!-- <section> -->
                <h2>ALL TASKS</h2>
                <div class = "btn-container">
                    <button type="button" class="createTask" onclick="window.location.href='{{ route('admin.task.create') }}'">Create Task</button>
                    <button type="button" class="exportTasks" onclick="window.location.href='{{ route('admin.export.tasks') }}'">Export Tasks</button>
                    <button type="button" class="exportUsersAndTasks" onclick="window.location.href='{{ route('admin.export.combined') }}'">Export Users and Tasks</button>
                </div>

                <div class="filter-container">
                    <a href="{{ route('admin.task.index', ['filter' => 'due_today']) }}" class="filter-link" onclick="filterTasks('today')">Due Today</a>
                    <a href="{{ route('admin.task.index', ['filter' => 'overdue']) }}" class="filter-link" onclick="filterTasks('overdue')">Overdue</a>
                    <a href="{{ route('admin.task.index', ['filter' => 'no_deadline']) }}" class="filter-link" onclick="filterTasks('no_deadline')">No Deadline</a>
                    <a href="{{ route('admin.task.index') }}" class="filter-link" onclick="resetFilters()">Reset</a>
                </div>

                @if (session('success'))
                    <div class="alert-success" style="display: flex; justify-content: center; align-items: center; margin: 20px auto; width: fit-content;">
                        {{ session('success') }}
                    </div>
                @endif
                
                <table class="main-table">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Assigned To</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Files</th>
                    <th>Action</th>
                </tr>
                @foreach($tasks as $index => $task)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{Str::limit( $task->description,'20','...') }}</td>
                        <td>{{ $task->assignedUser ? $task->assignedUser->name : 'Unassigned' }}</td>
                        <td>
                            {{ $task->due_date ? $task->due_date->format('Y-m-d') : 'N/A' }}
                        </td>
                        <td>{{ $task->status }}</td>
                        <td>
                            @if($task->taskFiles->isNotEmpty())
                                @foreach($task->taskFiles as $file)
                                    <div>
                                        <span>{{ $file->file_name }}</span>
                                    </div>
                                @endforeach
                            @else
                                <span>No files uploaded.</span>
                            @endif
                        </td>
                        <td class = "action-btns">
                            @if($task->taskFiles->isNotEmpty())
                            <a href="{{ route('admin.task.files.download', $file->id) }}" class="edit-btn" title = "download file"><i class="fa fa-download"></i></a>
                            @else
                            @endif
                            <a href="{{ route('admin.task.edit', $task->id) }}" class="edit-btn" title = "edit task"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('admin.task.delete', $task->id) }}" class="delete-btn" title = "delete task"
                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this task?')) { document.getElementById('delete-form-{{ $task->id }}').submit(); }"><i class="fa fa-trash"></i></a>
                            <form id="delete-form-{{ $task->id }}" action="{{ route('admin.task.delete', $task->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                    
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

                fetch('{{ route('admin.notifications.fetch') }}')
                    .then(response => response.json())
                    .then(data => {
                        notifContent.innerHTML = "";

                        const notifications = data.notifications;

                        hasNewNotifications = data.hasNewNotifications;

                        if (notifications.length > 0) {
                            notifications.forEach(notification => {
                                const notifItem = document.createElement('a');
                                notifItem.classList.add('notif-item');
                                notifItem.href = '{{ route('admin.task.index') }}';
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
            fetch('{{ route('admin.notifications.fetch') }}')
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