<?php

extract($_POST);

if (isset($_POST['fetch_data'])) {

    include('../db_connection.php');
    $query = "SELECT * FROM `employee`";
    $result = mysqli_query($con, $query);

    if (isset($_POST['search'])) {

        $query = "SELECT * FROM `employee` WHERE `id` LIKE '%$search%' or `first_name` LIKE '%$search%' or `last_name` LIKE '%$search%' or `emp_type` LIKE '%$search%' or `mobile_no` LIKE '%$search%' or `email` LIKE '%$search%' or `blood_group` LIKE '%$search%' or `id_type` LIKE '%$search%' or `id_number` LIKE '%$search%' or `country` LIKE '%$search%' or `city` LIKE '%$search%' or `zip_code` LIKE '%$search%' or `address` LIKE '%$search%';";
        $result = mysqli_query($con, $query);

    }

    if ($result) {
        ?>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Profile Pic.</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Mobile No.</th>
                    <th>Email</th>
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
                            <div class='row d-flex overflow-auto' style='flex-wrap: nowrap;'>
                                <?php
                                if ($row['profile_image'] != "") {
                                    ?>
                                    <div class='col-12 d-flex align-items-center py-3'>
                                        <img src='../Images/<?php echo $row['profile_image']; ?>' alt='' class='w-100'
                                            style='border-radius: 10px'>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class='d-flex justify-content-center w-100'>
                                        <div class='row d-flex overflow-auto p-2 m-0' style='flex-wrap: nowrap;border: 2px dashed gray'>
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
                            <?php echo $row['first_name'] . ' ' . $row['last_name']; ?>
                        </td>
                        <td>
                            <?php echo explode('|', $row['emp_type'])[1]; ?>
                        </td>
                        <td>
                            <?php echo $row['mobile_no']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <div class='d-flex'>
                                <div class='btn btn-primary' title='View' data-toggle='modal' data-target='#EmployeeUpdateModal'
                                    onclick='employee_view(<?php echo $row['id']; ?>)'>
                                    <i class='fa-solid fa-eye'></i>
                                </div>
                                <div class='px-1'></div>
                                <div class='btn btn-danger' title='Delete' data-toggle='modal' data-target='#EmployeeDeleteModal'
                                    onclick='employee_delete(<?php echo $row['id']; ?>)'>
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