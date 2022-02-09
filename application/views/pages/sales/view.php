<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <em class="fa fa-copy"></em>
      </li>
      <li><a href="<?= base_url("sales"); ?>">Sales Encoding</a></li>
      <li>View Sale</li>
      <li>#<?= id_format($id); ?></li>
    </ol>
  </div>
  <!--/.row-->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Sales Encoding</h1>
    </div>
  </div>
  <!--/.row-->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-dark">
        <div class="panel-heading">
          View Sale
          <span class="pull-right clickable">
            <!-- <button type="button" class="btn btn-danger btnClear">Clear <i class="fa fa-refresh"></i></button> -->
          </span>
        </div>
        <div class="panel-body">
          <form method="post" onsubmit="return confirm('Confirm Action?');">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>*Receipt ID </label>
                  <input disabled class="form-control" type="text" name="email" placeholder="ID" value="<?= id_format($id); ?>">
                  <input type="hidden" name="id" value="<?= $id; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Sales Officer </label>
                  <input disabled class="form-control" value="<?= $sale->fullname; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Date</label>
                  <input disabled class="form-control" name="date" value="<?= $sale->assigned_date; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Firstname </label>
                  <input disabled class="form-control" name="first" value="<?= $sale->first_name; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Middlename </label>
                  <input disabled class="form-control" name="middle" value="<?= $sale->middle_name; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Lastname </label>
                  <input disabled class="form-control" name="last" value="<?= $sale->last_name; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>House/Unit/Flr #, Bldg Name, Blk or Lot # </label>
                  <input disabled class="form-control" name="address" placeholder="House/Unit/Flr #, Bldg Name, Blk or Lot # " value="<?= $sale->address; ?>" autofocus="true">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Contact No </label>
                  <input disabled class="form-control" name="contact" placeholder="0900000000" value="<?= $sale->contact_no; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Province</label>
                  <input disabled class="form-control" name="province" placeholder="Province" value="<?= $sale->province; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>City </label>
                  <input disabled class="form-control" name="city" placeholder="City" value="<?= $sale->city; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Barangay </label>
                  <input disabled class="form-control" name="barangay" placeholder="Barangay" value="<?= $sale->barangay; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Mode of Payment</label>
                  <input disabled class="form-control" name="barangay" placeholder="Mode" value="<?= $sale->mode; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Sales Source </label>
                  <input disabled class="form-control" name="barangay" placeholder="Mode" value="<?= $sale->source; ?>">
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Remarks </label>
                  <input disabled class="form-control" name="remarks" placeholder="Remarks" value="<?= $sale->remarks; ?>">
                </div>
              </div>
            </div>
            <div class=" row">
              <div class="col-md-12">
                <table class="table table-bordered table-hover table-items">
                  <thead>
                    <tr>
                      <th style="width: 0.1%;text-align:center"></th>
                      <th>Particulars</th>
                      <th>QTY</th>
                      <th>Unit Price</th>
                      <th>Discount</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $qty = $price = $discount = $line = $linetotal = 0;
                    if (count($sale_items) > 0) {
                      foreach ($sale_items as $res) {
                        $qty += intval($res['qty']);
                        $price += intval($res['price']);
                        $discount += intval($res['discount']);
                        $line = intval($res['qty']) * intval($res['price']) - intval($res['discount']);
                        $linetotal += $line;
                    ?>

                        <tr>
                          <td></td>
                          <td><?= $res['particular']; ?></td>
                          <td style="text-align:right"><?= number_format(intval($res['qty'])); ?></td>
                          <td style="text-align:right"><?= number_format(intval($res['price']), 2); ?></td>
                          <td style="text-align:right"><?= number_format(intval($res['discount']), 2); ?></td>
                          <td style="text-align:right"><?= number_format($line, 2); ?></td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                    <tr>
                      <th>Sub&nbsp;Total</th>
                      <td></td>
                      <td style="text-align:right"><?= number_format($qty, 2); ?></td>
                      <td style="text-align:right"><?= number_format($price, 2); ?></td>
                      <td style="text-align:right"><?= number_format($discount, 2); ?></td>
                      <td style="text-align:right"><?= number_format($linetotal, 2); ?></td>
                    </tr>
                    <tr>
                      <th>TOTAL</th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td style="text-align:right"><?= number_format($linetotal, 2); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>