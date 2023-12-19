<?php

include('../../admin/CRUD/db_connection.php');
session_start();

extract($_POST);

// Insert Data :- 
if ((isset($_POST['passenger_name']) && isset($_POST['passenger_email']) && isset($_POST['passenger_mobile_no']) && isset($_POST['passenger_subject']) && isset($_POST['passenger_message'])) || (isset($_POST['passenger_subject']) && isset($_POST['passenger_message']))) {

    $query = "INSERT INTO `inquiry`(`id`, `name`, `email`, `mobile_no`, `subject`, `message`, `status`) VALUES (null,'$passenger_name','$passenger_email','$passenger_mobile_no','$passenger_subject','$passenger_message','0');";
    mysqli_query($con, $query);

}

?>