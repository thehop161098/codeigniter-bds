<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo site_url(); ?><?php echo isset($url)?$url:'';?>" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="public/otadmin/images/favicon.png">
    <title><?php echo $title;?></title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="public/theme.v1/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="public/theme.v1/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="public/theme.v1/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="public/theme.v1/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- toast CSS -->
    <link href="public/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="public/otadmin/css/main.css" id="theme" rel="stylesheet">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box clearfix">
                <form onsubmit="return checkLogin();" class="form-horizontal form-material" id="loginform" action="" method="post">
                    <h3 class="box-title m-b-20">Đăng nhập Admin</h3>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control font_size_13" name="username" id="username" type="text" placeholder="Tài khoản">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control font_size_13" type="password" name="password" id="password" placeholder="Mật khẩu">
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Nhớ mật khẩu </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Quên mật khẩu </div>
                    </div>
                    <div class="form-group text-center" style="margin-bottom: 0px;">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light font_size_16" type="submit">Đăng nhập</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="public/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/theme.v1/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="public/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="public/theme.v1/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="public/theme.v1/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="public/theme.v1/js/custom.min.js"></script>
    <!--Wave Effects -->
    <script src="public/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <!--Style Switcher -->
    <script src="public/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="public/otadmin/js/login.js"></script>
</body>

</html>
