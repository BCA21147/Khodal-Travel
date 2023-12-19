<?php

include('../db_connection.php');

extract($_POST);

if (isset($_POST['book_ticket_id'])) {

    $query = "SELECT * FROM `ticket` WHERE booking_id = '$book_ticket_id'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>

        <?php
        session_start();
        $isAdmin = false;
        if (isset($_SESSION['OBBMS_username']) && $_SESSION['OBBMS_username']['status'] == 2) {
            $isAdmin = true;
        }
        ?>

        <!-- Scroll To TOP -->
        <script>
            $(window).scrollTop(0);
        </script>

        <div class="row justify-content-center px-lg-4 py-lg-2 p-md-2 py-4">
            <div class="col-12">
                <div class="card m-0">
                    <div class="h5 fw-bold px-2 px-md-4 py-3 m-0 d-flex justify-content-between align-items-center">
                        <div>Book Ticket - Receipt</div>
                        <div style="cursor: pointer;" title="Back To Booking" onclick="goto_booking()"><i
                                class="fa-solid fa-rotate-left"></i></div>
                    </div>
                    <hr class="m-0">
                    <div class="px-2 px-md-4 py-3">
                        <div class="pb-3">
                            <div class="row m-0 py-3 shadow">
                                <div class="col-12 p-2" style="background-color: rgba(255, 193, 7,.7);">
                                    <div class="row">
                                        <div class="col-2 d-flex justify-content-center align-items-center">
                                            <?php
                                            $logo = "";
                                            if ($isAdmin) {
                                                $logo = "../Images/Khodal-Travel-Yellow.png";
                                            } else {
                                                $logo = "./Images/Khodal-Travel-Yellow.png";
                                            }
                                            ?>
                                            <img src="<?php echo $logo; ?>" alt="" srcset="" class="w-75">
                                        </div>
                                        <div class="col-8">
                                            <div
                                                class="w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center">
                                                <div>
                                                    <div>
                                                        <h4><b>KTAT</b></h4>
                                                    </div>
                                                    <div class="text-danger">
                                                        <h5><b>Khodal Tour & Traveller</b></h5>
                                                    </div>
                                                    <div class="text-success">
                                                        <h5><b>ખોડલ ટુર એન્ડ ટ્રાવેલર</b></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 d-flex justify-content-center align-items-center">
                                            <?php
                                            $logo = "";
                                            if ($isAdmin) {
                                                $logo = "../Images/TourPlace.png";
                                            } else {
                                                $logo = "./Images/TourPlace.png";
                                            }
                                            ?>
                                            <img src="<?php echo $logo; ?>" alt="" srcset="" class="w-75">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 py-2 px-4 text-primary">
                                    <b>E-Ticket/Reservation Voucher</b>
                                </div>
                                <div class="col-12 py-2 px-4">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>MOBILE NO.</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php print_r(unserialize($row['passenger_details'])[0]["Mobile_No"]); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>BOOKING ID</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo $row["booking_id"]; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>JOURNEY FROM</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo substr(explode("|", $row["trip"])[2], 1, -2); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>ARRIVAL TIME</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php
                                                    $query = "SELECT * FROM `trip` WHERE `id` = " . substr(explode("|", $row["trip"])[0], 1, -1) . ";";
                                                    $trip = mysqli_query($con, $query);
                                                    if (mysqli_num_rows($trip) == 1) {
                                                        $data = mysqli_fetch_assoc($trip);
                                                        echo substr(explode("-", explode("|", $data['schedule_time'])[1])[0], 1, -1);
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>PICKUP POINT</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo substr(explode("|", $row["pick_up_stand"])[1], 1, -1); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>NO. OF SEAT</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo sizeof(explode(", ", $row['seat_no'])); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>NID TYPE</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php print_r((unserialize($row['passenger_details'])[0]["ID_Type"] == "") ? "—" : unserialize($row['passenger_details'])[0]["ID_Type"]); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>EMAIL ID.</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php print_r(unserialize($row['passenger_details'])[0]["Email"]); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>JOURNEY DATE</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo date("d-m-Y", strtotime(explode("_", $row["journey_date"])[0])); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>JOURNEY TO</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo substr(explode("|", $row["trip"])[4], 1, -2); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>DEPARTURE TIME</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php
                                                    $query = "SELECT * FROM `trip` WHERE `id` = " . substr(explode("|", $row["trip"])[0], 1, -1) . ";";
                                                    $trip = mysqli_query($con, $query);
                                                    if (mysqli_num_rows($trip) == 1) {
                                                        $data = mysqli_fetch_assoc($trip);
                                                        echo substr(explode("-", explode("|", $data['schedule_time'])[1])[1], 1, -1);
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>DROP POINT</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo substr(explode("|", $row["drop_stand"])[1], 1, -1); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>SEAT NO.</b>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo $row['seat_no']; ?>.
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>STATUS</b>
                                                </div>
                                                <?php
                                                if ($row['status'] == 1) {
                                                    ?>
                                                    <div class="col-6 text-success">
                                                        <b>ACTIVE</b>
                                                    </div>
                                                    <?php
                                                } elseif ($row['status'] == 2) {
                                                    ?>
                                                    <div class="col-6 text-success">
                                                        <b>SUCCESS</b>
                                                    </div>
                                                    <?php
                                                } elseif ($row['status'] == 0) {
                                                    ?>
                                                    <div class="col-6 text-danger">
                                                        <b>CANCEL</b>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-6">
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 py-2 px-4 text-primary">
                                    <b>Passenger Information</b>
                                </div>
                                <div class="col-12 py-2 px-4">
                                    <div class="row">
                                        <div class="col-2 col-sm-1">
                                            <b>No.</b>
                                        </div>
                                        <div class="col-10 col-sm-5">
                                            <b>Passenger Name</b>
                                        </div>
                                        <div class="offset-2 offset-sm-0 col-5 col-sm-3">
                                            <b>Mobile No.</b>
                                        </div>
                                        <div class="col-5 col-sm-3">
                                            <b>NID Number</b>
                                        </div>
                                    </div>
                                    <?php
                                    for ($num = 0; $num < sizeof(unserialize($row['passenger_details'])); $num++) {
                                        ?>
                                        <div class="row">
                                            <div class="col-2 col-sm-1">
                                                <?php echo $num + 1; ?>.
                                            </div>
                                            <div class="col-10 col-sm-5">
                                                <?php echo unserialize($row['passenger_details'])[$num]["First_Name"] . " " . unserialize($row['passenger_details'])[$num]["Last_Name"]; ?>
                                            </div>
                                            <div class="offset-2 offset-sm-0 col-5 col-sm-3">
                                                <?php echo unserialize($row['passenger_details'])[$num]["Mobile_No"]; ?>
                                            </div>
                                            <div class="col-5 col-sm-3">
                                                <?php echo (unserialize($row['passenger_details'])[$num]["NID_Number"] == "") ? "—" : unserialize($row['passenger_details'])[$num]["NID_Number"]; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    for ($num = 0; $num < 6 - sizeof(unserialize($row['passenger_details'])); $num++) {
                                        ?>
                                        <div class="row">
                                            <div class="col-2 col-sm-1">
                                                <?php echo (($num + 1) + sizeof(unserialize($row['passenger_details']))); ?>.
                                            </div>
                                            <div class="col-10 col-sm-5">
                                                —
                                            </div>
                                            <div class="offset-2 offset-sm-0 col-5 col-sm-3">
                                                —
                                            </div>
                                            <div class="col-5 col-sm-3">
                                                —
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-12 py-2 px-4 text-primary">
                                    <b>Total Fare Details</b>
                                </div>
                                <div class="col-12 py-2 px-4">
                                    <div class="row">
                                        <div class="col-9">
                                            <b>CHILDREN FARE</b>
                                        </div>
                                        <div class="col-3">
                                            <?php echo $row["total_children_price"]; ?> ₹
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-9">
                                            <b>SPECIAL FARE</b>
                                        </div>
                                        <div class="col-3">
                                            <?php echo $row["total_special_price"]; ?> ₹
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-9">
                                            <b>ADULT FARE</b>
                                        </div>
                                        <div class="col-3">
                                            <?php echo $row["total_adult_price"]; ?> ₹
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-9">
                                            <b>BASIC FARE</b>
                                        </div>
                                        <div class="col-3">
                                            <?php echo $row["ticket_price"]; ?> ₹
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-9">
                                            <b>GST (
                                                <?php if ($row["ticket_price"] != 0) {
                                                    echo intval(($row["tax_price"] * 100) / $row["ticket_price"]);
                                                } else {
                                                    echo "0";
                                                } ?>%
                                                )
                                            </b>
                                        </div>
                                        <div class="col-3">
                                            <?php echo $row["tax_price"]; ?> ₹
                                        </div>
                                    </div>
                                    <div class="row text-success">
                                        <div class="col-9">
                                            <b>TOTAL FARE</b>
                                        </div>
                                        <div class="col-3">
                                            <b>
                                                <?php echo $row["total_price"]; ?> ₹
                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 py-2 px-4 text-primary">
                                    <b>Important</b>
                                </div>
                                <div class="col-12 py-2 px-4">
                                    <ul>
                                        <li>
                                            The seat(s) booked under this e-ticket is/are not transferable.
                                        </li>
                                        <li>

                                            This e-ticket is valid only for the seat number and bus service specified
                                            herein
                                        </li>
                                        <li>
                                            This e-ticket print out has to be carried by the passenger during t
                                            h e journey along
                                            with
                                            Original Photo ID
                                            Card of the passenger whose name appears above.
                                        </li>
                                        <li>
                                            Please keep the e-ticket safely till the end of the journey.
                                        </li>
                                        <li>
                                            Please show the e-ticket at the time of checking.
                                        </li>
                                        <li>
                                            <b>RKTAT</b> reserves the rights to change/cancel the class of service
                                        </li>

                                        <li>
                                            Passengers will have to pay the difference amount at boarding time in case
                                            of
                                            fare /

                                            levies /
                                            taxes revision
                                            as and when applicable. The difference amount will be calculated on charged
                                            fare
                                            and
                                            new fare /
                                            new levy
                                            / revised tax.
                                        </li>
                                        <li>
                                            Passenger can take print of Ticket or SMS from <b>RKTAT.IN</b>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row m-0 py-3">
                                <div class="col-12 d-flex flex-wrap justify-content-center">
                                    <button type="button" class="btn btn-danger my-1 mx-2 px-4"
                                        onclick="goto_booking()">BACK</button>
                                    <a href="." type="button" class="btn btn-dark my-1 mx-2 px-4">HOME</a>
                                    <?php
                                    $ticket_pdf = "";
                                    if ($isAdmin) {
                                        $ticket_pdf = "CRUD/book_ticket/print_book_ticket.php?book_ticket_id=" . $row['booking_id'] . ".pdf";
                                    } else {
                                        $ticket_pdf = "admin/CRUD/book_ticket/print_book_ticket.php?book_ticket_id=" . $row['booking_id'] . ".pdf";
                                    }
                                    ?>
                                    <a href="<?php echo $ticket_pdf; ?>" type="button" target="_blank" id="preview_ticket"
                                        class="btn btn-info text-white my-1 mx-2 px-4">PREVIEW</a>
                                    <button type="button" id="print_ticket"
                                        onclick="downloadTicket('<?php echo $row['booking_id']; ?>')"
                                        class="btn btn-success my-1 mx-2 px-4">
                                        PRINT
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php

    } else {
        ?>
        <div class="row my-md-5 my-3">
            <div class="col-12">
                <div class="w-50 mx-auto">
                    <img src="././Images/TicketNotFound.png" class="w-100" alt="">
                </div>
            </div>
        </div>
        <?php
    }

}

?>