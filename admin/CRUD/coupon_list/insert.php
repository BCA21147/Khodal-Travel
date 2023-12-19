<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['coupon_code']) && isset($_POST['coupon_start_date']) && isset($_POST['coupon_end_date']) && isset($_POST['coupon_trip']) && isset($_POST['coupon_discount_amount']) && isset($_POST['coupon_term_condition'])) {

    $query = "INSERT INTO `coupon`(`id`, `code`, `start_date`, `end_date`, `trip`, `amount`, `terms_conditions`) VALUES (null,'$coupon_code','$coupon_start_date','$coupon_end_date','$coupon_trip','$coupon_discount_amount','$coupon_term_condition')";
    mysqli_query($con, $query);

}

?>