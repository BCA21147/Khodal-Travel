<?php

include('../db_connection.php');

$weekend = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

extract($_GET);
extract($_POST);

// Single Trip Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `trip` WHERE id = $id";
    $result_trip = mysqli_query($con, $query);
    if ($result_trip) {
        $trip = mysqli_fetch_assoc($result_trip);
        ?>
        <div class='trip_update_id_<?php echo $trip['id'] ?> modal-content' id="trip_update_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE TRIP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row m-0 p-2 my-2" style="background: rgba(0,0,0,0.03)">
                    <div class="col-12" style="background: rgba(0,0,0,0.1)">
                        <h6 class="py-2 mb-0" style="font-weight: bold;">Trip Section</h6>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_pick_up_update">Pick Up <span class="text-danger">*</span> </label>
                                    <select class="form-control" name="trip_pick_up_update" id="trip_pick_up_update" required>
                                        <option value="">None</option>
                                        <?php
                                        $query = "SELECT * FROM `location` ORDER BY `location_name` ASC;";
                                        $result = mysqli_query($con, $query);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['location_name']; ?>]" <?php echo ($trip['trip_pick_up'] == "[" . $row['id'] . "]|[" . $row['location_name'] . "]") ? 'selected' : ''; ?>><?php echo $row['location_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_drop_update">Drop <span class="text-danger">*</span> </label>
                                    <select class="form-control" name="trip_drop_update" id="trip_drop_update" required>
                                        <option value="">None</option>
                                        <?php
                                        $query = "SELECT * FROM `location` ORDER BY `location_name` ASC;";
                                        $result = mysqli_query($con, $query);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['location_name']; ?>]" <?php echo ($trip['trip_drop'] == "[" . $row['id'] . "]|[" . $row['location_name'] . "]") ? 'selected' : ''; ?>><?php echo $row['location_name'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_stoppage_point_update">Stoppage Point <span class="text-danger">*</span> </label>
                                    <select class="form-control" name="trip_stoppage_point_update[]" id="trip_stoppage_point_update" multiple
                                        required>
                                        <option value="" disabled>None</option>
                                        <?php
                                        $query = "SELECT * FROM `location` ORDER BY `location_name` ASC;";
                                        $result = mysqli_query($con, $query);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['location_name']; ?>]" <?php echo (in_array("[".$row['id']."]|[".$row['location_name']."]",unserialize($trip['stoppage_point'])))?'selected':'' ?>><?php echo $row['location_name'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_schedule_time_update">Schedule Time <span class="text-danger">*</span> </label>
                                    <select class="form-control" name="trip_schedule_time_update" id="trip_schedule_time_update" required>
                                        <option value="">None</option>
                                        <?php
                                        $query = "SELECT * FROM `schedule`";
                                        $result = mysqli_query($con, $query);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option
                                                    value="[<?php echo $row['id']; ?>]|[<?php echo $row['start_time_12_hour'] . ' - ' . $row['end_time_12_hour']; ?>]" <?php echo ($trip['schedule_time'] == "[" . $row['id'] . "]|[" . $row['start_time_12_hour'] . " - " . $row['end_time_12_hour'] . "]") ? 'selected' : ''; ?>>
                                                    <?php echo $row['start_time_12_hour']; ?> - <?php echo $row['end_time_12_hour']; ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 p-2 my-2" style="background: rgba(0,0,0,0.03)">
                    <div class="col-12" style="background: rgba(0,0,0,0.1)">
                        <h6 class="py-2 mb-0" style="font-weight: bold;">Boarding Point</h6>
                    </div>
                    <div id="trip_boarding_point_update" class="w-100">
                        <?php
                            $boarding = unserialize($trip['boarding_point']);
                            for($num=0;$num<sizeof($boarding);$num++) {
                                ?>
                                <div class="col-12" id="trip_boarding_point_update_part_<?php echo ($num+1); ?>">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="trip_boarding_update_time_<?php echo ($num+1); ?>">Select Time <span class="text-danger">*</span>
                                                </label>
                                                <input type="time" class="form-control" id="trip_boarding_update_time_<?php echo ($num+1); ?>"
                                                    name="trip_boarding_update_time_<?php echo ($num+1); ?>" placeholder="Select Time ..." required value="<?php echo $boarding[$num]['boarding_time_24_hour']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="trip_boarding_update_bus_stand_<?php echo ($num+1); ?>">Bus Stand <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="trip_boarding_update_bus_stand_<?php echo ($num+1); ?>"
                                                    id="trip_boarding_update_bus_stand_<?php echo ($num+1); ?>" required>
                                                    <option value="">None</option>
                                                    <?php
                                                    $query = "SELECT * FROM `stand` ORDER BY `stand_name` ASC;";
                                                    $result = mysqli_query($con, $query);
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['stand_name']; ?>]" <?php echo ($boarding[$num]['boarding_bus_stand']=="[".$row['id']."]|[".$row['stand_name']."]")?'selected':''; ?>>
                                                                <?php echo $row['stand_name'] ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="trip_boarding_update_details_<?php echo ($num+1); ?>">Details </label>
                                                <input type="text" class="form-control" name="trip_boarding_update_details_<?php echo ($num+1); ?>"
                                                    id="trip_boarding_update_details_<?php echo ($num+1); ?>" placeholder="Details ..." value="<?php echo $boarding[$num]['boarding_details']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="h-100 d-flex justify-content-center align-items-center"
                                                id="boarding_point_update_button_<?php echo ($num+1); ?>">
                                                <?php
                                                    if($num!=sizeof($boarding)-1){
                                                        ?>
                                                        <button type="button" class="btn btn-danger" onclick="remove_boarding_dropping_point(<?php echo ($num+1); ?>,'Boarding','UPDATE')"><i class="fa-solid fa-xmark"></i></button>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <button type="button" class="btn btn-primary" onclick="add_boarding_dropping_point(<?php echo ($num+1); ?>,'Boarding','UPDATE')"><i
                                                        class="fa-solid fa-plus"></i></button>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="row m-0 p-2 my-2" style="background: rgba(0,0,0,0.03)">
                    <div class="col-12" style="background: rgba(0,0,0,0.1)">
                        <h6 class="py-2 mb-0" style="font-weight: bold;">Dropping Point</h6>
                    </div>
                    <div id="trip_dropping_point_update" class="w-100">
                        <?php
                            $dropping = unserialize($trip['dropping_point']);
                            for($num=0;$num<sizeof($dropping);$num++) {
                                ?>
                                <div class="col-12" id="trip_dropping_point_update_part_<?php echo ($num+1); ?>">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="trip_dropping_update_time_<?php echo ($num+1); ?>">Select Time <span class="text-danger">*</span>
                                                </label>
                                                <input type="time" class="form-control" id="trip_dropping_update_time_<?php echo ($num+1); ?>"
                                                    name="trip_dropping_update_time_<?php echo ($num+1); ?>" placeholder="Select Time ..." required value="<?php echo $dropping[$num]['dropping_time_24_hour']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="trip_dropping_update_bus_stand_<?php echo ($num+1); ?>">Bus Stand <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="trip_dropping_update_bus_stand_<?php echo ($num+1); ?>"
                                                    id="trip_dropping_update_bus_stand_<?php echo ($num+1); ?>" required>
                                                    <option value="">None</option>
                                                    <?php
                                                    $query = "SELECT * FROM `stand` ORDER BY `stand_name` ASC;";
                                                    $result = mysqli_query($con, $query);
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['stand_name']; ?>]" <?php echo ($dropping[$num]['dropping_bus_stand']=="[".$row['id']."]|[".$row['stand_name']."]")?'selected':''; ?>>
                                                                <?php echo $row['stand_name'] ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="trip_dropping_update_details_<?php echo ($num+1); ?>">Details </label>
                                                <input type="text" class="form-control" name="trip_dropping_update_details_<?php echo ($num+1); ?>"
                                                    id="trip_dropping_update_details_<?php echo ($num+1); ?>" placeholder="Details ..." value="<?php echo $dropping[$num]['dropping_details']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="h-100 d-flex justify-content-center align-items-center"
                                                id="dropping_point_update_button_<?php echo ($num+1); ?>">
                                                <?php
                                                    if($num!=sizeof($dropping)-1){
                                                        ?>
                                                        <button type="button" class="btn btn-danger" onclick="remove_boarding_dropping_point(<?php echo ($num+1); ?>,'Dropping','UPDATE')"><i class="fa-solid fa-xmark"></i></button>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <button type="button" class="btn btn-primary" onclick="add_boarding_dropping_point(<?php echo ($num+1); ?>,'Dropping','UPDATE')"><i
                                                        class="fa-solid fa-plus"></i></button>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="row m-0 p-2 my-2" style="background: rgba(0,0,0,0.03)">
                    <div class="col-12" style="background: rgba(0,0,0,0.1)">
                        <h6 class="py-2 mb-0" style="font-weight: bold;">Seat, Fair, Time</h6>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_children_seat_update">Children Seat </label>
                                    <input type="number" class="form-control" name="trip_children_seat_update" id="trip_children_seat_update"
                                        placeholder="Children Seat ..." min="0" value="<?php echo $trip['children_seat']?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_children_fair_update">Children Fair </label>
                                    <input type="number" class="form-control" name="trip_children_fair_update" id="trip_children_fair_update"
                                        placeholder="Children Fair ..." min="0" value="<?php echo $trip['children_fair']?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_special_seat_update">Special Seat </label>
                                    <input type="number" class="form-control" name="trip_special_seat_update" id="trip_special_seat_update"
                                        placeholder="Special Seat ..." min="0" value="<?php echo $trip['special_seat']?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_special_fair_update">Special Fair </label>
                                    <input type="number" class="form-control" name="trip_special_fair_update" id="trip_special_fair_update"
                                        placeholder="Special Fair ..." min="0" value="<?php echo $trip['special_fair']?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_adult_fair_update">Adult Fair <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="trip_adult_fair_update" id="trip_adult_fair_update"
                                        placeholder="Adult Fair ..." min="0" value="<?php echo $trip['adult_fair']?>" required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_distance_update">Distance <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="trip_distance_update" id="trip_distance_update"
                                        placeholder="Distance ..." min="0" value="<?php echo explode(" ",$trip['distance'])[0];?>" required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_approximate_time_update">Approximate Time <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="trip_approximate_time_update"
                                        id="trip_approximate_time_update" placeholder="Approximate Time ..." min="0" value="<?php echo $trip['approximate_time']?>" required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_start_date_update">Trip Start Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="trip_start_date_update" id="trip_start_date_update"
                                        placeholder="Trip Start Date ..." value="<?php echo $trip['start_date']?>" required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_weekend_update">Weekend </label>
                                    <select class="form-control" name="trip_weekend_update[]" id="trip_weekend_update" multiple>
                                        <option value="" disabled>None</option>
                                        <?php
                                        if ($weekend) {
                                            for ($day = 0; $day < sizeof($weekend); $day++) {
                                                ?>
                                                <option value="<?php echo $weekend[$day]; ?>" <?php echo (in_array($weekend[$day],unserialize($trip['weekend'])))?'selected':'' ?>>
                                                    <?php echo $weekend[$day]; ?>
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
                                    <label for="trip_facility_update">Facility </label>
                                    <select class="form-control" name="trip_facility_update[]" id="trip_facility_update" multiple>
                                        <option value="" disabled>None</option>
                                        <?php
                                        $query = "SELECT * FROM `facility` ORDER BY `facility_name` ASC;";
                                        $result = mysqli_query($con, $query);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['facility_name']; ?>]" <?php echo (in_array("[".$row['id']."]|[".$row['facility_name']."]",unserialize($trip['facility'])))?'selected':'' ?>><?php echo $row['facility_name'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 p-2 my-2" style="background: rgba(0,0,0,0.03)">
                    <div class="col-12" style="background: rgba(0,0,0,0.1)">
                        <h6 class="py-2 mb-0" style="font-weight: bold;">Vehicle</h6>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_fleet_type_update">Fleet Type <span class="text-danger">*</span></label>
                                    <select class="form-control" name="trip_fleet_type_update" id="trip_fleet_type_update" required onchange="set_vehical_list()">
                                        <option value="">None</option>
                                        <?php
                                        $query = "SELECT * FROM `fleet` ORDER BY `type` ASC;";
                                        $result = mysqli_query($con, $query);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['type']; ?>]" <?php echo ($trip['fleet_type']=="[".$row['id']."]|[".$row['type']."]")?'selected':'' ?>><?php echo $row['type'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_vehical_list_update">Vehicle List <span class="text-danger">*</span></label>
                                    <select class="form-control" name="trip_vehical_list_update" id="trip_vehical_list_update" required>
                                        <option value="">None</option>
                                        <?php
                                        $id = explode("|",$trip['fleet_type'])[0];
                                        $query = "SELECT * FROM vehical WHERE fleet_type LIKE '$id|[%%]';";
                                        $result = mysqli_query($con, $query);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['reg_no']; ?>]" <?php echo ($trip['vehical_list']=="[".$row['id']."]|[".$row['reg_no']."]")?'selected':'' ?>><?php echo $row['reg_no'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="trip_company_name_update">Company Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="trip_company_name_update" id="trip_company_name_update"
                                        placeholder="Company Name ..." value="<?php echo $trip['company_name']?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 p-2 my-2" style="background: rgba(0,0,0,0.03)">
                    <div class="col-12" style="background: rgba(0,0,0,0.1)">
                        <h6 class="py-2 mb-0" style="font-weight: bold;">Employee</h6>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <?php
                            $data = unserialize($trip['employee']);
                            $query = "SELECT * FROM `employee_type`;";
                            $result = mysqli_query($con, $query);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $trip_emp = isset($data[strtolower($row['emp_type'])])?$data[strtolower($row['emp_type'])]:"";
                                    ?>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="trip_update_<?php echo strtolower($row['emp_type']) . "_" . $row['id']; ?>">
                                                <?php echo $row['emp_type']; ?> List <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control"
                                                name="trip_update_<?php echo strtolower($row['emp_type']) . "_" . $row['id']; ?>[]"
                                                id="trip_update_<?php echo strtolower($row['emp_type']) . "_" . $row['id']; ?>" required
                                                multiple>
                                                <option value="[-]|[None]|[None]" <?php echo ($trip_emp!=""?in_array("[-]|[None]|[None]",$trip_emp):false)?'selected':''; ?>>None</option>
                                                <?php
                                                $id = $row['id'];
                                                $query = "SELECT * FROM `employee` WHERE `emp_type` LIKE '[$id]|[%%]' ORDER BY `first_name` ASC, `last_name` ASC;";
                                                $emp_result = mysqli_query($con, $query);
                                                if ($emp_result) {
                                                    while ($emp = mysqli_fetch_assoc($emp_result)) {
                                                        ?>
                                                        <option
                                                            value="[<?php echo $emp['id']; ?>]|[<?php echo $emp['first_name']; ?>]|[<?php echo $emp['last_name']; ?>]" <?php echo (in_array("[".$emp['id']."]|[".$emp['first_name']."]|[".$emp['last_name']."]",($trip_emp!=""?$trip_emp:array())))?'selected':''; ?>>
                                                            <?php echo $emp['first_name'] . " " . $emp['last_name']; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row m-0 p-2 my-2">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="trip_status_update">Status <span class="text-danger">*</span> </label>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="trip_status_update" id="trip_status_active_update"
                                            value="trip_status_active_update" checked required <?php echo ($trip['status']==1)?'checked':''; ?>>
                                        <label class="form-check-label" for="trip_status_active_update">
                                            Active
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="trip_status_update" id="trip_status_disable_update"
                                            value="trip_status_disable_update" required <?php echo ($trip['status']==0)?'checked':''; ?>>
                                        <label class="form-check-label" for="trip_status_disable_update">
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
if (isset($_POST['update_id']) && isset($_POST['trip_pick_up_update']) && isset($_POST['trip_drop_update']) && isset($_POST['trip_stoppage_point_update']) && isset($_POST['trip_schedule_time_update']) && isset($_POST['boarding_point_element_update']) && isset($_POST['dropping_point_element_update']) && isset($_POST['trip_children_seat_update']) && isset($_POST['trip_children_fair_update']) && isset($_POST['trip_special_seat_update']) && isset($_POST['trip_special_fair_update']) && isset($_POST['trip_adult_fair_update']) && isset($_POST['trip_distance_update']) && isset($_POST['trip_approximate_time_update']) && isset($_POST['trip_start_date_update']) && isset($_POST['trip_fleet_type_update']) && isset($_POST['trip_vehical_list_update']) && isset($_POST['trip_company_name_update']) && isset($_POST['trip_status_update'])) {

    $stoppage_point = (isset($_POST['trip_stoppage_point_update'])) ? $trip_stoppage_point_update : array();
    $weekend = (isset($_POST['trip_weekend_update'])) ? $trip_weekend_update : array();
    $facility = (isset($_POST['trip_facility_update'])) ? $trip_facility_update : array();
    $boarding_point = array();
    $dropping_point = array();
    $employee = array();

    for ($boarding = 1; $boarding < $boarding_point_element_update + 1; $boarding++) {
        if (isset(${"trip_boarding_update_time_$boarding"}) && isset(${"trip_boarding_update_bus_stand_$boarding"}) && isset(${"trip_boarding_update_details_$boarding"})) {
            $arr = array();
            $arr["boarding_time_12_hour"] = date("h:i A", strtotime(${"trip_boarding_update_time_$boarding"}));
            $arr["boarding_time_24_hour"] = ${"trip_boarding_update_time_$boarding"};
            $arr["boarding_bus_stand"] = ${"trip_boarding_update_bus_stand_$boarding"};
            $arr["boarding_details"] = ${"trip_boarding_update_details_$boarding"};
            array_push($boarding_point, $arr);
        }
    }
    for ($dropping = 1; $dropping < $dropping_point_element_update + 1; $dropping++) {
        if (isset(${"trip_dropping_update_time_$dropping"}) && isset(${"trip_dropping_update_bus_stand_$dropping"}) && isset(${"trip_dropping_update_details_$dropping"})) {
            $arr = array();
            $arr["dropping_time_12_hour"] = date("h:i A", strtotime(${"trip_dropping_update_time_$dropping"}));
            $arr["dropping_time_24_hour"] = ${"trip_dropping_update_time_$dropping"};
            $arr["dropping_bus_stand"] = ${"trip_dropping_update_bus_stand_$dropping"};
            $arr["dropping_details"] = ${"trip_dropping_update_details_$dropping"};
            array_push($dropping_point, $arr);
        }
    }
    $query = "SELECT * FROM `employee_type`;";
    $result = mysqli_query($con, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (isset(${"trip_update_" . strtolower($row['emp_type']) . "_" . $row['id']})) {
                $employee[strtolower($row['emp_type'])] = ${"trip_update_" . strtolower($row['emp_type']) . "_" . $row['id']};
            } else {
                $employee[strtolower($row['emp_type'])] = array();
            }
        }
    }
    $status = ($trip_status_update == "trip_status_active_update") ? 1 : 0;
    
    $query = "UPDATE `trip` SET `trip_pick_up`='$trip_pick_up_update',`trip_drop`='$trip_drop_update',`stoppage_point`='" . serialize($stoppage_point) . "',`schedule_time`='$trip_schedule_time_update',`boarding_point`='" . serialize($boarding_point) . "',`dropping_point`='" . serialize($dropping_point) . "',`children_seat`='$trip_children_seat_update',`children_fair`='$trip_children_fair_update',`special_seat`='$trip_special_seat_update',`special_fair`='$trip_special_fair_update',`adult_fair`='$trip_adult_fair_update',`distance`='" . $trip_distance_update . " KM" . "',`approximate_time`='$trip_approximate_time_update',`start_date`='$trip_start_date_update',`weekend`='" . serialize($weekend) . "',`facility`='" . serialize($facility) . "',`fleet_type`='$trip_fleet_type_update',`vehical_list`='$trip_vehical_list_update',`company_name`='$trip_company_name_update',`employee`='" . serialize($employee) . "',`status`='$status' WHERE `id` = '$update_id'";
    mysqli_query($con, $query);

}

?>