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

  <!-- REST TIME - Modal -->
  <div class="rest_time_loader position-fixed d-none" id="rest_time_loader">
    <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center">
      <div class="spinner-border text-white" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
      </div>
      <div class="text-white p-3 preloader_content">
        <b>Please Wait Few Seconds ...</b>
      </div>
    </div>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper px-3 py-2">

    <div class="row justify-content-center p-lg-4 p-md-2 p-0">
      <div class="col-12">
        <div class="card m-0">
          <div class="h5 fw-bold px-2 px-md-4 py-3 m-0">Ticket List</div>
          <hr class="m-0">
          <div class="px-2 px-md-4 py-3">
            <div class="pb-3">
              <div class="row m-0 justify-content-end">
                <div class="col-lg-4 col-md-6 col-sm-7 p-0">
                  <div class="form-group h-100 d-flex align-items-center">
                    <label for="search" class="px-3 mb-0">Search: </label>
                    <input type="text" name="search" id="search" class="form-control"
                      onkeyup="search_ticket_data(this.value)" onkeydown="search_ticket_data(this.value)">
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive" id="fetch_ticket_data">

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
      url: "CRUD/ticket_list/fetch_data.php",
      data: {
        fetch_data: "fetch_data"
      },
      success: function (data, status) {
        $('#fetch_ticket_data').html(data);
      }
    })
  }

  function search_ticket_data(value) {
    $.ajax({
      type: "POST",
      url: "CRUD/ticket_list/fetch_data.php",
      data: {
        fetch_data: "fetch_data",
        search: value
      },
      success: function (data, status) {
        $('#fetch_ticket_data').html(data);
      }
    })
  }

  function cancel_ticket(booking_id) {
    for (var num = 0; num < $('[data-toggle="popover"]').length; num++) {
      if ($('[data-toggle="popover"]')[num].id == `popover_${booking_id}`) {
        $(`#popover_${booking_id}`).popover('show');
      } else {
        $("#" + $('[data-toggle="popover"]')[num].id).popover('hide');
      }
    }
    setTimeout(() => {
      var cancel = document.getElementById(`cancel_ticket_${booking_id}`);
      var close = document.getElementById(`close_ticket_${booking_id}`);
      cancel.setAttribute("onclick", `cancel_ticket_id('${booking_id}')`);
      close.setAttribute("onclick", `close_ticket_id('${booking_id}')`);
    }, 1);
  }

  function cancel_ticket_id(booking_id) {
    $.ajax({
      type: "POST",
      url: "CRUD/ticket_list/cancel_ticket.php",
      data: { booking_id },
      success: function (data, status) {
        $(`#popover_${booking_id}`).popover('hide');
        fetch_data();
      }
    })
  }

  function close_ticket_id(booking_id) {
    $(`#popover_${booking_id}`).popover('hide');
  }

  async function downloadTicket(book_ticket_id) {
    var download = false;
    for (let time = 0; time < 2; time++) {
      await $.ajax({
        type: "POST",
        url: "CRUD/book_ticket/download_ticket.php",
        data: { "book_ticket_id": book_ticket_id },
        beforeSend: function () {
          $("#rest_time_loader").toggleClass("d-none");
        },
        success: function (data, status) {
          $("#rest_time_loader").toggleClass("d-none");
          if (!download) {
            var tag = document.createElement('a');
            tag.href = `CRUD/book_ticket/PDF/${book_ticket_id}.pdf`;
            tag.download = `${book_ticket_id}.pdf`;
            tag.click();
            download = true;
          }
        }
      })
    }
  }

</script>

<?php
include('components/foot_links.php');
?>