<?php
include('./admin/CRUD/db_connection.php');
include('components/head_links.php');
include('components/header.php');
extract($_POST);
extract($_GET);
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

<div class="mb-3">
  <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
    <div class="findTicket w-100 h-100 py-5" id="BookingBusDetails" style="z-index:1;">
      <div class="container h-100 d-flex flex-column justify-content-center align-items-center px-md-3 px-5 mt-4">
        <div class="row w-100">
          <div class="col-lg-10 col-12 bg-white shadow-lg py-1 pb-3 px-3 mx-auto rounded"
            style="outline:13px solid rgba(256,256,256,.3)">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <div class="form-group">
                  <label for="trip_pick_up">From <span class="text-danger">*</span> </label>
                  <select class="form-control" name="trip_pick_up" id="trip_pick_up" required>
                    <option value="">None</option>
                    <?php
                    $query = "SELECT * FROM `location` ORDER BY `location_name` ASC;";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['location_name']; ?>]" <?php echo (isset($_POST['trip_pick_up']) ? (($_POST['trip_pick_up'] == "[" . $row['id'] . "]|[" . $row['location_name'] . "]") ? "selected" : "") : "") ?>>
                          <?php echo $row['location_name'] ?>
                        </option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="form-group">
                  <label for="trip_drop">To <span class="text-danger">*</span> </label>
                  <select class="form-control" name="trip_drop" id="trip_drop" required>
                    <option value="">None</option>
                    <?php
                    $query = "SELECT * FROM `location` ORDER BY `location_name` ASC;";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['location_name']; ?>]" <?php echo (isset($_POST['trip_drop']) ? (($_POST['trip_drop'] == "[" . $row['id'] . "]|[" . $row['location_name'] . "]") ? "selected" : "") : "") ?>>
                          <?php echo $row['location_name'] ?>
                        </option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="form-group">
                  <label for="trip_start_date">Journey Date <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="trip_start_date" id="trip_start_date"
                    placeholder="Journey Date ..." required onfocus="set_clear_date()"
                    value="<?php echo (isset($_POST['trip_start_date'])) ? $_POST['trip_start_date'] : date("Y-m-d"); ?>">
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="form-group">
                  <label for="trip_end_date">Return Date </label>
                  <input type="date" class="form-control" name="trip_end_date" id="trip_end_date"
                    placeholder="Return Date ..." onfocus="set_return_date()"
                    value="<?php echo (isset($_POST['trip_end_date'])) ? $_POST['trip_end_date'] : ""; ?>">
                </div>
              </div>
              <div class="col-12 d-flex justify-content-end">
                <input type="submit" value="Search Bus" class="btn btn-info py-2 px-4" style="font-weight: bold;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<?php

if (isset($_POST['trip_pick_up']) && isset($_POST['trip_drop']) && isset($_POST['trip_start_date'])) {
  ?>
  <div id="booking_first_page">
    <div class="container my-4 px-md-0 px-4">
      <div class="row m-0">
        <div class="col-12">
          <div class="card shadow m-0 p-3 border">
            <h6><i>One Way trip</i></h6>
            <h4>
              <b>
                <?php echo substr(explode("|", $_POST['trip_pick_up'])[1], 1, -1); ?> -
                <?php echo substr(explode("|", $_POST['trip_drop'])[1], 1, -1); ?>
              </b>
            </h4>
            <h5>
              <?php echo $_POST['trip_start_date']; ?>
            </h5>
          </div>
        </div>
      </div>
      <div class="row my-5">
        <div class="col-md-3 col-12">
          <?php
          $query = "SELECT * FROM `fleet`";
          $result = mysqli_query($con, $query);
          ?>
          <form>
            <div class="form-group">
              <div class="d-flex justify-content-between">
                <label for="ticket_price">PRICE </label>
                <div>
                  <input type="reset" class="border-0 bg-white" />
                </div>
              </div>
              <div class="row m-0 my-2">
                <div class="col-lg-6 col-md-12 col-6">
                  <div class="input-group mb-2">
                    <input type="number" name="ticket_start_price" class="form-control" id="ticket_start_price" min="100"
                      max="5000" value="500" onkeyup="SortTicket(<?php echo mysqli_num_rows($result); ?>)"
                      onkeydown="SortTicket(<?php echo mysqli_num_rows($result); ?>)"
                      onkeypress="SortTicket(<?php echo mysqli_num_rows($result); ?>)">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><b>$</b></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6">
                  <div class="input-group mb-2">
                    <input type="number" name="ticket_end_price" class="form-control" id="ticket_end_price" min="100"
                      max="5000" value="2000" onkeyup="SortTicket(<?php echo mysqli_num_rows($result); ?>)"
                      onkeydown="SortTicket(<?php echo mysqli_num_rows($result); ?>)"
                      onkeypress="SortTicket(<?php echo mysqli_num_rows($result); ?>)">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><b>$</b></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>BUS TYPES </label>
                <div class="row m-0">
                  <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-12 my-1">
                      <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" name="ticket_bus_type"
                          id="ticket_bus_type_<?php echo $row['id']; ?>" value="ticket_bus_type_<?php echo $row['id']; ?>"
                          data-ticket_bus_type="<?php echo $row['type']; ?>"
                          onchange="SortTicket(<?php echo mysqli_num_rows($result); ?>)">
                        <label class="form-check-label mx-3" for="ticket_bus_type_<?php echo $row['id']; ?>">
                          <?php echo $row['type']; ?>
                        </label>
                      </div>
                    </div>
                    <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-12" id="trip_search_result">
        </div>
      </div>
    </div>
  </div>
  <div class="container" id="booking_second_page"></div>
  <div class="container" id="booking_third_page"></div>
  <?php
}
?>

