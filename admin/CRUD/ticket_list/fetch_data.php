<?php

extract($_POST);

if (isset($_POST['fetch_data'])) {

    $data = "";

    include('../db_connection.php');
    $query = "SELECT * FROM `ticket` WHERE `status`!=0";
    $result = mysqli_query($con, $query);

    if (isset($_POST['search'])) {

        $query = "SELECT * FROM `ticket` WHERE (`id` LIKE '%$search%' or `booking_id` LIKE '%$search%' or `trip` LIKE '%$search%' or `seat_no` LIKE '%$search%' or `pick_up_stand` LIKE '%$search%' or `drop_stand` LIKE '%$search%' or `payment_status` LIKE '%$search%' or `journey_date` LIKE '%" . date("Y-m-d", strtotime($search)) . "%'  or `status` LIKE '%$search%' or `passenger_details` LIKE '%$search%') AND `status`!=0";
        $result = mysqli_query($con, $query);

    }

    if ($result) {
        ?>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Booking ID.</th>
                    <th>Pick UP</th>
                    <th>Drop</th>
                    <th>No. Of Seat</th>
                    <th>Seat No.</th>
                    <th>Pickup Stand</th>
                    <th>Drop Stand</th>
                    <th>Payment Status</th>
                    <th>Journey Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>.
                        </td>
                        <td>
                            <?php echo $row['booking_id']; ?>
                        </td>
                        <td>
                            <?php echo substr(explode("|", $row['trip'])[2], 1, -2); ?>
                        </td>
                        <td>
                            <?php echo substr(explode("|", $row['trip'])[4], 1, -2); ?>
                        </td>
                        <td>
                            <?php echo sizeof(explode(", ", $row['seat_no'])); ?>
                        </td>
                        <td>
                            <?php echo $row['seat_no']; ?>
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
                            <?php echo $row['payment_status']; ?>
                        </td>
                        <td>
                            <?php echo date("d-m-Y", strtotime(explode("_", $row['journey_date'])[0])); ?>
                        </td>
                        <td>
                            <?php
                            if ($row['status'] == 0) {
                                echo "CANCEL";
                            } elseif ($row['status'] == 1) {
                                echo "ACTIVE";
                            } elseif ($row['status'] == 2) {
                                echo "SUCCESS";
                            } else {
                                echo "";
                            }
                            ?>
                        </td>
                        <td>
                            <div class='d-flex justify-content-between'>
                                <script>
                                    $(function () {
                                        $('[data-toggle="popover"]').popover({
                                            html: true
                                        });
                                    })
                                </script>
                                <div class='btn btn-danger' data-toggle="popover" title="<b>TICKET CENCELLATION</b>"
                                    data-content="TICKET ID :- <b><?php echo $row['booking_id']; ?></b><br/><br/><div class='text-center'><b><h5>Are You Sure ...?</h5></b><div> <br /><div class='row'><div class='col-6'><div class='btn btn-dark w-100' id='close_ticket_<?php echo $row['booking_id']; ?>'>CLOSE</div></div><div class='col-6'><div class='btn btn-danger w-100' id='cancel_ticket_<?php echo $row['booking_id']; ?>'>CANCEL</div></div></div>"
                                    onclick="cancel_ticket('<?php echo $row['booking_id']; ?>')"
                                    id="popover_<?php echo $row['booking_id']; ?>">
                                    <i class='fa-regular fa-circle-xmark py-1' style="font-size: 20px;"></i>
                                </div>
                                <div class='px-1'></div>
                                <a href="CRUD/book_ticket/print_book_ticket.php?book_ticket_id=<?php echo $row['booking_id']; ?>"
                                    type="button" target="_blank" class='btn btn-info' title='Invoice'>
                                    <i class='fa-solid fa-file-invoice py-1' style="font-size: 20px;"></i>
                                </a>
                                <div class='px-1'></div>
                                <button class='btn btn-primary' title='Print'
                                    onclick="downloadTicket('<?php echo $row['booking_id']; ?>')">
                                    <i class='fa-solid fa-print py-1' style="font-size: 20px;"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
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