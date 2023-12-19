<?php
session_start();
if (!(isset($_SESSION["OBBMS_username"]) && $_SESSION["OBBMS_username"]["status"] == 2)) {
    header('location:../login.php');
}
?>