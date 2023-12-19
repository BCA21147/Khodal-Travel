<?php

include('../db_connection.php');

?>
<div class="row justify-content-center p-lg-4 p-md-2 p-0">
    <div class="col-12">
        <div class="card m-0">
            <div class="h5 fw-bold px-2 px-md-4 py-3 m-0">Book Ticket</div>
            <hr class="m-0">
            <div class="px-2 px-md-4 py-3">
                <form method="post" id="book_ticket" autocomplete="off" onsubmit="book_ticket()">
                    <div class="row m-0">
                        <div class="col-12 col-md-10">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="trip_pick_up">Pick Up <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="trip_pick_up" id="trip_pick_up" required>
                                            <option value="">None</option>
                                            <?php
                                            $query = "SELECT * FROM `location` ORDER BY `location_name` ASC;";
                                            $result = mysqli_query($con, $query);
                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <option
                                                        value="[<?php echo $row['id']; ?>]|[<?php echo $row['location_name']; ?>]">
                                                        <?php echo $row['location_name'] ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="trip_drop">Drop <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="trip_drop" id="trip_drop" required>
                                            <option value="">None</option>
                                            <?php
                                            $query = "SELECT * FROM `location` ORDER BY `location_name` ASC;";
                                            $result = mysqli_query($con, $query);
                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <option
                                                        value="[<?php echo $row['id']; ?>]|[<?php echo $row['location_name']; ?>]">
                                                        <?php echo $row['location_name'] ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="trip_start_date">Journey Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="trip_start_date"
                                            id="trip_start_date" placeholder="Journey Date ..." required
                                            onfocus="set_clear_date()">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="trip_end_date">Return Date </label>
                                        <input type="date" class="form-control" name="trip_end_date" id="trip_end_date"
                                            placeholder="Return Date ..." onfocus="set_return_date()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="trip_fleet_type">Fleet Type </label>
                                        <select class="form-control" name="trip_fleet_type" id="trip_fleet_type">
                                            <option value="[0]|[ALL]">ALL</option>
                                            <?php
                                            $query = "SELECT * FROM `fleet` ORDER BY `type` ASC;";
                                            $result = mysqli_query($con, $query);
                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <option value="[<?php echo $row['id']; ?>]|[<?php echo $row['type']; ?>]">
                                                        <?php echo $row['type'] ?>
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
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success my-1 mx-2 px-5">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

?>