<?php

include('../db_connection.php');

extract($_POST);

// Bus Details - Data :- 
if (isset($_POST['id'])) {

    $query = "SELECT `seat_no` FROM `ticket` WHERE `trip` LIKE '[$id]|%' AND `journey_date` LIKE '$trip_date%' AND `status`=1";
    $ticket_result = mysqli_query($con, $query);

    $booked_seat = array();
    while ($data = mysqli_fetch_assoc($ticket_result)) {
        if (sizeof(explode(", ", $data['seat_no'])) > 0) {
            for ($num = 0; $num < sizeof(explode(", ", $data['seat_no'])); $num++) {
                array_push($booked_seat, explode(", ", $data['seat_no'])[$num]);
            }
        } else {
            array_push($booked_seat, $data['seat_no']);
        }
    }
    ?>

    <div class="my-3">
        <div class="card py-4 px-3 m-0" style="background-color: rgba(0, 123, 255, .3);">
            <form id="bus_booking_details_<?php echo $id; ?>" method="post" autocomplete="off"
                onsubmit="bus_booking_details(<?php echo $id; ?>)">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-sm-6 col-12">
                        <div class="p-xxl-3 p-lg-2 p-1 bg-white h-100 d-flex align-items-center"
                            style="border: 6px solid;border-color: black gray gray gray;">
                            <div>
                                <div class="row">
                                    <div
                                        class="col-12 col-lg-4 col-md-6 d-flex align-items-center justify-content-center pr-3 pr-md-0">
                                        <img src="../Images/booked.png" alt="" class="bus-details-img m-1">
                                        <h6>BOOK</h6>
                                    </div>
                                    <div
                                        class="col-12 col-lg-4 col-md-6 d-flex align-items-center justify-content-center pr-4 pr-md-0">
                                        <img src="../Images/rest.png" alt="" class="bus-details-img m-1">
                                        <h6>REST</h6>
                                    </div>
                                    <div
                                        class="col-12 col-lg-4 col-md-6 d-flex align-items-center justify-content-center pl-lg-0 pl-md-4 pl-sm-0">
                                        <img src="../Images/success.png" alt="" class="bus-details-img m-1">
                                        <h6>SELECT</h6>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <div class="row justify-content-between align-items-center m-0">
                                        <div class="col-xxl-1 col-sm-3 col-5">
                                            <img src="../Images/door.png" alt="" srcset="" class="w-100">
                                        </div>
                                        <div class="col-xxl-1 col-sm-3 col-5">
                                            <img src="../Images/steering_wheel.png" alt="" srcset="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3 border">
                                </div>
                                <?php
                                $query = "SELECT fleet.* FROM `fleet`,`trip` WHERE trip.id=$id AND LOCATE(CONCAT('[',fleet.id,']'),trip.fleet_type) GROUP BY fleet.id;";
                                $result_fleet = mysqli_query($con, $query);
                                if (mysqli_num_rows($result_fleet) == 1) {
                                    $fleet = mysqli_fetch_assoc($result_fleet);
                                    $sum = 0;
                                    $arr = array();
                                    $seat = -1;
                                    for ($i = 0; $i < sizeof(explode("×", $fleet['layout'])); $i++) {
                                        $sum += explode("×", $fleet['layout'])[$i];
                                        array_push($arr, $sum);
                                    }
                                    for ($num = 0; $num < $fleet['fleet_no_of_row']; $num++) {
                                        ?>
                                        <div class="row d-flex flex-nowrap">
                                            <?php
                                            for ($n = 1; $n <= $sum; $n++) {
                                                $seat++;
                                                ?>
                                                <div class="col d-flex justify-content-center px-0 m-1">

                                                    <?php $disable = (in_array(explode(", ", $fleet['seat_number'])[$seat], $booked_seat)) ? 'disabled' : ''; ?>

                                                    <input type="checkbox" name="seat_number"
                                                        id="<?php echo $id . "_" . explode(", ", $fleet['seat_number'])[$seat]; ?>"
                                                        <?php echo $disable; ?> class="custome_checkbox_for_select_bus"
                                                        data-bus_number="<?php echo explode(", ", $fleet['seat_number'])[$seat]; ?>"
                                                        onchange="selected_seat_no('<?php echo $id . '_' . explode(', ', $fleet['seat_number'])[$seat]; ?>')">
                                                </div>
                                                <?php
                                                if (in_array($n, $arr) && $n != $sum && $num == ($fleet['fleet_no_of_row'] - 1) && $fleet['last_seat_check'] == 1) {
                                                    ?>
                                                    <div class="col d-flex justify-content-center px-0 m-1">
                                                        <input type="checkbox" name="seat_number" id="<?php echo $id . '_Z' ?>"
                                                            class="custome_checkbox_for_select_bus" data-bus_number="Z"
                                                            onchange="selected_seat_no('<?php echo $id . '_Z' ?>')" <?php echo (in_array('Z', $booked_seat)) ? 'disabled' : ''; ?>>
                                                    </div>
                                                    <?php
                                                } elseif (in_array($n, $arr) && $n != $sum) {
                                                    ?>
                                                    <div class="col d-flex justify-content-center px-0 m-1">
                                                        <div class="bus_blank_space"></div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-sm-6 col-12 pt-sm-0 pt-3">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-sm-6 col-12">
                                <?php
                                $query = "SELECT * FROM `trip` WHERE `id` = $id;";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    ?>
                                    <div class="form-group">
                                        <label for="<?php echo 'book_total_child_' . $id; ?>">Total Child </label>
                                        <input type="number" class="form-control" id="<?php echo 'book_total_child_' . $id; ?>"
                                            name="<?php echo 'book_total_child_' . $id; ?>" placeholder="Total Child." min="0"
                                            max="<?php echo $row['children_seat']; ?>" value="0"
                                            onfocus="selected_number_of_seat(this.id)" onblur="selected_number_of_seat(this.id)"
                                            onkeyup="selected_number_of_seat(this.id)"
                                            onkeydown="selected_number_of_seat(this.id)">
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-xl-4 col-sm-6 col-12">
                                <?php
                                $query = "SELECT * FROM `trip` WHERE `id` = $id;";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    ?>
                                    <div class="form-group">
                                        <label for="<?php echo 'book_total_special_' . $id; ?>">Total Special </label>
                                        <input type="number" class="form-control"
                                            id="<?php echo 'book_total_special_' . $id; ?>"
                                            name="<?php echo 'book_total_special_' . $id; ?>" placeholder="Total Special."
                                            min="0" max="<?php echo $row['special_seat']; ?>" value="0"
                                            onfocus="selected_number_of_seat(this.id)" onblur="selected_number_of_seat(this.id)"
                                            onkeyup="selected_number_of_seat(this.id)"
                                            onkeydown="selected_number_of_seat(this.id)">
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-xl-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="<?php echo 'book_total_adult_' . $id; ?>">Total Adult </label>
                                    <input type="number" class="form-control" id="<?php echo 'book_total_adult_' . $id; ?>"
                                        name="<?php echo 'book_total_adult_' . $id; ?>" placeholder="Total Adult." min="0"
                                        value="0" readonly>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="book_pick_up_<?php echo $id; ?>">Pickup Bus Stand <span
                                            class="text-danger">*</span> </label>
                                    <select class="form-control" id="book_pick_up_<?php echo $id; ?>"
                                        name="book_pick_up_<?php echo $id; ?>" required>
                                        <option value="">None</option>
                                        <?php
                                        $query = "SELECT * FROM `trip` WHERE `id` = $id;";
                                        $result = mysqli_query($con, $query);
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            for ($num = 0; $num < sizeof(unserialize($row['boarding_point'])); $num++) {
                                                ?>
                                                <option
                                                    value="<?php echo unserialize($row['boarding_point'])[$num]['boarding_bus_stand']; ?>">
                                                    <?php echo substr(explode("|", unserialize($row['boarding_point'])[$num]['boarding_bus_stand'])[1], 1, -1); ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="book_drop_<?php echo $id; ?>">Drop Bus Stand <span
                                            class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="book_drop_<?php echo $id; ?>"
                                        name="book_drop_<?php echo $id; ?>" required>
                                        <option value="">None</option>
                                        <?php
                                        $query = "SELECT * FROM `trip` WHERE `id` = $id;";
                                        $result = mysqli_query($con, $query);
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            for ($num = 0; $num < sizeof(unserialize($row['dropping_point'])); $num++) {
                                                ?>
                                                <option
                                                    value="<?php echo unserialize($row['dropping_point'])[$num]['dropping_bus_stand']; ?>">
                                                    <?php echo substr(explode("|", unserialize($row['dropping_point'])[$num]['dropping_bus_stand'])[1], 1, -1); ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-12">
                                            <b>
                                                <label for="book_seat_number_<?php echo $id; ?>">Selected Seat No. <span
                                                        class="text-danger">*</span> </label>
                                            </b>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <input type="text" class="form-control" id="book_seat_number_<?php echo $id; ?>"
                                                name="book_seat_number_<?php echo $id; ?>" placeholder="No Seat Selected."
                                                required readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 border border-dark"></div>
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $query = "SELECT * FROM `trip` WHERE `id` = $id;";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <td>Adult</td>
                                                    <td>
                                                        <?php echo ($row['adult_fair'] == "") ? 0 : $row['adult_fair']; ?>
                                                    </td>
                                                    <td>
                                                        <div id="total_adult_price_<?php echo $id; ?>"
                                                            data-adult_fair="<?php echo ($row['adult_fair'] == "") ? 0 : $row['adult_fair']; ?>">
                                                            0</div>
                                                    </td>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <?php
                                                $query = "SELECT * FROM `trip` WHERE `id` = $id;";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <td>Child</td>
                                                    <td>
                                                        <?php echo ($row['children_fair'] == "") ? 0 : $row['children_fair']; ?>
                                                    </td>
                                                    <td>
                                                        <div id="total_child_price_<?php echo $id; ?>"
                                                            data-children_fair="<?php echo ($row['children_fair'] == "") ? 0 : $row['children_fair']; ?>">
                                                            0</div>
                                                    </td>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <?php
                                                $query = "SELECT * FROM `trip` WHERE `id` = $id;";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <td>Special</td>
                                                    <td>
                                                        <?php echo ($row['special_fair'] == "") ? 0 : $row['special_fair']; ?>
                                                    </td>
                                                    <td>
                                                        <div id="total_special_price_<?php echo $id; ?>"
                                                            data-special_fair="<?php echo ($row['special_fair'] == "") ? 0 : $row['special_fair']; ?>">
                                                            0</div>
                                                    </td>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr class="border border-dark"></tr>
                                            <tr>
                                                <td colspan="2">Ticket Price</td>
                                                <td>
                                                    <div id="total_all_price_<?php echo $id; ?>">0</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <?php
                                                $query = "SELECT * FROM `tax` WHERE `status`='1';";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    $tax = 0;
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $tax += intval($row['tax_value']);
                                                    }
                                                    ?>
                                                    <td colspan="2">Tax
                                                        (
                                                        <?php echo $tax; ?>%
                                                        )
                                                    </td>
                                                    <td>
                                                        <div id="total_tax_price_<?php echo $id; ?>"
                                                            data-tax_rate="<?php echo $tax; ?>">0</div>
                                                    </td>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Grand Total</td>
                                                <td>
                                                    <div id="total_price_including_tax_<?php echo $id; ?>">0</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border border-dark my-md-4 my-2 mx-0"></div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success my-1 mx-2 px-4">Process To Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php

}

?>