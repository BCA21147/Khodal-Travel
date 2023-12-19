<?php
include("check_admin.php");
include('CRUD/db_connection.php');
include('components/head_links.php');
?>

<div class="wrapper">

  <!-- REST TIME - Modal -->
  <div class="rest_time_loader d-none" id="rest_time_loader">
    <div class="w-100 position-fixed d-flex flex-column justify-content-center align-items-center"
      style="height: 100vh;">
      <div class="spinner-border text-white" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
      </div>
      <div class="text-white p-3 preloader_content">
        <b>Please Wait Few Seconds ...</b>
      </div>
    </div>
  </div>

  <?php
  include('components/preloader.php');
  include('components/header.php');
  include('components/aside_bar.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper px-3 py-2">

    <!-- FIND - BUS TICKET -->
    <div id="find_bus_ticket">
    </div>

    <!-- SEARCH - BUS TICKET -->
    <div id="search_bus_ticket">
    </div>

    <!-- BOOK - BUS TICKET -->
    <div id="booked_bus_ticket">
    </div>

    <!-- RECEIPT - BUS TICKET -->
    <div id="receipt_bus_ticket">
    </div>

    <!-- Alert - Booking Details - Modal -->
    <div class="modal fade" id="BookingDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              <i class="fa-solid fa-circle-xmark text-danger pr-3"></i>BOOKING WARNING
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5 class="d-flex align-items-center">
              <i class="fa-solid fa-triangle-exclamation text-warning pr-3"></i>
              <div id="warning_alert_box"></div>
            </h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">DONE</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Receipt - Booking Details - Modal -->
    <div class="modal fade" id="ReceiptBookingDetailModal" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              <i class="fa-solid fa-circle-check text-success pr-3"></i>BOOKING SUCCESSFULL
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5 class="d-flex align-items-center">
              <i class="fa-solid fa-bookmark text-info pr-3"></i>
              <div style="font-weight: normal;font-size: 18px;">
                <div>Ticket ID :- <b id="reg_booking_id">[ 123456789101234 ]</b> Has Been Generated For Successfully
                  Booked Your Tickets.</div>
                <div>Send A E-Mail For Registed Mail Address <b id="reg_email_status">Successfully</b>. Like <b
                    id="reg_email">[ krishnar.sutariyarskd154@gmail.com
                    ]</b>.</div>
              </div>
            </h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">DONE</button>
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
    find_trip();
    set_journey_date();
  });

  function book_ticket() {
    event.preventDefault();
    var formData = new FormData(document.forms.book_ticket);
    $.ajax({
      type: "POST",
      url: "CRUD/book_ticket/search_bus_ticket.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data, status) {
        $('#search_bus_ticket').html(data);
      }
    })
  }

  function find_trip() {
    $.ajax({
      type: "POST",
      url: "CRUD/book_ticket/find_trip.php",
      data: {},
      success: function (data, status) {
        $('#find_bus_ticket').html(data);
      }
    })
  }

  function set_journey_date() {
    var date = new Date();
    var min_date = "<?php echo date("Y-m-d"); ?>";
    var max_date = "<?php echo date('Y-m-d', strtotime('+1 year')); ?>";
    $('#trip_start_date').attr({
      "min": min_date,
      "max": max_date
    });
    $('#trip_end_date').attr({
      "min": min_date,
      "max": max_date
    });
  }

  function set_return_date() {
    if ($('#trip_start_date').val() != "") {
      var date = new Date($('#trip_start_date').val());
      var max_date = (date.getFullYear() + 1) + "-" + ((date.getMonth() + 1 < 10) ? "0" + (date.getMonth() + 1) : date.getMonth() + 1) + "-" + ((date.getDate() < 10) ? "0" + date.getDate() : date.getDate());
      $('#trip_end_date').attr({
        "max": max_date
      });
    }
  }

  function set_clear_date() {
    $('#trip_end_date').val("");
    set_journey_date();
  }

  function book_bus_ticket(trip_id, date) {
    if ($(`#book_bus_ticket_${trip_id}`).html() == "") {
      $.ajax({
        type: "POST",
        url: "CRUD/book_ticket/bus_details.php",
        data: { id: trip_id, trip_date: date },
        success: function (data, status) {
          $(`#book_bus_ticket_${trip_id}`).html(data);
        }
      });
    } else {
      $(`#book_bus_ticket_${trip_id}`).html("")
    }
  }

  function selected_seat_no(seat) {
    var id = seat.split("_")[0];
    if ($(`input[id=${seat}]:checked`).length == 1) {
      var val = ($(`#book_seat_number_${id}`).val());
      $(`#book_seat_number_${id}`).val(((val != "") ? val + ", " : val + "") + seat.split("_")[1]);
    } else {
      var seat_no = ((($(`#book_seat_number_${id}`).val()).replace(seat.split("_")[1] + ", ", "")).replace(", " + seat.split("_")[1], "")).replace(seat.split("_")[1], "");
      $(`#book_seat_number_${id}`).val(seat_no);
    }
    var total_seat = ($(`#book_seat_number_${id}`).val()).split(", ");
    if (total_seat.length > 6) {
      $(`#${id}_${total_seat[0]}`).prop("checked", false);

      var seat_no = ((($(`#book_seat_number_${id}`).val()).replace(total_seat[0] + ", ", "")).replace(", " + total_seat[0], "")).replace(total_seat[0], "");
      $(`#book_seat_number_${id}`).val(seat_no);
    }

    $(`#book_total_adult_${id}`).val((total_seat.length) - ($(`#book_total_child_${id}`).val()) - ($(`#book_total_special_${id}`).val()));

    selected_number_of_seat(`book_total_adult_${id}`);
  }

  function selected_number_of_seat(number) {
    var id = number.split("_")[3];
    var total_seat = ($(`#book_seat_number_${id}`).val()).split(", ");

    if ($(`#${number}`).val() == "") {
      $(`#${number}`).val("0")
    }

    if ($(`#book_total_special_${id}`).val() == "0" && $(`#book_total_child_${id}`).val() == "0") {
      $(`#book_total_adult_${id}`).val((total_seat[0] == "") ? 0 : total_seat.length);
    }
    if ($(`#book_total_child_${id}`).val() != "0" && $(`#book_total_special_${id}`).val() != "0") {
      $(`#book_total_adult_${id}`).val(((total_seat.length) - ($(`#book_total_child_${id}`).val()) - ($(`#book_total_special_${id}`).val()) < 0) ? 0 : (total_seat.length) - ($(`#book_total_child_${id}`).val()) - ($(`#book_total_special_${id}`).val()));
    }
    if ($(`#book_total_child_${id}`).val() != "0" && $(`#book_total_special_${id}`).val() == "0") {
      $(`#book_total_adult_${id}`).val(((total_seat.length) - ($(`#book_total_child_${id}`).val()) < 0) ? 0 : (total_seat.length) - ($(`#book_total_child_${id}`).val()));
    }
    if ($(`#book_total_special_${id}`).val() != "0" && $(`#book_total_child_${id}`).val() == "0") {
      $(`#book_total_adult_${id}`).val(((total_seat.length) - ($(`#book_total_special_${id}`).val()) < 0) ? 0 : (total_seat.length) - ($(`#book_total_special_${id}`).val()));
    }

    if ((parseInt(($(`#book_total_child_${id}`).val())) + parseInt(($(`#book_total_special_${id}`).val())) + parseInt(($(`#book_total_adult_${id}`).val()))) > 6) {
      if (parseInt(($(`#book_total_child_${id}`).val())) > 6) {
        $(`#book_total_child_${id}`).val("6")
      } else if ((parseInt(($(`#book_total_child_${id}`).val())) + parseInt(($(`#book_total_special_${id}`).val()))) > 6) {
        $(`#book_total_special_${id}`).val(6 - parseInt(($(`#book_total_child_${id}`).val())))
      } else {
        $(`#book_total_adult_${id}`).val(6 - (parseInt(($(`#book_total_child_${id}`).val())) + parseInt(($(`#book_total_special_${id}`).val()))))
      }
    }

    // ###############################################################################################

    $(`#total_adult_price_${id}`).html(parseInt($(`#total_adult_price_${id}`).attr('data-adult_fair')) * parseInt($(`#book_total_adult_${id}`).val()));
    $(`#total_child_price_${id}`).html(parseInt($(`#total_child_price_${id}`).attr('data-children_fair')) * parseInt($(`#book_total_child_${id}`).val()));
    $(`#total_special_price_${id}`).html(parseInt($(`#total_special_price_${id}`).attr('data-special_fair')) * parseInt($(`#book_total_special_${id}`).val()));

    $(`#total_all_price_${id}`).html(parseInt($(`#total_adult_price_${id}`).html()) + parseInt($(`#total_child_price_${id}`).html()) + parseInt($(`#total_special_price_${id}`).html()));
    $(`#total_tax_price_${id}`).html((parseInt($(`#total_tax_price_${id}`).attr('data-tax_rate')) * parseInt($(`#total_all_price_${id}`).html())) / 100);
    $(`#total_price_including_tax_${id}`).html(parseInt($(`#total_all_price_${id}`).html()) + parseInt($(`#total_tax_price_${id}`).html()));

  }

  function bus_booking_details(id) {
    event.preventDefault();

    var choose_seat = parseInt($(`#book_total_child_${id}`).val()) + parseInt($(`#book_total_special_${id}`).val()) + parseInt($(`#book_total_adult_${id}`).val());
    var select_seat = ($(`#book_seat_number_${id}`).val()).split(", ").length;

    if ($(`#book_seat_number_${id}`).val() == "" || $(`#book_seat_number_${id}`).val() == " ") {
      $("#warning_alert_box").html("You Can't Select Any Of Seat No. ...!");
      $("#BookingDetailModal").modal("show");
    } else if (choose_seat != select_seat) {
      $("#warning_alert_box").html(`You Can Choose <b>[ ${choose_seat} ]</b> Seat. But You Can Select Only <b>[ ${select_seat} ]</b> Seat From Bus. ...!`);
      $("#BookingDetailModal").modal("show");
    } else {
      var formData = new FormData();
      for (form = 0; form < document.forms.length; form++) {
        if (document.forms[form].hasAttribute("id") && document.forms[form].id == `bus_booking_details_${id}`) {
          formData = new FormData(document.forms[form]);
        }
      }
      formData.append("trip_id", id);
      formData.append("trip_date", ($("#trip_start_end_date").attr("data-trip_start_end_date")));
      formData.append("total_price_including_tax", $(`#total_price_including_tax_${id}`).html());
      $.ajax({
        type: "POST",
        url: "CRUD/book_ticket/booked_ticket.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          $('#booked_bus_ticket').removeClass('d-none');
          $('#find_bus_ticket').addClass('d-none');
          $('#search_bus_ticket').addClass('d-none');
          $('#booked_bus_ticket').html(data);
        }
      })
    }
  }

  function back_to_booking() {
    $('#find_bus_ticket').removeClass('d-none');
    $('#search_bus_ticket').removeClass('d-none');
    $('#booked_bus_ticket').addClass('d-none');
  }

  function goto_booking() {
    $('#find_bus_ticket').removeClass('d-none');
    $('#search_bus_ticket').removeClass('d-none');
    $('#search_bus_ticket').html("");
    $('#booked_bus_ticket').html("");
    $('#receipt_bus_ticket').html("");
    find_trip();
  }

  function passanger_booking_details(id) {
    payNow(id);
    event.preventDefault();
    // var formData = new FormData(document.forms.passenger_details);
    // formData.append("trip_id", id);
    // formData.append("trip_date", ($("#trip_start_end_date").attr("data-trip_start_end_date")));
    // formData.append("trip_child_seat", $(`#book_total_child_${id}`).val());
    // formData.append("trip_special_seat", $(`#book_total_special_${id}`).val());
    // formData.append("trip_adult_seat", $(`#book_total_adult_${id}`).val());
    // formData.append("trip_pick_up", $(`#book_pick_up_${id}`).val());
    // formData.append("trip_drop", $(`#book_drop_${id}`).val());
    // formData.append("trip_seat_number", $(`#book_seat_number_${id}`).val());
    // $.ajax({
    //   type: "POST",
    //   url: "CRUD/book_ticket/insert.php",
    //   data: formData,
    //   contentType: false,
    //   processData: false,
    //   beforeSend: function () {
    //     $("#rest_time_loader").toggleClass("d-none");
    //   },
    //   success: function (data, status) {
    //     $("#rest_time_loader").toggleClass("d-none");
    //     $('#find_bus_ticket').html("");
    //     $('#search_bus_ticket').html("");
    //     $('#booked_bus_ticket').html("");
    //     receipt_bus_ticket(JSON.parse(data));
    //   }
    // })
  }

  function payNow(id) {
    var options = {
      "key": "rzp_test_uqNX46y1kxcocc",
      "amount": 500,
      "currency": "INR",
      "name": "Khodal Travel",
      "description": "Test Transaction",
      "image": "../Images/Khodal-Travel WithBGColor.png",
      "handler": function (response) {
        console.log(response);
      },
      "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9000090000"
      },
      "notes": {
        "address": "Razorpay Corporate Office"
      },
      "theme": {
        "color": "#00887a"
      }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
    event.preventDefault();
  }

  function receipt_bus_ticket(booking_data) {
    $.ajax({
      type: "POST",
      url: "CRUD/book_ticket/receipt.php",
      data: { "book_ticket_id": booking_data.booking_id },
      success: function (data, status) {
        $("#receipt_bus_ticket").html(data);
        $("#reg_booking_id").html(`[ ${booking_data.booking_id} ]`);

        $("#reg_email_status").html((booking_data.email_send_status == 1) ? "Successfully" : "Not Successfully");
        $("#reg_email_status").removeClass((booking_data.email_send_status == 1) ? "text-danger" : "text-success");
        $("#reg_email_status").addClass((booking_data.email_send_status == 1) ? "text-success" : "text-danger");
        $("#reg_email").html(`[ ${booking_data.passenger_details[0].Email} ]`)
        $("#ReceiptBookingDetailModal").modal("show");
      }
    })
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