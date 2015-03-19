<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $cpanel['title'] }} | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="https://josc-l5-test5.local-like.st/packages/nodesagency/cpanel/adminlte/css/font-awesome.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/packages/nodesagency/cpanel/adminlte/css/AdminLTE.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/packages/nodesagency/cpanel/adminlte/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="/admin">{{ $cpanel['site_name']}}</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        @if (  Session::has('login_error') )
            <div class="alert alert-danger">
                {{ Session::get('login_error') }}
            </div>
        @endif
        @if (  Session::has('success') )
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        {!! Form::open(['action' => '\Stevemo\Cpanel\Controllers\CpanelController@postLogin', 'method' => 'post']) !!}
            <div class="form-group has-feedback">
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="checkbox icheck" style="margin-top:-0.8px;">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div><!-- /.col -->

                <div class="col-xs-6">
                    <a href="#">I forgot my password</a><br>
                </div><!-- /.col -->
            </div>
            <center>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </center>
            {!! Form::close() !!}
    </div><!-- /.login-box-body -->
</div>

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/packages/nodesagency/cpanel/adminlte/plugins/iCheck/icheck.min.js"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>

</body>
</html>