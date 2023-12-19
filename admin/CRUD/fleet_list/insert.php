<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['fleet_type']) && isset($_POST['fleet_layout']) && isset($_POST['layout_no_of_row']) && isset($_POST['total_no_of_seat']) && isset($_POST['seat_number']) && isset($_POST['luggage_service']) && isset($_POST['fleet_status'])) {

    $last_seat_check = (isset($_POST['last_seat_check'])) ? 1 : 0;
    $fleet_status = ($fleet_status == "fleet_status_active") ? 1 : 0;
    $luggage_service = ($luggage_service == "luggage_service_active") ? 1 : 0;

    $query = "INSERT INTO `fleet`(`id`, `type`, `layout`, `fleet_no_of_row`, `last_seat_check`, `total_seat`, `seat_number`, `status`, `luggage_service`) VALUES (null,'$fleet_type','$fleet_layout','$layout_no_of_row','$last_seat_check','$total_no_of_seat','$seat_number','$fleet_status','$luggage_service')";
    mysqli_query($con, $query);

}

?>