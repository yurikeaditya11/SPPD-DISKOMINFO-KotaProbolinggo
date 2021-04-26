<?php
$assets  = $this->config->item('assets');
$path    = $this->config->item('path');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yurike Project Besar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" type="image/png" href="<?php echo $assets;?>/img/logo.png" />
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $assets;?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $assets;?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $assets;?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $assets;?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo $assets;?>/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo $assets;?>/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $assets;?>/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo $assets;?>/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo $assets;?>/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo $assets;?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $assets;?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo $assets;?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo $assets;?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $assets;?>/bower_components/select2/dist/css/select2.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('dashboard');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="display : block;"><img src="YurikeLogo.png" width="150" height="100"/>KELOMPOK 3</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $path.'/'.$this->session->userdata['image'];?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata['adminname'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $path.'/'.$this->session->userdata['image'];?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata['adminname'];?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo site_url('auth/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $path.'/'.$this->session->userdata['image'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" style="padding-left: 8px;">
          <p><?php echo $this->session->userdata['adminname'];?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li <?php echo ($page=='dashboard')?'class="active"':'';?>><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> <span>DASHBOARD</span></a></li>
        <li <?php echo ($page=='admin')?'class="active"':'';?>><a href="<?php echo site_url('admin');?>"><i class="fa fa-user"></i> <span>ADMINISTRATOR</span></a></li>
        <li <?php echo ($page=='jalan')?'class="active"':'';?>><a href="<?php echo site_url('jalan');?>"><i class="fa fa-book"></i> <span>SURAT JALAN</span></a></li>
        <li <?php echo ($page=='kekurangan')?'class="active"':'';?>><a href="<?php echo site_url('kekurangan');?>"><i class="fa fa-minus-square"></i> <span>KEKURANGAN BIAYA</span></a></li>
        <?php if($this->session->userdata['level'] == 'master'){ ?>
        <li <?php echo ($page=='karyawan')?'class="active"':'';?>><a href="<?php echo site_url('karyawan');?>"><i class="fa fa-users"></i> <span>KARYAWAN</span></a></li>
        <?php } ?>
        <li <?php echo ($page=='tujuan')?'class="active"':'';?>><a href="<?php echo site_url('tujuan');?>"><i class="fa fa-map-pin"></i> <span>TUJUAN</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
