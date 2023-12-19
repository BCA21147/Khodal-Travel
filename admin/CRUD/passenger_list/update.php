<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

// Single Passenger Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `passenger` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='passenger_update_id_<?php echo $row['id']; ?> modal-content' id="passenger_update_id">
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>UPDATE PASSENGER</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="passenger_first_name_update">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="passenger_first_name_update"
                                id="passenger_first_name_update" placeholder="First Name ..."
                                value="<?php echo $row['first_name']; ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="passenger_last_name_update">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="passenger_last_name_update"
                                id="passenger_last_name_update" placeholder="Last Name ..."
                                value="<?php echo $row['last_name']; ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="passenger_mobile_no_update">Mobile No. <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="passenger_mobile_no_update"
                                id="passenger_mobile_no_update" placeholder="Mobile No. ..."
                                value="<?php echo $row['mobile_no']; ?>" required minlength="10" maxlength="10">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="passenger_email_id_update">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="passenger_email_id_update"
                                id="passenger_email_id_update" placeholder="Email ..." value="<?php echo $row['email']; ?>"
                                required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="passenger_id_type_update">ID Type </label>
                            <input type="text" class="form-control" name="passenger_id_type_update"
                                id="passenger_id_type_update" placeholder="ID Type ..." value="<?php echo $row['id_type']; ?>">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="passenger_nid_number_update">NID/Password Number </label>
                            <input type="text" class="form-control" name="passenger_nid_number_update"
                                id="passenger_nid_number_update" placeholder="NID/Password Number ..."
                                value="<?php echo $row['nid_number']; ?>">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="passenger_country_name_update">Country Name <span class="text-danger">*</span> </label>
                            <select class="form-control" name="passenger_country_name_update" id="passenger_country_name_update"
                                required>
                                <option value="">Country Name</option>
                                <?php
                                $query = "SELECT * FROM `country`;";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    while ($country = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value='[<?php echo $country['id']; ?>]|[<?php echo $country['country_name']; ?>]' <?php echo ('[' . $country['id'] . ']|[' . $country['country_name'] . ']' == $row['country_name']) ? 'selected' : '' ?>>
                                            <?php echo $country['country_name']; ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="passenger_city_name_update">City Name </label>
                            <input type="text" class="form-control" name="passenger_city_name_update"
                                id="passenger_city_name_update" placeholder="City Name ..."
                                value="<?php echo $row['city_name']; ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="passenger_address_update">Address <span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" id="passenger_address_update"
                                name="passenger_address_update" placeholder='Address ...' rows="4"
                                required><?php echo $row['address']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="passenger_zip_code_update">ZIP Code </label>
                            <input type="text" class="form-control" name="passenger_zip_code_update"
                                id="passenger_zip_code_update" placeholder="ZIP Code ..."
                                value="<?php echo $row['zip_code']; ?>" minlength="6" maxlength="6">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-lg-none d-sm-block d-none">
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="passenger_password_update">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="passenger_password_update"
                                id="passenger_password_update" placeholder="Password ..." minlength="8"
                                value="<?php echo $row['password']; ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="passenger_retype_password_update">Re-Type Password <span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="passenger_retype_password_update"
                                id="passenger_retype_password_update" placeholder="Re-Type Password ..." minlength="8"
                                value="<?php echo $row['password']; ?>" required>
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

// Update Data :- 
if (isset($_POST['update_id']) && isset($_POST['passenger_first_name_update']) && isset($_POST['passenger_last_name_update']) && isset($_POST['passenger_mobile_no_update']) && isset($_POST['passenger_email_id_update']) && isset($_POST['passenger_id_type_update']) && isset($_POST['passenger_nid_number_update']) && isset($_POST['passenger_country_name_update']) && isset($_POST['passenger_city_name_update']) && isset($_POST['passenger_zip_code_update']) && isset($_POST['passenger_address_update']) && isset($_POST['passenger_password_update'])) {

    $query = "UPDATE `passenger` SET `first_name`='$passenger_first_name_update',`last_name`='$passenger_last_name_update',`mobile_no`='$passenger_mobile_no_update',`email`='$passenger_email_id_update',`id_type`='$passenger_id_type_update',`nid_number`='$passenger_nid_number_update',`country_name`='$passenger_country_name_update',`city_name`='$passenger_city_name_update',`zip_code`='$passenger_zip_code_update',`address`='$passenger_address_update',`password`='$passenger_password_update' WHERE `id` = '$update_id'";
    mysqli_query($con, $query);

}

?>