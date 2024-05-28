<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @include('partials.link_script.link')

</head>
<body onLoad="startClock()" onUnLoad="stopClock()" class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper" >
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        @include('partials.menu_bar')

    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->

    <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
        <a href="#" class="brand-link">
            <img src="{{asset('img/icone.png')}}" alt="Start-Up Logo" class="brand-image img-circle elevation-1" style="opacity: .8">

            <span class="brand-text  font-weight-light">Annuaire Start-up</span>
        </a>


        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <!-- renvoie au profil de l'utilisateur -->
                <div class="info">
                    <a href="#" class="d-brand-link">{{auth()->user()->name}}</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                @include('partials.nav')
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Acceuil</a></li>
                            <li class="breadcrumb-item active">@yield('pageName')</li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('partials.alert')
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Copyright © 2020-2021 <a href="https://sonatel.sn">Sonatel.sn</a>.</strong> All rights reserved.

        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0
        </div>
        <!-- Default to the left -->
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>
@include('partials.link_script.script');
</body>
</html>
