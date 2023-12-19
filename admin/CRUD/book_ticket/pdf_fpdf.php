<?php

$book_ticket_id = explode(".", $book_ticket_id)[0];

$query = "SELECT * FROM `ticket` WHERE `booking_id` = '$book_ticket_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$query = "SELECT * FROM `trip` WHERE `id` = " . substr(explode("|", $row["trip"])[0], 1, -1) . ";";
$trip = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($trip);

$pdf = new FPDF;

// ###################################################################################################

$pdf->AddPage();
$pdf->SetTitle("TICKET - " . $row["booking_id"]);

$width = $pdf->GetPageWidth();
$height = $pdf->GetPageHeight();
$link = "https://www.google.com/";

// TOP HEADER :-

$pdf->SetFillColor(255, 211, 81);
$pdf->Cell(0, ($height * 12 / 100), "", 0, 1, 'L', 1);

$pdf->SetFont("Arial", "B", 18);
$pdf->SetY($pdf->GetY() - ($height * 9) / 100);
$pdf->Cell(0, 0, "KTAT", 0, 1, 'C', 1);

$pdf->SetFont("Arial", "B", 14);
$pdf->SetTextColor(255, 0, 0);
$pdf->SetY($pdf->GetY() + ($height * 3) / 100);
$pdf->Cell(0, 0, "Khodal Tour & Traveller", 0, 1, 'C', 1);

$pdf->SetFont("Arial", "B", 12);
$pdf->SetTextColor(40, 167, 69);
$pdf->SetY($pdf->GetY() + ($height * 3) / 100);
$pdf->Cell(0, 0, "TICKET ID :- " . $row['booking_id'], 0, 1, 'C', 1);

$pdf->Image("../../../Images/Khodal-Travel-Yellow.png", ($width * 6 / 100), ($height * 3.75 / 100), ($width * 18 / 100), 33, "", $link);
$pdf->Image("../../../Images/TourPlace.png", ($width * 76 / 100), ($height * 3.75 / 100), ($width * 18 / 100), 33, "", $link);

// TICKET DETAILS :-

$pdf->SetFont("Arial", "B", 12);
$pdf->SetTextColor(0, 123, 255);
$pdf->SetY($pdf->GetY() + ($height * 5) / 100);
$pdf->SetX($pdf->GetX() + ($width * 0) / 100);
$pdf->Cell(0, 0, "E-Ticket/Reservation Voucher", 0, 1, 'L');

$keys = array(["MOBILE NO.", "EMAIL ID."], ["BOOKING ID", "JOURNEY DATE"], ["JOURNEY FROM", "JOURNEY TO"], ["ARRIVAL TIME", "DEPARTURE TIME"], ["PICKUP POINT", "DROP POINT"], ["NO. OF SEAT", "SEAT NO."], ["NID TYPE", "STATUS"]);

for ($num = 0; $num < sizeof($keys); $num++) {

    $first_val = ($keys[$num][0] == "MOBILE NO.") ? unserialize($row['passenger_details'])[0]["Mobile_No"] : (($keys[$num][0] == "BOOKING ID") ? $row["booking_id"] : (($keys[$num][0] == "JOURNEY FROM") ? substr(explode("|", $row["trip"])[2], 1, -2) : (($keys[$num][0] == "ARRIVAL TIME") ? substr(explode("-", explode("|", $data['schedule_time'])[1])[0], 1, -1) : (($keys[$num][0] == "PICKUP POINT") ? substr(explode("|", $row["pick_up_stand"])[1], 1, -1) : (($keys[$num][0] == "NO. OF SEAT") ? sizeof(explode(", ", $row['seat_no'])) : (($keys[$num][0] == "NID TYPE") ? (unserialize($row['passenger_details'])[0]["ID_Type"] == "") ? "-" : unserialize($row['passenger_details'])[0]["ID_Type"] : ""))))));

    $second_val = ($keys[$num][1] == "EMAIL ID.") ? unserialize($row['passenger_details'])[0]["Email"] : (($keys[$num][1] == "JOURNEY DATE") ? date("d-m-Y", strtotime(explode("_", $row["journey_date"])[0])) : (($keys[$num][1] == "JOURNEY TO") ? substr(explode("|", $row["trip"])[4], 1, -2) : (($keys[$num][1] == "DEPARTURE TIME") ? substr(explode("-", explode("|", $data['schedule_time'])[1])[1], 1, -1) : (($keys[$num][1] == "DROP POINT") ? substr(explode("|", $row["drop_stand"])[1], 1, -1) : (($keys[$num][1] == "SEAT NO.") ? $row['seat_no'] : (($keys[$num][1] == "STATUS") ? ($row['status'] == 0) ? "CANCEL" : (($row['status'] == 1) ? "ACTIVE" : (($row['status'] == 2) ? "SUCCESS" : "")) : ""))))));

    $pdf->SetLeftMargin(15);
    $pdf->SetFont("Arial", "B", 11);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetY($pdf->GetY() + ($height * 2) / 100);
    $pdf->SetX($pdf->GetX() + ($width * 0) / 100);
    $pdf->Cell(0, 0, $keys[$num][0], 0, 1, 'L');

    $pdf->SetFont("Arial", "", 10);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetY($pdf->GetY() - ($height * 0) / 100);
    $pdf->SetX($pdf->GetX() + ($width * 23.5) / 100);
    $pdf->MultiCell(50, 0, $first_val);

    $pdf->SetFont("Arial", "B", 11);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetY($pdf->GetY() + ($height * 0) / 100);
    $pdf->SetX($pdf->GetX() + ($width * 45) / 100);
    $pdf->Cell(0, 0, $keys[$num][1], 0, 1, 'L');

    $pdf->SetFont("Arial", "", 10);
    if ($num == sizeof($keys) - 1) {
        $pdf->SetFont("Arial", "B", 10);
        if ($row['status'] == 0) {
            $pdf->SetTextColor(255, 0, 0);
        } elseif ($row['status'] == 1 || $row['status'] == 2) {
            $pdf->SetTextColor(40, 167, 69);
        }
    }
    $pdf->SetY($pdf->GetY() + ($height * 0) / 100);
    $pdf->SetX($pdf->GetX() + ($width * 68.5) / 100);
    $pdf->MultiCell(0, 0, $second_val);
}

