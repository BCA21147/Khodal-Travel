<?php
include('./admin/CRUD/db_connection.php');
include('components/head_links.php');
include('components/header.php');
?>

<div class="container my-4" id="contect_us">
    <div class="row py-3 mt-3 justify-content-center">
        <div class="col-12 text-center">
            <b>FIND US</b>
        </div>
        <div class="col-12 mb-3 text-center text-green">
            <h1><b>Contect Info</b></h1>
        </div>
        <?php
        $office = array(["head" => "USA Headquarter", "address" => "304 NW St Homestead, Florida, Melrose Street, Water Mill, 76B Overlook Drive Chester, PA 19013, Flemingsburg USA.", "mobile_no" => "080 707 555-321", "email" => "demo@example.com"], ["head" => "New York Office", "address" => "1540 Pecks Ridge Tilton Rd Flemingsburg, Kentucky(KY), 4104188 Fulton Street Blackwood, NJ 08012, London.", "mobile_no" => "080 707 555-321", "email" => "demo@example.com"], ["head" => "Panama Office", "address" => "103 Richard Ave Ashville, Ohio, Water Mill,3468 16th Hwy Pangburn, Arkansas(AR), Charolais Ashville, Virginia, Panama.", "mobile_no" => "080 707 555-321", "email" => "demo@example.com"]);

        for ($num = 0; $num < sizeof($office); $num++) {
            ?>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="card px-3 py-4 m-2 shadow" style="border-top: 3.5px solid #77a6f7;">
                    <div class="row text-center">
                        <div class="col-12">
                            <h5>
                                <b>
                                    <?php echo $office[$num]["head"]; ?>
                                </b>
                            </h5>
                        </div>
                        <div class="col-12 py-2 text-secondary">
                            <?php echo $office[$num]["address"]; ?>
                        </div>
                        <div class="col-12">
                            <a href="#" class="d-block contect_us_link">
                                <b>
                                    <?php echo $office[$num]["mobile_no"]; ?>
                                </b>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="#" class="d-block contect_us_link">
                                <b>
                                    <?php echo $office[$num]["email"]; ?>
                                </b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        ?>
    </div>
    <div class="row py-3 mt-3">
        <div class="col-12 text-center">
            <b>LET'S TALK</b>
        </div>
        <div class="col-12 mb-3 text-center text-green">
            <h1><b>Contact Us</b></h1>
        </div>
        <div class="col-12 m-0">
            <form method="post" id="passenger_inquiry" autocomplete="off">
                <div class="row m-0">
                    <div class="col-md-9 col-12 mx-auto">
                        <div class="row m-0">
                            <?php
                            if (isset($_SESSION["OBBMS_username"])) {
                                $query = "SELECT * FROM `passenger` WHERE `id`='" . $_SESSION["OBBMS_username"]["user_id"] . "';";
                                $result = mysqli_query($con, $query);
                                $row = mysqli_fetch_assoc($result);
                            }
                            ?>
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control py-4 form-border-left" id="passenger_name"
                                        name="passenger_name" placeholder="Your Name"
                                        value="<?php echo (isset($_SESSION["OBBMS_username"]["user_id"])) ? $row['first_name'] . " " . $row['last_name'] : ""; ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="email" class="form-control py-4 form-border-left" id="passenger_email"
                                        name="passenger_email" placeholder="Your Email"
                                        value="<?php echo (isset($_SESSION["OBBMS_username"]["user_id"])) ? $row['email'] : ""; ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="tel" class="form-control py-4 form-border-left"
                                        id="passenger_mobile_no" name="passenger_mobile_no" placeholder="Your Phone"
                                        value="<?php echo (isset($_SESSION["OBBMS_username"]["user_id"])) ? $row['mobile_no'] : ""; ?>"
                                        required minlength="10" maxlength="10">
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control py-4 form-border-left" id="passenger_subject"
                                        name="passenger_subject" placeholder="Your Subject" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea type="text" class="form-control py-3 form-border-left"
                                        id="passenger_message" name="passenger_message" placeholder='Your Message ...'
                                        rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-12 my-1">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary px-5 py-2"><b>Send Message</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row py-3 mt-3">
        <div class="col-12 mb-3 text-center text-green">
            <h2><b>Find Us on Google Map</b></h2>
        </div>
        <div class="col-12 text-center text-secondary">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quo beatae quasi assumenda, expedita
            aliquam minima tenetur maiores neque incidunt repellat aut voluptas hic dolorem sequi ab porro, quia error.
        </div>
        <div class="col-12 mt-4 overflow-hidden p-0" style="border-radius: 50px;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.5296152715155!2d72.88853697432788!3d21.21083718150169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f79694e61c5%3A0xc03050d8cd36e5ab!2s154%2C%20Raj%20Mandir%20Society%20Rd%2C%20Mansarovar%20Society%2C%20Yoginagar%20Society%2C%20Surat%2C%20Gujarat%20395006!5e0!3m2!1sgu!2sin!4v1694963362909!5m2!1sgu!2sin"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

<!-- ALERT PASSENGER - Modal -->
<?php
require("model/headerModel/iconModel.php");
iconModel("AlertPassengerModal", "fa-solid fa-circle-xmark text-danger", "ALERT INQUIRY");
?>
<div class="modal-body">
    <h5 class="d-flex align-items-center">
        <i class="fa-solid fa-triangle-exclamation text-warning pr-3"></i>
        <div style="font-weight: normal;font-size: 18px;" id="passenger_alert_message">
        </div>
    </h5>
</div>
<?php
require("model/footerModel/singleButtonModel.php");
singleButtonModel("btn-success", "OK");
?>

<!-- SUCCESS PASSENGER - Modal -->
<?php
iconModel("SuccessPassengerModal", "fa-solid fa-circle-check text-success", "SUCCESS INQUIRY");
?>
<div class="modal-body">
    <h5 class="d-flex align-items-center">
        <i class="fa-solid fa-bookmark text-info pr-3"></i>
        <div style="font-weight: normal;font-size: 18px;">
            Your Inquiry Has Been Noted Successfully.
            <br>
            We Will Contact You Come In Soon.
        </div>
    </h5>
</div>
<?php
singleButtonModel("btn-success", "DONE");
?>

<?php
include('components/footer.php');
?>

<script>

    $(document).ready(function () {

        $('#passenger_inquiry').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            if (!isNaN(formData.get('passenger_mobile_no'))) {
                $.ajax({
                    type: "POST",
                    url: "CRUD/contect us/insert.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data, status) {
                        clear();
                        $('#SuccessPassengerModal').modal({
                            backdrop: "static",
                            keyboard: false
                        })
                    }
                })
            }
            else {
                $('#PassengerModal').modal('hide');
                $("#passenger_alert_message").html("Please Enter Valid Details.");
                if (isNaN(formData.get('passenger_mobile_no'))) {
                    $("#passenger_alert_message").html("Mobile Number Is Not Valid.");
                }
                setTimeout(() => {
                    $('#AlertPassengerModal').modal('show');
                }, 345);
            }
        });

        function clear() {
            document.getElementById('passenger_inquiry').reset();
        }

    })

</script>

<?php
include('components/foot_links.php');
?>