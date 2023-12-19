<?php

extract($_POST);

if (isset($_POST['fetch_data'])) {

    $data = "";

    include('../db_connection.php');
    $query = "SELECT * FROM `fleet`";
    $result = mysqli_query($con, $query);

    if (isset($_POST['search'])) {

        $query = "SELECT * FROM `fleet` WHERE `id` LIKE '%$search%' or `type` LIKE '%$search%' or `layout` LIKE '%$search%' or `total_seat` LIKE '%$search%' or `seat_number` LIKE '%$search%' or `last_seat_check` LIKE '%$search%' or `luggage_service` LIKE '%$search%' or `status` LIKE '%$search%';";
        $result = mysqli_query($con, $query);

    }

    if ($result) {
        ?>
        <table class='table table-hover table-bordered table-striped'>
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
                            <?php echo $row['type']; ?>
                        </td>
                        <td>
                            <?php echo $row['layout']; ?>
                        </td>
                        <td>
                            <?php echo $row['last_seat_check']; ?>
                        </td>
                        <td>
                            <?php echo $row['total_seat']; ?>
                        </td>
                        <td>
                            <?php echo $row['seat_number']; ?>
                        </td>
                        <td>
                            <?php echo $row['status']; ?>
                        </td>
                        <td>
                            <?php echo $row['luggage_service']; ?>
                        </td>
                        <td>
                            <div class='d-flex justify-content-between'>
                                <div class='btn btn-info' title='Edit' data-toggle='modal' data-target='#FleetUpdateModal'
                                    onclick='fleet_update(<?php echo $row['id']; ?>)'>
                                    <i class='fa-solid fa-pen-to-square'></i>
                                </div>
                                <div class='px-1'></div>
                                <div class='btn btn-danger' title='Delete' data-toggle='modal' data-target='#FleetDeleteModal'
                                    onclick='fleet_delete(<?php echo $row['id']; ?>)'>
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