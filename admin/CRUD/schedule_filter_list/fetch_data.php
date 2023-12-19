<?php

extract($_POST);

if (isset($_POST['fetch_data'])) {

    $data = "";

    include('../db_connection.php');
    $query = "SELECT * FROM `schedule_filter`";
    $result = mysqli_query($con, $query);

    if (isset($_POST['search'])) {

        $query = "SELECT * FROM `schedule_filter` WHERE `id` LIKE '%$search%' or `start_time_12_hour` LIKE '%$search%' or `end_time_12_hour` LIKE '%$search%' or `filter_type_hide` LIKE '%$search%' or `filter_type_show` LIKE '%$search%' or CONCAT(`start_time_12_hour`,' - ',`end_time_12_hour`) LIKE '%$search%';";
        $result = mysqli_query($con, $query);

    }

    if ($result) {
        ?>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Filter - Start Time</th>
                    <th>Filter - End Time</th>
                    <th>Filter - Type</th>
                    <th>Details</th>
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
                            <?php echo $row['start_time_12_hour']; ?>
                        </td>
                        <td>
                            <?php echo $row['end_time_12_hour']; ?>
                        </td>
                        <td>
                            <?php echo $row['filter_type_show'] ?>
                        </td>
                        <td>
                            <?php echo $row['start_time_12_hour'] . ' - ' . $row['end_time_12_hour']; ?>
                        </td>
                        <td>
                            <div class='d-flex'>
                                <div class='btn btn-info' title='Edit' data-toggle='modal' data-target='#ScheduleFilterUpdateModal'
                                    onclick='schedule_filter_update(<?php echo $row['id']; ?>)'>
                                    <i class='fa-solid fa-pen-to-square'></i>
                                </div>
                                <div class='px-1'></div>
                                <div class='btn btn-danger' title='Delete' data-toggle='modal'
                                    data-target='#ScheduleFilterDeleteModal'
                                    onclick='schedule_filter_delete(<?php echo $row['id']; ?>)'>
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