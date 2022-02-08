<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <em class="fa fa-cogs"></em>
      </li>
      <li>Account Settings</li>
      <li>Edit Profile</li>
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
          Edit Profile
          <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
        </div>
        <div class="panel-body">
          <form method="post">
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
            <button type="submit" name="btnUpdate" class="btn btn-sm btn-dark">Save Changes <i class="fa fa-save"></i></button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>