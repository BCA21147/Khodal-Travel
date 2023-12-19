<?php

include('../db_connection.php');

extract($_POST);

if (isset($_POST['vehical_id']) && isset($_POST['delete_img_id'])) {

    $query = "SELECT * FROM `vehical` WHERE `id` = '$vehical_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $image = unserialize($row['images']);

        if (file_exists("../../../Images/$image[$delete_img_id]")) {
            unlink("../../../Images/$image[$delete_img_id]");
        }

        $data = array();
        foreach ($image as $key => $value) {
            if ($key != $delete_img_id) {
                array_push($data, $image[$key]);
            }
        }

        $query = "UPDATE `vehical` SET `images`='" . serialize($data) . "' WHERE `id` = $vehical_id";
        mysqli_query($con, $query);
    }
}


?>