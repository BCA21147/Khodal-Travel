<?php

extract($_POST);

if (isset($_POST['fetch_data'])) {

    $data = "";

    include('../db_connection.php');
    $query = "SELECT * FROM `employee_type`";
    $result = mysqli_query($con, $query);

    if (isset($_POST['search'])) {

        $query = "SELECT * FROM `employee_type` WHERE `id` LIKE '%$search%' or `emp_type` LIKE '%$search%' or `emp_details` LIKE '%$search%';";
        $result = mysqli_query($con, $query);

    }

    if ($result) {
        ?>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Employee Type</th>
                    <th>Employee Details</th>
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
                            <?php echo $row['emp_type']; ?>
                        </td>
                        <td>
                            <?php echo $row['emp_details']; ?>
                        </td>
                        <td>
                            <div class='d-flex'>
                                <div class='btn btn-info' title='Edit' data-toggle='modal' data-target='#EmployeeTypeUpdateModal'
                                    onclick='employee_type_update(<?php echo $row['id']; ?>)'>
                                    <i class='fa-solid fa-pen-to-square'></i>
                                </div>
                                <div class='px-1'></div>
                                <?php
                                if ($row['id'] != 1 && $row['id'] != 2) {
                                    ?>
                                    <div class='btn btn-danger' title='Delete' data-toggle='modal'
                                        data-target='#EmployeeTypeDeleteModal'
                                        onclick='employee_type_delete(<?php echo $row['id']; ?>)'>
                                        <i class='fa-solid fa-trash-can'></i>
                                    </div>
                                    <?php
                                }
                                ?>
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