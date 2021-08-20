<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Crowdmusiq| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/jqvmap/jqvmap.min.css');?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/select2/css/select2.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/adminlte.min.css');?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/daterangepicker/daterangepicker.css');?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/summernote/summernote-bs4.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

  <link rel="stylesheet" href="<?php echo base_url('assets/admin/custom/css/custom.css');?>">
  <script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
  </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url() ?>admin/dashboard" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url();?>admin-logout" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <input type="hidden" id="base" value="<?php echo base_url(); ?>">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>admin/dashboard" class="brand-link">
      <img src="<?php echo base_url('assets/admin/dist/img/AdminLTELogo.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Crowdmusiq admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/admin/dist/img/user2-160x160.jpg');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="javascript:;" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-users" aria-hidden="true"></i><!-- <i class="fa fa-user" aria-hidden="true"></i> -->
              <p>
                Manage Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/audiance') ?>" class="nav-link">
              <i class="fa fa-headphones" aria-hidden="true"></i>
                  <p>Audiance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/contributor') ?>" class="nav-link">
                 <i class='fas fa-microphone'></i>
                  <p>Contributor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/mixer')?>"  class="nav-link">
                  <i class="fa fa-music" aria-hidden="true"></i><!-- <i class="fa fa-handshake-o" aria-hidden="true"></i> -->
                  <p>Mixer</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/producer')?>"  class="nav-link">
                  <i class="fa fa-suitcase" aria-hidden="true"></i><!-- <i class="fa fa-handshake-o" aria-hidden="true"></i> -->
                  <p>Producer</p>
                </a>
              </li>
            </ul>
          </li>



             <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-music" aria-hidden="true"></i>
              <p>
                Manage Music
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/genres') ?>" class="nav-link">
                <i class="fa fa-headphones" aria-hidden="true"></i>
                  <p>Genres</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/albums') ?>" class="nav-link">
                 <i class='fas fa-microphone'></i>
                  <p>Albums</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/musictrack')?>"  class="nav-link">
                  <i class="fa fa-music" aria-hidden="true"></i><i class="fa fa-handshake-o" aria-hidden="true"></i>
                  <p>Music Tracks</p>
                </a>
              </li>

             <!--  <li class="nav-item">
                <a href="<?= base_url('admin/producer')?>"  class="nav-link">
                  <i class="fa fa-suitcase" aria-hidden="true"></i><!-- <i class="fa fa-handshake-o" aria-hidden="true"></i> 
                  <p>Producer</p>
                </a>
              </li> -->
            </ul>
          </li>






          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  