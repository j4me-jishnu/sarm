<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SARM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link href='<?php echo base_url();?>assets/dist/css/jquery.noty.css' rel='stylesheet'>
  <link href='<?php echo base_url();?>assets/dist/css/noty_theme_default.css' rel='stylesheet'>
  <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <!-- DataTables -->
  <link href= "https://code.jquery.com/jquery-3.3.1.js">
<link href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
<link href= "https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js">
<link href= "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
<link href= "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js">
<link href= "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js">
<link href= "https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js">
<link href= "https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js">
<link href= "https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css">
  
  <!-- Ionicons -->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/EasyAutocomplete-1.3.5/easy-autocomplete.min.css"/>
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/plugins/combogrid/css/smoothness/jquery-ui-1.10.1.custom.css"/>
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/plugins/combogrid/css/smoothness/combogrid.css"/>
<!--  <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />-->
    <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/all.css">
  <!-- Theme select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/additional.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
<!--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.2/css/select.dataTables.min.css">-->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/skin-blue.min.css">
  <!--<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/editor.dataTables.min.css">-->
  <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/resources/demo.css">
   HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
 <link href="http://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.css" rel="stylesheet" type="text/css">
 <link href="http://www.jqueryscript.net/demo/Sliding-Growl-Notification-Plugin-For-jQuery-jsnotify/dist/css/notify.css" rel="stylesheet"/>
 <link href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
 
 
 <link href='https://code.jquery.com/jquery-3.3.1.js'>
 <link href='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'>
 <link href='https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js'>
 <link href='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'>
 <link href='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js'>
 <link href='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js'>
 <link href='https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js'>
 <?php if($this->session->userdata('user_type')=='C'){ ?>
 <style>
  .skin-blue .main-header .navbar{background-color:<?php echo @$color_change->color_name ?>}.skin-blue .main-header .navbar .nav>li>a{color:#fff}.skin-blue .main-header .navbar .nav>li>a:hover,.skin-blue .main-header .navbar .nav>li>a:active,.skin-blue .main-header .navbar .nav>li>a:focus,.skin-blue .main-header .navbar .nav .open>a,.skin-blue .main-header .navbar .nav .open>a:hover,.skin-blue .main-header .navbar .nav .open>a:focus,.skin-blue .main-header .navbar .nav>.active>a{background:rgba(0,0,0,0.1);color:#f6f6f6}.skin-blue .main-header .navbar .sidebar-toggle{color:#fff}.skin-blue .main-header .navbar .sidebar-toggle:hover{color:#f6f6f6;background:rgba(0,0,0,0.1)}.skin-blue .main-header .navbar .sidebar-toggle{color:#fff}.skin-blue .main-header .navbar .sidebar-toggle:hover{background-color:<?php echo @$color_change->color_name ?>}@media (max-width:767px){.skin-blue .main-header .navbar .dropdown-menu li.divider{background-color:rgba(255,255,255,0.1)}.skin-blue .main-header .navbar .dropdown-menu li a{color:#fff}.skin-blue .main-header .navbar .dropdown-menu li a:hover{background:<?php echo @$color_change->color_name ?>}}.skin-blue .main-header .logo{background-color:<?php echo @$color_change->color_name ?>;color:#fff;border-bottom:0 solid transparent}.skin-blue .main-header .logo:hover{background-color:<?php echo @$color_change->color_name ?>}.skin-blue .main-header li.user-header{background-color:<?php echo @$color_change->color_name ?>}.skin-blue .content-header{background:transparent}.skin-blue .wrapper,.skin-blue .main-sidebar,.skin-blue .left-side{background-color:#222d32}.skin-blue .user-panel>.info,.skin-blue .user-panel>.info>a{color:#fff}.skin-blue .sidebar-menu>li.header{color:#4b646f;background:#1a2226}.skin-blue .sidebar-menu>li>a{border-left:3px solid transparent}.skin-blue .sidebar-menu>li:hover>a,.skin-blue .sidebar-menu>li.active>a,.skin-blue .sidebar-menu>li.menu-open>a{color:#fff;background:#1e282c}.skin-blue .sidebar-menu>li.active>a{border-left-color:<?php echo @$color_change->color_name ?>}.skin-blue .sidebar-menu>li>.treeview-menu{margin:0 1px;background:#2c3b41}.skin-blue .sidebar a{color:#b8c7ce}.skin-blue .sidebar a:hover{text-decoration:none}.skin-blue .sidebar-menu .treeview-menu>li>a{color:#8aa4af}.skin-blue .sidebar-menu .treeview-menu>li.active>a,.skin-blue .sidebar-menu .treeview-menu>li>a:hover{color:#fff}.skin-blue .sidebar-form{border-radius:3px;border:1px solid #374850;margin:10px 10px}.skin-blue .sidebar-form input[type="text"],.skin-blue .sidebar-form .btn{box-shadow:none;background-color:#374850;border:1px solid transparent;height:35px}.skin-blue .sidebar-form input[type="text"]{color:#666;border-top-left-radius:2px;border-top-right-radius:0;border-bottom-right-radius:0;border-bottom-left-radius:2px}.skin-blue .sidebar-form input[type="text"]:focus,.skin-blue .sidebar-form input[type="text"]:focus+.input-group-btn .btn{background-color:#fff;color:#666}.skin-blue .sidebar-form input[type="text"]:focus+.input-group-btn .btn{border-left-color:#fff}.skin-blue .sidebar-form .btn{color:#999;border-top-left-radius:0;border-top-right-radius:2px;border-bottom-right-radius:2px;border-bottom-left-radius:0}.skin-blue.layout-top-nav .main-header>.logo{background-color:<?php echo @$color_change->color_name ?>;color:#fff;border-bottom:0 solid transparent}.skin-blue.layout-top-nav .main-header>.logo:hover{background-color:<?php echo @$color_change->color_name ?>}.common-btn {color: #fff;background-color: <?php echo @$color_change->color_name ?>;}
  .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {z-index: 3;color: #fff;cursor: default;background-color: <?php echo @$color_change->color_name ?>;border-color: <?php echo @$color_change->color_name ?>;}.btn-primary {background-color: <?php echo @$color_change->color_name ?>;border-color:<?php echo @$color_change->color_name ?>;
  }a {color: <?php echo @$color_change->color_name ?>;}
 </style>
 <?php }else{ ?>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/skin-blue.min.css">
  <?php } ?>
</head>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url();?>Images/logo1.jpg" style="max-width:40px"></span>
      <!-- logo for regular state and mobile devices -->
      <!-- <span class="logo-lg"><img src="<?php echo base_url();?>Images/logo.jpg" style="max-width:100px"></span> -->
      <span style="font-weight: bold;font-size: 30px;">SARM</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!--<li class="dropdown messages-menu">-->
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!--<i class="fa fa-envelope-o"></i>-->
              <span class="label label-success"></span>
            </a>
            
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!--<img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->userdata('user_name')?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <!-- <img src="<?php echo base_url();?>Images/logo1.jpg" class="img-circle" alt="User Image"> -->
                <span style="font-weight: bold;font-size: 50px; color: white">SARM</span>
                <!--<p>
                  Anup Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>-->
              </li>
              <!-- Menu Body -->
              <!--<li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>-->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="<?php echo base_url();?>index.php/user" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="<?php echo base_url();?>index.php/login/logout" class="btn btn-default btn-sm">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
          </li>
        </ul>
      </div>
    </nav>
  </header>