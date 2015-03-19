<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $cpanel['title'] }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.1.0 -->
    {!! HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css') !!}
    <!-- font Awesome -->
    {!! HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}

    {!! HTML::style('http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css') !!}
    <!-- Select2 3.4.5-->
    {!! HTML::style('packages/nodesagency/cpanel/adminlte/select2-3.4.5/select2.css') !!}
    {!! HTML::style('packages/nodesagency/cpanel/adminlte/select2-3.4.5/select2-bootstrap.css') !!}
    <!-- Theme style -->
    <link media="all" type="text/css" rel="stylesheet" href="/packages/nodesagency/cpanel/adminlte/css/AdminLTE.min.css">

    {!! HTML::style('packages/nodesagency/cpanel/adminlte/css/skins/skin-blue.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue fixed">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <a href="/admin" class="logo">{{ $cpanel['site_name'] }}</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

        </nav>
    </header>
    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Hello, {{ Sentry::getUser()->first_name }}</p>
                    <a href="{{route('cpanel.logout')}}">Sign out</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Test :-)</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Title</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    Start creating your amazing application!
                </div><!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 NodesAgency All rights reserved.
    </footer>
</div><!-- ./wrapper -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/packages/nodesagency/cpanel/adminlte/plugins/iCheck/icheck.min.js"></script>

<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
{!! HTML::script('packages/nodesagency/cpanel/adminlte/plugins/jquery.slimScroll.min.js') !!}
<!-- FastClick -->
{!! HTML::script('packages/nodesagency/cpanel/adminlte/plugins/fastclick/fastclick.min.js') !!}
<!-- AdminLTE App -->
{!! HTML::script('packages/nodesagency/cpanel/adminlte/js/app.min.js') !!}
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js" type="text/javascript"></script>
</body>
</html>