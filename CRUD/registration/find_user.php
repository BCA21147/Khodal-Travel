<?php

include('../../admin/CRUD/db_connection.php');
session_start();

extract($_POST);

// Insert Data :- 
if (isset($_POST['email_id']) && isset($_POST['password'])) {

    $status = 0;

    $query = "SELECT * FROM `passenger` WHERE email='$email_id' AND `password`='$password';";
    $result = mysqli_query($con, $query);
    $role = "USER";

    if (mysqli_num_rows($result) == 0) {
        $query = "SELECT * FROM `admin` WHERE email='$email_id' AND `password`='$password';";
        $result = mysqli_query($con, $query);
        $role = "ADMIN";
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($role == "USER") {
            $status = 1; // 1
            $_SESSION['OBBMS_username'] = array("username" => $row['first_name'] . " " . $row['last_name'], "user_id" => $row['id'], "status" => 1);
        } else if ($role == "ADMIN") {
            $status = 2; // 2
            $_SESSION['OBBMS_username'] = array("username" => $row['first_name'] . " " . $row['last_name'], "user_id" => $row['id'], "status" => 2);
        }
    } else {
        $status = 0; // 0
    }

    echo $status;

}

?>