<!-- Alert - Booking Details - Modal -->
<?php
require("model/headerModel/closeEventsModel.php");
closeEventsModel("BookingDetailModal", "fa-solid fa-circle-xmark text-danger", "BOOKING WARNING", "");
?>
<div class="modal-body">
  <h5 class="d-flex align-items-center">
    <i class="fa-solid fa-triangle-exclamation text-warning pr-3"></i>
    <div id="warning_alert_box"></div>
  </h5>
</div>
<?php
require("model/footerModel/closeTwoButtonEventsModel.php");
closeTwoButtonEventsModel("btn-danger", "CLOSE", "", "btn-success", "DONE", "");
?>


<!-- Alert Login - Booking Details - Modal -->
<?php
closeEventsModel("BookingDetailLoginModal", "fa-solid fa-circle-xmark text-danger", "BOOKING WARNING", "");
?>
<div class="modal-body">
  <h5 class="d-flex align-items-center">
    <i class="fa-solid fa-triangle-exclamation text-warning pr-3"></i>
    <div>
      Please Login Now ...!<br />You Are Not Currently Login.
    </div>
  </h5>
</div>
<?php
require("model/footerModel/closeTwoButtonWithClickAbleModel.php");
closeTwoButtonWithClickAbleModel("btn-danger", "CLOSE", "login.php", "btn-success", "LOGIN");
?>

<!-- Receipt - Booking Details - Modal -->
<?php
closeEventsModel("ReceiptBookingDetailModal", "fa-solid fa-circle-check text-success", "BOOKING SUCCESSFULL", "");
?>
<div class="modal-body">
  <h5 class="d-flex align-items-center">
    <i class="fa-solid fa-bookmark text-info pr-3"></i>
    <div style="font-weight: normal;font-size: 18px;">
      <div>Ticket ID :- <b id="reg_booking_id">[ 123456789101234 ]</b> Has Been Generated For Successfully
        Booked Your Tickets.</div>
      <div>Send A E-Mail For Registed Mail Address <b id="reg_email_status">Successfully</b>. Like <b id="reg_email">[
          krishnar.sutariyarskd154@gmail.com
          ]</b>.</div>
    </div>
  </h5>
</div>
<?php
closeTwoButtonEventsModel("btn-danger", "CLOSE", "", "btn-success", "DONE", "");
?>

