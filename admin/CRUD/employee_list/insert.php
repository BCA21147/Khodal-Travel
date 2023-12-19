<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['employee_first_name']) && isset($_POST['employee_last_name']) && isset($_POST['employee_emp_type']) && isset($_POST['employee_mobile_no']) && isset($_POST['employee_email_id']) && isset($_POST['employee_country_name']) && isset($_POST['employee_address']) && $_FILES['employee_profile_image']['name']) {

    $blood_group = (isset($_POST['employee_blood_group'])) ? $employee_blood_group : "";
    $id_type = (isset($_POST['employee_id_type'])) ? $employee_id_type : "";
    $id_number = (isset($_POST['employee_id_number'])) ? $employee_id_number : "";
    $city_name = (isset($_POST['employee_city_name'])) ? $employee_city_name : "";
    $zip_code = (isset($_POST['employee_zip_code'])) ? $employee_zip_code : "";
    $valid_ext = array("jpg", "jpeg", "png", "gif");
    $id_image = "";

    $current_ext = pathinfo($_FILES['employee_profile_image']['name'], PATHINFO_EXTENSION);
    if (in_array($current_ext, $valid_ext)) {
        date_default_timezone_set('Asia/Kolkata');
        $profile_image = date("mdYhisA", time()) . "-1." . $current_ext;
        move_uploaded_file($_FILES['employee_profile_image']['tmp_name'], "../../../Images/" . $profile_image);
    }

    $current_ext = pathinfo($_FILES['employee_id_image']['name'], PATHINFO_EXTENSION);
    if (in_array($current_ext, $valid_ext)) {
        date_default_timezone_set('Asia/Kolkata');
        $id_image = date("mdYhisA", time()) . "-2." . $current_ext;
        move_uploaded_file($_FILES['employee_id_image']['tmp_name'], "../../../Images/" . $id_image);
    }

    $query = "INSERT INTO `employee`(`id`, `first_name`, `last_name`, `emp_type`, `mobile_no`, `email`, `blood_group`, `id_type`, `id_number`, `country`, `city`, `zip_code`, `address`, `id_image`, `profile_image`) VALUES (null,'$employee_first_name','$employee_last_name','$employee_emp_type','$employee_mobile_no','$employee_email_id','$blood_group','$id_type','$id_number','$employee_country_name','$city_name','$zip_code','$employee_address','$id_image','$profile_image')";
    mysqli_query($con, $query);

}

?>