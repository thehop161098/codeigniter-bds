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
    <!-- datatables CSS -->
    <link href="public/plugins/bower_components/tablesaw-master/dist/tablesaw.css" rel="stylesheet">
    <link rel="stylesheet" href="public/plugins/bower_components/jquery-datatables-editable/datatables.css" />
    <link href="public/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="public/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- select2 CSS -->
    <link href="public/plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="public/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="public/theme.v1/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="public/theme.v1/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="public/theme.v1/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- color CSS -->
    <link href="public/theme.v1/css/colors/green-dark.css" id="theme" rel="stylesheet">
    <!-- Main CSS -->
    <link href="public/otadmin/css/main.css" id="theme" rel="stylesheet">
    <!-- jQuery -->
    <script src="public/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/theme.v1/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Ckeditor -->
    <script type="text/javascript" language="javascript" src="vendors/ckeditor/ckeditor.js" ></script>
    <!-- key api google -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=<?=$data_index['contact']['key_map']; ?>"></script>
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
        <?php $this->load->view('backend/layout/header'); ?>
        <?php $this->load->view('backend/layout/sidebar'); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php
                    if(isset($template) && !empty($template)){
                        $this->load->view($template, isset($data)?$data:NULL);
                    }
                ?>
            </div>
            <?php $this->load->view('backend/layout/footer'); ?>
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- Menu Plugin JavaScript -->
    <script src="public/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="public/theme.v1/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="public/theme.v1/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="public/theme.v1/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="public/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="public/otadmin/js/ot_script.js"></script>
</body>

</html>
