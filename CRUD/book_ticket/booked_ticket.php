<?php
session_start();
include('../../admin/CRUD/db_connection.php');

extract($_POST);

if (isset($_POST['trip_id'])) {
    ?>

    <!-- Scroll To TOP -->
    <script>
        $(window).scrollTop(0);
    </script>

    <div class="row px-lg-4 py-lg-2 p-md-2 py-4">
        <div class="col-lg-9 col-12">
            <div class="card m-0 shadow">
                <div class="h5 fw-bold px-2 px-md-4 py-3 m-0 d-flex justify-content-between align-items-center">
                    <div><b>Travel Details</b></div>
                </div>
                <hr class="m-0">
                <div class="px-2 px-md-4 py-3">
                    <?php
                    if (isset($_SESSION['OBBMS_username'])) {
                        ?>
                        <div class="row">
                            <?php
                            $id = $_SESSION['OBBMS_username']['user_id'];
                            $tbl_name = ($_SESSION['OBBMS_username']['status'] == 2) ? 'admin' : 'passenger';
                            $query = "SELECT * FROM `$tbl_name` WHERE `id`=$id;";
                            $result_booking_person_data = mysqli_query($con, $query);
                            $booking_person_data = mysqli_fetch_assoc($result_booking_person_data);
                            ?>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="passenger_email_id_1">Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" id="passenger_email_id_1"
                                        name="passenger_email_id_1" placeholder="Email ..."
                                        value="<?php echo $booking_person_data['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="passenger_mobile_no_1">Mobile No. <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control" id="passenger_mobile_no_1"
                                        name="passenger_mobile_no_1" placeholder="Mobile No. ..."
                                        value="<?php echo $booking_person_data['mobile_no']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                Your booking details will be sent to this <b>email address</b> or <b>mobile number</b>.
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="row border border-dark my-3"></div>
                    <form method="post" id="passenger_details" autocomplete="off"
                        onsubmit="pessanger_booking_details(<?php echo $trip_id; ?>)">
                        <div class="pb-3">
                            <div class="row m-0 justify-content-between">
                                <div class="col-12">
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
                                                    name="passenger_mobile_no_1" placeholder="Mobile No. ..." required
                                                    value="<?php echo isset($_SESSION['OBBMS_username']) ? $booking_person_data['mobile_no'] : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="passenger_email_id_1">Email <span class="text-danger">*</span>
                                                </label>
                                                <input type="email" class="form-control" id="passenger_email_id_1"
                                                    name="passenger_email_id_1" placeholder="Email ..." required
                                                    value="<?php echo isset($_SESSION['OBBMS_username']) ? $booking_person_data['email'] : ''; ?>">
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
                                <div class="col-12">
                                    <?php
                                    $child = ${"book_total_child_" . $trip_id};
                                    $special = ${"book_total_special_" . $trip_id};
                                    $adult = ${"book_total_adult_" . $trip_id};
                                    for ($num = 0; $num < (intval($child) + intval($special) + intval($adult) - 1); $num++) {
                                        ?>
                                        <div class="row">
                                            <div class="col-12 py-1" style="border-top: 2px dashed #00887a;"></div>
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
                                <div class="col-12 d-flex flex-wrap justify-content-end">
                                    <button type="submit" class="btn btn-primary my-1 mx-2 px-4"><b>BOOK TICKET</b></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 my-lg-0 my-4 pt-lg-0 pt-4">
            <div class="row m-0">
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="card m-0 shadow">
                        <h5 class="px-3 pt-3">
                            <b>Summary</b>
                        </h5>
                        <hr class="my-2" />
                        <div class="p-3">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <b>Fare Summery</b>
                                </div>
                                <div class="col-12">
                                    <div>
                                        <?php echo ${"book_total_adult_" . $trip_id}; ?> Adult
                                    </div>
                                    <div>
                                        <?php echo ${"book_total_child_" . $trip_id}; ?> Children
                                    </div>
                                    <div>
                                        <?php echo ${"book_total_special_" . $trip_id}; ?> Special
                                    </div>
                                </div>
                                <div class="col-12 border my-2"></div>
                                <?php
                                $query = "SELECT * FROM `trip` WHERE `id`=$trip_id;";
                                $result = mysqli_query($con, $query);
                                $row = mysqli_fetch_assoc($result);
                                $child_price = intval(${"book_total_child_" . $trip_id}) * intval($row['children_fair']);
                                $special_price = intval(${"book_total_special_" . $trip_id}) * intval($row['special_fair']);
                                $adult_price = intval(${"book_total_adult_" . $trip_id}) * intval($row['adult_fair']);
                                $ticket_price = intval($child_price) + intval($special_price) + intval($adult_price);
                                $tax_price = intval($total_price_including_tax) - intval($ticket_price);
                                ?>
                                <div class="col-12">
                                    <div class="row m-0 justify-content-between">
                                        <div>Base Fare</div>
                                        <div><b>₹
                                                <?php echo $ticket_price; ?>
                                            </b></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row m-0 justify-content-between">
                                        <div>Tax</div>
                                        <div><b>₹
                                                <?php echo $tax_price; ?>
                                            </b></div>
                                    </div>
                                </div>
                                <div class="col-12 border my-2"></div>
                                <div class="col-12">
                                    <div class="row m-0 justify-content-between">
                                        <div>Total Amount</div>
                                        <div><b>₹
                                                <?php echo $total_price_including_tax; ?>
                                            </b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-6 col-12 mt-lg-5 mt-sm-0 mt-5">
                    <div class="card shadow h-100">
                        <h5 class="px-3 pt-3">
                            <b>Apply Discount</b>
                        </h5>
                        <hr class="my-2" />
                        <div class="px-3 h-100">
                            <div class="row h-100 align-items-center justify-content-center">
                                <div class="col-12 my-3 d-flex align-items-center justify-content-start">
                                    Have a Discount/ Promio code to Redeem
                                </div>
                                <div class="col-12 d-flex align-items-center justify-content-start">
                                    <div class="form-group w-100">
                                        <form action="#" method="post" id="ApplyCouponCode">
                                            <div class="position-relative">
                                                <div>
                                                    <input type="text" placeholder="Promo Code" class="form-control"
                                                        name="discount_code">
                                                </div>
                                                <input type="reset" value="Apply"
                                                    class="btn btn-success px-4 position-absolute"
                                                    style="top: 0px;right: 0;">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-lg-4 py-lg-2 p-md-2 my-lg-4 my-0 pt-lg-4 pt-0">
        <div class="col-9 col-lg-9 col-12">
            <div class="card p-4 m-0 shadow">
                <h4 class="py-3 px-2">
                    <b>Mandatory check-list for passengers:</b>
                </h4>
                <?php
                for ($num = 0; $num < 5; $num++) {
                    ?>
                    <?php
                    if ($num != 2) {
                        ?>
                        <div class="p-2 text-justify">
                            <?php
                    }
                    ?>
                        <b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                        into electronic typesetting, remaining essentially unchanged.
                        <?php
                        if ($num != 1) {
                            ?>
                        </div>
                        <?php
                        }
                        ?>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}

?>