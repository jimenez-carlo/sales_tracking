<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <em class="fa fa-copy"></em>
      </li>
      <li><a href="<?= base_url("sales"); ?>">Sales Encoding</a></li>
      <li>Create Sale</li>
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
      <?= $response; ?>
      <div class="panel panel-dark">
        <div class="panel-heading">
          Create Sale
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
                  <input disabled class="form-control" type="text" name="email" placeholder="ID" value="<?= id_format($sales_id); ?>">
                  <input type="hidden" name="id" value="<?= $sales_id; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Sales Officer </label>
                  <input disabled class="form-control" value="<?= $this->session->current->last_name . ", " . $this->session->current->first_name . " " . $this->session->current->middle_name; ?>">
                  <input type="hidden" name="officer" value="<?= $this->session->current->last_name . ", " . $this->session->current->first_name . " " . $this->session->current->middle_name; ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Date</label>
                  <input class="form-control date" name="date" value="<?= date("Y-m-d"); ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Firstname </label>
                  <input required class="form-control" name="first" placeholder="Firstname" autofocus="true">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Middlename </label>
                  <input required class="form-control" name="middle" placeholder="Middlename">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Lastname </label>
                  <input required class="form-control" name="last" placeholder="Lastname">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>House/Unit/Flr #, Bldg Name, Blk or Lot # </label>
                  <input required class="form-control" name="address" placeholder="House/Unit/Flr #, Bldg Name, Blk or Lot # " autofocus="true">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Contact No </label>
                  <input required class="form-control" name="contact" placeholder="0900000000">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Province</label>
                  <input required class="form-control" name="province" placeholder="Province" autofocus="true">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>City </label>
                  <input required class="form-control" name="city" placeholder="City">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Barangay </label>
                  <input required class="form-control" name="barangay" placeholder="Barangay">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Mode of Payment</label>
                  <select class="form-control" name="mode">
                    <?php foreach ($mode as $res) {
                      echo "<option value=" . $res['id'] . ">" . $res['name'] . "</option>";
                    } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Sales Source </label>
                  <select class="form-control" name="source">
                    <?php foreach ($source as $res) {
                      echo "<option value=" . $res['id'] . ">" . $res['name'] . "</option>";
                    } ?>
                  </select>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Remarks </label>
                  <input class="form-control" name="remarks" placeholder="Remarks">
                </div>
              </div>
            </div>
            <div class=" row">
              <div class="col-md-12">
                <table class="table table-bordered table-hover table-items">
                  <thead>
                    <tr>
                      <th style="width: 0.1%;text-align:center"> <button class="btn btn-danger" type="button" onclick="deleteRow()"> <i class="fa fa-trash"></i></button></th>
                      <th>Particulars</th>
                      <th>QTY</th>
                      <th>Unit Price</th>
                      <th>Discount</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="6" style="text-align: center;"><button class="btn btn-dark" type="button" onclick="addRow()"> Add Item <i class="fa fa-plus"></i></button></td>

                    </tr>
                    <tr>
                      <th>Sub&nbsp;Total</th>
                      <td></td>
                      <td style="text-align:right" id="subTotalQty">0</td>
                      <td style="text-align:right" id="subTotalPrice">0</td>
                      <td style="text-align:right" id="subTotalDiscount">0</td>
                      <td style="text-align:right" id="subTotal">0</td>
                    </tr>
                    <tr>
                      <th>TOTAL</th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td id="totalGrand" style="text-align:right">0</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <button type="submit" name="btnCreate" onclick='this.form.target="_self";' class="btn btn-dark">Create Sale <i class="fa fa-cart-plus"></i></button>
            <button type="submit" name="btnPrint" onclick='this.form.target="_blank";' class="btn btn-dark print">Print Sale <i class="fa fa-print"></i></button>
            <a class="btn btn-dark btnClear" href="<?= base_url("sales/create"); ?>">Refresh <i class="fa fa-refresh"></i></a>
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

  var table = document.querySelector(".table-items");

  function addRow() {
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount - 3);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);

    cell1.innerHTML = '<input class="form-control check-style" type="checkbox">';
    cell2.innerHTML = '<input required class="form-control" name="item_name[]" placeholder="Particulars" type="text">';
    cell3.innerHTML = '<input required class="form-control qty" name="item_qty[]" onfocusout="setZero(this)" value="0" type="text" style="text-align:right">';
    cell4.innerHTML = '<input required class="form-control price" name="item_price[]" onfocusout="setZero(this)" value="0.00" type="text" style="text-align:right">';
    cell5.innerHTML = '<input required class="form-control discount" name="item_discount[]" onfocusout="setZero(this)" value="0.00" type="text" style="text-align:right">';
    cell6.innerHTML = '<input required class="form-control rowtotal" onfocusout="setZero(this)" value="0.00" type="text" disabled style="text-align:right">';
  }

  function setZero(element) {
    if (element.value == '' || element.value == null) {
      return element.value = 0;
    }
  }

  function deleteRow() {
    try {
      var rowCount = table.rows.length;
      for (var i = 0; i < rowCount; i++) {
        var row = table.rows[i];
        var chkbox = row.cells[0].childNodes[0];
        if (null != chkbox && true == chkbox.checked) {
          if (rowCount <= 1) {
            alert("Cannot delete all the rows.");
            break;
          }
          table.deleteRow(i);
          rowCount--;
          i--;
        }
      }
    } catch (e) {
      alert(e);
    }
    Calculate();
  }
</script>