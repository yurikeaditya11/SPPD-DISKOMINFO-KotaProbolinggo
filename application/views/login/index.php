<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$assets              = $this->config->item('assets');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Website SPPD Yurike</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $assets;?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $assets;?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $assets;?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $assets;?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $assets;?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b> 𝑳𝑶𝑮𝑰𝑵 𝑺𝑷𝑷𝑫</b>
  </div>
  <div class="alert alert-danger" id="alert-login" style="text-align:center;margin-bottom: 0;">
   <center><img src="YurikeLogo.png" width="200" height="170"/></center>
			Pastikan Mengisi Captha dengan benar !	
      <a class="btn btn-xs yellow" href="https://diskominfo.probolinggokab.go.id/" >INFORMASI DISKOMINFO</a>	
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <?php if ($this->session->flashdata('alert_error')) { ?>
      <div class="alert alert-warning alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Warning!</strong>
        <strong><?php echo $this->session->flashdata('alert_error'); ?></strong>
      </div>
    <?php ;} ?>
    <?php if ($this->session->flashdata('alert_captcha')) { ?>
      <div class="alert alert-warning alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Warning!</strong>
        <strong><?php echo $this->session->flashdata('alert_captcha'); ?></strong>
      </div>
    <?php ;} ?>
    <?php if ($this->session->flashdata('alert_logout')) { ?>
      <div class="alert alert-success alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Well done!</strong>
        <strong><?php echo $this->session->flashdata('alert_logout'); ?></strong>
      </div>
    <?php ;} ?>
    <form action="<?php echo site_url('auth/masuk');?>" method="POST">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-eye-open form-control-feedback" style="pointer-events: visible;"></span>
      </div>
      <div class="form-group has-feedback">
        <?php echo $captcha_image;?>
      </div>
      <div class="form-group has-feedback">
        &nbsp;<a href="#" onclick="parent.window.location.reload(true)">reload captcha</a>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="input_captcha" placeholder="Input Captcha" autocomplete="off" required>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo $assets;?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $assets;?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo $assets;?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  $(".glyphicon-eye-open").on("click", function() {
  $(this).toggleClass("glyphicon-eye-close");
    var type = $("#password").attr("type");
  if (type == "text"){
    $("#password").prop('type','password');}
  else{
    $("#password").prop('type','text'); }
  });
</script>
</body>
</html>
