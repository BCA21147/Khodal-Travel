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
    SearchTableDataModel("Payment Method", "payment_method", "fa-add");
    ?>

    <!-- ADD PAYMENT METHOD - Modal -->
    <form method="post" id="add_payment_method" autocomplete="off">
      <div class="modal fade" id="PaymentMethodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD - PAYMENT METHOD</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="form-group">
                    <label for="payment_method_name">Payment Method Name <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="payment_method_name" name="payment_method_name"
                      placeholder="Payment Method Name ..." required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="payment_method_status">Status <span class="text-danger">*</span> </label>
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="payment_method_status"
                            id="payment_method_status_active" value="payment_method_status_active" checked required>
                          <label class="form-check-label" for="payment_method_status_active">
                            Active
                          </label>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="payment_method_status"
                            id="payment_method_status_disable" value="payment_method_status_disable" required>
                          <label class="form-check-label" for="payment_method_status_disable">
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
    DeleteUpdateModel("PAYMENT METHOD", "PaymentMethod", "payment_method");
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

    $('#add_payment_method').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: "POST",
        url: "CRUD/payment_method_list/insert.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#PaymentMethodModal').modal('hide');
          clear();
        }
      })
    });

    $('#update_payment_method_id').submit(function (e) {
      e.preventDefault();
      var id = ((document.getElementById('payment_method_update_id').classList.value).split(' ')[0]).split('_')[4] || null;
      var formData = new FormData(this);
      formData.append("update_id", id);
      $.ajax({
        type: "POST",
        url: "CRUD/payment_method_list/update.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#PaymentMethodUpdateModal').modal('hide');
          clear();
        }
      })
    });

    function clear() {
      document.getElementById('add_payment_method').reset();
    }

  });

</script>

<?php
require('model/JSOperation/JSOperationFunction.php');
JSOperationFunction("payment_method");
?>

<?php
include('components/foot_links.php');
?>