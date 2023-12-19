<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

// Single Vehical Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `vehical` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="vehical_update_id_<?php echo $row['id'] ?> modal-content" id="vehical_update_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD VEHICAL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row justify-content-center justify-content-sm-start">
                    <div class="col-11 col-sm-6">
                        <div class="form-group">
                            <label for="vehical_reg_no_update">Reg No. <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="vehical_reg_no" id="vehical_reg_no_update"
                                placeholder="Reg No. ..." required value="<?php echo $row['reg_no']; ?>">
                        </div>
                    </div>
                    <div class="col-11 col-sm-6">
                        <div class="form-group">
                            <label for="vehical_eng_no_update">Eng No. <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="vehical_eng_no" id="vehical_eng_no_update"
                                placeholder="Eng No. ..." required value="<?php echo $row['eng_no']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center justify-content-sm-start">
                    <div class="col-11 col-sm-6">
                        <div class="form-group">
                            <label for="vehical_model_no_update">Model No. <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="vehical_model_no" id="vehical_model_no_update"
                                placeholder="Model No. ..." required value="<?php echo $row['model_no']; ?>">
                        </div>
                    </div>
                    <div class="col-11 col-sm-6">
                        <div class="form-group">
                            <label for="vehical_fleet_type_update">Fleet Type <span class="text-danger">*</span> </label>
                            <select class="form-control" name="vehical_fleet_type" id="vehical_fleet_type_update" required>
                                <option value="">Fleet Type</option>
                                <?php
                                $query = "SELECT * FROM `fleet`;";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    while ($fleet = mysqli_fetch_assoc($result)) {
                                        $selected = ($row['fleet_type'] == "[" . $fleet['id'] . "]|[" . $fleet['type'] . "]") ? 'selected' : '';
                                        ?>
                                        <option <?php echo $selected; ?>
                                            value='[<?php echo $fleet['id']; ?>]|[<?php echo $fleet['type']; ?>]'>
                                            <?php echo $fleet['type']; ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center justify-content-sm-start">
                    <div class="col-11 col-sm-6">
                        <div class="form-group">
                            <label for="vehical_chassis_no_update">Chassis No. <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="vehical_chassis_no" id="vehical_chassis_no_update"
                                placeholder="Chassis No. ..." required value="<?php echo $row['chassis_no']; ?>">
                        </div>
                    </div>
                    <div class="col-11 col-sm-6">
                        <div class="form-group">
                            <label for="vehical_owner_update">Owner <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="vehical_owner" id="vehical_owner_update"
                                placeholder="Owner ..." required value="<?php echo $row['owner']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center justify-content-sm-start">
                    <div class="col-11 col-sm-6">
                        <div class="form-group">
                            <label for="vehical_owner_mobile_update">Owner Mobile <span class="text-danger">*</span> </label>
                            <input type="tel" class="form-control" name="vehical_owner_mobile" id="vehical_owner_mobile_update"
                                placeholder="Owner Mobile ..." required value="<?php echo $row['owner_mobile']; ?>">
                        </div>
                    </div>
                    <div class="col-11 col-sm-6">
                        <div class="form-group">
                            <label for="vehical_company_update">Company <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="vehical_company" id="vehical_company_update"
                                placeholder="Company ..." required value="<?php echo $row['company']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="vehical_status_update">Status <span class="text-danger">*</span> </label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="vehical_status"
                                            id="vehical_status_active_update" value="vehical_status_active" checked required
                                            <?php echo ($row['status'] == 1) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="vehical_status_active_update">
                                            Active
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="vehical_status"
                                            id="vehical_status_disable_update" value="vehical_status_disable" required <?php echo ($row['status'] == 0) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="vehical_status_disable_update">
                                            Disable
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="vehical_bus_image_update" id="update_image_required">
                                <?php echo (sizeof(unserialize($row['images'])) == 0) ? 'Bus Image <span class="text-danger">*</span>' : 'Bus Image'; ?>
                            </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="vehical_bus_image_update"
                                        name="bus_images[]" multiple accept=".jpg,.jpeg,.png,.gif" <?php echo (sizeof(unserialize($row['images'])) == 0) ? 'required' : ''; ?>
                                        onchange="update_image_status('UPDATE')">
                                    <label class="custom-file-label" for="vehical_bus_image_update" id="bus_image_label_update">
                                        No Choose files.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <div class="text-center py-2">
                                        <div class="d-flex w-100 align-items-center">
                                            <div class="border w-100"></div>
                                            <div class="h6 w-100" style="font-weight: bold;">Image Edit</div>
                                            <div class="border w-100"></div>
                                        </div>
                                    </div>
                                    <div class="row d-flex overflow-auto p-2 m-0 h-100" id="bus_image_edit_preview"
                                        style="flex-wrap: nowrap;border: 2px dashed gray">
                                        <?php
                                        $images = unserialize($row['images']);
                                        if (sizeof($images) != 0) {
                                            for ($img = 0; $img < sizeof($images); $img++) {
                                                ?>
                                                <div class="col-12 p-1 d-flex align-items-center img-close-parent">
                                                    <img src='../Images/<?php echo $images[$img]; ?>' alt="" class="w-100 border p-1"
                                                        style="border-radius: 10px">
                                                    <div class="img-close-btn" title="Close"
                                                        onclick="delete_image_preview('<?php echo $row['id'] . '_' . $img; ?>')">
                                                        <i class="fa-solid fa-close" style="transform: ">
                                                        </i>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="w-100">
                                                <center>No Images Founded.</center>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <div class="text-center py-2">
                                        <div class="d-flex w-100 align-items-center">
                                            <div class="border w-100"></div>
                                            <div class="h6 w-100" style="font-weight: bold;">Image Preview</div>
                                            <div class="border w-100"></div>
                                        </div>
                                    </div>
                                    <div class="row d-flex overflow-auto p-2 m-0" id="bus_image_preview_update"
                                        style="flex-wrap: nowrap;border: 2px dashed gray">
                                        <div class="w-100">
                                            <center>No Choose Images</center>
                                        </div>
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

// Update Vehical Data :- 
if (isset($_POST['update_id']) && isset($_POST['vehical_reg_no']) && isset($_POST['vehical_eng_no']) && isset($_POST['vehical_model_no']) && isset($_POST['vehical_fleet_type']) && isset($_POST['vehical_chassis_no']) && isset($_POST['vehical_owner']) && isset($_POST['vehical_owner_mobile']) && isset($_POST['vehical_company']) && isset($_POST['vehical_status']) && count($_FILES['bus_images']['name']) >= 0) {


    $new_images = array();

    if (count($_FILES['bus_images']['name']) != 0) {
        foreach ($_FILES['bus_images']['name'] as $key => $value) {

            $valid_ext = array("jpg", "jpeg", "png", "gif");

            if (in_array(pathinfo($value, PATHINFO_EXTENSION), $valid_ext)) {
                date_default_timezone_set('Asia/Kolkata');
                $new_name = date("mdYhisA", time()) . "-" . ($key + 1) . "." . pathinfo($value, PATHINFO_EXTENSION);
                array_push($new_images, $new_name);
                move_uploaded_file($_FILES['bus_images']['tmp_name'][$key], "../../../Images/" . $new_name);
            }
        }
    }
    $status = ($vehical_status == 'vehical_status_active') ? 1 : 0;

    $query = "SELECT * FROM `vehical` WHERE `id`= $update_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        $new_images = array_merge($new_images, unserialize($row['images']));

        $query = "UPDATE `vehical` SET `reg_no`='$vehical_reg_no',`eng_no`='$vehical_eng_no',`model_no`='$vehical_model_no',`fleet_type`='$vehical_fleet_type',`chassis_no`='$vehical_chassis_no',`owner`='$vehical_owner',`owner_mobile`='$vehical_owner_mobile',`company`='$vehical_company',`status`='$status',`images`='" . serialize($new_images) . "' WHERE `id`=$update_id";
        mysqli_query($con, $query);

    }
}

?>