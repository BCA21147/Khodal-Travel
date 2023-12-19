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
    SearchTableDataModel("Vehical", "vehical", "fa-truck");
    ?>

    <!-- ADD VEHICAL - Modal -->
    <form method="post" id="add_vehical" autocomplete="off" enctype="multipart/form-data">
      <div class="modal fade" id="VehicalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD VEHICAL</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row justify-content-center justify-content-sm-start">
                <div class="col-11 col-sm-6">
                  <div class="form-group">
                    <label for="vehical_reg_no">Reg No. <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="vehical_reg_no" id="vehical_reg_no"
                      placeholder="Reg No. ..." required>
                  </div>
                </div>
                <div class="col-11 col-sm-6">
                  <div class="form-group">
                    <label for="vehical_eng_no">Eng No. <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="vehical_eng_no" id="vehical_eng_no"
                      placeholder="Eng No. ..." required>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center justify-content-sm-start">
                <div class="col-11 col-sm-6">
                  <div class="form-group">
                    <label for="vehical_model_no">Model No. <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="vehical_model_no" id="vehical_model_no"
                      placeholder="Model No. ..." required>
                  </div>
                </div>
                <div class="col-11 col-sm-6">
                  <div class="form-group">
                    <label for="fleet_layout">Fleet Type <span class="text-danger">*</span> </label>
                    <select class="form-control" name="vehical_fleet_type" id="vehical_fleet_type" required>
                      <option value="">Fleet Type</option>
                      <?php
                      include('CRUD/db_connection.php');
                      $query = "SELECT * FROM `fleet`;";
                      $result = mysqli_query($con, $query);
                      if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo "<option value='[" . $row['id'] . "]|[" . $row['type'] . "]'>" . $row['type'] . "</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center justify-content-sm-start">
                <div class="col-11 col-sm-6">
                  <div class="form-group">
                    <label for="vehical_chassis_no">Chassis No. <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="vehical_chassis_no" id="vehical_chassis_no"
                      placeholder="Chassis No. ..." required>
                  </div>
                </div>
                <div class="col-11 col-sm-6">
                  <div class="form-group">
                    <label for="vehical_owner">Owner <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="vehical_owner" id="vehical_owner"
                      placeholder="Owner ..." required>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center justify-content-sm-start">
                <div class="col-11 col-sm-6">
                  <div class="form-group">
                    <label for="vehical_owner_mobile">Owner Mobile <span class="text-danger">*</span> </label>
                    <input type="tel" class="form-control" name="vehical_owner_mobile" id="vehical_owner_mobile"
                      placeholder="Owner Mobile ..." required>
                  </div>
                </div>
                <div class="col-11 col-sm-6">
                  <div class="form-group">
                    <label for="vehical_company">Company <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="vehical_company" id="vehical_company"
                      placeholder="Company ..." required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="vehical_status">Status <span class="text-danger">*</span> </label>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="vehical_status" id="vehical_status_active"
                            value="vehical_status_active" checked required>
                          <label class="form-check-label" for="vehical_status_active">
                            Active
                          </label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="vehical_status" id="vehical_status_disable"
                            value="vehical_status_disable" required>
                          <label class="form-check-label" for="vehical_status_disable">
                            Disable
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="vehical_bus_image">Bus Image <span class="text-danger">*</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="vehical_bus_image" name="bus_images[]" multiple
                          required accept=".jpg,.jpeg,.png,.gif">
                        <label class="custom-file-label" for="vehical_bus_image" id="bus_image_label">No Choose
                          files.</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div>
                    <div class="text-center py-2">
                      <div class="d-flex w-100 align-items-center">
                        <div class="border w-100"></div>
                        <div class="h6 w-100" style="font-weight: bold;">Image Preview</div>
                        <div class="border w-100"></div>
                      </div>
                    </div>
                    <div class="row d-flex overflow-auto p-2 m-0" id="bus_image_preview"
                      style="flex-wrap: nowrap;border: 2px dashed gray">
                      <div class="w-100">
                        <center>No Choose Images</center>
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
    DeleteUpdateModel("VEHICAL", "Vehical", "vehical");
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

    $('#vehical_bus_image').change(function (e) {
      update_image_status("ADD");
    });

    $('#vehical_bus_image_update').change(function (e) {
      update_image_status("UPDATE");
    });

    $('#add_vehical').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: "POST",
        url: "CRUD/vehical_list/insert.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#VehicalModal').modal('hide');
          clear();
        }
      })
    });

    $('#update_vehical_id').submit(function (e) {
      e.preventDefault();
      var id = ((document.getElementById('vehical_update_id').classList.value).split(' ')[0]).split('_')[3] || null;
      var formData = new FormData(this);
      formData.append("update_id", id);
      $.ajax({
        type: "POST",
        url: `CRUD/vehical_list/update.php`,
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#VehicalUpdateModal').modal('hide');
        }
      })
    });

    function clear() {
      document.getElementById('add_vehical').reset();
      var list = new DataTransfer();
      document.getElementById('vehical_bus_image').files = list.files;
      update_image_status("ADD");
    }

  });

  function update_image_status(action) {
    var images = document.getElementById(action == "ADD" ? 'vehical_bus_image' : 'vehical_bus_image_update').files;
    var new_list = new DataTransfer();

    for (var i = 0; i < images.length; i++) {
      if (images[i].type == "image/jpg" || images[i].type == "image/jpeg" || images[i].type == "image/png" || images[i].type == "image/gif") {
        new_list.items.add(images[i]);
      }
    }
    images = new_list.files;
    if (images.length != 0) {
      document.getElementById(action == "ADD" ? 'bus_image_label' : 'bus_image_label_update').innerHTML = images.length + " Files Selected.";
      document.getElementById(action == "ADD" ? 'bus_image_preview' : 'bus_image_preview_update').innerHTML = "";

      for (var i = 0; i < images.length; i++) {
        var files = new FileReader();
        files.readAsDataURL(images[i]);
        files.onload = function (image) {
          document.getElementById(action == "ADD" ? 'bus_image_preview' : 'bus_image_preview_update').innerHTML += `<div class="${action == "ADD" ? 'col-4' : 'col-12'} p-1 d-flex align-items-center"><img src=${image.target.result} alt="" class="w-100 border p-1" style="border-radius: 10px"></div>`;
        }
      };
    } else {
      document.getElementById(action == "ADD" ? 'bus_image_label' : 'bus_image_label_update').innerHTML = "No Choose files.";
      document.getElementById(action == "ADD" ? 'bus_image_preview' : 'bus_image_preview_update').innerHTML = "<div class='w-100'><center>No Choose Images</center></div>";
    }
    document.getElementById(action == "ADD" ? 'vehical_bus_image' : 'vehical_bus_image_update').files = images;
  }

  function delete_image_preview(id) {
    if (confirm('Can You Permanent Delete This Image ...?')) {
      $.ajax({
        type: "POST",
        url: "CRUD/vehical_list/delete_image.php",
        data: {
          vehical_id: id.split('_')[0],
          delete_img_id: id.split('_')[1]
        },
        success: function (data, status) {
          vehical_update(id.split('_')[0]);
          fetch_data();
        }
      })
    }
  }

</script>

<?php
require('model/JSOperation/JSOperationFunction.php');
JSOperationFunction("vehical");
?>

<?php
include('components/foot_links.php');
?>