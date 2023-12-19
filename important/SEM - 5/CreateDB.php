<?php

$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "BCA";
$file = "crud.sql";

$con = mysqli_connect($server_name, $user_name, $password);

if ($con) {
    (mysqli_select_db($con, $db_name)) ? mysqli_query($con, "DROP DATABASE $db_name") : "";
    mysqli_query($con, "CREATE DATABASE $db_name");
    $con = mysqli_connect($server_name, $user_name, $password, $db_name);
    mysqli_multi_query($con, file_get_contents($file));
}
?>