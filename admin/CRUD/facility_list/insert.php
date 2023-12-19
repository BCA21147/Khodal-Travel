<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['facility_name'])) {

    $query = "INSERT INTO `facility`(`id`, `facility_name`) VALUES (null,'$facility_name')";
    mysqli_query($con, $query);

}

?>