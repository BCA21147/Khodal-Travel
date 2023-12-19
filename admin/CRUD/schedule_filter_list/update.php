<?php

include('../db_connection.php');

$schedule_filter_type = array("Pick Up", "Drop");

extract($_GET);
extract($_POST);

// Single Schedule Filter Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `schedule_filter` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='schedule_filter_update_id_<?php echo $row['id'] ?> modal-content' id="schedule_filter_update_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE - SCHEDULE FILTER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="schedule_filter_name_update">From Time <span class="text-danger">*</span> </label>
                            <input type="time" class="form-control" id="schedule_filter_start_time_update"
                                name="schedule_filter_start_time_update" placeholder="Schedule Filter Start Time ..." required
                                value="<?php echo $row['start_time_24_hour'] ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="schedule_filter_name_update">To Time <span class="text-danger">*</span> </label>
                            <input type="time" class="form-control" id="schedule_filter_end_time_update"
                                name="schedule_filter_end_time_update" placeholder="Schedule Filter End Time ..." required
                                value="<?php echo $row['end_time_24_hour'] ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="schedule_filter_type_update">Schedule - Filter Type <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="schedule_filter_type_update" name="schedule_filter_type_update"
                                required>
                                <option value="">Filter Type</option>
                                <?php
                                for ($i = 0; $i < sizeof($schedule_filter_type); $i++) {
                                    ?>
                                    <option value="<?php echo $schedule_filter_type[$i]; ?>" <?php echo ($schedule_filter_type[$i] == $row['filter_type_hide']) ? 'selected' : '' ?>>
                                        <?php echo $schedule_filter_type[$i]; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
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
if (isset($_POST['update_id']) && isset($_POST['schedule_filter_start_time_update']) && isset($_POST['schedule_filter_end_time_update']) && isset($_POST['schedule_filter_type_update'])) {

    $schedule_filter_12_hour_start_time = date("h:i A", strtotime($schedule_filter_start_time_update));

    $schedule_filter_12_hour_end_time = date("h:i A", strtotime($schedule_filter_end_time_update));

    $schedule_filter_type_update_show = ($schedule_filter_type_update == "Pick Up") ? 'DEPARTURE TIME' : (($schedule_filter_type_update == "Drop") ? 'ARRIVAL TIME' : '');

    $query = "UPDATE `schedule_filter` SET `start_time_12_hour`='$schedule_filter_12_hour_start_time',`end_time_12_hour`='$schedule_filter_12_hour_end_time',`start_time_24_hour`='$schedule_filter_start_time_update',`end_time_24_hour`='$schedule_filter_end_time_update',`filter_type_hide`='$schedule_filter_type_update',`filter_type_show`='$schedule_filter_type_update_show' WHERE `id` = '$update_id'";
    mysqli_query($con, $query);

}

?>