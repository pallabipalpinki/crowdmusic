<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Musiq Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/adminlte.min.css'); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b></b>Musiq Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

                <?php
                  if($this->session->userdata('success')){?>
                  <br><span style="color:green;"><?= $this->session->userdata('success')?></span> <?php 
                  $this->session->unset_userdata('success'); }
                   ?> 
                  <?php if($this->session->userdata('fail')){?>
                  <br><span style="color:green;"><?= $this->session->userdata('fail')?></span> <?php 
                  $this->session->unset_userdata('fail'); } 
                  ?> 
                 
      <!-- <p class="login-box-msg">Sign in to start your session</p> -->

      <form action="<?php echo base_url('admin-login'); ?>" method="post">
        
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="admin_email" id="admin_email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <span style="color:red"><?php echo form_error('admin_email'); ?></span>
          
        </div>
        <span class="text-danger"></span>
        <div class="input-group mb-3">
          <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <span style="color:red"><?php echo form_error('admin_password'); ?></span>
          
        </div>
        <span class="text-danger"></span>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="adminsign">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/admin/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin/dist/js/adminlte.min.js'); ?>"></script>
<script>
var xSeconds = 5000; // 1 second

setTimeout(function() {
   $('#overlay').fadeOut('slow');
   //$('#overlay').hide();
}, xS