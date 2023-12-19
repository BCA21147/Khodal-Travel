<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['payment_method_name']) && isset($_POST['payment_method_status'])) {

    $status = $payment_method_status == "payment_method_status_active" ? 1 : 0;

    $query = "INSERT INTO `payment_method`(`id`, `method_name`, `status`) VALUES (null,'$payment_method_name','$status')";
    mysqli_query($con, $query);

}

?>