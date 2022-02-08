<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo APP_TITLE; ?> - Login</title>
  <link href="<?php echo base_url() . "assets/"; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() . "assets/"; ?>css/styles.css" rel="stylesheet">
  <link href="<?php echo base_url() . "assets/"; ?>css/font-awesome.min.css" rel="stylesheet">
  <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <?php echo $response; ?>
      <div class="login-panel panel panel-dark">
        <div class="panel-heading"><?php echo strtoupper(APP_TITLE); ?> - LOGIN </div>
        <div class="panel-body">
          <form role="form" method="post">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
              </div>
              <button name="btnLogin" class="btn btn-dark">LOGIN <i class="fa fa-sign-in"></i></button>
              <a href="<?php echo base_url();  ?>Login/register" class="btn btn-default pull-right">Dont Have an Account Yet? Register <i class="fa fa-user-plus"></i></a>
            </fieldset>
          </form>
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- /.row -->
  <script src="<?php echo base_url() . "assets/"; ?>js/jquery-1.11.1.min.js"></script>
  <script src="<?php echo base_url() . "assets/"; ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() . "assets/"; ?>js/custom.js"></script>
</body>

</html>