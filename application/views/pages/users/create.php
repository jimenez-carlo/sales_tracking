<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <em class="fa fa-users"></em>
      </li>
      <li><a href="<?= base_url("users"); ?>">User Maintenance</a></li>
      <li>Create Account</li>
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
          Create Account
          <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
        </div>
        <div class="panel-body">
          <form method="post">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>*Email </label>
                  <input required class="form-control" name="email" placeholder="example@gmail.com" autofocus="true" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Contact No# </label>
                  <input class="form-control" name="contact" placeholder="09000000000" value="<?php echo isset($_POST['contact']) ? $_POST['contact'] : ''; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Role </label>
                  <select class="form-control" name="role">
                    <?php foreach ($dropdown as $res) {
                      echo "<option value=" . $res['id'] . ">" . $res['name'] . "</option>";
                    } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Firstname </label>
                  <input class="form-control" name="first" placeholder="Firstname" value="<?php echo isset($_POST['first']) ? $_POST['first'] : ''; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Middlename </label>
                  <input class="form-control" name="middle" placeholder="Middlename" value="<?php echo isset($_POST['middle']) ? $_POST['middle'] : ''; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Lastname </label>
                  <input class="form-control" name="last" placeholder="Lastname" value="<?php echo isset($_POST['last']) ? $_POST['last'] : ''; ?>">
                </div>
              </div>
            </div>
            <button type="submit" name="btnCreate" class="btn btn-sm btn-dark">Register Account <i class="fa fa-save"></i></button>
            <button type="button" class="btn btn-sm btn-dark btnClear">Clear <i class="fa fa-refresh"></i></button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.querySelector(".btnClear").addEventListener("click", function() {
    document.querySelectorAll('input').forEach(item => {
      item.value = "";
    })
  });
</script>