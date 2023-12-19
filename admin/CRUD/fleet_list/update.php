<?php

include('../db_connection.php');

$fleet_layout = array("2×2", "1×1", "2×1", "1×2", "3×2", "2×3", "1×1×1");

extract($_GET);
extract($_POST);

// Single Fleet Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `fleet` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        ?>
        <div class='fleet_update_id_<?php echo $row['id']; ?> modal-content' id="fleet_update_id">
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>UPDATE FLEET</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class='form-group'>
                    <label for='fleet_type'>Fleet Type <span class='text-danger'>*</span> </label>
                    <input type='text' class='form-control' id='fleet_type_update' name="fleet_type_update"
                        placeholder='Fleet Type ...' required value="<?php echo $row['type']; ?>">
                </div>
                <div class='row justify-content-start justify-content-sm-center'>
                    <div class='col-10 col-sm-6 col-md-4'>
                        <div class='form-group'>
                            <label for='fleet_layout'>Fleet Layout <span class='text-danger'>*</span> </label>
                            <select class='form-control' id='fleet_layout_update' name="fleet_layout_update" required
                                onchange='set_seat_no("UPDATE")'>
                                <option value=''>Seat Type</option>
                                <?php
                                for ($i = 0; $i < sizeof($fleet_layout); $i++) {
                                    ?>
                                    <option value='<?php echo $fleet_layout[$i]; ?>' <?php echo ($row['layout'] == $fleet_layout[$i]) ? 'selected' : '' ?>>
                                        <?php echo $fleet_layout[$i]; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class='col-10 col-sm-6 col-md-4'>
                        <div class='form-group'>
                            <label for='layout_no_of_row'>Fleet Layout Line <span class='text-danger'>*</span> </label>
                            <input type='number' class='form-control' id='layout_no_of_row_update'
                                name="layout_no_of_row_update" placeholder='No Of Rows ...' min='0' max='15'
                                onkeyup='set_seat_no("UPDATE")' onkeydown='set_seat_no("UPDATE")' required
                                value="<?php echo $row['fleet_no_of_row']; ?>">
                        </div>
                    </div>
                    <div class='col-10 col-sm-6 col-md-4'>
                        <div class='form-group'>
                            <label for='total_no_of_seat'>Total Seat</label>
                            <input type='text' class='form-control' id='total_no_of_seat_update' name="total_no_of_seat_update"
                                placeholder='Total Seat' readonly value="<?php echo $row['total_seat']; ?>">
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='seat_number'>Seat Number</label>
                    <textarea type='text' class='form-control' id='seat_number_update' name="seat_number_update"
                        placeholder='Seat Number' rows='3' readonly><?php echo $row['seat_number']; ?></textarea>
                </div>
                <div class='row'>
                    <div class='col-4'>
                        <div class='form-group'>
                            <label for='last_seat_check'>Last Seat Check</label>
                            <div class='form-check d-flex align-items-center'>
                                <?php $checked = ($row['last_seat_check'] == 1) ? 'checked' : ''; ?>
                                <input class='form-check-input' type='checkbox' <?php echo $checked; ?>
                                    id='last_seat_check_update' name="last_seat_check_update" value="last_seat_check_update"
                                    onchange='update_last_seat("UPDATE")'>
                                <label class='form-check-label' for='last_seat_check_update'>
                                    Last Seat Check
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class='col-4'>
                        <div class='form-group'>
                            <label for='luggage_service'>Luggage Service <span class='text-danger'>*</span> </label>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='luggage_service_update'
                                    id='luggage_service_active_update' value='luggage_service_active_update' required <?php echo ($row['luggage_service'] == 1) ? 'checked' : ''; ?>>
                                <label class='form-check-label' for='luggage_service_active_update'>
                                    Active
                                </label>
                            </div>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='luggage_service_update'
                                    id='luggage_service_disable_update' value='luggage_service_disable_update' required <?php echo ($row['luggage_service'] == 0) ? 'checked' : ''; ?>>
                                <label class='form-check-label' for='luggage_service_disable_update'>
                                    Disable
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class='col-4'>
                        <div class='form-group'>
                            <label for='fleet_status'>Status <span class='text-danger'>*</span> </label>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='fleet_status_update'
                                    id='fleet_status_active_update' value='fleet_status_active_update' required <?php echo ($row['status'] == 1) ? 'checked' : ''; ?>>
                                <label class='form-check-label' for='fleet_status_active_update'>
                                    Active
                                </label>
                            </div>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='fleet_status_update'
                                    id='fleet_status_disable_update' value='fleet_status_disable_update' required <?php echo ($row['status'] == 0) ? 'checked' : ''; ?>>
                                <label class='form-check-label' for='fleet_status_disable_update'>
                                    Disable
                                </label>
                            </div>
                        </div>
                    </div>
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

// Update Fleet Data :- 
if (isset($_POST['update_id']) && isset($_POST['fleet_type_update']) && isset($_POST['fleet_layout_update']) && isset($_POST['layout_no_of_row_update']) && isset($_POST['total_no_of_seat_update']) && isset($_POST['seat_number_update']) && isset($_POST['luggage_service_update']) && isset($_POST['fleet_status_update'])) {

    $last_seat_check = (isset($_POST['last_seat_check_update'])) ? 1 : 0;
    $fleet_status = ($fleet_status_update == "fleet_status_active_update") ? 1 : 0;
    $luggage_service = ($luggage_service_update == "luggage_service_active_update") ? 1 : 0;

    $query = "UPDATE `fleet` SET `type`='$fleet_type_update',`layout`='$fleet_layout_update',`fleet_no_of_row`='$layout_no_of_row_update',`last_seat_check`='$last_seat_check',`total_seat`='$total_no_of_seat_update',`seat_number`='$seat_number_update',`status`='$fleet_status',`luggage_service`='$luggage_service' WHERE `id` = '$update_id'";
    mysqli_query($con, $query);

}

?>