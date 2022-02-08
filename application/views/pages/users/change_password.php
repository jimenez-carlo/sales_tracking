<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <em class="fa fa-cogs"></em>
      </li>
      <li>Account Settings</li>
      <li>Change Password</li>
    </ol>

  </div>
  <!--/.row-->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Account Settings</h1>
    </div>
  </div>
  <!--/.row-->
  <div class="row">
    <div class="col-md-12">
      <?= $response; ?>
      <div class="panel panel-dark">
        <div class="panel-heading">
          Change Password
          <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
        </div>
        <div class="panel-body">
          <form method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>*Old Password </label>
                  <input required class="form-control" name="old" type="password" placeholder="Old Password " autofocus="true" value="<?php echo isset($_POST['old']) ? $_POST['old'] : ''; ?>">
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>New Password </label>
                  <input required class="form-control" name="new" type="password" placeholder="Password" value="<?php echo isset($_POST['new']) ? $_POST['new'] : ''; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Re-type New Password </label>
                  <input required class="form-control" name="re_new" type="password" placeholder="Re-type New Password " value="<?php echo isset($_POST['re_new']) ? $_POST['re_new'] : ''; ?>">
                </div>
              </div>
            </div>
            <button type="submit" name="btnChangePassword" class="btn btn-sm btn-dark">Change Password <i class="fa fa-save"></i></button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>