// TICKET DETAILS :-

$pdf->SetLeftMargin(10);
$pdf->SetFont("Arial", "B", 12);
$pdf->SetTextColor(0, 123, 255);
$pdf->SetY($pdf->GetY() + ($height * 2) / 100);
$pdf->SetX($pdf->GetX() + ($width * 0) / 100);
$pdf->Cell(0, 0, "Passenger Information", 0, 1, 'L');

$pdf->SetLeftMargin(15);
$pdf->SetFont("Arial", "B", 11);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetY($pdf->GetY() + ($height * 2) / 100);
$pdf->SetX($pdf->GetX() + ($width * 0) / 100);
$pdf->Cell(8, 0, "No.", 0, 1, 'L');

$pdf->SetFont("Arial", "B", 11);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetY($pdf->GetY() + ($height * 0) / 100);
$pdf->SetX($pdf->GetX() + ($width * 4) / 100);
$pdf->Cell(75, 0, "Passenger Name", 0, 1, 'L');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetY($pdf->GetY() + ($height * 0) / 100);
$pdf->SetX($pdf->GetX() + ($width * 45) / 100);
$pdf->Cell(45, 0, "Mobile No.", 0, 1, 'L');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetY($pdf->GetY() + ($height * 0) / 100);
$pdf->SetX($pdf->GetX() + ($width * 68.5) / 100);
$pdf->Cell(0, 0, "NID No.", 0, 1, 'L');

for ($num = 0; $num < 6; $num++) {

    $name = "-";
    $mobile_no = "-";
    $nid_no = "-";
    if (sizeof(unserialize($row['passenger_details'])) > $num) {
        $name = unserialize($row['passenger_details'])[$num]["First_Name"] . " " . unserialize($row['passenger_details'])[$num]["Last_Name"];
        $mobile_no = unserialize($row['passenger_details'])[$num]["Mobile_No"];
        $nid_no = (unserialize($row['passenger_details'])[$num]["NID_Number"] == "") ? "-" : unserialize($row['passenger_details'])[$num]["NID_Number"];
    }

    $pdf->SetFont("Arial", "", 11);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetY($pdf->GetY() + ($height * 2) / 100);
    $pdf->SetX($pdf->GetX() + ($width * 0) / 100);
    $pdf->Cell(8, 0, ($num + 1) . ".", 0, 1, 'L');

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetY($pdf->GetY() + ($height * 0) / 100);
    $pdf->SetX($pdf->GetX() + ($width * 4) / 100);
    $pdf->Cell(75, 0, $name, 0, 1, 'L');

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetY($pdf->GetY() + ($height * 0) / 100);
    $pdf->SetX($pdf->GetX() + ($width * 45) / 100);
    $pdf->Cell(45, 0, $mobile_no, 0, 1, 'L');

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetY($pdf->GetY() + ($height * 0) / 100);
    $pdf->SetX($pdf->GetX() + ($width * 68.5) / 100);
    $pdf->Cell(0, 0, $nid_no, 0, 1, 'L');
}

// TOTAL FARE DETAILS :-

$pdf->SetLeftMargin(10);
$pdf->SetFont("Arial", "B", 12);
$pdf->SetTextColor(0, 123, 255);
$pdf->SetY($pdf->GetY() + ($height * 2) / 100);
$pdf->SetX($pdf->GetX() + ($width * 0) / 100);
$pdf->Cell(0, 0, "Total Fare Details", 0, 1, 'L');

$pdf->SetLeftMargin(15);
$pdf->SetFont("Arial", "B", 11);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetY($pdf->GetY() + ($height * 2) / 100);
$pdf->SetX($pdf->GetX() + ($width * 0) / 100);
$pdf->Cell(0, 0, "DETAILS", 0, 1, 'L');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetY($pdf->GetY() + ($height * 0) / 100);
$pdf->SetX($pdf->GetX() + ($width * 68.5) / 100);
$pdf->Cell(0, 0, "PRICE (RS.)", 0, 1, 'L');

