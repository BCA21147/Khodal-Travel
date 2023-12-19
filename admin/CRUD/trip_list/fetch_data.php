<?php

extract($_POST);

if (isset($_POST['fetch_data'])) {

    $data = "";

    include('../db_connection.php');
    $query = "SELECT * FROM `trip`";
    $result = mysqli_query($con, $query);

    if (isset($_POST['search'])) {

        $query = "SELECT * FROM `trip` WHERE `id` LIKE '%$search%' or `trip_pick_up` LIKE '%$search%' or `trip_drop` LIKE '%$search%' or `stoppage_point` LIKE '%$search%' or `schedule_time` LIKE '%$search%' or `boarding_point` LIKE '%$search%' or `dropping_point` LIKE '%$search%' or `children_seat` LIKE '%$search%' or `children_fair` LIKE '%$search%' or `special_seat` LIKE '%$search%' or `special_fair` LIKE '%$search%' or `adult_fair` LIKE '%$search%' or `distance` LIKE '%$search%' or `approximate_time` LIKE '%$search%' or `start_date` LIKE '%$search%' or `weekend` LIKE '%$search%' or `facility` LIKE '%$search%' or `fleet_type` LIKE '%$search%' or `vehical_list` LIKE '%$search%' or `company_name` LIKE '%$search%' or `employee` LIKE '%$search%' or `status` LIKE '%$search%';";
        $result = mysqli_query($con, $query);

    }

    if ($result) {
        ?>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Pick UP</th>
                    <th>Drop</th>
                    <th>Schedule</th>
                    <th>Distance</th>
                    <th>Hour</th>
                    <th>Total Seat</th>
                    <th>Vehical</th>
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
                            <?php echo substr(explode("|", $row['trip_pick_up'])[1], 1, -1); ?>
                        </td>
                        <td>
                            <?php echo substr(explode("|", $row['trip_drop'])[1], 1, -1); ?>
                        </td>
                        <td>
                            <?php echo substr(explode("|", $row['schedule_time'])[1], 1, -1); ?>
                        </td>
                        <td>
                            <?php echo $row['distance']; ?>
                        </td>
                        <td>
                            <?php echo $row['approximate_time']; ?>
                        </td>
                        <td>
                            <?php
                            $inner_query = "SELECT * FROM `fleet` WHERE id = " . substr(explode('|', $row['fleet_type'])[0], 1, -1);
                            $result_trip = mysqli_query($con, $inner_query);
                            if ($result_trip) {
                                echo mysqli_fetch_assoc($result_trip)['total_seat'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </td>
                        <td>
                            <?php echo substr(explode("|", $row['vehical_list'])[1], 1, -1); ?>
                        </td>
                        <td>
                            <?php echo $row['status']; ?>
                        </td>
                        <td>
                            <div class='d-flex'>
                                <div class='btn btn-info' title='Edit' data-toggle='modal' data-target='#TripUpdateModal'
                                    onclick='trip_update(<?php echo $row['id']; ?>)'>
                                    <i class='fa-solid fa-pen-to-square'></i>
                                </div>
                                <div class='px-1'></div>
                                <div class='btn btn-danger' title='Delete' data-toggle='modal' data-target='#TripDeleteModal'
                                    onclick='trip_delete(<?php echo $row['id']; ?>)'>
                                    <i class='fa-solid fa-trash-can'></i>
                                </div>
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