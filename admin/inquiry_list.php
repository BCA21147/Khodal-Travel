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
          <div class="h5 fw-bold px-2 px-md-4 py-3 m-0">Inquiry List</div>
          <hr class="m-0">
          <div class="px-2 px-md-4 py-3">
            <div class="pb-3">
              <div class="row m-0 justify-content-end">
                <div class="col-lg-4 col-md-6 col-sm-7 p-0">
                  <div class="form-group h-100 d-flex align-items-center">
                    <label for="search" class="px-3 mb-0">Search: </label>
                    <input type="text" name="search" id="search" class="form-control"
                      onkeyup="search_inquiry_data(this.value)" onkeydown="search_inquiry_data(this.value)">
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive" id="fetch_inquiry_data">

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- VIEW INQUIRY - Model -->
    <div class='modal fade' id='InquiryViewModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
      aria-hidden='true'>
      <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable' role='document' id="inquiry_view_model">

      </div>
    </div>
    <!-- DELETE INQUIRY - Model -->
    <div class='modal fade' id='InquiryDeleteModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
      aria-hidden='true'>
      <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable' role='document' id="inquiry_delete_model">

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
  })

  function inquiry_view(id) {
    $.ajax({
      type: "GET",
      url: `CRUD/inquiry_list/inquiry_view.php?id=${id}`,
      success: function (data, status) {
        $('#inquiry_view_model').html(data);
      }
    })
  }

  function ChangeInquiryStatus(id) {
    var status = ($(`#inquiry_status_${id}`).is(":checked")) ? 1 : 0;
    if (confirm(`Are You Sure ...?\nYou Can ${(status == 1) ? 'Active' : 'Disable'} Current Inquiry ...!`)) {
      $.ajax({
        type: "POST",
        url: 'CRUD/inquiry_list/delete.php',
        data: {
          status_id: id,
          status: status
        },
        success: function (data, status) {
          fetch_data();
        }
      })
    } else {
      $(`#inquiry_status_${id}`).prop('checked', (status == 1) ? false : true);
    }
  }

</script>

<?php
require('model/JSOperation/JSOperationFunction.php');
JSOperationFunction("inquiry");
?>

<?php
include('components/foot_links.php');
?>