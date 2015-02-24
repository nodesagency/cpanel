<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $cpanel['title'] }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.1.0 -->
    {{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css') }}
    <!-- font Awesome -->
    {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ HTML::style('packages/stevemo/cpanel/adminlte/css/ionicons.min.css') }}
    <!-- Select2 3.4.5-->
    {{ HTML::style('packages/stevemo/cpanel/adminlte/select2-3.4.5/select2.css') }}
    {{ HTML::style('packages/stevemo/cpanel/adminlte/select2-3.4.5/select2-bootstrap.css') }}
    <!-- Theme style -->
    {{ HTML::style('packages/stevemo/cpanel/adminlte/css/adminlte.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">

<header class="header">
    <a href="{{route('cpanel.home')}}" class="logo">{{ $cpanel['site_name'] }}</a>

    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>{{ Sentry::getUser()->first_name }} {{ Sentry::getUser()->last_name }} <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="{{asset('nodesagency')}}" class="img-circle" alt="User Image" />
                            <p>
                                {{ Sentry::getUser()->first_name }} {{ Sentry::getUser()->last_name }}
                                <small>Member since {{ Sentry::getUser()->created_at->format('M. Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body"></li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('cpanel.users.show',array(Sentry::getUser()->id))}}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('cpanel.logout')}}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--End of header-->

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('packages/stevemo/cpanel/adminlte/img/user.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Hello, {{ Sentry::getUser()->first_name }}</p>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="{{ Request::is($cpanel['prefix']) ? 'active' : '' }}">
                    <a href="{{route('cpanel.home')}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is($cpanel['prefix'].'/users*') ? 'active' : '' }}">
                    <a href="{{route('cpanel.users.index')}}">
                        <i class="fa fa-user"></i>
                        <span>Users</span>
                    </a>
                </li>
                @if (Request::is($cpanel['prefix'].'/users*'))
                <li class="{{ Request::is($cpanel['prefix'].'/groups*') ? 'active' : '' }}">
                    <a href="{{route('cpanel.groups.index')}}">
                        <i class="fa fa-group"></i>
                        <span>Groups</span>
                    </a>
                </li>
                <li class="{{ Request::is($cpanel['prefix'].'/permissions*') ? 'active' : '' }}">
                    <a href="{{route('cpanel.permissions.index')}}">
                        <i class="fa fa-ban"></i>
                        <span>Permissions</span>
                    </a>
                </li>
                @endif
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('header')
            <ol class="breadcrumb">
                @section('breadcrumb')
                <li><a href="{{route('cpanel.home')}}">
                        <i class="fa fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                @show
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('cpanel::partials.alert')
            @yield('content')
        </section>
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<!-- jQuery 1.10.2 -->
{{ HTML::script('packages/stevemo/cpanel/adminlte/js/jquery-1.10.2.js') }}
<!-- Bootstrap -->
{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js') }}
<!-- Select2 3.4.5-->
{{ HTML::script('packages/stevemo/cpanel/adminlte/select2-3.4.5/select2.min.js') }}
<!-- Bootbox-->
{{ HTML::script('packages/stevemo/cpanel/adminlte/bootbox/bootbox.min.js') }}
<!-- AdminLTE App -->
{{ HTML::script('packages/stevemo/cpanel/adminlte/js/app.js') }}

</body>
</html>
