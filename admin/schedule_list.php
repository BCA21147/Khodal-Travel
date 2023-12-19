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
    SearchTableDataModel("Schedule", "schedule", "fa-add");
    ?>

    <!-- ADD SCHEDULE - Modal -->
    <form method="post" id="add_schedule" autocomplete="off">
      <div class="modal fade" id="ScheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD SCHEDULE</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="schedule_name">Start Time <span class="text-danger">*</span> </label>
                <input type="time" class="form-control" id="schedule_start_time" name="schedule_start_time"
                  placeholder="Schedule Start Time ..." required>
              </div>
              <div class="form-group">
                <label for="schedule_name">End Time <span class="text-danger">*</span> </label>
                <input type="time" class="form-control" id="schedule_end_time" name="schedule_end_time"
                  placeholder="Schedule End Time ..." required>
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
    DeleteUpdateModel("SCHEDULE", "Schedule", "schedule");
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

    $('#add_schedule').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: "POST",
        url: "CRUD/schedule_list/insert.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#ScheduleModal').modal('hide');
          clear();
        }
      })
    });

    $('#update_schedule_id').submit(function (e) {
      e.preventDefault();
      var id = ((document.getElementById('schedule_update_id').classList.value).split(' ')[0]).split('_')[3] || null;
      var formData = new FormData(this);
      formData.append("update_id", id);
      $.ajax({
        type: "POST",
        url: "CRUD/schedule_list/update.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#ScheduleUpdateModal').modal('hide');
          clear();
        }
      })
    });

    function clear() {
      document.getElementById('add_schedule').reset();
    }

  });

</script>

<?php
require('model/JSOperation/JSOperationFunction.php');
JSOperationFunction("schedule");
?>

<?php
include('components/foot_links.php');
?>