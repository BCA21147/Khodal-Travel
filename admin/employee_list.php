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
    SearchTableDataModel("Employee", "employee", "fa-add");
    ?>

    <!-- ADD EMPLOYEE - Modal -->
    <form method="post" id="add_employee" autocomplete="off">
      <div class="modal fade" id="EmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document" id="employee_add_model">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD EMPLOYEE</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="form-group">
                    <label for="employee_first_name">First Name <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="employee_first_name" name="employee_first_name"
                      placeholder="First Name ..." required>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="form-group">
                    <label for="employee_last_name">Last Name <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="employee_last_name" name="employee_last_name"
                      placeholder="Last Name ..." required>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="form-group">
                    <label for="employee_emp_type">Employee Type <span class="text-danger">*</span> </label>
                    <select class="form-control" name="employee_emp_type" id="employee_emp_type" required>
                      <option value="">Employee Type</option>
                      <?php
                      $query = "SELECT * FROM `employee_type`;";
                      $result = mysqli_query($con, $query);
                      if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <option value='[<?php echo $row['id']; ?>]|[<?php echo $row['emp_type']; ?>]'>
                            <?php echo $row['emp_type']; ?>
                          </option>
                          <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="form-group">
                    <label for="employee_mobile_no">Mobile No. <span class="text-danger">*</span> </label>
                    <input type="tel" class="form-control" id="employee_mobile_no" name="employee_mobile_no"
                      placeholder="Mobile No. ..." required>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="form-group">
                    <label for="employee_email_id">Email <span class="text-danger">*</span> </label>
                    <input type="email" class="form-control" id="employee_email_id" name="employee_email_id"
                      placeholder="Email ..." required>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="form-group">
                    <label for="employee_blood_group">Blood Group </label>
                    <input type="text" class="form-control" id="employee_blood_group" name="employee_blood_group"
                      placeholder="Blood Group ...">
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="form-group">
                    <label for="employee_id_type">ID Type </label>
                    <input type="text" class="form-control" id="employee_id_type" name="employee_id_type"
                      placeholder="ID Type ...">
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="form-group">
                    <label for="employee_id_number">NID/Passport No. </label>
                    <input type="text" class="form-control" id="employee_id_number" name="employee_id_number"
                      placeholder="NID/Passport No. ...">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="form-group">
                    <label for="employee_country_name">Country Name <span class="text-danger">*</span> </label>
                    <select class="form-control" name="employee_country_name" id="employee_country_name" required>
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
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="form-group">
                    <label for="employee_city_name">City Name </label>
                    <input type="text" class="form-control" id="employee_city_name" name="employee_city_name"
                      placeholder="City Name ...">
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="form-group">
                    <label for="employee_zip_code">ZIP Code. </label>
                    <input type="postal" class="form-control" id="employee_zip_code" name="employee_zip_code"
                      placeholder="ZIP Code. ...">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                  <div class="form-group">
                    <label for="employee_address">Address <span class="text-danger">*</span></label>
                    <textarea type="text" class="form-control" id="employee_address" name="employee_address"
                      placeholder='Address ...' rows="4" required></textarea>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-lg-4 p-2">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="employee_id_image" id="id_image_text">NID/Passport Image </label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="employee_id_image" name="employee_id_image"
                              accept=".jpg,.jpeg,.png,.gif">
                            <label class="custom-file-label" for="employee_id_image" id="id_image_label">No Choose
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
                        <div class="row d-flex overflow-auto p-2 m-0" id="id_image_preview"
                          style="flex-wrap: nowrap;border: 2px dashed gray">
                          <div class="w-100">
                            <center>No Choose Images</center>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 p-2">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="employee_profile_image" id="profile_image_text">Profile Image <span
                            class="text-danger">*</span></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="employee_profile_image"
                              name="employee_profile_image" required accept=".jpg,.jpeg,.png,.gif">
                            <label class="custom-file-label" for="employee_profile_image" id="profile_image_label">No
                              Choose
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
                        <div class="row d-flex overflow-auto p-2 m-0" id="profile_image_preview"
                          style="flex-wrap: nowrap;border: 2px dashed gray">
                          <div class="w-100">
                            <center>No Choose Images</center>
                          </div>
                        </div>
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
    DeleteUpdateModel("EMPLOYEE", "Employee", "employee");
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

    $('#employee_id_image').change(function (e) {
      update_image_status("ID", "ADD");
    });

    $('#employee_profile_image').change(function (e) {
      update_image_status("Profile", "ADD");
    });

    $('#add_employee').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: "POST",
        url: "CRUD/employee_list/insert.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#EmployeeModal').modal('hide');
          clear();
        }
      })
    });

    $('#update_employee_id').submit(function (e) {
      e.preventDefault();
      var id = ((document.getElementById('employee_update_id').classList.value).split(' ')[0]).split('_')[3] || null;
      var formData = new FormData(this);
      formData.append("update_id", id);
      $.ajax({
        type: "POST",
        url: "CRUD/employee_list/update.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          fetch_data();
          $('#EmployeeUpdateModal').modal('hide');
          clear();
        }
      })
    });

    function clear() {
      document.getElementById('add_employee').reset();
      var list = new DataTransfer();
      document.getElementById('employee_id_image').files = list.files;
      document.getElementById('employee_profile_image').files = list.files;
      update_image_status("ID", "ADD");
      update_image_status("Profile", "ADD");
    }

  });

  function fetch_data() {
    $.ajax({
      type: "POST",
      url: "CRUD/employee_list/fetch_data.php",
      data: {
        fetch_data: "fetch_data"
      },
      success: function (data, status) {
        $('#fetch_employee_data').html(data);
      }
    })
  }

  function search_employee_data(value) {
    $.ajax({
      type: "POST",
      url: "CRUD/employee_list/fetch_data.php",
      data: {
        fetch_data: "fetch_data",
        search: value
      },
      success: function (data, status) {
        $('#fetch_employee_data').html(data);
      }
    })
  }

  function employee_view(id) {
    $.ajax({
      type: "GET",
      url: `CRUD/employee_list/emp_view.php?id=${id}`,
      success: function (data, status) {
        $('#employee_update_model').html(data);
      }
    })
  }

  function employee_update(id) {
    var num = 0;
    setInterval(() => {
      if (num == 0) {
        $('#EmployeeUpdateModal').modal('show');
        $.ajax({
          type: "GET",
          url: `CRUD/employee_list/update.php?id=${id}`,
          success: function (data, status) {
            $('#employee_update_model').html(data);
          }
        })
      }
      num++;
    }, 345)
  }

  function employee_delete(id) {
    $.ajax({
      type: "GET",
      url: `CRUD/employee_list/delete.php?id=${id}`,
      success: function (data, status) {
        $('#employee_delete_model').html(data);
      }
    })
  }

  function employee_delete_data(id) {
    $.ajax({
      type: "POST",
      url: 'CRUD/employee_list/delete.php',
      data: {
        delete_id: id
      },
      success: function (data, status) {
        fetch_data();
      }
    })
  }

  function update_image_status(idType, action) {
    var images = document.getElementById(idType == "ID" ? `employee_id_image${(action == "ADD") ? "" : "_update"}` : `employee_profile_image${(action == "ADD") ? "" : "_update"}`).files;

    if (images.length != 0 && (images[0].type == "image/jpg" || images[0].type == "image/jpeg" || images[0].type == "image/png" || images[0].type == "image/gif")) {
      document.getElementById(idType == "ID" ? `id_image_label${(action == "ADD") ? "" : "_update"}` : `profile_image_label${(action == "ADD") ? "" : "_update"}`).innerHTML = images[0].name;

      var files = new FileReader();
      files.readAsDataURL(images[0]);
      files.onload = function (image) {
        document.getElementById(idType == "ID" ? `id_image_preview${(action == "ADD") ? "" : "_update"}` : `profile_image_preview${(action == "ADD") ? "" : "_update"}`).innerHTML = `<div class="col-12 p-1 d-flex align-items-center"><img src=${image.target.result} alt="" class="w-100 border p-1" style="border-radius: 10px"></div>`;
      }
    } else {
      document.getElementById(idType == "ID" ? `id_image_label${(action == "ADD") ? "" : "_update"}` : `profile_image_label${(action == "ADD") ? "" : "_update"}`).innerHTML = "No Choose files.";
      document.getElementById(idType == "ID" ? `id_image_preview${(action == "ADD") ? "" : "_update"}` : `profile_image_preview${(action == "ADD") ? "" : "_update"}`).innerHTML = "<div class='w-100'><center>No Choose Images</center></div>";
      var empty_list = new DataTransfer();
      document.getElementById(idType == "ID" ? `employee_id_image${(action == "ADD") ? "" : "_update"}` : `employee_profile_image${(action == "ADD") ? "" : "_update"}`).files = empty_list.files;
    }
  }

  function delete_image_preview(id, action) {
    document.getElementById(action == "NID" ? 'id_image_label_update' : 'profile_image_label_update').innerHTML = "No Choose files.";
    document.getElementById(action == "NID" ? 'employee_id_image_update' : 'employee_profile_image_update').disabled = false;
    document.getElementById(action == "NID" ? 'id_image_preview_update' : 'profile_image_preview_update').innerHTML = "<div class='w-100'><center>No Choose Images</center></div>";
  }

</script>

<?php
include('components/foot_links.php');
?>