<?php
include("check_admin.php");
include('components/head_links.php');
?>

<div class="wrapper">

  <?php
  include('components/preloader.php');
  include('components/header.php');
  include('components/aside_bar.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper px-3 py-2">

    <?php
    require('model/SearchTableModel/SearchTableDataModel.php');
    SearchTableDataModel("Tax", "tax", "fa-add");
    ?>

    <!-- ADD TAX - Modal -->
    <form method="post" id="add_tax" autocomplete="off">
      <div class="modal fade" id="TaxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD TAX</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="tax_name">Tax Name <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="tax_name" name="tax_name" placeholder="Tax Name ..."
                      required>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="tax_value">Tax Value (%) <span class="text-danger">*</span> </label>
                    <input type="number" class="form-control" id="tax_value" name="tax_value"
                      placeholder="Tax Value Time ..." min="0" required>
                  </div>
                </div>
                <div class="col-12 col-md-8">
                  <div class="form-group">
                    <label for="tax_reg_no">Reg No <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="tax_reg_no" name="tax_reg_no" placeholder="Reg No. ..."
                      required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="tax_status">Status <span class="text-danger">*</span> </label>
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tax_status" id="tax_status_active"
                            value="tax_status_active" checked required>
                          <label class="form-check-label" for="tax_status_active">
                            Active
                          </label>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tax_status" id="tax_status_disable"
                            value="tax_status_disable" required>
                          <label class="form-check-label" for="tax_status_disable">
                            Disable
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <?php
    require("model/DeleteUpdateModel/DeleteUpdateModel.php");
    DeleteUpdateModel("TAX", "Tax", "tax");
    ?>

  </div>
  <!-- /.content-wrapper -->

  <?php
  include('components/footer.php');
  ?>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>

  $(document).ready(function () {

    fetch_data();

    $('#add_tax').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: "POST",
        url: "CRUD/tax_list/insert.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#TaxModal').modal('hide');
          clear();
        }
      })
    });

    $('#update_tax_id').submit(function (e) {
      e.preventDefault();
      var id = ((document.getElementById('tax_update_id').classList.value).split(' ')[0]).split('_')[3] || null;
      var formData = new FormData(this);
      formData.append("update_id", id);
      $.ajax({
        type: "POST",
        url: "CRUD/tax_list/update.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#TaxUpdateModal').modal('hide');
          clear();
        }
      })
    });

    function clear() {
      document.getElementById('add_tax').reset();
    }

  });

</script>

<?php
require('model/JSOperation/JSOperationFunction.php');
JSOperationFunction("tax");
?>

<?php
include('components/foot_links.php');
?>