<?php
include('components/footer.php');
?>
<script>

  window.onbeforeunload = function (e) {
    $(window).scrollTop(0);
  };

  function set_journey_date() {
    var date = new Date();
    var min_date = "<?php echo date("Y-m-d"); ?>";
    var max_date = "<?php echo date('Y-m-d', strtotime('+1 year')); ?>";
    $('#trip_start_date').attr({ "min": min_date, "max": max_date });
    $('#trip_end_date').attr({ "min": min_date, "max": max_date });
  }

  function set_return_date() {
    if
      ($('#trip_start_date').val() != "") {
      var date = new Date($('#trip_start_date').val());
      var max_date = (date.getFullYear() + 1) + "-" + ((date.getMonth() + 1 < 10) ? "0" + (date.getMonth() + 1) : date.getMonth() + 1) + "-" + ((date.getDate() < 10) ? "0" + date.getDate() : date.getDate());
      $('#trip_end_date').attr({ "max": max_date });
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

  function selectBoardingDropingPoint(point, selected_point) {
    $(`#set_${(point == "BOARDNING") ? "pick_up" : "drop"}_data`).html($(`#get_${(point == "BOARDNING") ? "pick_up" : "drop"}_data_${selected_point.split("_")[2]}_${selected_point.split("_")[3]}`).html())
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

    if (<?php echo (isset($_SESSION['OBBMS_username'])) ? 0 : 1; ?>) {
      $("#BookingDetailLoginModal").modal("show");
    } else if ($(`#book_seat_number_${id}`).val() == "" || $(`#book_seat_number_${id}`).val() == " ") {
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
      formData.append("total_price_including_tax", $(`#total_price_including_tax_${id}`).html());
      $.ajax({
        type: "POST",
        url: "CRUD/book_ticket/booked_ticket.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
          $('#booking_first_page').addClass('d-none');
          $('#booking_second_page').html(data);
        }
      })
    }
  }

  function pessanger_booking_details(id) {
    event.preventDefault();
    var oldFormData;
    for (var num = 0; num < document.forms.length; num++) {
      if (document.forms[num].id == `bus_booking_details_${id}`) {
        oldFormData = new FormData(document.forms[num]);
      }
    }
    var formData = new FormData(document.forms.passenger_details);
    formData.append("trip_id", id);
    formData.append("trip_date", $('#trip_start_date').val() + "_" + $('#trip_end_date').val());
    formData.append("trip_child_seat", $(`#book_total_child_${id}`).val());
    formData.append("trip_special_seat", $(`#book_total_special_${id}`).val());
    formData.append("trip_adult_seat", $(`#book_total_adult_${id}`).val());
    formData.append("trip_pick_up", oldFormData.get(`book_pick_up_${id}`));
    formData.append("trip_drop", oldFormData.get(`book_drop_${id}`));
    formData.append("trip_seat_number", $(`#book_seat_number_${id}`).val());

    $.ajax({
      type: "POST",
      url: "admin/CRUD/book_ticket/insert.php",
      data: formData,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $("#rest_time_loader").toggleClass("d-none");
      },
      success: function (data, status) {
        $("#rest_time_loader").toggleClass("d-none");
        $('#find_bus_ticket').html("");
        $('#search_bus_ticket').html("");
        $('#booked_bus_ticket').html("");
        receipt_bus_ticket(JSON.parse(data));
      }
    })
  }

  function receipt_bus_ticket(booking_data) {
    $.ajax({
      type: "POST",
      url: "admin/CRUD/book_ticket/receipt.php",
      data: { "book_ticket_id": booking_data.booking_id },
      success: function (data, status) {
        $('#booking_second_page').addClass('d-none');
        $("#booking_third_page").html(data);
        $("#reg_booking_id").html(`[ ${booking_data.booking_id} ]`);

        $("#reg_email_status").html((booking_data.email_send_status == 1) ? "Successfully" : "Not Successfully");
        $("#reg_email_status").removeClass((booking_data.email_send_status == 1) ? "text-danger" : "text-success");
        $("#reg_email_status").addClass((booking_data.email_send_status == 1) ? "text-success" : "text-danger");

        $("#reg_email").html(`[ ${(booking_data.passenger_details[0].Email)} ]`)
        $("#ReceiptBookingDetailModal").modal("show");
      }
    })
  }

  function setOtherBusOptions(trip_id, action, data) {
    $.ajax({
      type: "POST",
      url: "CRUD/book_ticket/other_bus_details.php",
      data: { action, data },
      success: function (data, status) {
        $(`#book_bus_ticket_${trip_id}`).html(data);
      }
    });
  }

  function SortTicket(totalField) {
    var busType = [];
    startPrice = parseInt($('#ticket_start_price').val());
    endPrice = parseInt($('#ticket_end_price').val());
    var minPrice = (startPrice <= endPrice) ? startPrice : endPrice;
    var maxPrice = (startPrice >= endPrice) ? startPrice : endPrice;
    for (let num = 1; num <= totalField; num++) {
      if (document.getElementById(`ticket_bus_type_${num}`).checked) {
        busType.push('[' + (($(`#ticket_bus_type_${num}`).attr('id')).split('_')[3]) + ']|[' + $(`#ticket_bus_type_${num}`).attr('data-ticket_bus_type') + ']');
      }
    }
    <?php
    $trip_pick_up = (isset($trip_pick_up)) ? $trip_pick_up : '';
    $trip_drop = (isset($trip_drop)) ? $trip_drop : '';
    $trip_start_date = (isset($trip_start_date)) ? $trip_start_date : '';
    ?>
    searchData("<?php echo $trip_pick_up; ?>", "<?php echo $trip_drop; ?>", "<?php echo $trip_start_date; ?>", "<?php echo (isset($_POST['trip_end_date']) ? $trip_end_date : ""); ?>", minPrice, maxPrice, busType);
  }

  function searchData(pickUp, drop, startDate, endDate, minPrice, maxPrice, busType) {
    $.ajax({
      type: "POST",
      url: "CRUD/book_ticket/search_ticket.php",
      data: { trip_pick_up: pickUp, trip_drop: drop, trip_start_date: startDate, trip_end_date: endDate, trip_min_price: minPrice, trip_max_price: maxPrice, trip_vehical_type: busType },
      success: function (data, status) {
        $('#trip_search_result').html(data);
      }
    })
  }

  searchData("<?php echo $trip_pick_up; ?>", "<?php echo $trip_drop; ?>", "<?php echo $trip_start_date; ?>", "<?php echo (isset($_POST['trip_end_date']) ? $trip_end_date : ""); ?>", 500, 2000, []);

  function goto_booking() {
    window.location.reload();
  }

  async function downloadTicket(book_ticket_id) {
    var download = false;
    for (let time = 0; time < 2; time++) {
      await $.ajax({
        type: "POST",
        url: "admin/CRUD/book_ticket/download_ticket.php",
        data: { "book_ticket_id": book_ticket_id },
        beforeSend: function () {
          $("#rest_time_loader").toggleClass("d-none");
        },
        success: function (data, status) {
          $("#rest_time_loader").toggleClass("d-none");
          if (!download) {
            var tag = document.createElement('a');
            tag.href = `admin/CRUD/book_ticket/PDF/${book_ticket_id}.pdf`;
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