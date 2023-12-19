<?php

extract($_POST);

if (isset($_POST['fetch_data'])) {

    $data = "";

    include('../db_connection.php');
    $query = "SELECT * FROM `passenger`";
    $result = mysqli_query($con, $query);

    if (isset($_POST['search'])) {

        $query = "SELECT * FROM `passenger` WHERE `id` LIKE '%$search%' or `first_name` LIKE '%$search%' or `last_name` LIKE '%$search%' or CONCAT(`first_name`,' ',`last_name`) LIKE '%$search%' or `mobile_no` LIKE '%$search%' or `email` LIKE '%$search%' or `id_type` LIKE '%$search%' or `nid_number` LIKE '%$search%' or `country_name` LIKE '%$search%' or `city_name` LIKE '%$search%' or `zip_code` LIKE '%$search%' or `address` LIKE '%$search%';";
        $result = mysqli_query($con, $query);

    }

    if ($result) {
        ?>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Mobile No.</th>
                    <th>Email</th>
                    <th>ID Type</th>
                    <th>NID Number</th>
                    <th>Country</th>
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
                            <?php echo $row['first_name'] . " " . $row['last_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['mobile_no']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['id_type']; ?>
                        </td>
                        <td>
                            <?php echo $row['nid_number']; ?>
                        </td>
                        <td>
                            <?php echo substr(explode("|", $row['country_name'])[1], 1, -1); ?>
                        </td>
                        <td>
                            <div class='d-flex'>
                                <div class='btn btn-info' title='Edit' data-toggle='modal' data-target='#PassengerUpdateModal'
                                    onclick='passenger_update(<?php echo $row['id']; ?>)'>
                                    <i class='fa-solid fa-pen-to-square'></i>
                                </div>
                                <div class='px-1'></div>
                                <div class='btn btn-danger' title='Delete' data-toggle='modal' data-target='#PassengerDeleteModal'
                                    onclick='passenger_delete(<?php echo $row['id']; ?>)'>
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