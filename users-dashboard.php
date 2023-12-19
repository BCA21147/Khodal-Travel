<?php
session_start();
if (!(isset($_SESSION["OBBMS_username"]) && $_SESSION["OBBMS_username"]["status"] == 1)) {
    header('location:login.php');
}
session_write_close();
?>
<?php
include('./admin/CRUD/db_connection.php');
include('components/head_links.php');
include('components/header.php');
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

<?php

$query = "SELECT * FROM `passenger` WHERE `id`=" . $_SESSION["OBBMS_username"]["user_id"] . ";";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container my-4" id="userDashboard">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">
                    Welcome in <b>OBBMS</b>
                    <p class="text-dark-blue">
                        <b>
                            <?php echo $row['first_name']; ?>
                            <?php echo $row['last_name']; ?>
                        </b>
                    </p>
                </h2>
            </div>
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs nav-justified border-dark" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                            aria-controls="nav-profile" aria-selected="true">PROFILE</a>
                        <a class="nav-item nav-link active" id="nav-ticket-tab" data-toggle="tab" href="#nav-ticket"
                            role="tab" aria-controls="nav-ticket" aria-selected="false">TICKET</a>
                        <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab"
                            aria-controls="nav-password" aria-selected="false">PASSWORD</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form method="post" id="update_profile" autocomplete="off"
                            class="<?php echo "update_profile_" . $row['id']; ?>">
                            <div class="row mx-sm-0 mx-2">
                                <div class="col-sm-10 col-12 mx-auto">
                                    <div class="card py-sm-4 py-2 px-sm-5 px-3 shadow mt-sm-5 mt-4">
                                        <h5 class="mb-3"><b>Update Profile</b></h5>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="first_name"
                                                        name="first_name" placeholder="First Name ..." required
                                                        value="<?php echo $row['first_name']; ?>"
                                                        data-db_value="<?php echo $row['first_name']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                                        placeholder="Last Name ..." required
                                                        value="<?php echo $row['last_name']; ?>"
                                                        data-db_value="<?php echo $row['last_name']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <select class="form-control" name="doc_type" id="doc_type"
                                                                required data-db_value="<?php echo $row['id_type']; ?>">
                                                                <option value="NID" <?php echo ($row['id_type'] == "NID") ? 'selected' : ''; ?>>NID</option>
                                                                <option value="PP" <?php echo ($row['id_type'] == "PP") ? 'selected' : ''; ?>>PP</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="doc_number"
                                                                name="doc_number" placeholder="Document Number ..." required
                                                                minlength="6" maxlength="18"
                                                                value="<?php echo $row['nid_number']; ?>"
                                                                data-db_value="<?php echo $row['nid_number']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa-solid fa-envelope"></i>
                                                        </div>
                                                    </div>
                                                    <input type="email" class="form-control" id="email_id" name="email_id"
                                                        placeholder="Email ID. ..." required
                                                        value="<?php echo $row['email']; ?>"
                                                        data-db_value="<?php echo $row['email']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa-solid fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" id="phone_no" name="phone_no"
                                                        placeholder="Mobile No. ..." required minlength="10" maxlength="10"
                                                        value="<?php echo $row['mobile_no']; ?>"
                                                        data-db_value="<?php echo $row['mobile_no']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <select class="form-control" name="country" id="country" required
                                                        data-db_value="<?php echo $row['country_name']; ?>">
                                                        <option value="">Select Country</option>
                                                        <?php
                                                        $query = "SELECT * FROM `country`;";
                                                        $country_result = mysqli_query($con, $query);
                                                        if ($country_result) {
                                                            while ($country = mysqli_fetch_assoc($country_result)) {
                                                                ?>
                                                                <?php
                                                                $selectedCountry = false;
                                                                $createCountry = "[" . $country['id'] . "]|[" . $country['country_name'] . "]";
                                                                if ($row['country_name'] == $createCountry) {
                                                                    $selectedCountry = true;
                                                                }
                                                                ?>
                                                                <option value='<?php echo $createCountry; ?>' <?php echo ($selectedCountry) ? 'selected' : ''; ?>>
                                                                    <?php echo $country['country_name']; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="city" name="city"
                                                        placeholder="City ..." value="<?php echo $row['city_name']; ?>"
                                                        data-db_value="<?php echo $row['city_name']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="zip_code" name="zip_code"
                                                        placeholder="Zip Code ..." value="<?php echo $row['zip_code']; ?>"
                                                        minlength="6" maxlength="6"
                                                        data-db_value="<?php echo $row['zip_code']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control" id="address" name="address"
                                                        placeholder='Address ...' rows="4"
                                                        data-db_value="<?php echo $row['address']; ?>"
                                                        required><?php echo $row['address']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12 my-3 mx-auto">
                                                <div class="form-group">
                                                    <button type="submit" id="update_profile_submit"
                                                        class="btn btn-primary w-100">UPDATE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show active" id="nav-ticket" role="tabpanel" aria-labelledby="nav-ticket-tab">
                        <div class="px-md-3 px-2 py-md-2 py-2 my-3 bg-light-blue text-white">
                            <div class="py-1 px-md-3 px-2 bg-light-green">
                                <h5 class="m-0"><b>TICKET</b></h5>
                            </div>
                            <div class="p-2 mt-md-3 mt-2 bg-light-green">
                                <div class="bg-white">
                                    <div class="table-responsive">
                                        <table class='table table-hover table-bordered table-striped'>
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Booking ID.</th>
                                                    <th>Pick UP</th>
                                                    <th>Drop</th>
                                                    <th>No. Of Seat</th>
                                                    <th>Seat No.</th>
                                                    <th>Pickup Stand</th>
                                                    <th>Drop Stand</th>
                                                    <th>Payment Status</th>
                                                    <th>Journey Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user_id = $_SESSION["OBBMS_username"]["user_id"];
                                                $user_name = $_SESSION["OBBMS_username"]["username"];
                                                $query = "SELECT * FROM `ticket` WHERE `passenger_id`='[$user_id]|[$user_name]' AND `status`!=0;";
                                                $result = mysqli_query($con, $query);
                                                $num = 1;
                                                while ($book_ticket = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $num++; ?>.
                                                        </td>
                                                        <td>
                                                            <?php echo $book_ticket['booking_id']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo substr(explode("|", $book_ticket['trip'])[2], 1, -2); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo substr(explode("|", $book_ticket['trip'])[4], 1, -2); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo sizeof(explode(", ", $book_ticket['seat_no'])); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $book_ticket['seat_no']; ?>
                                                        </td>
                                                        <?php
                                                        $query = "SELECT * FROM `trip` WHERE `id` = " . substr(explode("|", $book_ticket["trip"])[0], 1, -1) . ";";
                                                        $trip = mysqli_query($con, $query);
                                                        if (mysqli_num_rows($trip) == 1) {
                                                            $data = mysqli_fetch_assoc($trip);
                                                            ?>
                                                            <td>
                                                                <?php echo substr(explode("|", $book_ticket['pick_up_stand'])[1], 1, -1); ?>
                                                                <p>(
                                                                    <?php echo substr(explode("-", explode("|", $data['schedule_time'])[1])[0], 1, -1); ?>)
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <?php echo substr(explode("|", $book_ticket['drop_stand'])[1], 1, -1); ?>
                                                                <p>(
                                                                    <?php echo substr(explode("-", explode("|", $data['schedule_time'])[1])[1], 1, -1); ?>)
                                                                </p>
                                                            </td>
                                                            <?php
                                                        }
                                                        ?>
                                                        <td>
                                                            <?php echo $book_ticket['payment_status']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo date("d-m-Y", strtotime(explode("_", $book_ticket['journey_date'])[0])); ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($book_ticket['status'] == 0) {
                                                                echo "CANCEL";
                                                            } elseif ($book_ticket['status'] == 1) {
                                                                echo "ACTIVE";
                                                            } elseif ($book_ticket['status'] == 2) {
                                                                echo "SUCCESS";
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <div class='d-flex justify-content-between'>
                                                                <script>
                                                                    $(function () {
                                                                        $('[data-toggle="popover"]').popover({
                                                                            html: true
                                                                        });
                                                                    })
                                                                </script>
                                                                <div class='btn btn-danger' data-toggle="popover"
                                                                    title="<b>TICKET CENCELLATION</b>"
                                                                    data-content="TICKET ID :- <b><?php echo $book_ticket['booking_id']; ?></b> <br/><br/><div class='text-center'><b><h5>Are You Sure ...?</h5></b><div> </br> <div class='row'><div class='col-6'><div class='btn btn-dark w-100' id='close_ticket_<?php echo $book_ticket['booking_id']; ?>'>CLOSE</div></div><div class='col-6'><div class='btn btn-danger w-100' id='cancel_ticket_<?php echo $book_ticket['booking_id']; ?>'>CANCEL</div></div></div>"
                                                                    onclick="cancel_ticket('<?php echo $book_ticket['booking_id']; ?>')"
                                                                    id="popover_<?php echo $book_ticket['booking_id']; ?>">
                                                                    <i class='fa-regular fa-circle-xmark py-1'
                                                                        style="font-size: 20px;"></i>
                                                                </div>
                                                                <div class='px-1'></div>
                                                                <a href="admin/CRUD/book_ticket/print_book_ticket.php?book_ticket_id=<?php echo $book_ticket['booking_id']; ?>"
                                                                    type="button" target="_blank" class='btn btn-info'
                                                                    title='Invoice'>
                                                                    <i class='fa-solid fa-file-invoice py-1'
                                                                        style="font-size: 20px;"></i>
                                                                </a>
                                                                <div class='px-1'></div>
                                                                <botton type="button"
                                                                    onclick="downloadTicket('<?php echo $book_ticket['booking_id']; ?>')"
                                                                    class='btn btn-primary' title='Print'>
                                                                    <i class='fa-solid fa-print py-1'
                                                                        style="font-size: 20px;"></i>
                                                                    </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                if (mysqli_num_rows($result) == 0) {
                                                    ?>
                                                    <tr>
                                                        <td colspan=12 class="text-center">
                                                            No Data Available In Table.
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-md-3 px-2 py-md-2 py-2 mt-3 bg-light-blue text-white">
                            <div class="py-1 px-md-3 px-2 bg-light-green">
                                <h5 class="m-0"><b>CANCEL</b></h5>
                            </div>
                            <div class="p-2 mt-md-3 mt-2 bg-light-green">
                                <div class="bg-white">
                                    <div class="table-responsive">
                                        <table class='table table-hover table-bordered table-striped'>
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Booking ID.</th>
                                                    <th>Pick UP</th>
                                                    <th>Drop</th>
                                                    <th>No. Of Seat</th>
                                                    <th>Seat No.</th>
                                                    <th>Pickup Stand</th>
                                                    <th>Drop Stand</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Cancellation Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user_id = $_SESSION["OBBMS_username"]["user_id"];
                                                $user_name = $_SESSION["OBBMS_username"]["username"];
                                                $query = "SELECT * FROM `ticket` WHERE `passenger_id`='[$user_id]|[$user_name]' AND `status`=0;";
                                                $result = mysqli_query($con, $query);
                                                $num = 1;
                                                while ($cancel_ticket = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $num++; ?>.
                                                        </td>
                                                        <td>
                                                            <?php echo $cancel_ticket['booking_id']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo substr(explode("|", $cancel_ticket['trip'])[2], 1, -2); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo substr(explode("|", $cancel_ticket['trip'])[4], 1, -2); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo sizeof(explode(", ", $cancel_ticket['seat_no'])); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $cancel_ticket['seat_no']; ?>
                                                        </td>
                                                        <?php
                                                        $query = "SELECT * FROM `trip` WHERE `id` = " . substr(explode("|", $cancel_ticket["trip"])[0], 1, -1) . ";";
                                                        $trip = mysqli_query($con, $query);
                                                        if (mysqli_num_rows($trip) == 1) {
                                                            $data = mysqli_fetch_assoc($trip);
                                                            ?>
                                                            <td>
                                                                <?php echo substr(explode("|", $cancel_ticket['pick_up_stand'])[1], 1, -1); ?>
                                                                <p>(
                                                                    <?php echo substr(explode("-", explode("|", $data['schedule_time'])[1])[0], 1, -1); ?>)
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <?php echo substr(explode("|", $cancel_ticket['drop_stand'])[1], 1, -1); ?>
                                                                <p>(
                                                                    <?php echo substr(explode("-", explode("|", $data['schedule_time'])[1])[1], 1, -1); ?>)
                                                                </p>
                                                            </td>
                                                            <?php
                                                        }
                                                        ?>
                                                        <td>
                                                            <?php echo $cancel_ticket['total_price']; ?> ₹
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($cancel_ticket['status'] == 0) {
                                                                echo "CANCEL";
                                                            } elseif ($cancel_ticket['status'] == 1) {
                                                                echo "ACTIVE";
                                                            } elseif ($cancel_ticket['status'] == 2) {
                                                                echo "SUCCESS";
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo date("d-m-Y", strtotime(explode("_", $cancel_ticket['booking_date'])[0])); ?>
                                                        </td>
                                                        <td>
                                                            <div class='d-flex justify-content-between'>
                                                                <a href="admin/CRUD/book_ticket/print_book_ticket.php?book_ticket_id=<?php echo $cancel_ticket['booking_id']; ?>"
                                                                    type="button" target="_blank" class='btn btn-info'
                                                                    title='Invoice'>
                                                                    <i class='fa-solid fa-file-invoice py-1'
                                                                        style="font-size: 20px;"></i>
                                                                </a>
                                                                <div class='px-1'></div>
                                                                <button type="button"
                                                                    onclick="downloadTicket('<?php echo $cancel_ticket['booking_id']; ?>')"
                                                                    class='btn btn-primary' title='Print'>
                                                                    <i class='fa-solid fa-print py-1'
                                                                        style="font-size: 20px;"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                if (mysqli_num_rows($result) == 0) {
                                                    ?>
                                                    <tr>
                                                        <td colspan=12 class="text-center">
                                                            No Data Available In Table.
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                        <form method="post" id="change_password" autocomplete="off"
                            class="<?php echo "change_password_" . $row['id']; ?>">
                            <div class="row mx-sm-0 mx-2">
                                <div class="col-lg-6 col-sm-9 col-12 mx-auto">
                                    <div class="card py-sm-4 py-2 px-sm-5 px-3 shadow mt-sm-5 mt-4">
                                        <h5 class="mb-3"><b>Change Password</b></h5>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                                                    </div>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" placeholder="Password ..." required minlength="7"
                                                        maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                                                    </div>
                                                    <input type="password" class="form-control" id="retype_password"
                                                        name="retype_password" placeholder="Confirm Password ..." required
                                                        minlength="7" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-12 my-3">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary w-100">CHANGE
                                                        PASSWORD</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    header('location:logout.php');
}

?>

<!-- ALERT PASSENGER - Modal -->
<?php
require("model/headerModel/closeEventsModel.php");
closeEventsModel("AlertPassengerModal", "fa-solid fa-circle-xmark text-danger", "ALERT PASSENGER", "");
?>
<div class="modal-body">
    <h5 class="d-flex align-items-center">
        <i class="fa-solid fa-triangle-exclamation text-warning pr-3"></i>
        <div style="font-weight: normal;font-size: 18px;" id="passenger_alert_message">
        </div>
    </h5>
</div>
<?php
require("model/footerModel/singleButtonModel.php");
singleButtonModel("btn-danger", "CLOSE");
?>

<!-- SUCCESS PASSENGER - Modal -->
<?php
closeEventsModel("SuccessPassengerModal", "fa-solid fa-circle-check text-success", "SUCCESS PASSENGER", "id='passenger_success_close_btn'");
?>
<div class="modal-body">
    <h5 class="d-flex align-items-center">
        <i class="fa-solid fa-bookmark text-info pr-3"></i>
        <div style="font-weight: normal;font-size: 18px;" id="passenger_success_message">
        </div>
    </h5>
</div>
<?php
require("model/footerModel/closeTwoButtonEventsModel.php");
closeTwoButtonEventsModel("btn-danger", "CLOSE", "", "btn-success", "DONE", "id='passenger_success_btn'");
?>

<?php
include('components/footer.php');
?>

<script>

    $(document).ready(function () {

        $('#change_password').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id = ((document.getElementById('change_password').classList.value).split(' ')[0]).split('_')[2] || null;
            formData.append("update_id", id);
            if (!isNaN(formData.get('update_id')) && formData.get('password') === formData.get('retype_password')) {
                $.ajax({
                    type: "POST",
                    url: "CRUD/registration/update.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data, status) {
                        $("#passenger_success_message").html("Your Password Can Be Change Successfully.");
                        $('#SuccessPassengerModal').modal({
                            backdrop: "static",
                            keyboard: false
                        })
                        clear();
                    }
                })
            }
            else {
                $('#PassengerModal').modal('hide');
                $("#passenger_alert_message").html("Please Enter Valid Details.");
                if (formData.get('password') != formData.get('retype_password')) {
                    $("#passenger_alert_message").html("Password Is Not Matched With Confirm Password.");
                }
                setTimeout(() => {
                    $('#AlertPassengerModal').modal('show');
                }, 345);
            }

        });

        $('#update_profile').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id = ((document.getElementById('change_password').classList.value).split(' ')[0]).split('_')[2] || null;
            console.log(id);
            formData.append("update_id", id);
            if (!isNaN(formData.get('update_id')) && !isNaN(formData.get('phone_no')) && !isNaN(formData.get('zip_code'))) {
                $.ajax({
                    type: "POST",
                    url: "CRUD/registration/update.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data, status) {
                        $("#passenger_success_btn").attr("onclick", "reloadCurrentPage()");
                        $("#passenger_success_close_btn").attr("onclick", "reloadCurrentPage()");
                        $("#passenger_success_message").html("Your Data's Can Be Update Successfully.");
                        $('#SuccessPassengerModal').modal({
                            backdrop: "static",
                            keyboard: false
                        });
                    }
                })
            }
            else {
                $('#PassengerModal').modal('hide');
                $("#passenger_alert_message").html("Please Enter Valid Details.");
                if (isNaN(formData.get('phone_no'))) {
                    $("#passenger_alert_message").html("Mobile Number Is Not Valid.");
                } else if (isNaN(formData.get('zip_code'))) {
                    $("#passenger_alert_message").html("Zip Code Is Not Valid.");
                }
                setTimeout(() => {
                    $('#AlertPassengerModal').modal('show');
                }, 345);
            }
        });

        function clear() {
            document.getElementById('change_password').reset();
            document.getElementById('update_profile').reset();
        }

    })

    function reloadCurrentPage() {
        window.location.reload();
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
            url: "admin/CRUD/ticket_list/cancel_ticket.php",
            data: { booking_id },
            success: function (data, status) {
                $(`#popover_${booking_id}`).popover('hide');
                reloadCurrentPage();
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