<?php
include("check_admin.php");
include('components/head_links.php');

$schedule_filter_type = array("Pick Up", "Drop");

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
    SearchTableDataModel("Schedule Filter", "schedule_filter", "fa-add");
    ?>

    <!-- ADD SCHEDULE FILTER - Modal -->
    <form method="post" id="add_schedule_filter" autocomplete="off">
      <div class="modal fade" id="ScheduleFilterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD - SCHEDULE FILTER</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="schedule_filter_name">From Time <span class="text-danger">*</span> </label>
                    <input type="time" class="form-control" id="schedule_filter_start_time"
                      name="schedule_filter_start_time" placeholder="Schedule Filter Start Time ..." required>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="schedule_filter_name">To Time <span class="text-danger">*</span> </label>
                    <input type="time" class="form-control" id="schedule_filter_end_time"
                      name="schedule_filter_end_time" placeholder="Schedule Filter End Time ..." required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="schedule_filter_type">Schedule - Filter Type <span class="text-danger">*</span> </label>
                    <select class="form-control" id="schedule_filter_type" name="schedule_filter_type" required>
                      <option value="">Filter Type</option>
                      <?php
                      for ($i = 0; $i < sizeof($schedule_filter_type); $i++) {
                        echo "<option value='$schedule_filter_type[$i]'>$schedule_filter_type[$i]</option>";
                      }
                      ?>
                    </select>
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
    DeleteUpdateModel("SCHEDULE FILTER", "ScheduleFilter", "schedule_filter");
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

    $('#add_schedule_filter').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: "POST",
        url: "CRUD/schedule_filter_list/insert.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#ScheduleFilterModal').modal('hide');
          clear();
        }
      })
    });

    $('#update_schedule_filter_id').submit(function (e) {
      e.preventDefault();
      var id = ((document.getElementById('schedule_filter_update_id').classList.value).split(' ')[0]).split('_')[4] || null;
      var formData = new FormData(this);
      formData.append("update_id", id);
      $.ajax({
        type: "POST",
        url: "CRUD/schedule_filter_list/update.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#ScheduleFilterUpdateModal').modal('hide');
          clear();
        }
      })
    });

    function clear() {
      document.getElementById('add_schedule_filter').reset();
    }

  });

</script>

<?php
require('model/JSOperation/JSOperationFunction.php');
JSOperationFunction("schedule_filter");
?>

<?php
include('components/foot_links.php');
?>