<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

if (isset($_POST['delete_id'])) {

    $query = "DELETE FROM `passenger` WHERE `id` = '$delete_id'";
    mysqli_query($con, $query);

}

if (isset($_GET['id'])) {

    $query = "SELECT * FROM `passenger` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>DELETE PASSENGER</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>

                <h5>The Following Data Will Be Deleted.</h5>

                <div class='py-2'>
                    <div class='py-1 px-3 display-5' style='background-color: rgba(108, 117, 125,.3);font-weight: bold'>
                        Passenger
                    </div>
                    <div class='table-responsive py-2'>
                        <table class='table table-hover table-bordered'>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>ID Type</th>
                                    <th>NID Number</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>ZIP Code</th>
                                    <th>Address</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                        <?php echo $row['city_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['zip_code']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['address']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        for ($num = 0; $num < strlen($row['password']); $num++) {
                                            if ($num == 0 || $num == 1 || $num == strlen($row['password']) - 2 || $num == strlen($row['password']) - 1) {
                                                echo $row['password'][$num];
                                            } else {
                                                echo '•';
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-danger' data-dismiss='modal'
                    onclick='passenger_delete_data(<?php echo $row['id']; ?>)'>Confirm</button>
            </div>
        </div>
        <?php
    }
}

?>