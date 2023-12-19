<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

if (isset($_POST['delete_id'])) {

    $query = "SELECT * FROM `vehical` WHERE `fleet_type` LIKE '[$delete_id]|[%%]';";
    $result = mysqli_query($con, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            foreach (unserialize($row['images']) as $key => $value) {
                if (file_exists("../../../Images/$value")) {
                    unlink("../../../Images/$value");
                }
            }
        }
        $query = "DELETE coupon.* FROM coupon INNER JOIN trip WHERE trip.fleet_type LIKE '%[$delete_id]|[%%]%' AND LOCATE(CONCAT('[',trip.id,']'),trip);";
        $query .= "DELETE FROM `fleet` WHERE `id` = '$delete_id';";
        $query .= "DELETE FROM `vehical` WHERE `fleet_type` LIKE '[$delete_id]|[%%]';";
        $query .= "DELETE FROM `trip` WHERE fleet_type LIKE '%[$delete_id]|[%%]%';";
        mysqli_multi_query($con, $query);
    }
}

if (isset($_GET['id'])) {

    $query = "SELECT * FROM `fleet` WHERE `id` = $id";
    $result_fleet = mysqli_query($con, $query);
    $query = "SELECT * FROM `vehical` WHERE `fleet_type` LIKE '[$id]|[%%]'";
    $result_vehical = mysqli_query($con, $query);
    $query = "SELECT * FROM `trip` WHERE fleet_type LIKE '%[$id]|[%%]%';";
    $result_trip = mysqli_query($con, $query);
    $query = "SELECT coupon.* FROM coupon INNER JOIN trip WHERE trip.fleet_type LIKE '%[$id]|[%%]%' AND LOCATE(CONCAT('[',trip.id,']'),trip) GROUP BY coupon.id;";
    $result_coupon = mysqli_query($con, $query);
    if ($result_fleet && $result_vehical && $result_trip && $result_coupon) {

        $row_fleet = mysqli_fetch_assoc($result_fleet);

        ?>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>DELETE FLEET</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>

                <h5>The Following Data Will Be Deleted.</h5>

                <div class='py-2'>
                    <div class='py-1 px-3 display-5' style='background-color: rgba(108, 117, 125,.3);font-weight: bold'>Fleet
                    </div>
                    <div class='table-responsive py-2'>
                        <table class='table table-hover table-bordered'>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Type</th>
                                    <th>Layout</th>
                                    <th>Last Seat Check</th>
                                    <th>Total Seat</th>
                                    <th>Seat Number</th>
                                    <th>Status</th>
                                    <th>Luggage Service</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $row_fleet['id']; ?>.
                                    </td>
                                    <td>
                                        <?php echo $row_fleet['type']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_fleet['layout']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_fleet['last_seat_check']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_fleet['total_seat']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_fleet['seat_number']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_fleet['status']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_fleet['luggage_service']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
                if (mysqli_num_rows($result_vehical) != 0) {
                    ?>
                    <div class='py-2'>
                        <div class='py-1 px-3 display-5' style='background-color: rgba(108, 117, 125,.3);font-weight: bold'>Vehical
                        </div>
                        <div class='table-responsive py-2'>
                            <table class='table table-hover table-bordered'>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Images</th>
                                        <th>Company</th>
                                        <th>Fleet Type</th>
                                        <th>Reg No.</th>
                                        <th>Eng No.</th>
                                        <th>Model No.</th>
                                        <th>Chassis No.</th>
                                        <th>Owner</th>
                                        <th>Owner Mobile</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row_vehical = mysqli_fetch_assoc($result_vehical)) {
                                        $image = unserialize($row_vehical['images']);
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row_vehical['id']; ?>.
                                            </td>
                                            <td>
                                                <div class='row d-flex overflow-auto' style='flex-wrap: nowrap;'>
                                                    <?php
                                                    for ($num = 0; $num < sizeof($image); $num++) {
                                                        ?>
                                                        <div class='col-12 d-flex align-items-center py-3'>
                                                            <img src='../Images/<?php echo $image[$num]; ?>' alt='' class='w-100'
                                                                style='border-radius: 10px'>
                                                        </div>

                                                        <?php
                                                    }
                                                    if (sizeof($image) == 0) {
                                                        ?>
                                                        <div class='d-flex justify-content-center w-100'>
                                                            <div class='row d-flex overflow-auto p-2 m-0'
                                                                style='flex-wrap: nowrap;border: 2px dashed gray'>
                                                                <div class='w-100'>
                                                                    <center>No Images Founded.</center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo $row_vehical['company']; ?>
                                            </td>
                                            <td>
                                                <?php echo explode('|', $row_vehical['fleet_type'])[1]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_vehical['reg_no']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_vehical['eng_no']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_vehical['model_no']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_vehical['chassis_no']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_vehical['owner']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_vehical['owner_mobile']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_vehical['status']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (mysqli_num_rows($result_trip) > 0) {
                    ?>
                    <div class='py-2'>
                        <div class='py-1 px-3 display-5' style='background-color: rgba(108, 117, 125,.3);font-weight: bold'>Trip
                        </div>
                        <div class='table-responsive py-2'>
                            <?php
                            while ($trip = mysqli_fetch_assoc($result_trip)) {
                                ?>
                                <table class='table table-bordered'>
                                    <tr>
                                        <th>No.</th>
                                        <th>Trip Section</th>
                                    </tr>
                                    <tr>
                                        <td rowspan="9">
                                            <?php echo $trip['id']; ?>.
                                        </td>
                                        <td>
                                            <table class="table m-0">
                                                <tr>
                                                    <th>Pick UP</th>
                                                    <th>Drop</th>
                                                    <th>Stoppage Point</th>
                                                    <th>Schedule Time</th>
                                                    <th>Start Date</th>
                                                    <th>Status</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php echo substr(explode("|", $trip['trip_pick_up'])[1], 1, -1); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo substr(explode("|", $trip['trip_drop'])[1], 1, -1); ?>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <?php
                                                            for ($data = 0; $data < sizeof(unserialize($trip['stoppage_point'])); $data++) {
                                                                ?>
                                                                <li>
                                                                    <?php echo substr(explode("|", unserialize($trip['stoppage_point'])[$data])[1], 1, -1); ?>
                                                                </li>
                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <?php echo substr(explode("|", $trip['schedule_time'])[1], 1, -1); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date("d-M-Y", strtotime($trip['start_date'])); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo ($trip['status'] == 1) ? "Active" : "Disable"; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Boarding && Dropping Point</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table class="table m-0">
                                                <tr>
                                                    <th>Boarding Point</th>
                                                    <th>Dropping Point</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table class="table m-0 table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Time</th>
                                                                    <th>Bus Stand</th>
                                                                    <th>Details</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                for ($data = 0; $data < sizeof(unserialize($trip['boarding_point'])); $data++) {
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo unserialize($trip['boarding_point'])[$data]['boarding_time_12_hour']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo substr(explode("|", unserialize($trip['boarding_point'])[$data]['boarding_bus_stand'])[1], 1, -1); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo (unserialize($trip['boarding_point'])[$data]['boarding_details'] != "") ? unserialize($trip['boarding_point'])[$data]['boarding_details'] : "—"; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table class="table m-0 table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Time</th>
                                                                    <th>Bus Stand</th>
                                                                    <th>Details</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                for ($data = 0; $data < sizeof(unserialize($trip['dropping_point'])); $data++) {
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo unserialize($trip['dropping_point'])[$data]['dropping_time_12_hour']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo substr(explode("|", unserialize($trip['dropping_point'])[$data]['dropping_bus_stand'])[1], 1, -1); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo (unserialize($trip['dropping_point'])[$data]['dropping_details'] != "") ? unserialize($trip['dropping_point'])[$data]['dropping_details'] : "—"; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Seat, Fair, Time</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table class="table m-0">
                                                <tr>
                                                    <th>Children Seat</th>
                                                    <th>Children Fair</th>
                                                    <th>Special Seat</th>
                                                    <th>Special Fair</th>
                                                    <th>Adult Seat</th>
                                                    <th>Distance</th>
                                                    <th>Approximate Time</th>
                                                    <th>Weekend</th>
                                                    <th>Facility</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php echo $trip['children_seat']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $trip['children_fair']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $trip['special_seat']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $trip['special_fair']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $trip['adult_fair']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $trip['distance']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $trip['approximate_time']; ?>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <?php
                                                            for ($data = 0; $data < sizeof(unserialize($trip['weekend'])); $data++) {
                                                                ?>
                                                                <li>
                                                                    <?php echo unserialize($trip['weekend'])[$data]; ?>
                                                                </li>
                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <?php
                                                            for ($data = 0; $data < sizeof(unserialize($trip['facility'])); $data++) {
                                                                ?>
                                                                <li>
                                                                    <?php echo substr(explode("|", unserialize($trip['facility'])[$data])[1], 1, -1); ?>
                                                                </li>
                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Vehical</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table class="table m-0">
                                                <tr>
                                                    <th>Fleet Type</th>
                                                    <th>Vehical List</th>
                                                    <th>Company Name</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php echo substr(explode("|", $trip['fleet_type'])[1], 1, -1); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo substr(explode("|", $trip['vehical_list'])[1], 1, -1); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $trip['company_name']; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Employee</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table class="table m-0">
                                                <tr>
                                                    <?php
                                                    foreach (unserialize($trip['employee']) as $key => $value) {
                                                        ?>
                                                        <th>
                                                            <?php echo strtoupper($key); ?>
                                                        </th>
                                                        <?php
                                                    }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    foreach (unserialize($trip['employee']) as $key => $value) {
                                                        ?>
                                                        <td>
                                                            <ul>
                                                                <?php
                                                                for ($data = 0; $data < sizeof($value); $data++) {
                                                                    if (substr(explode("|", $value[$data])[0], 1, -1) != "-") {
                                                                        ?>
                                                                        <li>
                                                                            <?php echo substr(explode("|", $value[$data])[1], 1, -1) . " " . substr(explode("|", $value[$data])[2], 1, -1); ?>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </ul>
                                                        </td>
                                                        <?php
                                                    }
                                                    ?>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (mysqli_num_rows($result_coupon) > 0) {
                    ?>
                    <div class='py-2'>
                        <div class='py-1 px-3 display-5' style='background-color: rgba(108, 117, 125,.3);font-weight: bold'>Coupon
                        </div>
                        <div class='table-responsive py-2'>
                            <table class='table table-hover table-bordered'>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Code</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Amount</th>
                                        <th>Trip Name</th>
                                        <th>Terms & Conditions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($coupon = mysqli_fetch_assoc($result_coupon)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $coupon['id']; ?>.
                                            </td>
                                            <td>
                                                <?php echo $coupon['code']; ?>
                                            </td>
                                            <td>
                                                <?php echo date('d-m-Y', strtotime($coupon['start_date'])); ?>
                                            </td>
                                            <td>
                                                <?php echo date('d-m-Y', strtotime($coupon['end_date'])); ?>
                                            </td>
                                            <td>
                                                <?php echo $coupon['amount']; ?> ₹
                                            </td>
                                            <td>
                                                <?php echo substr(explode("|", $coupon['trip'])[1], 1, -1) . " - " . substr(explode("|", $coupon['trip'])[2], 1, -1); ?>
                                            </td>
                                            <td>
                                                <?php echo $coupon['terms_conditions']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-danger' data-dismiss='modal'
                    onclick='fleet_delete_data(<?php echo $row_fleet['id']; ?>)'>Confirm</button>
            </div>
        </div>
        <?php
    }

}

?>