<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

// Single Employee Type Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `employee_type` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='employee_type_update_id_<?php echo $row['id'] ?> modal-content' id="employee_type_update_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE - EMPLOYEE TYPE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="emp_type_update">Employee Type <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="emp_type_update" name="emp_type_update"
                                placeholder="Employee Type ..." required value="<?php echo $row['emp_type']; ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="emp_details_update">Employee Details <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="emp_details_update" name="emp_details_update"
                                placeholder="Employee Details ..." required value="<?php echo $row['emp_details']; ?>">
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
if (isset($_POST['update_id']) && isset($_POST['emp_type_update']) && isset($_POST['emp_details_update'])) {

    $query = "UPDATE `employee_type` SET `emp_type`='$emp_type_update',`emp_details`='$emp_details_update' WHERE `id` = '$update_id'";
    mysqli_query($con, $query);

}

?>