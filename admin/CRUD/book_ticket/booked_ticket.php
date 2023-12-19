<?php

include('../db_connection.php');

extract($_POST);

if (isset($_POST['trip_id'])) {
    ?>
    <div class="row justify-content-center px-lg-4 py-lg-2 p-md-2 py-4">
        <div class="col-12">
            <div class="card m-0">
                <div class="h5 fw-bold px-2 px-md-4 py-3 m-0 d-flex justify-content-between align-items-center">
                    <div>Book Ticket</div>
                    <div style="cursor: pointer;" title="go-back" onclick="back_to_booking()"><i
                            class="fa-solid fa-arrow-right-arrow-left"></i></div>
                </div>
                <hr class="m-0">
                <div class="px-2 px-md-4 py-3">
                    <form method="post" id="passenger_details" autocomplete="off"
                        onsubmit="passanger_booking_details(<?php echo $trip_id; ?>)">
                        <div class="pb-3">
                            <div class="row m-0 justify-content-between">
                                <div class="col-12 col-md-7 border border-top-0 border-bottom-0 border-left-0 border-dark">
                                    <div class="row">
                                        <div class="col-12 py-1 text-primary">
                                            <b>Passenger 1 :-</b>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="passenger_mobile_no_1">Mobile No. <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="tel" class="form-control" id="passenger_mobile_no_1"
                                                    name="passenger_mobile_no_1" placeholder="Mobile No. ..." required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="passenger_email_id_1">Email <span class="text-danger">*</span>
                                                </label>
                                                <input type="email" class="form-control" id="passenger_email_id_1"
                                                    name="passenger_email_id_1" placeholder="Email ..." required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="passenger_first_name_1">First Name <span
                                                        class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="passenger_first_name_1"
                                                    name="passenger_first_name_1" placeholder="First Name ..." required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="passenger_last_name_1">Last Name <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="passenger_last_name_1"
                                                    name="passenger_last_name_1" placeholder="Last Name ..." required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="passenger_id_type_1">ID Type </label>
                                                <input type="text" class="form-control" id="passenger_id_type_1"
                                                    name="passenger_id_type_1" placeholder="ID Type ...">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="passenger_id_number_1">NID/Passport No. </label>
                                                <input type="text" class="form-control" id="passenger_id_number_1"
                                                    name="passenger_id_number_1" placeholder="NID/Passport No. ...">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="passenger_country_name">Country Name <span
                                                        class="text-danger">*</span> </label>
                                                <select class="form-control" name="passenger_country_name"
                                                    id="passenger_country_name" required>
                                                    <option value="">Country Name</option>
                                                    <?php
                                                    $query = "SELECT * FROM `country`;";
                                                    $result = mysqli_query($con, $query);
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <option
                                                                value='[<?php echo $row['id']; ?>]|[<?php echo $row['country_name']; ?>]'>
                                                                <?php echo $row['country_name']; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="passenger_city_name">City Name </label>
                                                <input type="text" class="form-control" id="passenger_city_name"
                                                    name="passenger_city_name" placeholder="City Name ...">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="passenger_zip_code">ZIP Code. </label>
                                                <input type="postal" class="form-control" id="passenger_zip_code"
                                                    name="passenger_zip_code" placeholder="ZIP Code. ...">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="passenger_address">Address <span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" id="passenger_address"
                                                    name="passenger_address" placeholder='Address ...' rows="4"
                                                    required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <?php
                                    $child = ${"book_total_child_" . $trip_id};
                                    $special = ${"book_total_special_" . $trip_id};
                                    $adult = ${"book_total_adult_" . $trip_id};
                                    for ($num = 0; $num < (intval($child) + intval($special) + intval($adult) - 1); $num++) {
                                        ?>
                                        <div class="row">
                                            <div class="col-12 py-1 text-primary">
                                                <b>Passenger
                                                    <?php echo ($num + 2); ?> :-
                                                </b>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="passenger_first_name_<?php echo ($num + 2); ?>">First Name <span
                                                            class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control"
                                                        id="passenger_first_name_<?php echo ($num + 2); ?>"
                                                        name="passenger_first_name_<?php echo ($num + 2); ?>"
                                                        placeholder="First Name ..." required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="passenger_last_name_<?php echo ($num + 2); ?>">Last Name <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        id="passenger_last_name_<?php echo ($num + 2); ?>"
                                                        name="passenger_last_name_<?php echo ($num + 2); ?>"
                                                        placeholder="Last Name ..." required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="passenger_mobile_no_<?php echo ($num + 2); ?>">Mobile No. <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <input type="tel" class="form-control"
                                                        id="passenger_mobile_no_<?php echo ($num + 2); ?>"
                                                        name="passenger_mobile_no_<?php echo ($num + 2); ?>"
                                                        placeholder="Mobile No. ..." required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="passenger_id_number_<?php echo ($num + 2); ?>">NID/Passport No.
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        id="passenger_id_number_<?php echo ($num + 2); ?>"
                                                        name="passenger_id_number_<?php echo ($num + 2); ?>"
                                                        placeholder="NID/Passport No. ...">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="col-12 col-md-7">
                                    <div class="row">
                                        <div class="col-12 py-1 text-primary">
                                            <b>Payment Details :-</b>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="passenger_payment_status">Payment Status <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="passenger_payment_status"
                                                    id="passenger_payment_status" required>
                                                    <option value="paid">Paid</option>
                                                    <option value="partially_paid">Partially Paid</option>
                                                    <option value="unpaid" selected>UnPaid</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="passenger_ticket_amount">Amount To Pay </label>
                                                <input type="number" class="form-control" id="passenger_ticket_amount"
                                                    name="passenger_ticket_amount" placeholder="Amount To Pay ..." readonly
                                                    value="<?php echo $total_price_including_tax; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 py-3">
                                <div class="col-12 d-flex flex-wrap justify-content-center">
                                    <button type="button" class="btn btn-dark my-1 mx-2 px-4"
                                        onclick="back_to_booking()">BACK</button>
                                    <button type="submit" class="btn btn-primary my-1 mx-2 px-4">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}

?>