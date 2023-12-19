<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['country_name'])) {

    $query = "INSERT INTO `country`(`id`, `country_name`) VALUES (null,'$country_name')";
    mysqli_query($con, $query);

}

?>