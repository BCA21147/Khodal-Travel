<?php

include('../db_connection.php');

extract($_POST);

// Insert Data :- 
if (isset($_POST['stand_name'])) {

    $query = "INSERT INTO `stand`(`id`, `stand_name`) VALUES (null,'$stand_name')";
    mysqli_query($con, $query);

}

?>