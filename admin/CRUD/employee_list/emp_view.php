<?php

include('../db_connection.php');

extract($_GET);

// Single Employee Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `employee` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='modal-content'>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">VIEW EMPLOYEE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center py-2 px-3">
                    <div
                        class="col-12 col-sm-8 col-md-4 col-lg-3 order-md-1 order-2 d-flex justify-content-center align-items-center">
                        <div class="row w-100">
                            <div class='col-12 py-3'>
                                <h6 style="font-weight: bold;">Profile Image:</h6>
                                <div class="border p-2 bg-primary">
                                    <?php
                                    if ($row['profile_image'] != "" && file_exists("../../../Images/" . $row['profile_image'])) {
                                        ?>
                                        <img src='../Images/<?php echo $row['profile_image']; ?>' alt='' class='w-100'
                                            style='border-radius: 8px;border: 4px solid #fff;'>
                                        <?php
                                    } else {
                                        ?>
                                        <div class='row d-flex overflow-auto p-2 m-0'
                                            style='flex-wrap: nowrap;border: 3px dashed #fff'>
                                            <div class='w-100'>
                                                <center class="h4 m-0">NO PROFILE FOUNDED</center>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class='col-12 py-3'>
                                <h6 style="font-weight: bold;">NID/Passport Image:</h6>
                                <div class="border p-2 bg-primary">
                                    <?php
                                    if ($row['id_image'] != "" && file_exists("../../../Images/" . $row['id_image'])) {
                                        ?>
                                        <img src='../Images/<?php echo $row['id_image']; ?>' alt='' class='w-100'
                                            style='border-radius: 8px;border: 4px solid #fff;'>
                                        <?php
                                    } else {
                                        ?>
                                        <div class='row d-flex overflow-auto p-2 m-0'
                                            style='flex-wrap: nowrap;border: 3px dashed #fff'>
                                            <div class='w-100'>
                                                <center class="h4 m-0">NO NID FOUNDED</center>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-12 col-sm-12 col-md-8 col-lg-9 order-md-2 order-1 d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <h2 style="font-weight: bold;">
                                <?php echo $row['first_name'] . " " . $row['last_name'] ?>
                            </h2>
                            <div style="border-top: 2px dashed;" class="my-3"></div>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Employee Type</th>
                                        <td>
                                            <?php echo ($row['emp_type'] == "") ? "-" : explode('|', $row['emp_type'])[1]; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Mobile No.</th>
                                        <td>
                                            <?php echo ($row['mobile_no'] == "") ? "-" : $row['mobile_no']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <?php echo ($row['email'] == "") ? "-" : $row['email']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Blood Group</th>
                                        <td>
                                            <?php echo ($row['blood_group'] == "") ? "-" : $row['blood_group']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>NID/Passport Type</th>
                                        <td>
                                            <?php echo ($row['id_type'] == "") ? "-" : $row['id_type']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>NID/Passport Number</th>
                                        <td>
                                            <?php echo ($row['id_number'] == "") ? "-" : $row['id_number']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Country</th>
                                        <td>
                                            <?php echo ($row['country'] == "") ? "-" : explode('|', $row['country'])[1]; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>
                                            <?php echo ($row['city'] == "") ? "-" : $row['city']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ZIP Code</th>
                                        <td>
                                            <?php echo ($row['zip_code'] == "") ? "-" : $row['zip_code']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>
                                            <?php echo ($row['address'] == "") ? "-" : $row['address']; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info" data-dismiss="modal"
                    onclick="employee_update(<?php echo $row['id']; ?>)">Edit</button>
            </div>
        </div>
        <?php
    }
}

?>