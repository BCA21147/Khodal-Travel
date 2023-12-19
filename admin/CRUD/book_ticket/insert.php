<?php

include('../db_connection.php');
session_start();

extract($_POST);
extract($_GET);

// Insert Data :- 
if (isset($_POST['trip_id']) && isset($_POST['trip_date']) && isset($_POST['trip_child_seat']) && isset($_POST['trip_special_seat']) && isset($_POST['trip_adult_seat']) && isset($_POST['trip_pick_up']) && isset($_POST['trip_drop']) && isset($_POST['trip_seat_number']) && isset($_POST['passenger_ticket_amount']) && isset($_POST['passenger_payment_status']) && isset($_POST['passenger_first_name_1']) && isset($_POST['passenger_last_name_1']) && isset($_POST['passenger_mobile_no_1']) && isset($_POST['passenger_id_number_1']) && isset($_POST['passenger_email_id_1']) && isset($_POST['passenger_id_type_1']) && isset($_POST['passenger_country_name']) && isset($_POST['passenger_city_name']) && isset($_POST['passenger_zip_code']) && isset($_POST['passenger_address'])) {

    // INSERT DATABASE :- 

    $query = "SELECT * FROM `trip` WHERE `id`=$trip_id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        $booking_id = "";
        while (true) {
            $query = "SELECT `booking_id` FROM `ticket`;";
            $ticket_id = mysqli_query($con, $query);
            $total_id = array();
            while ($t_id = mysqli_fetch_assoc($ticket_id)) {
                array_push($total_id, $t_id['booking_id']);
            }
            $booking_id = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 15);
            if (!in_array($booking_id, $total_id)) {
                break;
            }
        }
        $trip = '[' . $row['id'] . ']|[' . $row['trip_pick_up'] . ']|[' . $row['trip_drop'] . ']';
        $child_price = intval($trip_child_seat) * intval($row['children_fair']);
        $special_price = intval($trip_special_seat) * intval($row['special_fair']);
        $adult_price = intval($trip_adult_seat) * intval($row['adult_fair']);
        $ticket_price = intval($child_price) + intval($special_price) + intval($adult_price);
        $tax_price = intval($passenger_ticket_amount) - intval($ticket_price);

        $passenger = array();
        for ($num = 1; $num < (sizeof(explode(", ", $trip_seat_number)) + 1); $num++) {
            if (isset(${"passenger_first_name_" . $num}) && isset(${"passenger_last_name_" . $num}) && isset(${"passenger_mobile_no_" . $num}) && isset(${"passenger_id_number_" . $num})) {
                $arr = array();
                $arr["First_Name"] = ${"passenger_first_name_" . $num};
                $arr["Last_Name"] = ${"passenger_last_name_" . $num};
                $arr["Mobile_No"] = ${"passenger_mobile_no_" . $num};
                $arr["NID_Number"] = ${"passenger_id_number_" . $num};
                if ($num == 1) {
                    $arr["Email"] = ${"passenger_email_id_1"};
                    $arr["ID_Type"] = ${"passenger_id_type_1"};
                    $arr["Country"] = ${"passenger_country_name"};
                    $arr["City"] = ${"passenger_city_name"};
                    $arr["Zip_Code"] = ${"passenger_zip_code"};
                    $arr["Address"] = ${"passenger_address"};
                }
                array_push($passenger, $arr);
            }
        }

        date_default_timezone_set('Asia/Kolkata');
        $booking_date = date("Y-m-d h:i:s");
        $passenger_id = (($_SESSION['OBBMS_username']['status'] == 2) ? '[1]|[ADMIN]' : "[" . $_SESSION['OBBMS_username']['user_id'] . "]|[" . $_SESSION['OBBMS_username']['username'] . "]");

        $query = "INSERT INTO `ticket`(`id`, `booking_id`, `passenger_id`, `booking_date`, `trip`, `journey_date`, `total_children`, `total_special`, `total_adult`, `pick_up_stand`, `drop_stand`, `seat_no`, `total_children_price`, `total_special_price`, `total_adult_price`, `ticket_price`, `tax_price`, `total_price`, `passenger_details`, `payment_status`, `status`) VALUES (null,'$booking_id','$passenger_id','$booking_date','$trip','$trip_date','$trip_child_seat','$trip_special_seat','$trip_adult_seat','$trip_pick_up','$trip_drop','$trip_seat_number','$child_price','$special_price','$adult_price','$ticket_price','$tax_price','$passenger_ticket_amount','" . serialize($passenger) . "','$passenger_payment_status','1')";
        $result = mysqli_query($con, $query);

        // Crete PDF File :-
        require 'fpdf/fpdf.php';
        $book_ticket_id = $booking_id;
        include("pdf_fpdf.php");
        $pdf->Output("PDF/" . $row['booking_id'] . ".pdf", "F", true);

        // SEND E-MAIL :- 

        $query = "SELECT * FROM `ticket` WHERE `booking_id`='$booking_id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

        $query = "SELECT * FROM `trip` WHERE `id` = " . substr(explode("|", $row["trip"])[0], 1, -1) . ";";
        $trip = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($trip);

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/SMTP.php';
        require 'PHPMailer/src/PHPMailer.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'assccdmi@gmail.com';
            $mail->Password = 'cqeycgzmajnpkfmk';
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;

            $mail->setFrom('assccdmi@gmail.com', 'OBBMS');
            $mail->addAddress(unserialize($row['passenger_details'])[0]["Email"], unserialize($row['passenger_details'])[0]["First_Name"] . " " . unserialize($row['passenger_details'])[0]["Last_Name"]);

            $mail->isHTML(true);
            $mail->Subject = 'Online Bus Booking Management System';
            $mail->Body = '
            <b>Hooray! Your tour booking is confirmed.</b>
            <p>
                <br>
                Hey there, ' . unserialize($row['passenger_details'])[0]["First_Name"] . " " . unserialize($row['passenger_details'])[0]["Last_Name"] . '  ...!
                <br>
                <br>
                We are happy to inform you that your booking for <b>' . substr(explode("|", $row["trip"])[2], 1, -2) . ' - ' . substr(explode("|", $row["trip"])[4], 1, -2) . '</b> is confirmed! Get ready to create some
                unforgettable memories. We’ve made things easy for you and included all of your booking details in this very email.
                All you need to do is show us this email on the day you arrive, and you’ll be good to go!
            </p>
            <div>
                <b>DATE:</b>
                ' . date("d-m-Y", strtotime(explode("_", $row["journey_date"])[0])) . '
            </div>
            <div>
                <b>TIME:</b>
                ' . substr(explode("-", explode("|", $data['schedule_time'])[1])[0], 1, -1) . " - " . substr(explode("-", explode("|", $data['schedule_time'])[1])[1], 1, -1) . '
            </div>
            <div>
                <b>Booking ID:</b>
                ' . $row["booking_id"] . '
            </div>
            <div>
                <b>PICKUP:</b>
                ' . substr(explode("|", $row["pick_up_stand"])[1], 1, -1) . '
            </div>
            <div>
                <b>DROP:</b>
                ' . substr(explode("|", $row["drop_stand"])[1], 1, -1) . '
            </div>
            <div>
                <b>NO. OF SEAT:</b>
                ' . sizeof(explode(", ", $row['seat_no'])) . ' 
            </div>
            <div>
                <b>SEAT NO.:</b>
                ' . $row['seat_no'] . '
            </div>
            <div>
                <b>Contact info:</b>
                <p>53/43, Ellisbridge Shpg Centre, Ellisbridge, Ahmedabad, Gujarat, 380006.</p>
                <p>+91 07926579723</p>
            </div>
            <div>
                <b>Notice:</b>
                <ul>
                    <li>
                        The seat(s) booked under this e-ticket is/are not transferable.
                    </li>
                    <li>
                        This e-ticket is valid only for the seat number and bus service specified herein.
                    </li>
                    <li>
                        This e-ticket print out has to be carried by the passenger during t h e journey along with Original Photo
                        ID Card of the passenger whose name appears above.
                    </li>
                    <li>
                        Please keep the e-ticket safely till the end of the journey.
                    </li>
                    <li>
                        Please show the e-ticket at the time of checking
                    </li>
                    <li>
                        RKTAT reserves the rights to change/cancel the class of service.
                    </li>
                </ul>
            </div>
            <div>
                <br>
                We can’t wait to see you!
            </div>
            <div>
                <br>
                <b><i>OBBMS - </i></b>ONLINE BUS BOOKING MANAGEMENT SYSTEM
            </div>
            <div>
                <br>
                For More Details Please Check <b>PDF</b>
            </div>
            ';

            $mail->addAttachment("PDF/" . $row["booking_id"] . ".pdf", $row["booking_id"] . ".pdf");

            $mail->send();

            $row["email_send_status"] = 1;
        } catch (Exception $e) {
            $row["email_send_status"] = 0;
        }

        //  Delete PDF File :- 
        if (file_exists("PDF/" . $row['booking_id'] . ".pdf")) {
            unlink("PDF/" . $row['booking_id'] . ".pdf");
        }

        $row['passenger_details'] = unserialize($row['passenger_details']);
        print_r(json_encode($row));

    }

}

?>