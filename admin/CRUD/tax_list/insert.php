<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['tax_name']) && isset($_POST['tax_value']) && isset($_POST['tax_reg_no']) && isset($_POST['tax_status'])) {

    $status = $tax_status == "tax_status_active" ? 1 : 0;

    $query = "INSERT INTO `tax`(`id`, `tax_name`, `tax_value`, `tax_reg_no`, `status`) VALUES (null,'$tax_name','$tax_value','$tax_reg_no','$status')";
    mysqli_query($con, $query);

}

?>