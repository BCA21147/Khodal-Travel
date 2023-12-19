<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

// Single Employee Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `employee` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='employee_update_id_<?php echo $row['id'] ?> modal-content' id="employee_update_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE EMPLOYEE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="employee_first_name_update">First Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="employee_first_name_update"
                                name="employee_first_name_update" placeholder="First Name ..." required
                                value="<?php echo $row['first_name']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="employee_last_name_update">Last Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="employee_last_name_update"
                                name="employee_last_name_update" placeholder="Last Name ..." required
                                value="<?php echo $row['last_name']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="employee_emp_type_update">Employee Type <span class="text-danger">*</span> </label>
                            <select class="form-control" name="employee_emp_type_update" id="employee_emp_type_update" required>
                                <option value="">Employee Type</option>
                                <?php
                                $query = "SELECT * FROM `employee_type`;";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    while ($emp_type = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value='[<?php echo $emp_type['id']; ?>]|[<?php echo $emp_type['emp_type']; ?>]' <?php echo ($row['emp_type'] == '[' . $emp_type['id'] . ']|[' . $emp_type['emp_type'] . ']') ? 'selected' : ''; ?>>
                                            <?php echo $emp_type['emp_type']; ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="employee_mobile_no_update">Mobile No. <span class="text-danger">*</span> </label>
                            <input type="tel" class="form-control" id="employee_mobile_no_update"
                                name="employee_mobile_no_update" placeholder="Mobile No. ..." required
                                value="<?php echo $row['mobile_no']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="employee_email_id_update">Email <span class="text-danger">*</span> </label>
                            <input type="email" class="form-control" id="employee_email_id_update"
                                name="employee_email_id_update" placeholder="Email ..." required
                                value="<?php echo $row['email']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="employee_blood_group_update">Blood Group </label>
                            <input type="text" class="form-control" id="employee_blood_group_update"
                                name="employee_blood_group_update" placeholder="Blood Group ..."
                                value="<?php echo $row['blood_group']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="employee_id_type_update">ID Type </label>
                            <input type="text" class="form-control" id="employee_id_type_update" name="employee_id_type_update"
                                placeholder="ID Type ..." value="<?php echo $row['id_type']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="employee_id_number_update">NID/Passport No. </label>
                            <input type="text" class="form-control" id="employee_id_number_update"
                                name="employee_id_number_update" placeholder="NID/Passport No. ..."
                                value="<?php echo $row['id_number']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="employee_country_name_update">Country Name <span class="text-danger">*</span> </label>
                            <select class="form-control" name="employee_country_name_update" id="employee_country_name_update"
                                required>
                                <option value="">Country Name</option>
                                <?php
                                $query = "SELECT * FROM `country`;";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    while ($country = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value='[<?php echo $country['id']; ?>]|[<?php echo $country['country_name']; ?>]' <?php echo ($row['country'] == '[' . $country['id'] . ']|[' . $country['country_name'] . ']') ? 'selected' : ''; ?>>
                                            <?php echo $country['country_name']; ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="employee_city_name_update">City Name </label>
                            <input type="text" class="form-control" id="employee_city_name_update"
                                name="employee_city_name_update" placeholder="City Name ..."
                                value="<?php echo $row['city']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="form-group">
                            <label for="employee_zip_code_update">ZIP Code. </label>
                            <input type="postal" class="form-control" id="employee_zip_code_update"
                                name="employee_zip_code_update" placeholder="ZIP Code. ..."
                                value="<?php echo $row['zip_code']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-9">
                        <div class="form-group">
                            <label for="employee_address_update">Address <span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" id="employee_address_update"
                                name="employee_address_update" placeholder='Address ...' rows="4"
                                required><?php echo $row['address']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 col-lg-4 p-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="employee_id_image_update" id="id_image_text_update">NID/Passport Image </label>
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <?php $disable = ($row['id_image'] != "" && file_exists("../../../Images/" . $row['id_image'])) ? 'disabled' : ''; ?>

                                            <input type="file" <?php echo $disable; ?> class="custom-file-input"
                                                id="employee_id_image_update" name="employee_id_image_update"
                                                accept=".jpg,.jpeg,.png,.gif" onchange="update_image_status('ID', 'UPDATE')">
                                            <label class="custom-file-label" for="employee_id_image_update"
                                                id="id_image_label_update">
                                                <?php echo ($row['id_image'] != "" && file_exists("../../../Images/" . $row['id_image'])) ? $row['id_image'] : 'No Choose files.'; ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <div class="text-center py-2">
                                        <div class="d-flex w-100 align-items-center">
                                            <div class="border w-100"></div>
                                            <div class="h6 w-100" style="font-weight: bold;">Image Preview</div>
                                            <div class="border w-100"></div>
                                        </div>
                                    </div>
                                    <div class="row d-flex overflow-auto p-2 m-0" id="id_image_preview_update"
                                        style="flex-wrap: nowrap;border: 2px dashed gray">
                                        <?php
                                        if ($row['id_image'] != "" && file_exists("../../../Images/" . $row['id_image'])) {
                                            ?>
                                            <div class="col-12 p-1 d-flex align-items-center img-close-parent">
                                                <img src='../Images/<?php echo $row['id_image']; ?>' alt="" class="w-100 border p-1"
                                                    style="border-radius: 10px">
                                                <div class="img-close-btn" title="Close"
                                                    onclick="delete_image_preview('<?php echo $row['id']; ?>','NID')">
                                                    <i class="fa-solid fa-close" style="transform: ">
                                                    </i>
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="w-100">
                                                <center>No Choose Images</center>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 p-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="employee_profile_image_update" id="profile_image_text_update">Profile Image
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="employee_profile_image_update"
                                                name="employee_profile_image_update" required accept=".jpg,.jpeg,.png,.gif"
                                                <?php echo ($row['profile_image'] != "" && file_exists("../../../Images/" . $row['profile_image'])) ? 'disabled' : ''; ?>
                                                onchange="update_image_status('Profile', 'UPDATE');">
                                            <label class="custom-file-label" for="employee_profile_image_update"
                                                id="profile_image_label_update">
                                                <?php echo ($row['profile_image'] != "" && file_exists("../../../Images/" . $row['profile_image'])) ? $row['profile_image'] : 'No Choose files.'; ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <div class="text-center py-2">
                                        <div class="d-flex w-100 align-items-center">
                                            <div class="border w-100"></div>
                                            <div class="h6 w-100" style="font-weight: bold;">Image Preview</div>
                                            <div class="border w-100"></div>
                                        </div>
                                    </div>
                                    <div class="row d-flex overflow-auto p-2 m-0" id="profile_image_preview_update"
                                        style="flex-wrap: nowrap;border: 2px dashed gray">
                                        <?php
                                        if ($row['profile_image'] != "" && file_exists("../../../Images/" . $row['profile_image'])) {
                                            ?>
                                            <div class="col-12 p-1 d-flex align-items-center img-close-parent">
                                                <img src='../Images/<?php echo $row['profile_image']; ?>' alt=""
                                                    class="w-100 border p-1" style="border-radius: 10px">
                                                <div class="img-close-btn" title="Close"
                                                    onclick="delete_image_preview('<?php echo $row['id']; ?>','PROFILE')">
                                                    <i class="fa-solid fa-close" style="transform: ">
                                                    </i>
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="w-100">
                                                <center>No Choose Images</center>
                                            </div>
                                            <?php
                                        }
                                        ?>
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
if (isset($_POST['update_id']) && isset($_POST['employee_first_name_update']) && isset($_POST['employee_last_name_update']) && isset($_POST['employee_emp_type_update']) && isset($_POST['employee_mobile_no_update']) && isset($_POST['employee_email_id_update']) && isset($_POST['employee_country_name_update']) && isset($_POST['employee_address_update'])) {

    $blood_group = (isset($_POST['employee_blood_group_update'])) ? $employee_blood_group_update : "";
    $id_type = (isset($_POST['employee_id_type_update'])) ? $employee_id_type_update : "";
    $id_number = (isset($_POST['employee_id_number_update'])) ? $employee_id_number_update : "";
    $city_name = (isset($_POST['employee_city_name_update'])) ? $employee_city_name_update : "";
    $zip_code = (isset($_POST['employee_zip_code_update'])) ? $employee_zip_code_update : "";
    $valid_ext = array("jpg", "jpeg", "png", "gif");

    $query = "SELECT * FROM `employee` WHERE `id` = $update_id";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);

    $profile_image = $data['profile_image'];
    $id_image = $data['id_image'];

    if (isset($_FILES['employee_profile_image_update']['name'])) {
        if (sizeof($data) != 0) {
            if (file_exists("../../../Images/" . $data['profile_image']) && $data['profile_image'] != "") {
                unlink("../../../Images/" . $data['profile_image']);
            }
        }
        $current_ext = pathinfo($_FILES['employee_profile_image_update']['name'], PATHINFO_EXTENSION);
        if (in_array($current_ext, $valid_ext)) {
            date_default_timezone_set('Asia/Kolkata');
            $profile_image = date("mdYhisA", time()) . "-1." . $current_ext;
            move_uploaded_file($_FILES['employee_profile_image_update']['tmp_name'], "../../../Images/" . $profile_image);
        }
    }

    if (isset($_FILES['employee_id_image_update']['name'])) {
        if (sizeof($data) != 0) {
            if (file_exists("../../../Images/" . $data['id_image']) && $data['id_image'] != "") {
                unlink("../../../Images/" . $data['id_image']);
            }
        }
        $current_ext = pathinfo($_FILES['employee_id_image_update']['name'], PATHINFO_EXTENSION);
        if (in_array($current_ext, $valid_ext)) {
            date_default_timezone_set('Asia/Kolkata');
            $id_image = date("mdYhisA", time()) . "-2." . $current_ext;
            move_uploaded_file($_FILES['employee_id_image_update']['tmp_name'], "../../../Images/" . $id_image);
        }
    }

    $query = "UPDATE `employee` SET `first_name`='$employee_first_name_update',`last_name`='$employee_last_name_update',`emp_type`='$employee_emp_type_update',`mobile_no`='$employee_mobile_no_update',`email`='$employee_email_id_update',`blood_group`='$blood_group',`id_type`='$id_type',`id_number`='$id_number',`country`='$employee_country_name_update',`city`='$city_name',`zip_code`='$zip_code',`address`='$employee_address_update',`id_image`='$id_image',`profile_image`='$profile_image' WHERE `id`=$update_id";
    mysqli_query($con, $query);

}

?>