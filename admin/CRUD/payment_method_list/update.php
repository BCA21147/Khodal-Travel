<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

// Single Payment Method Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `payment_method` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='payment_method_update_id_<?php echo $row['id'] ?> modal-content' id="payment_method_update_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE - PAYMENT METHOD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="payment_method_name_update">Payment Method Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="payment_method_name_update"
                                name="payment_method_name_update" placeholder="Payment Method Name ..." required
                                value="<?php echo $row['method_name']; ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="payment_method_status_update">Status <span class="text-danger">*</span> </label>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method_status_update"
                                            id="payment_method_status_active_update" value="payment_method_status_active_update"
                                            required <?php echo ($row['status'] == 1) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="payment_method_status_active_update">
                                            Active
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method_status_update"
                                            id="payment_method_status_disable_update"
                                            value="payment_method_status_disable_update" required <?php echo ($row['status'] == 0) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="payment_method_status_disable_update">
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
if (isset($_POST['update_id']) && isset($_POST['payment_method_name_update']) && isset($_POST['payment_method_status_update'])) {

    $status = $payment_method_status_update == "payment_method_status_active_update" ? 1 : 0;

    $query = "UPDATE `payment_method` SET `method_name`='$payment_method_name_update',`status`='$status' WHERE `id` = '$update_id'";
    mysqli_query($con, $query);

}

?>