<?php

include('../db_connection.php');
extract($_POST);

$trip = (isset($_POST['ticket_report_trip'])) ? (($ticket_report_trip != "ALL") ? $ticket_report_trip : "") : "";
$ticket_type = (isset($_POST['ticket_report_ticket_type'])) ? substr(explode("|", $ticket_report_ticket_type)[0], 1, -1) : "";
$start_date = (isset($_POST['ticket_report_start_date'])) ? $ticket_report_start_date : "";
$end_date = (isset($_POST['ticket_report_end_date'])) ? $ticket_report_end_date : "";

if (isset($_POST['fetch_data'])) {

    $query = "SELECT * FROM `ticket` WHERE ((SUBSTRING_INDEX(booking_date,' ',1) BETWEEN '$start_date' AND '$end_date')) AND `trip` LIKE '%$trip%' AND `status`= '$ticket_type';";

    $result = mysqli_query($con, $query);

    if (isset($_POST['search'])) {

        $query = "SELECT * FROM `ticket` WHERE (`id` LIKE '%$search%' or `booking_id` LIKE '%$search%' or `booking_date` LIKE '%$search%' or `trip` LIKE '%$search%' or `seat_no` LIKE '%$search%' or `pick_up_stand` LIKE '%$search%' or `drop_stand` LIKE '%$search%' or CONCAT(SUBSTR(SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(trip,'|',3),'|',-1),']',1),2),' - TO - ',SUBSTR(SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(trip,'|',5),'|',-1),']',1),2)) LIKE '%$search%' or `payment_status` LIKE '%$search%' or `journey_date` LIKE '%" . date("Y-m-d", strtotime($search)) . "%'  or `status` LIKE '%$search%' or `passenger_details` LIKE '%$search%') AND (((SUBSTRING_INDEX(booking_date,' ',1) BETWEEN '$start_date' AND '$end_date')) AND `trip` LIKE '%$trip%' AND `status`= '$ticket_type')";
        $result = mysqli_query($con, $query);

    }

    if ($result) {
        ?>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>
                        <?php echo ($ticket_type == 0) ? "Cancellation Date" : "Booking Date"; ?>
                    </th>
                    <th>Booking ID.</th>
                    <th>Journey Date</th>
                    <th>Trip</th>
                    <th>PickUp</th>
                    <th>Drop</th>
                    <th>No. Of Seat</th>
                    <th>Seat No.</th>
                    <th>Price (₹) </th>
                    <th>Tax (₹) </th>
                    <th>Total Price (₹) </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $seat = $price = $tax = $total_price = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>.
                        </td>
                        <td>
                            <?php echo $row['booking_date']; ?>
                        </td>
                        <td>
                            <?php echo $row['booking_id']; ?>
                        </td>
                        <td>
                            <?php echo date("d-m-Y", strtotime(explode("_", $row['journey_date'])[0])); ?>
                        </td>
                        <td>
                            <?php echo substr(explode("|", $row['trip'])[2], 1, -2); ?> <b>- TO -</b>
                            <?php echo substr(explode("|", $row['trip'])[4], 1, -2); ?>
                        </td>
                        <?php
                        $query = "SELECT * FROM `trip` WHERE `id` = " . substr(explode("|", $row["trip"])[0], 1, -1) . ";";
                        $trip = mysqli_query($con, $query);
                        if (mysqli_num_rows($trip) == 1) {
                            $data = mysqli_fetch_assoc($trip);
                            ?>
                            <td>
                                <?php echo substr(explode("|", $row['pick_up_stand'])[1], 1, -1); ?>
                                <p>(
                                    <?php echo substr(explode("-", explode("|", $data['schedule_time'])[1])[0], 1, -1); ?>)
                                </p>
                            </td>
                            <td>
                                <?php echo substr(explode("|", $row['drop_stand'])[1], 1, -1); ?>
                                <p>(
                                    <?php echo substr(explode("-", explode("|", $data['schedule_time'])[1])[1], 1, -1); ?>)
                                </p>
                            </td>
                            <?php
                        }
                        ?>
                        <td>
                            <?php $seat += intval(sizeof(explode(", ", $row['seat_no']))); ?>
                            <?php echo sizeof(explode(", ", $row['seat_no'])); ?>
                        </td>
                        <td>
                            <?php echo $row['seat_no']; ?>
                        </td>
                        <td>
                            <?php $price += intval($row['ticket_price']); ?>
                            <?php echo $row['ticket_price']; ?>
                        </td>
                        <td>
                            <?php $tax += intval($row['tax_price']); ?>
                            <?php echo $row['tax_price']; ?>
                        </td>
                        <td>
                            <?php $total_price += intval($row['total_price']); ?>
                            <?php echo $row['total_price']; ?>
                        </td>
                    </tr>
                    <?php
                }
                if (mysqli_num_rows($result) == 0) {
                    ?>
                    <tr>
                        <td colspan=12 class="text-center">
                            No Data Available In Table.
                        </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th colspan="2">Totals</th>
                    <th>
                        <?php echo $seat; ?>
                    </th>
                    <th>-</th>
                    <th>₹
                        <?php echo $price; ?>
                    </th>
                    <th>₹
                        <?php echo $tax; ?>
                    </th>
                    <th>₹
                        <?php echo $total_price; ?>
                    </th>
                </tr>
            </tbody>
        </table>
        <div class='py-2 py-md-3'>Showing
            <?php echo ((mysqli_num_rows($result) == 0) ? 0 : 1); ?> to
            <?php echo mysqli_num_rows($result); ?> of
            <?php echo mysqli_num_rows($result); ?> Entries
        </div>
        <?php
    }
}

?>