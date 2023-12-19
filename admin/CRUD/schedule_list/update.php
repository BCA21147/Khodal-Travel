<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

// Single Schedule Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `schedule` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='schedule_update_id_<?php echo $row['id'] ?> modal-content' id="schedule_update_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE SCHEDULE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="schedule_name">Start Time <span class="text-danger">*</span> </label>
                    <input type="time" class="form-control" id="schedule_start_time_update" name="schedule_start_time_update"
                        placeholder="Schedule Start Time ..." required value="<?php echo $row['start_time_24_hour'] ?>">
                </div>
                <div class="form-group">
                    <label for="schedule_name">End Time <span class="text-danger">*</span> </label>
                    <input type="time" class="form-control" id="schedule_end_time_update" name="schedule_end_time_update"
                        placeholder="Schedule End Time ..." required value="<?php echo $row['end_time_24_hour'] ?>">
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
if (isset($_POST['update_id']) && isset($_POST['schedule_start_time_update']) && isset($_POST['schedule_end_time_update'])) {

    $schedule_12_hour_start_time = date("h:i A", strtotime($schedule_start_time_update));

    $schedule_12_hour_end_time = date("h:i A", strtotime($schedule_end_time_update));

    $query = "UPDATE `schedule` SET `start_time_12_hour`='$schedule_12_hour_start_time',`end_time_12_hour`='$schedule_12_hour_end_time',`start_time_24_hour`='$schedule_start_time_update',`end_time_24_hour`='$schedule_end_time_update' WHERE `id` = '$update_id'";
    mysqli_query($con, $query);

}

?>