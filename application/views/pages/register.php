<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo APP_TITLE; ?> - Register</title>
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
        <div class="panel-heading"><?php echo strtoupper(APP_TITLE); ?> - REGISTER</div>
        <div class="panel-body">
          <form role="form" method="post">

            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="E-mail" name="email" type="text" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
              </div>
              <div class="form-group">
                <input class="form-control password" placeholder="Password" name="password" type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
              </div>
              <div class="form-group">
                <input class="form-control confirm_password" placeholder="Re-type Password" name="confirm_password" type="password" value="<?php echo isset($_POST['confirm_password']) ? $_POST['confirm_password'] : ''; ?>">
              </div>
              <button name="btnRegister" class="btn btn-dark"><i class="fa fa-user-plus"></i> Register</button>
              <a href="<?php echo base_url();  ?>" class="btn btn-default pull-right">Have an Account Already? Login <i class="fa fa-lock"></i></a>
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