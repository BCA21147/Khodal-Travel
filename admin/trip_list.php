<?php
include("check_admin.php");
include('CRUD/db_connection.php');
include('components/head_links.php');

$weekend = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

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
    SearchTableDataModel("Trip", "trip", "fa-gopuram");
    ?>

    <!-- ADD TRIP - Modal -->
    <form method="post" id="add_trip" autocomplete="off">
      <div class="modal fade" id="TripModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document" id="trip_add_model">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD TRIP</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row m-0 p-2 my-2" style="background: rgba(0,0,0,0.03)">
                <div class="col-12" style="background: rgba(0,0,0,0.1)">
                  <h6 class="py-2 mb-0" style="font-weight: bold;">Trip Section</h6>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="trip_pick_up">Pick Up <span class="text-danger">*</span> </label>
                        <select class="form-control" name="trip_pick_up" id="trip_pick_up" required>
                          <option value="">None</option>
                          <?php
                          $query = "SELECT * FROM `location` ORDER BY `location_name` ASC;";
                          $result = mysqli_query($con, $query);
                          if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                              <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['location_name']; ?>]">
                                <?php echo $row['location_name'] ?>
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
                        <label for="trip_drop">Drop <span class="text-danger">*</span> </label>
                        <select class="form-control" name="trip_drop" id="trip_drop" required>
                          <option value="">None</option>
                          <?php
                          $query = "SELECT * FROM `location` ORDER BY `location_name` ASC;";
                          $result = mysqli_query($con, $query);
                          if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                              <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['location_name']; ?>]">
                                <?php echo $row['location_name'] ?>
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
                        <label for="trip_stoppage_point">Stoppage Point <span class="text-danger">*</span> </label>
                        <select class="form-control" name="trip_stoppage_point[]" id="trip_stoppage_point" multiple
                          required>
                          <option value="" disabled>None</option>
                          <?php
                          $query = "SELECT * FROM `location` ORDER BY `location_name` ASC;";
                          $result = mysqli_query($con, $query);
                          if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                              <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['location_name']; ?>]">
                                <?php echo $row['location_name'] ?>
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
                        <label for="trip_schedule_time">Schedule Time <span class="text-danger">*</span> </label>
                        <select class="form-control" name="trip_schedule_time" id="trip_schedule_time" required>
                          <option value="">None</option>
                          <?php
                          $query = "SELECT * FROM `schedule`";
                          $result = mysqli_query($con, $query);
                          if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                              <option
                                value="[<?php echo $row['id']; ?>]|[<?php echo $row['start_time_12_hour'] . ' - ' . $row['end_time_12_hour']; ?>]">
                                <?php echo $row['start_time_12_hour']; ?> -
                                <?php echo $row['end_time_12_hour'] ?>
                              </option>
                              <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row m-0 p-2 my-2" style="background: rgba(0,0,0,0.03)">
                <div class="col-12" style="background: rgba(0,0,0,0.1)">
                  <h6 class="py-2 mb-0" style="font-weight: bold;">Boarding Point</h6>
                </div>
                <div id="trip_boarding_point" class="w-100">
                  <div class="col-12" id="trip_boarding_point_part_1">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                          <label for="trip_boarding_time_1">Select Time <span class="text-danger">*</span> </label>
                          <input type="time" class="form-control" id="trip_boarding_time_1" name="trip_boarding_time_1"
                            placeholder="Select Time ..." required>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                          <label for="trip_boarding_bus_stand_1">Bus Stand <span class="text-danger">*</span> </label>
                          <select class="form-control" name="trip_boarding_bus_stand_1" id="trip_boarding_bus_stand_1"
                            required>
                            <option value="">None</option>
                            <?php
                            $query = "SELECT * FROM `stand` ORDER BY `stand_name` ASC;";
                            $result = mysqli_query($con, $query);
                            if ($result) {
                              while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['stand_name']; ?>]">
                                  <?php echo $row['stand_name'] ?>
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
                          <label for="trip_boarding_details_1">Details </label>
                          <input type="text" class="form-control" name="trip_boarding_details_1"
                            id="trip_boarding_details_1" placeholder="Details ..." value="">
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-12">
                        <div class="h-100 d-flex justify-content-center align-items-center"
                          id="boarding_point_button_1">
                          <button type="button" class="btn btn-primary"
                            onclick="add_boarding_dropping_point(1,'Boarding','ADD')"><i
                              class="fa-solid fa-plus"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row m-0 p-2 my-2" style="background: rgba(0,0,0,0.03)">
                <div class="col-12" style="background: rgba(0,0,0,0.1)">
                  <h6 class="py-2 mb-0" style="font-weight: bold;">Dropping Point</h6>
                </div>
                <div id="trip_dropping_point" class="w-100">
                  <div class="col-12" id="trip_dropping_point_part_1">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                          <label for="trip_dropping_time_1">Select Time <span class="text-danger">*</span> </label>
                          <input type="time" class="form-control" id="trip_dropping_time_1" name="trip_dropping_time_1"
                            placeholder="Select Time ..." required>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                          <label for="trip_dropping_bus_stand_1">Bus Stand <span class="text-danger">*</span> </label>
                          <select class="form-control" name="trip_dropping_bus_stand_1" id="trip_dropping_bus_stand_1"
                            required>
                            <option value="">None</option>
                            <?php
                            $query = "SELECT * FROM `stand` ORDER BY `stand_name` ASC;";
                            $result = mysqli_query($con, $query);
                            if ($result) {
                              while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['stand_name']; ?>]">
                                  <?php echo $row['stand_name'] ?>
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
                          <label for="trip_dropping_details_1">Details </label>
                          <input type="text" class="form-control" name="trip_dropping_details_1"
                            id="trip_dropping_details_1" placeholder="Details ..." value="">
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-12">
                        <div class="h-100 d-flex justify-content-center align-items-center"
                          id="dropping_point_button_1">
                          <button type="button" class="btn btn-primary"
                            onclick="add_boarding_dropping_point(1,'Dropping','ADD')"><i
                              class="fa-solid fa-plus"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row m-0 p-2 my-2" style="background: rgba(0,0,0,0.03)">
                <div class="col-12" style="background: rgba(0,0,0,0.1)">
                  <h6 class="py-2 mb-0" style="font-weight: bold;">Seat, Fair, Time</h6>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="trip_children_seat">Children Seat </label>
                        <input type="number" class="form-control" name="trip_children_seat" id="trip_children_seat"
                          placeholder="Children Seat ..." min="0" value="">
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="trip_children_fair">Children Fair </label>
                        <input type="number" class="form-control" name="trip_children_fair" id="trip_children_fair"
                          placeholder="Children Fair ..." min="0" value="">
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="trip_special_seat">Special Seat </label>
                        <input type="number" class="form-control" name="trip_special_seat" id="trip_special_seat"
                          placeholder="Special Seat ..." min="0" value="">
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="trip_special_fair">Special Fair </label>
                        <input type="number" class="form-control" name="trip_special_fair" id="trip_special_fair"
                          placeholder="Special Fair ..." min="0" value="">
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="trip_adult_fair">Adult Fair <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="trip_adult_fair" id="trip_adult_fair"
                          placeholder="Adult Fair ..." min="0" value="" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="trip_distance">Distance <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="trip_distance" id="trip_distance"
                          placeholder="Distance ..." min="0" value="" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="trip_approximate_time">Approximate Time <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="trip_approximate_time"
                          id="trip_approximate_time" placeholder="Approximate Time ..." min="0" value="" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="trip_start_date">Trip Start Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="trip_start_date" id="trip_start_date"
                          placeholder="Trip Start Date ..." value="" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="trip_weekend">Weekend </label>
                        <select class="form-control" name="trip_weekend[]" id="trip_weekend" multiple>
                          <option value="" disabled>None</option>
                          <?php
                          if ($weekend) {
                            for ($day = 0; $day < sizeof($weekend); $day++) {
                              ?>
                              <option value="<?php echo $weekend[$day]; ?>">
                                <?php echo $weekend[$day]; ?>
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
                        <label for="trip_facility">Facility </label>
                        <select class="form-control" name="trip_facility[]" id="trip_facility" multiple>
                          <option value="" disabled>None</option>
                          <?php
                          $query = "SELECT * FROM `facility` ORDER BY `facility_name` ASC;";
                          $result = mysqli_query($con, $query);
                          if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                              <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['facility_name']; ?>]">
                                <?php echo $row['facility_name'] ?>
                              </option>
                              <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row m-0 p-2 my-2" style="background: rgba(0,0,0,0.03)">
                <div class="col-12" style="background: rgba(0,0,0,0.1)">
                  <h6 class="py-2 mb-0" style="font-weight: bold;">Vehicle</h6>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="trip_fleet_type">Fleet Type <span class="text-danger">*</span></label>
                        <select class="form-control" name="trip_fleet_type" id="trip_fleet_type" required>
                          <option value="">None</option>
                          <?php
                          $query = "SELECT * FROM `fleet` ORDER BY `type` ASC;";
                          $result = mysqli_query($con, $query);
                          if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                              <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['type']; ?>]">
                                <?php echo $row['type'] ?>
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
                        <label for="trip_vehical_list">Vehicle List <span class="text-danger">*</span></label>
                        <select class="form-control" name="trip_vehical_list" id="trip_vehical_list" required>
                          <option value="">None</option>

                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="trip_company_name">Company Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="trip_company_name" id="trip_company_name"
                          placeholder="Company Name ..." value="" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row m-0 p-2 my-2" style="background: rgba(0,0,0,0.03)">
                <div class="col-12" style="background: rgba(0,0,0,0.1)">
                  <h6 class="py-2 mb-0" style="font-weight: bold;">Employee</h6>
                </div>
                <div class="col-12">
                  <div class="row">
                    <?php
                    $query = "SELECT * FROM `employee_type`;";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-lg-3 col-sm-6 col-12">
                          <div class="form-group">
                            <label for="trip_<?php echo strtolower($row['emp_type']) . "_" . $row['id']; ?>">
                              <?php echo $row['emp_type']; ?> List <span class="text-danger">*</span>
                            </label>
                            <select class="form-control"
                              name="trip_<?php echo strtolower($row['emp_type']) . "_" . $row['id']; ?>[]"
                              id="trip_<?php echo strtolower($row['emp_type']) . "_" . $row['id']; ?>" required multiple>
                              <option value="[-]|[None]|[None]">None</option>
                              <?php
                              $id = $row['id'];
                              $query = "SELECT * FROM `employee` WHERE `emp_type` LIKE '[$id]|[%%]' ORDER BY `first_name` ASC, `last_name` ASC;";
                              $emp_result = mysqli_query($con, $query);
                              if ($emp_result) {
                                while ($emp = mysqli_fetch_assoc($emp_result)) {
                                  ?>
                                  <option
                                    value="[<?php echo $emp['id']; ?>]|[<?php echo $emp['first_name']; ?>]|[<?php echo $emp['last_name']; ?>]">
                                    <?php echo $emp['first_name'] . " " . $emp['last_name']; ?>
                                  </option>
                                  <?php
                                }
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <?php
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div class="row m-0 p-2 my-2">
                <div class="col-12">
                  <div class="form-group">
                    <label for="trip_status">Status <span class="text-danger">*</span> </label>
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="trip_status" id="trip_status_active"
                            value="trip_status_active" checked required>
                          <label class="form-check-label" for="trip_status_active">
                            Active
                          </label>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="trip_status" id="trip_status_disable"
                            value="trip_status_disable" required>
                          <label class="form-check-label" for="trip_status_disable">
                            Disable
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class=" modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <?php
    require("model/DeleteUpdateModel/DeleteUpdateModel.php");
    DeleteUpdateModel("TRIP", "Trip", "trip");
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

    $('#trip_fleet_type').change(function () {
      var id = ($(this).val().split('|')[0]).slice(1, -1);
      $.ajax({
        type: "POST",
        url: "CRUD/trip_list/vehical_list.php",
        data: { id },
        success: function (data, status) {
          $('#trip_vehical_list').html(data);
        }
      })
    });

    $('#add_trip').submit(function (e) {
      e.preventDefault();
      var boarding_point_element = $('#trip_boarding_point').children().length;
      var dropping_point_element = $('#trip_dropping_point').children().length;
      var formData = new FormData(this);
      formData.append("boarding_point_element", boarding_point_element);
      formData.append("dropping_point_element", dropping_point_element);
      $.ajax({
        type: "POST",
        url: "CRUD/trip_list/insert.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#TripModal').modal('hide');
          clear();
        }
      });
    });

    $('#update_trip_id').submit(function (e) {
      e.preventDefault();
      var boarding_point_element_update = $('#trip_boarding_point_update').children().length;
      var dropping_point_element_update = $('#trip_dropping_point_update').children().length;
      var id = ((document.getElementById('trip_update_id').classList.value).split(' ')[0]).split('_')[3] || null;
      var formData = new FormData(this);
      formData.append("boarding_point_element_update", boarding_point_element_update);
      formData.append("dropping_point_element_update", dropping_point_element_update);
      formData.append("update_id", id);
      $.ajax({
        type: "POST",
        url: "CRUD/trip_list/update.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#TripUpdateModal').modal('hide');
        }
      })
    });

    function clear() {
      document.getElementById('add_trip').reset();
      document.getElementById("trip_boarding_point").innerHTML = "";
      document.getElementById("trip_dropping_point").innerHTML = "";
      add_point(0, "Boarding", "ADD");
      add_point(0, "Dropping", "ADD");
      $.ajax({
        type: "POST",
        url: "CRUD/trip_list/vehical_list.php",
        data: { id: '' },
        success: function (data, status) {
          $('#trip_vehical_list').html(data);
        }
      })
    }

  });

  function set_vehical_list() {
    var id = ($("#trip_fleet_type_update").val().split("|")[0]).slice(1, -1);
    $.ajax({
      type: "POST",
      url: "CRUD/trip_list/vehical_list.php",
      data: { id },
      success: function (data, status) {
        $('#trip_vehical_list_update').html(data);
      }
    })
  }

  function add_boarding_dropping_point(num, point, action) {

    document.getElementById((point == "Boarding") ? `boarding_point${(action == "UPDATE") ? "_update" : ""}_button_${num}` : (point == "Dropping") ? `dropping_point${(action == "UPDATE") ? "_update" : ""}_button_${num}` : ``).innerHTML = `
      <button type="button" class="btn btn-danger" onclick="remove_boarding_dropping_point(${num},'${point}','${action}')"><i class="fa-solid fa-xmark"></i></button>
    `;

    add_point(num, point, action);
  }

  function add_point(num, point, action) {

    var add_boarding_dropping = document.createElement('div');
    add_boarding_dropping.setAttribute('class', 'col-12');
    add_boarding_dropping.setAttribute('id', `trip_${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}_point${(action == "UPDATE") ? "_update" : ""}_part_${num + 1}`);

    var containtOfPoints = "";
    containtOfPoints += ` <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
          <div class="form-group">
            <label for="trip_${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}${(action == "UPDATE") ? "_update" : ""}_time_${num + 1}">Select Time <span class="text-danger">*</span> </label>
            <input type="time" class="form-control" id="trip_${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}${(action == "UPDATE") ? "_update" : ""}_time_${num + 1}" name="trip_${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}${(action == "UPDATE") ? "_update" : ""}_time_${num + 1}"
              placeholder="Select Time ..." required>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
          <div class="form-group">
            <label for="trip_${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}${(action == "UPDATE") ? "_update" : ""}_bus_stand_${num + 1}">Bus Stand <span class="text-danger">*</span> </label>
            <select class="form-control" name="trip_${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}${(action == "UPDATE") ? "_update" : ""}_bus_stand_${num + 1}" id="trip_${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}${(action == "UPDATE") ? "_update" : ""}_bus_stand_${num + 1}" required>
              <option value="">None</option> `;
    <?php
    $query = "SELECT * FROM `stand` ORDER BY `stand_name` ASC;";
    $result = mysqli_query($con, $query);
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        containtOfPoints += `<option value="[<?php echo $row['id']; ?>]|[<?php echo $row['stand_name']; ?>]" > <?php echo $row['stand_name'] ?> </option>`
        <?php
      }
    }
    ?>
    containtOfPoints += `</select>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
          <div class="form-group">
            <label for="trip_${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}${(action == "UPDATE") ? "_update" : ""}_details_${num + 1}">Details </label>
            <input type="text" class="form-control" name="trip_${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}${(action == "UPDATE") ? "_update" : ""}_details_${num + 1}" id="trip_${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}${(action == "UPDATE") ? "_update" : ""}_details_${num + 1}"
              placeholder="Details ..." value="">
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
          <div class="h-100 d-flex justify-content-center align-items-center" id="${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}_point${(action == "UPDATE") ? "_update" : ""}_button_${num + 1}">
            <button type="button" class="btn btn-primary" onclick="add_boarding_dropping_point(${num + 1},'${point}','${action}')"><i
                class="fa-solid fa-plus"></i></button>
          </div>
        </div>
      </div> `;
    add_boarding_dropping.innerHTML = containtOfPoints;
    document.getElementById(`trip_${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}_point${(action == "UPDATE") ? "_update" : ""}`).appendChild(add_boarding_dropping);
  }

  function remove_boarding_dropping_point(num, point, action) {
    if (confirm(`Can You Permanent Delete This ${point} Point ...?`)) {
      document.getElementById(`trip_${(point == "Boarding") ? 'boarding' : (point == "Dropping") ? 'dropping' : ''}_point${(action == "UPDATE") ? "_update" : ""}_part_${num}`).innerHTML = "";
    }
  }

</script>

<?php
require('model/JSOperation/JSOperationFunction.php');
JSOperationFunction("trip");
?>

<?php
include('components/foot_links.php');
?>