<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <em class="fa fa-users"></em>
      </li>
      <li><a href="<?= base_url("users"); ?>">User Maintenance</a></li>
      <li>Edit Account</li>
      <li>#<?= id_format($user->id); ?></li>
    </ol>

  </div>
  <!--/.row-->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">User Maintenance</h1>
    </div>
  </div>
  <!--/.row-->
  <div class="row">
    <div class="col-md-12">

      <?= $response; ?>
      <div class="panel panel-dark">
        <div class="panel-heading">
          Edit Account
          <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
        </div>
        <div class="panel-body">
          <form method="post">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>ID </label>
                  <input class="form-control" value="<?= id_format($user->id); ?>" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>*Email </label>
                  <input required class="form-control" name="email" placeholder="example@gmail.com" autofocus="true" value="<?= $user->username; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Contact No# </label>
                  <input class="form-control" name="contact" placeholder="09000000000" value="<?= $user->contact_no; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Role </label>
                  <select class="form-control" name="role">
                    <?php foreach ($dropdown as $res) {
                      echo ($user->role_id == $res['id']) ? "<option selected value=" . $res['id'] . ">" . $res['name'] . "</option>" : "<option value=" . $res['id'] . ">" . $res['name'] . "</option>";
                    } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Firstname </label>
                  <input class="form-control" name="first" placeholder="Firstname" value="<?= $user->first_name; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Middlename </label>
                  <input class="form-control" name="middle" placeholder="Middlename" value="<?= $user->middle_name; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Lastname </label>
                  <input class="form-control" name="last" placeholder="Lastname" value="<?= $user->last_name; ?>">
                </div>
              </div>
            </div>
            <button type="submit" name="btnUpdate" value="<?= $user->id; ?>" class="btn btn-sm btn-dark">Save Changes <i class="fa fa-save"></i></button>
            <button type="submit" name="btnResetPassword" value="<?= $user->id; ?>" class="btn btn-sm btn-dark">Reset Password <i class="fa fa-lock"></i></button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/.main-->