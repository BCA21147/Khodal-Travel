<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

// Single Stand Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `stand` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='stand_update_id_<?php echo $row['id'] ?> modal-content' id="stand_update_id">
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>UPDATE STAND</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class='form-group'>
                    <label for='stand_name_update'>Stand Name <span class='text-danger'>*</span> </label>
                    <input type='text' class='form-control' id='stand_name_update' name="stand_name_update"
                        placeholder='Stand Name ...' required value="<?php echo $row['stand_name']; ?>">
                </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                <button type='submit' class='btn btn-success'>Submit</button>
            </div>
        </div>
        <?php
    }
}

// Update Data :- 
if (isset($_POST['update_id']) && isset($_POST['stand_name_update'])) {

    $query = "UPDATE `stand` SET `stand_name`='$stand_name_update' WHERE `id` = '$update_id'";
    mysqli_query($con, $query);

}

?>