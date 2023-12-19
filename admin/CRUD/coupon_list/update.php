<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

// Single Coupon Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `coupon` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='coupon_update_id_<?php echo $row['id'] ?> modal-content' id="coupon_update_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE COUPON</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="coupon_code_update">Coupon Code <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="coupon_code_update" name="coupon_code_update"
                                placeholder="Coupon Code ..." required value="<?php echo $row['code']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="coupon_start_date_update">Start Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="coupon_start_date_update"
                                id="coupon_start_date_update" placeholder="Start Date ..." required
                                value="<?php echo $row['start_date']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="coupon_end_date_update">End Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="coupon_end_date_update" id="coupon_end_date_update"
                                placeholder="End Date ..." required value="<?php echo $row['end_date']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="coupon_trip_update">Trip <span class="text-danger">*</span> </label>
                            <select class="form-control" name="coupon_trip_update" id="coupon_trip_update" required>
                                <option value="">None</option>
                                <?php
                                $inner_query = "SELECT * FROM `trip` ORDER BY `id` ASC;";
                                $result_trip = mysqli_query($con, $inner_query);
                                if ($result_trip) {
                                    while ($trip = mysqli_fetch_assoc($result_trip)) {
                                        ?>
                                        <option
                                            value="[<?php echo $trip['id']; ?>]|[<?php echo substr(explode("|", $trip['trip_pick_up'])[1], 1, -1); ?>]|[<?php echo substr(explode("|", $trip['trip_drop'])[1], 1, -1); ?>]"
                                            <?php echo ($row['trip'] == "[" . $trip['id'] . "]|[" . substr(explode("|", $trip['trip_pick_up'])[1], 1, -1) . "]|[" . substr(explode("|", $trip['trip_drop'])[1], 1, -1) . "]") ? 'selected' : '' ?>>
                                            <?php echo substr(explode("|", $trip['trip_pick_up'])[1], 1, -1) . " - " . substr(explode("|", $trip['trip_drop'])[1], 1, -1) ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="coupon_discount_amount_update">Discount Amount <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="coupon_discount_amount_update"
                                id="coupon_discount_amount_update" placeholder="Discount Amount ..." min="0" required
                                value="<?php echo $row['amount']; ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="coupon_term_condition_update">Terms & Conditions <span
                                    class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" id="coupon_term_condition_update"
                                name="coupon_term_condition_update" placeholder='Terms & Conditions ...' rows="4"
                                required><?php echo $row['terms_conditions']; ?></textarea>
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
if (isset($_POST['update_id']) && isset($_POST['coupon_code_update']) && isset($_POST['coupon_start_date_update']) && isset($_POST['coupon_end_date_update']) && isset($_POST['coupon_trip_update']) && isset($_POST['coupon_discount_amount_update']) && isset($_POST['coupon_term_condition_update'])) {

    $query = "UPDATE `coupon` SET `code`='$coupon_code_update',`start_date`='$coupon_start_date_update',`end_date`='$coupon_end_date_update',`trip`='$coupon_trip_update',`amount`='$coupon_discount_amount_update',`terms_conditions`='$coupon_term_condition_update' WHERE `id` = '$update_id'";
    mysqli_query($con, $query);

}

?>