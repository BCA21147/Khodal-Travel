<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

// Single Facility Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `facility` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='facility_update_id_<?php echo $row['id'] ?> modal-content' id="facility_update_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE FACILITY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="facility_name_update">Facility Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="facility_name_update" name="facility_name_update"
                                placeholder="Facility Name ..." required value="<?php echo $row['facility_name']; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
        <?php
    }
}

// Update Data :- 
if (isset($_POST['update_id']) && isset($_POST['facility_name_update'])) {

    $query = "UPDATE `facility` SET `facility_name`='$facility_name_update' WHERE `id` = '$update_id'";
    mysqli_query($con, $query);

}

?>