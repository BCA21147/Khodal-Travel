<?php

include('../db_connection.php');
require 'fpdf/fpdf.php';

extract($_POST);

if (isset($_POST['book_ticket_id'])) {

    if (file_exists("PDF/" . $book_ticket_id . ".pdf")) {
        unlink("PDF/" . $book_ticket_id . ".pdf");
    } else {
        include("pdf_fpdf.php");
        $pdf->Output("PDF/" . $row['booking_id'] . ".pdf", "F", true);
    }

}

?>