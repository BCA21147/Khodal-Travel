<?php

include('../../admin/CRUD/db_connection.php');
session_start();

extract($_POST);

// Insert Data :- 
if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone_no']) && isset($_POST['email_id']) && isset($_POST['doc_type']) && isset($_POST['doc_number']) && isset($_POST['country']) && isset($_POST['password'])) {

    $query = "INSERT INTO `passenger`(`id`, `first_name`, `last_name`, `mobile_no`, `email`, `id_type`, `nid_number`, `country_name`, `city_name`, `zip_code`, `address`, `password`) VALUES (null,'$first_name','$last_name','$phone_no','$email_id','$doc_type','$doc_number','$country','','','','$password');";
    mysqli_query($con, $query);

    $query = "SELECT * FROM `passenger` WHERE email='$email_id' AND `password`='$password';";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['OBBMS_username'] = array("username" => $first_name . " " . $last_name, "user_id" => $row['id'], "status" => 1);
    }

}

?>