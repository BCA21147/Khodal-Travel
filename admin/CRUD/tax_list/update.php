<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

// Single Tax Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `tax` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='tax_update_id_<?php echo $row['id'] ?> modal-content' id="tax_update_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE TAX</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tax_name_update">Tax Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="tax_name_update" name="tax_name_update"
                                placeholder="Tax Name ..." required value="<?php echo $row['tax_name']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tax_value_update">Tax Value (%) <span class="text-danger">*</span> </label>
                            <input type="number" class="form-control" id="tax_value_update" name="tax_value_update"
                                placeholder="Tax Value Time ..." min="0" required value="<?php echo $row['tax_value']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label for="tax_reg_no_update">Reg No <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="tax_reg_no_update" name="tax_reg_no_update"
                                placeholder="Reg No. ..." required value="<?php echo $row['tax_reg_no']; ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="tax_status_update">Status <span class="text-danger">*</span> </label>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tax_status_update"
                                            id="tax_status_active_update" value="tax_status_active_update" required <?php echo ($row['status'] == 1) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="tax_status_active_update">
                                            Active
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tax_status_update"
                                            id="tax_status_disable_update" value="tax_status_disable_update" required <?php echo ($row['status'] == 0) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="tax_status_disable_update">
                                            Disable
                                        </label>
                                    </div>
                                </div>
                            </div>
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
if (isset($_POST['update_id']) && isset($_POST['tax_name_update']) && isset($_POST['tax_value_update']) && isset($_POST['tax_reg_no_update']) && isset($_POST['tax_status_update'])) {

    $status = $tax_status_update == "tax_status_active_update" ? 1 : 0;

    $query = "UPDATE `tax` SET `tax_name`='$tax_name_update',`tax_value`='$tax_value_update',`tax_reg_no`='$tax_reg_no_update',`status`='$status' WHERE `id` = '$update_id'";
    mysqli_query($con, $query);

}

?>