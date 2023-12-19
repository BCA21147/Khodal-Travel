<?php

include('../db_connection.php');
require 'fpdf/fpdf.php';

extract($_GET);
extract($_POST);

if (isset($_GET['book_ticket_id'])) {

    include("pdf_fpdf.php");

    $pdf->Output();

}

?>