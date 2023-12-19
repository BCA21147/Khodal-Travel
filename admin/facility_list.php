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
    SearchTableDataModel("Facility", "facility", "fa-add");
    ?>

    <!-- ADD FACILITY - Modal -->
    <form method="post" id="add_facility" autocomplete="off">
      <div class="modal fade" id="FacilityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD FACILITY</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="form-group">
                    <label for="facility_name">Facility Name <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="facility_name" name="facility_name"
                      placeholder="Facility Name ..." required>
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
    DeleteUpdateModel("FACILITY", "Facility", "facility");
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

    $('#add_facility').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: "POST",
        url: "CRUD/facility_list/insert.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#FacilityModal').modal('hide');
          clear();
        }
      })
    });

    $('#update_facility_id').submit(function (e) {
      e.preventDefault();
      var id = ((document.getElementById('facility_update_id').classList.value).split(' ')[0]).split('_')[3] || null;
      var formData = new FormData(this);
      formData.append("update_id", id);
      $.ajax({
        type: "POST",
        url: "CRUD/facility_list/update.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#FacilityUpdateModal').modal('hide');
          clear();
        }
      })
    });

    function clear() {
      document.getElementById('add_facility').reset();
    }

  });

</script>

<?php
require('model/JSOperation/JSOperationFunction.php');
JSOperationFunction("facility");
?>

<?php
include('components/foot_links.php');
?>