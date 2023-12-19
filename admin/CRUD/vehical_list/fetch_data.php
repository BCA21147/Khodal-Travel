<?php

extract($_POST);

if (isset($_POST['fetch_data'])) {

    $data = "";

    include('../db_connection.php');
    $query = "SELECT * FROM `vehical`";
    $result = mysqli_query($con, $query);

    if (isset($_POST['search'])) {

        $query = "SELECT * FROM `vehical` WHERE `id` LIKE '%$search%' or `reg_no` LIKE '%$search%' or `eng_no` LIKE '%$search%' or `model_no` LIKE '%$search%' or `chassis_no` LIKE '%$search%' or `owner` LIKE '%$search%' or `owner_mobile` LIKE '%$search%' or `company` LIKE '%$search%' or `fleet_type` LIKE '%$search%' or `status` LIKE '%$search%';";
        $result = mysqli_query($con, $query);

    }

    if ($result) {
        ?>
        <table class='table table-hover table-bordered table-striped'>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $image = unserialize($row['images']);
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>.
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
                            <?php echo $row['company']; ?>
                        </td>
                        <td>
                            <?php echo explode('|', $row['fleet_type'])[1]; ?>
                        </td>
                        <td>
                            <?php echo $row['reg_no']; ?>
                        </td>
                        <td>
                            <?php echo $row['eng_no']; ?>
                        </td>
                        <td>
                            <?php echo $row['model_no']; ?>
                        </td>
                        <td>
                            <?php echo $row['chassis_no']; ?>
                        </td>
                        <td>
                            <?php echo $row['owner']; ?>
                        </td>
                        <td>
                            <?php echo $row['owner_mobile']; ?>
                        </td>
                        <td>
                            <?php echo $row['status']; ?>
                        </td>
                        <td>
                            <div class='d-flex justify-content-between'>
                                <div class='btn btn-info' title='Edit' data-toggle='modal' data-target='#VehicalUpdateModal'
                                    onclick='vehical_update(<?php echo $row['id']; ?>)'>
                                    <i class='fa-solid fa-pen-to-square'></i>
                                </div>
                                <div class='px-1'></div>
                                <div class='btn btn-danger' title='Delete' data-toggle='modal' data-target='#VehicalDeleteModal'
                                    onclick='vehical_delete(<?php echo $row['id']; ?>)'>
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