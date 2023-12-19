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

    <?php
    require('model/SearchTableModel/SearchTableDataModel.php');
    SearchTableDataModel("Passenger", "passenger", "fa-add");
    ?>

    <!-- ADD PASSENGER - Modal -->
    <form method="post" id="add_passenger" autocomplete="off">
      <div class="modal fade" id="PassengerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document"
          id="passenger_add_model">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD PASSENGER</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="passenger_first_name">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="passenger_first_name" id="passenger_first_name"
                      placeholder="First Name ..." value="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="passenger_last_name">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="passenger_last_name" id="passenger_last_name"
                      placeholder="Last Name ..." value="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="passenger_mobile_no">Mobile No. <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="passenger_mobile_no" id="passenger_mobile_no"
                      placeholder="Mobile No. ..." required minlength="10" maxlength="10">
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="passenger_email_id">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="passenger_email_id" id="passenger_email_id"
                      placeholder="Email ..." value="" required>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="passenger_id_type">ID Type </label>
                    <input type="text" class="form-control" name="passenger_id_type" id="passenger_id_type"
                      placeholder="ID Type ..." value="">
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="passenger_nid_number">NID/Password Number </label>
                    <input type="text" class="form-control" name="passenger_nid_number" id="passenger_nid_number"
                      placeholder="NID/Password Number ..." value="">
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="passenger_country_name">Country Name <span class="text-danger">*</span> </label>
                    <select class="form-control" name="passenger_country_name" id="passenger_country_name" required>
                      <option value="">Country Name</option>
                      <?php
                      $query = "SELECT * FROM `country`;";
                      $result = mysqli_query($con, $query);
                      if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <option value='[<?php echo $row['id']; ?>]|[<?php echo $row['country_name']; ?>]'>
                            <?php echo $row['country_name']; ?>
                          </option>
                          <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="passenger_city_name">City Name </label>
                    <input type="text" class="form-control" name="passenger_city_name" id="passenger_city_name"
                      placeholder="City Name ..." value="">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="passenger_address">Address <span class="text-danger">*</span></label>
                    <textarea type="text" class="form-control" id="passenger_address" name="passenger_address"
                      placeholder='Address ...' rows="4" required></textarea>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="passenger_zip_code">ZIP Code </label>
                    <input type="text" class="form-control" name="passenger_zip_code" id="passenger_zip_code"
                      placeholder="ZIP Code ..." minlength="6" maxlength="6">
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-lg-none d-sm-block d-none">
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="passenger_password">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="passenger_password" id="passenger_password"
                      placeholder="Password ..." minlength="8" required>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="passenger_retype_password">Re-Type Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="passenger_retype_password"
                      id="passenger_retype_password" placeholder="Re-Type Password ..." minlength="8" required>
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
    DeleteUpdateModel("PASSENGER", "Passenger", "passenger");
    ?>

    <!-- ALERT PASSENGER - Modal -->
    <?php
    require("../model/headerModel/closeEventsModel.php");
    closeEventsModel("AlertPassengerModal", "fa-solid fa-circle-xmark text-danger", "ALERT PASSENGER", "");
    ?>
    <div class="modal-body">
      <h5 class="d-flex align-items-center">
        <i class="fa-solid fa-triangle-exclamation text-warning pr-3"></i>
        <div style="font-weight: normal;font-size: 18px;" id="passenger_alert_message">

        </div>
      </h5>
    </div>
    <?php
    require("../model/footerModel/closeTwoButtonEventsModel.php");
    closeTwoButtonEventsModel("btn-danger", "CLOSE", "id='passenger_alert_close_btn'", "btn-success", "DONE", "id='passenger_alert_ok_btn'");
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

    $('#add_passenger').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      if (!isNaN(formData.get('passenger_mobile_no')) && !isNaN(formData.get('passenger_zip_code')) && formData.get('passenger_password') === formData.get('passenger_retype_password')) {
        $.ajax({
          type: "POST",
          url: "CRUD/passenger_list/insert.php",
          data: formData,
          contentType: false,
          processData: false,
          success: function (data, status) {
            fetch_data();
            $('#PassengerModal').modal('hide');
            clear();
          }
        })
      }
      else {
        $('#PassengerModal').modal('hide');
        $("#passenger_alert_message").html("Please Enter Valid Details.");
        $("#passenger_alert_close_btn").attr("onclick", "passenger_add_update_open('ADD')");
        $("#passenger_alert_ok_btn").attr("onclick", "passenger_add_update_open('ADD')");
        if (isNaN(formData.get('passenger_mobile_no'))) {
          $("#passenger_alert_message").html("Mobile Number Is Not Valid.");
        } else if (isNaN(formData.get('passenger_zip_code'))) {
          $("#passenger_alert_message").html("ZIP Code Is Not Valid.");
        } else if (formData.get('passenger_password') != formData.get('passenger_retype_password')) {
          $("#passenger_alert_message").html("Password Is Not Matched With Confirm Password.");
        }
        setTimeout(() => {
          $('#AlertPassengerModal').modal('show');
        }, 345);
      }
    });

    $('#update_passenger_id').submit(function (e) {
      e.preventDefault();
      var id = ((document.getElementById('passenger_update_id').classList.value).split(' ')[0]).split('_')[3] || null;
      var formData = new FormData(this);
      formData.append("update_id", id);
      if (!isNaN(formData.get('passenger_mobile_no_update')) && !isNaN(formData.get('passenger_zip_code_update')) && formData.get('passenger_password_update') === formData.get('passenger_retype_password_update')) {
        $.ajax({
          type: "POST",
          url: "CRUD/passenger_list/update.php",
          data: formData,
          contentType: false,
          processData: false,
          success: function (data, status) {
            fetch_data();
            $('#PassengerUpdateModal').modal('hide');
            clear();
          }
        })
      } else {
        $('#PassengerUpdateModal').modal('hide');
        $("#passenger_alert_message").html("Please Enter Valid Details.");
        $("#passenger_alert_close_btn").attr("onclick", "passenger_add_update_open('UPDATE')");
        $("#passenger_alert_ok_btn").attr("onclick", "passenger_add_update_open('UPDATE')");
        if (isNaN(formData.get('passenger_mobile_no_update'))) {
          $("#passenger_alert_message").html("Mobile Number Is Not Valid.");
        } else if (isNaN(formData.get('passenger_zip_code_update'))) {
          $("#passenger_alert_message").html("ZIP Code Is Not Valid.");
        } else if (formData.get('passenger_password_update') != formData.get('passenger_retype_password_update')) {
          $("#passenger_alert_message").html("Password Is Not Matched With Confirm Password.");
        }
        setTimeout(() => {
          $('#AlertPassengerModal').modal('show');
        }, 345)
      }
    });

    function clear() {
      document.getElementById('add_passenger').reset();
    }

  })

  function passenger_add_update_open(action) {
    $('#AlertPassengerModal').modal('hide');
    setTimeout(() => {
      if (action == "ADD") {
        $('#PassengerModal').modal('show');
      } else if (action == "UPDATE") {
        $('#PassengerUpdateModal').modal('show');
      }
    }, 345)
  }

</script>

<?php
require('model/JSOperation/JSOperationFunction.php');
JSOperationFunction("passenger");
?>

<?php
include('components/foot_links.php');
?>