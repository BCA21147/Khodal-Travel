<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

// Update Data :-
if (isset($_POST['booking_id'])) {

    date_default_timezone_set('Asia/Kolkata');
    $booking_date = date("Y-m-d h:i:s");

    $query = "UPDATE `ticket` SET `booking_date`='$booking_date',`status`='0' WHERE `booking_id` = '$booking_id'";
    mysqli_query($con, $query);

}

?>