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

    <div class="row justify-content-center p-lg-4 p-md-2 p-0">
      <div class="col-12">
        <div class="card m-0">
          <div class="h5 fw-bold px-2 px-md-4 py-3 m-0">Cancel List</div>
          <hr class="m-0">
          <div class="px-2 px-md-4 py-3">
            <div class="pb-3">
              <div class="row m-0 justify-content-end">
                <div class="col-lg-4 col-md-6 col-sm-7 p-0">
                  <div class="form-group h-100 d-flex align-items-center">
                    <label for="search" class="px-3 mb-0">Search: </label>
                    <input type="text" name="search" id="search" class="form-control"
                      onkeyup="search_cancel_data(this.value)" onkeydown="search_cancel_data(this.value)">
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive" id="fetch_cancel_data">

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
  });

  function fetch_data() {
    $.ajax({
      type: "POST",
      url: "CRUD/cancel_list/fetch_data.php",
      data: {
        fetch_data: "fetch_data"
      },
      success: function (data, status) {
        $('#fetch_cancel_data').html(data);
      }
    })
  }

  function search_cancel_data(value) {
    $.ajax({
      type: "POST",
      url: "CRUD/cancel_list/fetch_data.php",
      data: {
        fetch_data: "fetch_data",
        search: value
      },
      success: function (data, status) {
        $('#fetch_cancel_data').html(data);
      }
    })
  }

</script>

<?php
include('components/foot_links.php');
?>