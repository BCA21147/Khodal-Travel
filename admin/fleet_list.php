<?php
include("check_admin.php");
include('components/head_links.php');

$fleet_layout = array("2×2", "1×1", "2×1", "1×2", "3×2", "2×3", "1×1×1");

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
    SearchTableDataModel("Fleet", "fleet", "fa-chair");
    ?>

    <!-- ADD FLEET - Modal -->
    <form method="post" id="add_fleet" autocomplete="off">
      <div class="modal fade" id="FleetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD FLEET</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="fleet_type">Fleet Type <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" id="fleet_type" name="fleet_type" placeholder="Fleet Type ..."
                  required>
              </div>
              <div class="row justify-content-start justify-content-sm-center">
                <div class="col-10 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label for="fleet_layout">Fleet Layout <span class="text-danger">*</span> </label>
                    <select class="form-control" id="fleet_layout" name="fleet_layout" required
                      onchange="set_seat_no('ADD')">
                      <option value="">Seat Type</option>
                      <?php
                      for ($i = 0; $i < sizeof($fleet_layout); $i++) {
                        echo "<option value='$fleet_layout[$i]'>$fleet_layout[$i]</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-10 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label for="layout_no_of_row">Fleet Layout Line <span class="text-danger">*</span> </label>
                    <input type="number" class="form-control" id="layout_no_of_row" name="layout_no_of_row"
                      placeholder="No Of Rows ..." min="0" max="15" onkeyup="set_seat_no('ADD')"
                      onkeydown="set_seat_no('ADD')" required>
                  </div>
                </div>
                <div class="col-10 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label for="total_no_of_seat">Total Seat</label>
                    <input type="text" class="form-control" id="total_no_of_seat" name="total_no_of_seat"
                      placeholder="Total Seat" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="seat_number">Seat Number</label>
                <textarea type="text" class="form-control" id="seat_number" name="seat_number" placeholder='Seat Number'
                  rows="3" readonly></textarea>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label for="last_seat_check">Last Seat Check</label>
                    <div class="form-check d-flex align-items-center">
                      <input class="form-check-input" type="checkbox" value="last_seat_check" id="last_seat_check"
                        name="last_seat_check" disabled onchange="update_last_seat('ADD')">
                      <label class="form-check-label" for="last_seat_check">
                        Last Seat Check
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="luggage_service">Luggage Service <span class="text-danger">*</span> </label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="luggage_service" id="luggage_service_active"
                        value="luggage_service_active" checked required>
                      <label class="form-check-label" for="luggage_service_active">
                        Active
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="luggage_service" id="luggage_service_disable"
                        value="luggage_service_disable" required>
                      <label class="form-check-label" for="luggage_service_disable">
                        Disable
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="fleet_status">Status <span class="text-danger">*</span> </label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="fleet_status" id="fleet_status_active"
                        value="fleet_status_active" checked required>
                      <label class="form-check-label" for="fleet_status_active">
                        Active
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="fleet_status" id="fleet_status_disable"
                        value="fleet_status_disable" required>
                      <label class="form-check-label" for="fleet_status_disable">
                        Disable
                      </label>
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
    DeleteUpdateModel("FLEET", "Fleet", "fleet");
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

    $('#add_fleet').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: "POST",
        url: "CRUD/fleet_list/insert.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#FleetModal').modal('hide');
          clear();
        }
      })
    });

    $('#update_fleet_id').submit(function (e) {
      e.preventDefault();
      var id = ((document.getElementById('fleet_update_id').classList.value).split(' ')[0]).split('_')[3] || null;
      var formData = new FormData(this);
      formData.append("update_id", id);
      $.ajax({
        type: "POST",
        url: "CRUD/fleet_list/update.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#FleetUpdateModal').modal('hide');
        }
      })
    });

    function clear() {
      document.getElementById('add_fleet').reset();
      document.getElementById('last_seat_check').disabled = true;
    }

  })

  function set_seat_no(action) {
    let layout = document.getElementById((action == "ADD") ? 'fleet_layout' : (action == "UPDATE") ? 'fleet_layout_update' : '').value;
    let row = parseInt(document.getElementById((action == "ADD") ? 'layout_no_of_row' : (action == "UPDATE") ? 'layout_no_of_row_update' : '').value) || 0;
    if (layout != "" && row != 0 && row <= 15) {
      let arr = layout.split('×');
      var total = 0;
      for (var i = 0; i < arr.length; i++) {
        total += parseInt(arr[i]);
      }
      var number = "";
      var alpha = 'A';
      for (var i = 0; i < row; i++) {
        for (var j = 0; j < total; j++) {
          if (i == row - 1 && j == total - 1) {
            number += `${alpha}` + (j + 1);
          }
          else {
            number += `${alpha}` + (j + 1) + `, `;
          }
        }
        alpha = String.fromCharCode(alpha.charCodeAt(0) + 1);
      }
      document.getElementById((action == "ADD") ? 'total_no_of_seat' : (action == "UPDATE") ? 'total_no_of_seat_update' : '').value = total * row;
      document.getElementById((action == "ADD") ? 'seat_number' : (action == "UPDATE") ? 'seat_number_update' : '').value = number;
      document.getElementById((action == "ADD") ? 'last_seat_check' : (action == "UPDATE") ? 'last_seat_check_update' : '').checked = false;
      document.getElementById((action == "ADD") ? 'last_seat_check' : (action == "UPDATE") ? 'last_seat_check_update' : '').disabled = false;
    }
    else {
      document.getElementById((action == "ADD") ? 'total_no_of_seat' : (action == "UPDATE") ? 'total_no_of_seat_update' : '').value = "";
      document.getElementById((action == "ADD") ? 'seat_number' : (action == "UPDATE") ? 'seat_number_update' : '').value = "";
      document.getElementById((action == "ADD") ? 'last_seat_check' : (action == "UPDATE") ? 'last_seat_check_update' : '').disabled = true;
    }
  }

  function update_last_seat(action) {
    if (document.getElementById((action == "ADD") ? 'last_seat_check' : (action == "UPDATE") ? 'last_seat_check_update' : '').checked) {

      document.getElementById((action == "ADD") ? 'total_no_of_seat' : (action == "UPDATE") ? 'total_no_of_seat_update' : '').value = parseInt(document.getElementById((action == "ADD") ? 'total_no_of_seat' : (action == "UPDATE") ? 'total_no_of_seat_update' : '').value) + 1;

      document.getElementById((action == "ADD") ? 'seat_number' : (action == "UPDATE") ? 'seat_number_update' : '').value += ', Z';

    } else {

      document.getElementById((action == "ADD") ? 'total_no_of_seat' : (action == "UPDATE") ? 'total_no_of_seat_update' : '').value = parseInt(document.getElementById((action == "ADD") ? 'total_no_of_seat' : (action == "UPDATE") ? 'total_no_of_seat_update' : '').value) - 1;

      document.getElementById((action == "ADD") ? 'seat_number' : (action == "UPDATE") ? 'seat_number_update' : '').value = (document.getElementById((action == "ADD") ? 'seat_number' : (action == "UPDATE") ? 'seat_number_update' : '').value).substr(0, (document.getElementById((action == "ADD") ? 'seat_number' : (action == "UPDATE") ? 'seat_number_update' : '').value).length - 3);

    }
  }

</script>

<?php
require('model/JSOperation/JSOperationFunction.php');
JSOperationFunction("fleet");
?>

<?php
include('components/foot_links.php');
?>