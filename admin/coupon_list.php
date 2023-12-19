<?php
include("check_admin.php");
include('CRUD/db_connection.php');
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

    <div class="row justify-content-center p-lg-4 p-md-2 p-0">
      <div class="col-12">
        <div class="card m-0">
          <div class="h5 fw-bold px-2 px-md-4 py-3 m-0">Coupon List</div>
          <hr class="m-0">
          <div class="px-2 px-md-4 py-3">
            <div class="pb-3">
              <div class="row m-0 justify-content-between">
                <div class="col-lg-4 col-md-6 col-sm-7 p-0">
                  <div class="form-group h-100 d-flex align-items-center">
                    <label for="search" class="px-3 mb-0">Search: </label>
                    <input type="text" name="search" id="search" class="form-control"
                      onkeyup="search_coupon_data(this.value)" onkeydown="search_coupon_data(this.value)">
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 p-0">
                  <div class="h-100 d-flex align-items-center justify-content-end">
                    <div class="w-100 btn btn-primary" title="Add Coupon" data-toggle="modal" data-target="#CouponModal"
                      onclick="generate_bus_code()">
                      <div class="d-flex justify-content-center align-items-center">
                        <div class="pr-4">
                          <i class="fa-solid fa-id-card"></i>
                          <i class="fa-solid fa-add position-absolute" style="transform:scale(.8);"></i>
                        </div>
                        <div>Add Coupon</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive" id="fetch_coupon_data">

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ADD COUPON - Modal -->
    <form method="post" id="add_coupon" autocomplete="off">
      <div class="modal fade" id="CouponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD COUPON</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="form-group">
                    <label for="coupon_code">Coupon Code </label>
                    <input type="text" class="form-control" id="coupon_code" name="coupon_code"
                      placeholder="Coupon Code ..." readonly>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="coupon_start_date">Start Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="coupon_start_date" id="coupon_start_date"
                      placeholder="Start Date ..." required>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="coupon_end_date">End Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="coupon_end_date" id="coupon_end_date"
                      placeholder="End Date ..." required>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="coupon_trip">Trip <span class="text-danger">*</span> </label>
                    <select class="form-control" name="coupon_trip" id="coupon_trip" required>
                      <option value="">None</option>
                      <?php
                      $query = "SELECT * FROM `trip` ORDER BY `id` ASC;";
                      $result = mysqli_query($con, $query);
                      if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <option
                            value="[<?php echo $row['id']; ?>]|[<?php echo substr(explode("|", $row['trip_pick_up'])[1], 1, -1); ?>]|[<?php echo substr(explode("|", $row['trip_drop'])[1], 1, -1); ?>]">
                            <?php echo substr(explode("|", $row['trip_pick_up'])[1], 1, -1) . " - " . substr(explode("|", $row['trip_drop'])[1], 1, -1) ?>
                          </option>
                          <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="coupon_discount_amount">Discount Amount <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="coupon_discount_amount" id="coupon_discount_amount"
                      placeholder="Discount Amount ..." min="0" value="" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="coupon_term_condition">Terms & Conditions <span class="text-danger">*</span></label>
                    <textarea type="text" class="form-control" id="coupon_term_condition" name="coupon_term_condition"
                      placeholder='Terms & Conditions ...' rows="4" required></textarea>
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
    DeleteUpdateModel("COUPON", "Coupon", "coupon");
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

    $('#add_coupon').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: "POST",
        url: "CRUD/coupon_list/insert.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#CouponModal').modal('hide');
          clear();
        }
      })
    });

    $('#update_coupon_id').submit(function (e) {
      e.preventDefault();
      var id = ((document.getElementById('coupon_update_id').classList.value).split(' ')[0]).split('_')[3] || null;
      var formData = new FormData(this);
      formData.append("update_id", id);
      $.ajax({
        type: "POST",
        url: "CRUD/coupon_list/update.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#CouponUpdateModal').modal('hide');
          clear();
        }
      })
    });

    function clear() {
      document.getElementById('add_coupon').reset();
    }

  });

  function generate_bus_code() {
    var date = new Date();
    $('#coupon_code').val("BUSCODE-" + date.getFullYear() + "" + (date.getMonth() + 1) + "" + date.getDate() + "" + date.getHours() + "" + date.getMinutes() + "" + date.getSeconds() + "" + date.getMilliseconds() + "" + date.getTime());
  }

</script>

<?php
require('model/JSOperation/JSOperationFunction.php');
JSOperationFunction("coupon");
?>

<?php
include('components/foot_links.php');
?>