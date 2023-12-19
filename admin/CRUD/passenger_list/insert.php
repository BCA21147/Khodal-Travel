<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['passenger_first_name']) && isset($_POST['passenger_last_name']) && isset($_POST['passenger_mobile_no']) && isset($_POST['passenger_email_id']) && isset($_POST['passenger_id_type']) && isset($_POST['passenger_nid_number']) && isset($_POST['passenger_country_name']) && isset($_POST['passenger_city_name']) && isset($_POST['passenger_zip_code']) && isset($_POST['passenger_address']) && isset($_POST['passenger_password'])) {

    $query = "INSERT INTO `passenger`(`id`, `first_name`, `last_name`, `mobile_no`, `email`, `id_type`, `nid_number`, `country_name`, `city_name`, `zip_code`, `address`, `password`) VALUES (null,'$passenger_first_name','$passenger_last_name','$passenger_mobile_no','$passenger_email_id','$passenger_id_type','$passenger_nid_number','$passenger_country_name','$passenger_city_name','$passenger_zip_code','$passenger_address','$passenger_password');";
    mysqli_query($con, $query);

}

?>