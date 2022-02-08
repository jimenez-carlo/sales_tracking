<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <em class="fa fa-users"></em>
      </li>
      <li class="active"><a href="#">User Maintenance</a></li>
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
          User List
          <span class="pull-right clickable panel-toggle panel-button"><em class="fa fa-toggle-up"></em></span>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <form method="post" onsubmit="return confirm('Confirm Delete?');">
              <table class="table table-bordered table-hover table-data">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact No#</th>
                    <th>Role</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  if ($list->num_rows() > 0) {
                    foreach ($list->result_array() as $res) { ?>
                      <tr>
                        <td>#<?= id_format($res['id']); ?></td>
                        <td><?= $res['fullname']; ?></td>
                        <td><?= $res['username']; ?></td>
                        <td><?= $res['contact_no']; ?></td>
                        <td><?= $res['name']; ?></td>
                        <td><?= $res['date_created']; ?></td>
                        <td>
                          <a href="<?= base_url("users/edit/" . $res['id']); ?>" class="btn btn-sm btn-dark"><i class="fa fa-edit"></i> Edit</a>
                          <button class="btn btn-sm btn-dark" type="submit" name="btnDelete" value="<?= $res['id']; ?>"><i class=" fa fa-trash"></i> Delete</button>
                        </td>
                      </tr>
                    <?php }
                  } else { ?>

                    <tr>
                      <td colspan="7" style="text-align:center"> No Data.</td>
                    </tr>
                  <?php
                  }
                  ?>

                </tbody>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!--/.main-->