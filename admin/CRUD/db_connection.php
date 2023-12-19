<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "obbms";

try {
    $con = mysqli_connect($server_name, $user_name, $password, $db_name);
} catch (Exception $e) {
    echo "DATABASE ERROR :- " . $e->getMessage();
    die();
}

?>