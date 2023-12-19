<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['emp_type']) && isset($_POST['emp_details'])) {

    $query = "INSERT INTO `employee_type`(`id`, `emp_type`, `emp_details`) VALUES (null,'$emp_type','$emp_details')";
    mysqli_query($con, $query);

}

?>