$keys = array("CHILDREN FARE", "SPECIAL FARE", "ADULT FARE", "BASIC FARE", "GST", "TOTAL FARE");

for ($num = 0; $num < sizeof($keys); $num++) {

    $price = ($keys[$num] == "CHILDREN FARE") ? $row["total_children_price"] : (($keys[$num] == "SPECIAL FARE") ? $row["total_special_price"] : (($keys[$num] == "ADULT FARE") ? $row["total_adult_price"] : (($keys[$num] == "BASIC FARE") ? $row["ticket_price"] : (($keys[$num] == "GST") ? $row["tax_price"] : (($keys[$num] == "TOTAL FARE") ? $row["total_price"] : "0")))));

    $GST = ($row["ticket_price"] != 0) ? intval(($row["tax_price"] * 100) / $row["ticket_price"]) : '0';

    $pdf->SetFont("Arial", "", 11);
    $pdf->SetTextColor(0, 0, 0);

    if ($num == sizeof($keys) - 1) {
        $pdf->SetFont("Arial", "B", 11);
        $pdf->SetTextColor(40, 167, 69);
    }

    $pdf->SetY($pdf->GetY() + ($height * 2) / 100);
    $pdf->SetX($pdf->GetX() + ($width * 0) / 100);
    $pdf->Cell(0, 0, ($keys[$num] == "GST") ? $keys[$num] . " ( " . $GST . "% )" : $keys[$num], 0, 1, 'L');

    $pdf->SetY($pdf->GetY() + ($height * 0) / 100);
    $pdf->SetX($pdf->GetX() + ($width * 68.5) / 100);
    $pdf->Cell(0, 0, $price . " Rs.", 0, 1, 'L');
}

// IMPORTANT DETAILS :-

$pdf->SetLeftMargin(10);
$pdf->SetFont("Arial", "B", 12);
$pdf->SetTextColor(0, 123, 255);
$pdf->SetY($pdf->GetY() + ($height * 2) / 100);
$pdf->SetX($pdf->GetX() + ($width * 0) / 100);
$pdf->Cell(0, 0, "Important", 0, 1, 'L');

$keys = array("The seat(s) booked under this e-ticket is/are not transferable.", "This e-ticket is valid only for the seat number and bus service specified herein.", "This e-ticket print out has to be carried by the passenger during t h e journey along with Original Photo ID Card of the passenger whose name appears above.", "Please keep the e-ticket safely till the end of the journey.", "Please show the e-ticket at the time of checking.", "RKTAT reserves the rights to change/cancel the class of service.", "Passengers will have to pay the difference amount at boarding time in case of fare / levies / taxes revision as and when applicable. The difference amount will be calculated on charged fare and new fare / new levy / revised tax.", "Passenger can take print of Ticket or SMS from RKTAT.IN");

for ($num = 0; $num < sizeof($keys); $num++) {
    $pdf->SetLeftMargin(15);
    $pdf->SetFont("Arial", "B", 11);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFillColor(0, 0, 0);

    if ($pdf->GetStringWidth($keys[$num]) < 180) {
        $pdf->SetY($pdf->GetY() + ($height * 2) / 100);
        $pdf->SetX($pdf->GetX() + ($width * 0) / 100);
        $pdf->Cell(1.5, 1.5, "", 1, 1, 'L', 1);
    } else {
        $pdf->SetY($pdf->GetY() + ($height * 2) / 100);
        $pdf->SetX($pdf->GetX() + ($width * 0) / 100);
        $pdf->Cell(1.5, 1.5, "", 1, 1, 'L', 1);
    }

    $pdf->SetFont("Arial", "", 11);
    $pdf->SetTextColor(0, 0, 0);
    if ($pdf->GetStringWidth($keys[$num]) < 180) {
        $pdf->SetY($pdf->GetY() - ($height * .4) / 100);
        $pdf->SetX($pdf->GetX() + ($width * 3) / 100);
        $pdf->MultiCell(0, 0, $keys[$num], 0, 1);
    } else {
        $pdf->SetY($pdf->GetY() - ($height * 1) / 100);
        $pdf->SetX($pdf->GetX() + ($width * 3) / 100);
        $pdf->MultiCell(0, 5, $keys[$num], 0, 1);
    }
}

// SET DATE - TIME :-

$pdf->SetY($pdf->GetY() + ($height * 1) / 100);
$pdf->SetX($pdf->GetX() + ($width * 3) / 100);
$pdf->SetFont("Arial", "B", 11);
date_default_timezone_set('Asia/Kolkata');
$pdf->MultiCell(0, 8, "Printed On: " . date("d/m/Y") . " At: " . date("H:i:s") . " (DD/MM/YYYY 24 Hours)", 0, 'R');

// SET LINKS :-

$pdf->SetY(265.60);
$pdf->SetX(103.90);
$pdf->SetTextColor(40, 167, 69);
$pdf->Write(0, "RKTAT.IN", $link);

$pdf->SetY(239.85);
$pdf->SetX(21.33);
$pdf->Write(0, "RKTAT", $link);

?>