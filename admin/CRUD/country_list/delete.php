<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

if (isset($_POST['delete_id'])) {

    $query = "DELETE FROM `country` WHERE `id` = '$delete_id'";
    mysqli_query($con, $query);

}

if (isset($_GET['id'])) {

    $query = "SELECT * FROM `country` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>DELETE COUNTRY</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>

                <h5>The Following Data Will Be Deleted.</h5>

                <div class='py-2'>
                    <div class='py-1 px-3 display-5' style='background-color: rgba(108, 117, 125,.3);font-weight: bold'>Country
                    </div>
                    <div class='table-responsive py-2'>
                        <table class='table table-hover table-bordered'>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Country Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $row['id']; ?>.
                                    </td>
                                    <td>
                                        <?php echo $row['country_name']; ?>
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
                    onclick='country_delete_data(<?php echo $row['id']; ?>)'>Confirm</button>
            </div>
        </div>
        <?php
    }
}

?>