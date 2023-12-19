<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['schedule_start_time']) && isset($_POST['schedule_end_time'])) {

    $schedule_12_hour_start_time = date("h:i A", strtotime($schedule_start_time));

    $schedule_12_hour_end_time = date("h:i A", strtotime($schedule_end_time));

    $query = "INSERT INTO `schedule`(`id`, `start_time_12_hour`, `end_time_12_hour`, `start_time_24_hour`, `end_time_24_hour`) VALUES (null,'$schedule_12_hour_start_time','$schedule_12_hour_end_time','$schedule_start_time','$schedule_end_time')";
    mysqli_query($con, $query);

}

?>