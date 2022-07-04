<?php $menus = config('menu'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('public/admin')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('public/admin')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('public/admin')}}/css/AdminLTE.css">
    <link rel="stylesheet" href="{{ url('public/admin')}}/css/_all-skins.min.css">
    <link rel="stylesheet" href="{{ url('public/admin')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ url('public/admin')}}/css/style.css" />
    <script src="js/angular.min.js"></script>
    <script src="js/app.js"></script>
    @yield('css')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Quản trị viên</b></span>

            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">

                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <div class="demo" style="color: black;">
                            @if (auth()->check())
                            <!-- <h1>người dùng </h1> -->
                            <button type="button" class="btn btn-success"><a href="" style="color: black;"><i
                                        class="fa fa-user"></i>
                                    {{auth()->user()->name}} </a></button>
                            <button type="button" class="btn btn-primary"><a href="{{route('admin.logout')}}"
                                    style="color: black;"> | Thoát đăng nhập</a></button>

                            @else
                            <button type="button" class="btn btn-success"><a href="{{route('admin.login')}}"
                                    style="color: black;"> Đăng nhập</a></button>

                            @endif
                        </div>

                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    @foreach($menus as $mn)
                    @if(isset($mn['items']) && count($mn['items']) > 0)
                    <li class="treeview">
                        <a href="#">
                            <i class="fa {{$mn['icon']}}"></i> <span>{{$mn['title']}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @foreach($mn['items'] as $item)
                            <li><a href="{{route($item['route'])}}"><i class="fa fa-circle-o"></i>{{$item['title']}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @else
                    <li>
                        <a href="{{route($mn['route'])}}">
                            <i class="fa {{$mn['icon']}}"></i> <span>{{$mn['title']}}</span>
                            <span class="pull-right-container">
                                <!-- <small class="label pull-right bg-green">Hot</small> -->
                            </span>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </section>

            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">

            <section class="content">

                <div class="box">
                    @if(Session::has('no'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('no')}}
                    </div>
                    @endif
                    @if(Session::has('oke'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('oke')}}
                    </div>
                    @endif

                    <div class="box-body">
                        @yield('noidungadmin')
                    </div>

                </div>
            </section>
        </div>
    </div>
    <script src="{{ url('public/admin')}}/js/jquery.min.js"></script>
    <script src="{{ url('public/admin')}}/js/jquery-ui.js"></script>
    <script src="{{ url('public/admin')}}/js/bootstrap.min.js"></script>
    <script src="{{ url('public/admin')}}/js/adminlte.min.js"></script>
    <script src="{{ url('public/admin')}}/js/dashboard.js"></script>
    <script src="{{ url('public/admin')}}/tinymce/tinymce.min.js"></script>
    <script src="{{ url('public/admin')}}/tinymce/config.js"></script>
    <script src="{{ url('public/admin')}}/js/function.js"></script>
    @yield('js')
</body>

</html>