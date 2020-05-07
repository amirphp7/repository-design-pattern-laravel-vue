<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Administration | Power</title>

  <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
    <!-- wrapper -->
    <div class="wrapper" id="app">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <div class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" v-model="search" @keyup="searching" type="search" placeholder="Search" aria-label="Search" />
                    <div class="input-group-append">
                        <button class="btn btn-navbar" @click="searching">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" class="nav-link" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off red"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/home" class="brand-link">
                <img src="/assets/img/project.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8" />
                <span class="brand-text font-weight-light"> {{ config('app.name') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/assets/img/profile.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <router-link to="/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/member" class="nav-link">
                                <i class="nav-icon fas fa-user-tie green"></i>
                                <p>Member</p>
                            </router-link>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th-large cyan"></i>
                                <p> Area
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/division" class="nav-link">
                                    <i class="nav-icon fas fa-landmark green-accent"></i>
                                        <p>Division</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/mahanagar" class="nav-link">
                                        <i class="nav-icon fas fa-city green-accent"></i>
                                        <p>Mahanagar</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/thana" class="nav-link">
                                        <i class="nav-icon fas fa-tenge green-accent"></i>
                                        <p>Thana</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/district" class="nav-link">
                                        <i class="nav-icon fas fa-puzzle-piece green-accent"></i>
                                        <p>District</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/upazilla" class="nav-link">
                                        <i class="nav-icon fas fa-magnet green-accent"></i>
                                        <p>Upazilla</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/pourashava" class="nav-link">
                                        <i class="nav-icon fas fa-ruble-sign green-accent"></i>
                                        <p>Pourashava</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/union" class="nav-link">
                                        <i class="nav-icon fas fa-underline green-accent"></i>
                                        <p>Union</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        @if(Auth::user()->type === 'Admin')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs purple"></i>
                                <p> System
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/permission" class="nav-link">
                                    <i class="nav-icon fas fa-users yellow"></i>
                                        <p>Permission</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <a href="/roles" class="nav-link">
                                    <i class="nav-icon fas fa-users yellow"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/users" class="nav-link">
                                    <i class="nav-icon fas fa-users yellow"></i>
                                        <p>Users</p>
                                    </a>
                                </li>                    
                                <li class="nav-item">
                                    <router-link to="/developer" class="nav-link">
                                        <i class="nav-icon fas fa-cogs orange"></i>
                                        <p>Developer</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid pt-3">
                    <router-view></router-view>
                    <vue-progress-bar></vue-progress-bar>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                <?php date_default_timezone_set("Asia/Dhaka"); echo date('h:i a'); ?>
            </div>
            <!-- Default to the left -->
            <strong>&copy; <?php echo date('Y'); ?> 64IO.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <script src="/assets/js/app.js"></script>
</body>
</html>
