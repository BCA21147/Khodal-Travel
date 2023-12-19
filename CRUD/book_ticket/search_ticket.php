<?php

include('../../admin/CRUD/db_connection.php');
extract($_POST);
if (isset($_POST['trip_pick_up']) && isset($_POST['trip_drop']) && isset($_POST['trip_start_date'])) {
    ?>

    <div class="row m-0">
        <?php

        $query = "SELECT * FROM `trip` WHERE `trip_pick_up` LIKE '%$trip_pick_up%' AND `trip_drop` LIKE '%$trip_drop%' AND `start_date`<='$trip_start_date' AND `adult_fair`>=$trip_min_price AND `adult_fair`<=$trip_max_price AND `status`=1";
        if (isset($_POST['trip_vehical_type'])) {
            $query .= " AND (";
            for ($num = 0; $num < count($trip_vehical_type); $num++) {
                $type = $trip_vehical_type[$num];
                if ($num == (count($trip_vehical_type) - 1)) {
                    $query .= " `fleet_type`='$type'";
                } else {
                    $query .= " `fleet_type`='$type' OR";
                }
            }
            $query .= " );";
        } else {
            $query .= ";";
        }
        $result = mysqli_query($con, $query);
        ?>
        <div class="col-12 px-1">
            <div class="px-4">
                <div class="row text-center align-items-center justify-content-center">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-7 col-12">
                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <h6>
                                            <b>
                                                <?php echo mysqli_num_rows($result); ?> Bus Found
                                            </b>
                                        </h6>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <h6>
                                            Departure
                                        </h6>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <h6>
                                            Arrival
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-12">
                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <h6>
                                            Duration
                                        </h6>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <h6>
                                            Fare
                                        </h6>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <h6>
                                            Seat Available
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-12 p-1">
                    <div class="card px-4 pt-3 border">
                        <div class="row text-center align-items-center justify-content-center py-2">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-7 col-12">
                                        <div class="row">
                                            <div class="col-sm-4 col-12 border border-top-0 border-bottom-0 border-left-0">
                                                <h4><b>
                                                        <?php echo $row["company_name"]; ?>
                                                    </b></h4>
                                                <h6>
                                                    <?php echo substr(explode("|", $row["fleet_type"])[1], 1, -1); ?>
                                                </h6>
                                            </div>
                                            <div class="col-sm-4 col-12 border border-top-0 border-bottom-0 border-left-0">
                                                <h4><b>
                                                        <?php echo explode("-", substr(explode("|", $row['schedule_time'])[1], 1, -1))[0] ?>
                                                    </b></h4>
                                                <h6>
                                                    <?php echo substr(explode("|", $row['trip_pick_up'])[1], 1, -1) ?>
                                                </h6>
                                            </div>
                                            <div class="col-sm-4 col-12 border border-top-0 border-bottom-0 border-left-0">
                                                <h4><b>
                                                        <?php echo explode("-", substr(explode("|", $row['schedule_time'])[1], 1, -1))[1] ?>
                                                    </b></h4>
                                                <h6>
                                                    <?php echo substr(explode("|", $row['trip_drop'])[1], 1, -1) ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12">
                                        <div class="row">
                                            <div class="col-sm-4 col-12 border border-top-0 border-bottom-0 border-left-0">
                                                <h4><b>
                                                        <?php echo $row['approximate_time']; ?> Hr.
                                                    </b></h4>
                                                <h6>
                                                    <?php echo $row['distance']; ?>
                                                </h6>
                                            </div>
                                            <div class="col-sm-4 col-12 border border-top-0 border-bottom-0 border-left-0">
                                                <h4>
                                                    <b>
                                                        <?php echo $row['adult_fair'] . " ₹"; ?>
                                                    </b>
                                                </h4>
                                            </div>
                                            <div class="col-sm-4 col-12 border border-top-0 border-bottom-0 border-left-0">
                                                <h4>
                                                    <b>
                                                        <?php
                                                        $inner_query = "SELECT * FROM `fleet` WHERE id = " . substr(explode('|', $row['fleet_type'])[0], 1, -1);
                                                        $result_trip = mysqli_query($con, $inner_query);
                                                        if ($result_trip) {
                                                            echo mysqli_fetch_assoc($result_trip)['total_seat'];
                                                        } else {
                                                            echo 0;
                                                        }
                                                        ?>
                                                    </b>
                                                </h4>
                                                <h6>
                                                    Seat Available
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 py-3">
                                <div class="row">
                                    <div class="col-lg-7 col-12">
                                        <div class="row h-100 d-flex align-items-center">
                                            <div class="col-sm-4 col-12 py-1">
                                                <div onclick="setOtherBusOptions('<?php echo $row['id']; ?>','BUSPHOTOS','<?php echo $row['vehical_list']; ?>')"
                                                    style="cursor: pointer;"><b><u>Bus Photos</u></b></div>
                                            </div>
                                            <div class="col-sm-4 col-12 py-1">
                                                <div onclick="setOtherBusOptions('<?php echo $row['id']; ?>','REVIEWS','')"
                                                    style="cursor: pointer;"><b><u>Reviews</u></b></div>
                                            </div>
                                            <div class="col-sm-4 col-12 py-1">
                                                <div onclick="setOtherBusOptions('<?php echo $row['id']; ?>','POLICIES','')"
                                                    style="cursor: pointer;"><b><u>Booking Policies</u></b></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12">
                                        <div class="row h-100 d-flex align-items-center">
                                            <div class="col-sm-4 col-12 py-1">
                                                <div onclick="book_bus_ticket(<?php echo $row['id']; ?>,'<?php echo $trip_start_date; ?>')"
                                                    style="cursor: pointer;">
                                                    <b><u>View Seat</u></b>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="button" class="btn btn-primary my-1 mx-2 px-5"
                                                            onclick="book_bus_ticket(<?php echo $row['id']; ?>,'<?php echo $trip_start_date; ?>')">Details</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" id="book_bus_ticket_<?php echo $row['id']; ?>"></div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="col-12 py-5">
                <center>
                    <h2><b>No Trip Found</b></h2>
                </center>
            </div>
            <?php
        }
        ?>
    </div>

    <?php
}
?>