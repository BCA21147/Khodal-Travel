<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['schedule_filter_start_time']) && isset($_POST['schedule_filter_end_time']) && isset($_POST['schedule_filter_type'])) {

    $schedule_filter_12_hour_start_time = date("h:i A", strtotime($schedule_filter_start_time));

    $schedule_filter_12_hour_end_time = date("h:i A", strtotime($schedule_filter_end_time));

    $schedule_filter_type_show = ($schedule_filter_type == "Pick Up") ? 'DEPARTURE TIME' : (($schedule_filter_type == "Drop") ? 'ARRIVAL TIME' : '');

    $query = "INSERT INTO `schedule_filter`(`id`, `start_time_12_hour`, `end_time_12_hour`, `start_time_24_hour`, `end_time_24_hour`, `filter_type_hide`, `filter_type_show`) VALUES (null,'$schedule_filter_12_hour_start_time','$schedule_filter_12_hour_end_time','$schedule_filter_start_time','$schedule_filter_end_time','$schedule_filter_type','$schedule_filter_type_show')";
    mysqli_query($con, $query);

}

?>