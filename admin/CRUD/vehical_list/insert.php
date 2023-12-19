<?php

include('../db_connection.php');

extract($_POST);

if (count($_FILES['bus_images']['name']) > 0 && isset($_POST['vehical_reg_no']) && isset($_POST['vehical_eng_no']) && isset($_POST['vehical_model_no']) && isset($_POST['vehical_fleet_type']) && isset($_POST['vehical_chassis_no']) && isset($_POST['vehical_owner']) && isset($_POST['vehical_owner_mobile']) && isset($_POST['vehical_company']) && isset($_POST['vehical_status'])) {

    $images = array();
    foreach ($_FILES['bus_images']['name'] as $key => $value) {

        $valid_ext = array("jpg", "jpeg", "png", "gif");

        if (in_array(pathinfo($value, PATHINFO_EXTENSION), $valid_ext)) {
            date_default_timezone_set('Asia/Kolkata');
            $new_name = date("mdYhisA", time()) . "-" . ($key + 1) . "." . pathinfo($value, PATHINFO_EXTENSION);
            array_push($images, $new_name);
            move_uploaded_file($_FILES['bus_images']['tmp_name'][$key], "../../../Images/" . $new_name);
        }
    }

    $status = ($vehical_status == 'vehical_status_active') ? 1 : 0;

    $query = "INSERT INTO `vehical`(`id`, `reg_no`, `eng_no`, `model_no`, `fleet_type`, `chassis_no`, `owner`, `owner_mobile`, `company`, `status`, `images`) VALUES (null,'$vehical_reg_no','$vehical_eng_no','$vehical_model_no','$vehical_fleet_type','$vehical_chassis_no','$vehical_owner','$vehical_owner_mobile','$vehical_company','$status','" . serialize($images) . "')";
    mysqli_query($con, $query);

}


?>