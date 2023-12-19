<?php

include('../db_connection.php');

extract($_POST);

// Search - Bus Ticket - Data :- 
if (isset($_POST['trip_pick_up']) && isset($_POST['trip_drop']) && isset($_POST['trip_start_date'])) {

    $return_date = (isset($_POST['trip_end_date'])) ? $trip_end_date : "";
    $fleet_type = (isset($_POST['trip_fleet_type'])) ? $trip_fleet_type : "";

    ?>
    <div class="row justify-content-center px-lg-4 py-lg-2 p-md-2 py-4">
        <div class="col-12">
            <div class="card m-0">
                <div class="h5 fw-bold px-2 px-md-4 py-3 m-0">
                    <div class="d-md-flex d-block">
                        <div class="px-1">
                            Showing result for:
                        </div>
                        <div class="px-1" id="trip_start_end_date"
                            data-trip_start_end_date="<?php echo $trip_start_date . "_" . $return_date; ?>">
                            <b>
                                <?php echo date("d-m-Y", strtotime($trip_start_date)); ?>
                            </b>
                        </div>
                        <div class="px-1">
                            ( Single Trip - <b> [
                                <?php echo substr(explode("|", $trip_pick_up)[1], 1, -1); ?> -
                                <?php echo substr(explode("|", $trip_drop)[1], 1, -1); ?> ]
                            </b> )
                        </div>
                    </div>
                </div>
                <div style="border-top:2px dashed black;"></div>
                <div class="px-2 px-md-4 py-3">
                    <div class="row m-0">
                        <?php
                        $fleet_type = ($fleet_type == "[0]|[ALL]") ? "" : $fleet_type;

                        $query = "SELECT * FROM `trip` WHERE `trip_pick_up` LIKE '%$trip_pick_up%' AND `trip_drop` LIKE '%$trip_drop%' AND `fleet_type` LIKE '%$fleet_type%' AND `start_date`<='$trip_start_date' AND `status`=1;";
                        $result = mysqli_query($con, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="col-12 p-1">
                                    <div class="card px-4 py-3 border">
                                        <div class="row text-center align-items-center justify-content-center py-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-lg-7 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-sm-4 col-12 border border-top-0 border-bottom-0 border-left-0">
                                                                <h4><b>
                                                                        <?php echo $row["company_name"]; ?>
                                                                    </b></h4>
                                                                <h6>
                                                                    <?php echo $row["company_name"]; ?>
                                                                </h6>
                                                            </div>
                                                            <div
                                                                class="col-sm-4 col-12 border border-top-0 border-bottom-0 border-left-0">
                                                                <h4><b>
                                                                        <?php echo substr(explode("|", $row['trip_pick_up'])[1], 1, -1) ?>
                                                                    </b></h4>
                                                                <h6>
                                                                    <?php echo explode("-", substr(explode("|", $row['schedule_time'])[1], 1, -1))[0] ?>
                                                                </h6>
                                                            </div>
                                                            <div
                                                                class="col-sm-4 col-12 border border-top-0 border-bottom-0 border-left-0">
                                                                <h4><b>
                                                                        <?php echo substr(explode("|", $row['trip_drop'])[1], 1, -1) ?>
                                                                    </b></h4>
                                                                <h6>
                                                                    <?php echo explode("-", substr(explode("|", $row['schedule_time'])[1], 1, -1))[1] ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-12">
                                                        <div class="row">
                                                            <div
                                                                class="col-sm-4 col-12 border border-top-0 border-bottom-0 border-left-0">
                                                                <h4><b>
                                                                        <?php echo $row['approximate_time']; ?> Hr.
                                                                    </b></h4>
                                                                <h6>
                                                                    <?php echo $row['distance']; ?>
                                                                </h6>
                                                            </div>
                                                            <div
                                                                class="col-sm-4 col-12 border border-top-0 border-bottom-0 border-left-0">
                                                                <h4><b>FAIR</b></h4>
                                                                <h6>
                                                                    <?php echo $row['adult_fair']; ?>
                                                                </h6>
                                                            </div>
                                                            <div
                                                                class="col-sm-4 col-12 border border-top-0 border-bottom-0 border-left-0">
                                                                <h4><b>SEAT</b></h4>
                                                                <h6>
                                                                    <?php
                                                                    $inner_query = "SELECT * FROM `fleet` WHERE id = " . substr(explode('|', $row['fleet_type'])[0], 1, -1);
                                                                    $result_trip = mysqli_query($con, $inner_query);
                                                                    if ($result_trip) {
                                                                        echo mysqli_fetch_assoc($result_trip)['total_seat'];
                                                                    } else {
                                                                        echo 0;
                                                                    }
                                                                    ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary my-1 mx-2 px-5"
                                                    onclick="book_bus_ticket(<?php echo $row['id']; ?>,'<?php echo $trip_start_date; ?>')">Details</button>
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
                            <div class="col-12 p-0">
                                <h2>No Trip Found</h2>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

}

?>