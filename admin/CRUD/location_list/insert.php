<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['location_name'])) {

    $query = "INSERT INTO `location`(`id`, `location_name`) VALUES (null,'$location_name')";
    mysqli_query($con, $query);

}

?>