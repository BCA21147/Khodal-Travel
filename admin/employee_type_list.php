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
    SearchTableDataModel("Employee Type", "employee_type", "fa-add");
    ?>

    <!-- ADD EMPLOYEE TYPE - Modal -->
    <form method="post" id="add_employee_type" autocomplete="off">
      <div class="modal fade" id="EmployeeTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD - EMPLOYEE TYPE</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="form-group">
                    <label for="emp_type">Employee Type <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="emp_type" name="emp_type"
                      placeholder="Employee Type ..." required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="emp_details">Employee Details <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="emp_details" name="emp_details"
                      placeholder="Employee Details ..." required>
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
    DeleteUpdateModel("EMPLOYEE TYPE", "EmployeeType", "employee_type");
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

    $('#add_employee_type').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: "POST",
        url: "CRUD/employee_type_list/insert.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#EmployeeTypeModal').modal('hide');
          clear();
        }
      })
    });

    $('#update_employee_type_id').submit(function (e) {
      e.preventDefault();
      var id = ((document.getElementById('employee_type_update_id').classList.value).split(' ')[0]).split('_')[4] || null;
      var formData = new FormData(this);
      formData.append("update_id", id);
      $.ajax({
        type: "POST",
        url: "CRUD/employee_type_list/update.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#EmployeeTypeUpdateModal').modal('hide');
          clear();
        }
      })
    });

    function clear() {
      document.getElementById('add_employee_type').reset();
    }

  });

</script>

<?php
require('model/JSOperation/JSOperationFunction.php');
JSOperationFunction("employee_type");
?>

<?php
include('components/foot_links.php');
?>