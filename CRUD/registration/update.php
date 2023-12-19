<?php
session_start();
include('../../admin/CRUD/db_connection.php');

extract($_POST);

// Change Password - Update Data :- 
if (isset($_POST['update_id']) && isset($_POST['password'])) {

    $query = "UPDATE `passenger` SET `password`='$password' WHERE `id`='$update_id';";
    mysqli_query($con, $query);

}

// Update Profile - Update Data :- 
if (isset($_POST['update_id']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone_no']) && isset($_POST['email_id']) && isset($_POST['doc_type']) && isset($_POST['doc_number']) && isset($_POST['country']) && isset($_POST['city']) && isset($_POST['zip_code']) && isset($_POST['address'])) {

    $query = "UPDATE `passenger` SET `first_name`='$first_name',`last_name`='$last_name',`mobile_no`='$phone_no',`email`='$email_id',`id_type`='$doc_type',`nid_number`='$doc_number',`country_name`='$country',`city_name`='$city',`zip_code`='$zip_code',`address`='$address' WHERE `id`='$update_id';";
    mysqli_query($con, $query);

    $_SESSION['OBBMS_username'] = array("username" => $first_name . " " . $last_name, "user_id" => $update_id, "status" => 1);

}

?>