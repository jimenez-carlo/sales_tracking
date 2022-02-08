<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo APP_TITLE; ?> - Dashboard</title>
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/datepicker3.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/datepicker/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/datatable/style.css" rel="stylesheet">
  <!--Custom Font-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span></button>
        <a class="navbar-brand" href="#"><span>sales</span>Tracking</a>
        <ul class="nav navbar-top-links navbar-right">
          <li class="dropdown"><a class="dropdown-toggle count-info" href="<?= base_url(); ?>Logout" onclick="return confirm('You are about to Logout?')">
              <em class="fa fa-power-off"></em>
            </a>
          </li>
        </ul>
      </div>
    </div><!-- /.container-fluid -->
  </nav>
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
      <div class="profile-userpic">
        <img src="<?= base_url("assets/default.jfif"); ?>" class="img-responsive" alt="">
      </div>
      <div class="profile-usertitle">
        <div class="profile-usertitle-name"><?= $this->session->current->username; ?></div>
        <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
    </form>
    <ul class="nav menu">