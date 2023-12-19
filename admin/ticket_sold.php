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
          <div class="h5 fw-bold px-2 px-md-4 py-3 m-0">Ticket Report</div>
          <hr class="m-0">
          <form method="post" id="ticket_report" autocomplete="off">
            <div class="row mx-0 my-4 px-0 px-sm-2 px-md-3">
              <div class="col-sm-6 col-12">
                <div class="form-group">
                  <label for="ticket_report_trip">
                    Trip <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" name="ticket_report_trip" id="ticket_report_trip" required>
                    <option value="" selected>NONE</option>
                    <option value="ALL">ALL</option>
                    <?php
                    $query = "SELECT * FROM `trip`;";
                    $trip_result = mysqli_query($con, $query);
                    if ($trip_result) {
                      while ($trip = mysqli_fetch_assoc($trip_result)) {
                        ?>
                        <option
                          value="[<?php echo $trip['id']; ?>]|[<?php echo $trip['trip_pick_up']; ?>]|[<?php echo $trip['trip_drop']; ?>]">
                          <?php echo substr(explode("|", $trip['trip_pick_up'])[1], 1, -1) . " - " . substr(explode("|", $trip['trip_drop'])[1], 1, -1) . " ( " . substr(explode("|", $trip['schedule_time'])[1], 1, -1) . " ) "; ?>
                        </option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group">
                  <label for="ticket_report_ticket_type">
                    Ticket Type <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" name="ticket_report_ticket_type" id="ticket_report_ticket_type" required>
                    <option value="[1]|[SOLD]">SOLD TICKET</option>
                    <option value="[0]|[CANCEL]">CANCEL TICKET</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-12">
                <div class="form-group">
                  <label for="ticket_report_start_date">Ticket From <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="ticket_report_start_date" id="ticket_report_start_date"
                    placeholder="Ticket From ..." required>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-12">
                <div class="form-group">
                  <label for="ticket_report_end_date">Ticket To <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="ticket_report_end_date" id="ticket_report_end_date"
                    placeholder="Ticket To ..." required>
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="h-100 d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-success my-1 mx-2 px-5">Submit</button>
                </div>
              </div>
            </div>
          </form>
          <hr class="m-0">
          <div class="px-2 px-md-4 py-4">
            <div class="pb-3">
              <div class="row m-0 justify-content-end">
                <div class="col-lg-4 col-md-6 col-sm-7 p-0">
                  <div class="form-group h-100 d-flex align-items-center">
                    <label for="search" class="px-3 mb-0">Search: </label>
                    <input type="text" name="search" id="search" class="form-control"
                      onkeyup="search_ticket_report_data(this.value)" onkeydown="search_ticket_report_data(this.value)">
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive" id="fetch_ticket_report_data">

            </div>
          </div>
        </div>
      </div>
    </div>

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
    setDefaultDate();

    $("#ticket_report").submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      formData.append("fetch_data", "fetch_data");
      $.ajax({
        type: "POST",
        url: "CRUD/ticket_report/fetch_data.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          $('#fetch_ticket_report_data').html(data);
        }
      })
    });

  });

  function setDefaultDate() {
    var date = new Date();
    $('#ticket_report_start_date').attr({
      "value": (date.getFullYear()) + "-" + ((date.getMonth() + 1 < 10) ? "0" + (date.getMonth() + 1) : date.getMonth() + 1) + "-" + (((date.getDate() - 1) < 10) ? "0" + (date.getDate() - 1) : (date.getDate() - 1))
    });
    $('#ticket_report_end_date').attr({
      "value": (date.getFullYear()) + "-" + ((date.getMonth() + 1 < 10) ? "0" + (date.getMonth() + 1) : date.getMonth() + 1) + "-" + ((date.getDate() < 10) ? "0" + date.getDate() : date.getDate())
    });
  }

  function fetch_data() {
    $.ajax({
      type: "POST",
      url: "CRUD/ticket_report/fetch_data.php",
      data: {
        fetch_data: "fetch_data"
      },
      success: function (data, status) {
        $('#fetch_ticket_report_data').html(data);
      }
    })
  }

  function search_ticket_report_data(value) {
    var formData = new FormData();
    for (form = 0; form < document.forms.length; form++) {
      if (document.forms[form].hasAttribute("id") && document.forms[form].id == `ticket_report`) {
        formData = new FormData(document.forms[form]);
      }
    }
    formData.append("fetch_data", "fetch_data");
    formData.append("search", value);
    $.ajax({
      type: "POST",
      url: "CRUD/ticket_report/fetch_data.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data, status) {
        $('#fetch_ticket_report_data').html(data);
      }
    })
  }

</script>

<?php
include('components/foot_links.php');
?>