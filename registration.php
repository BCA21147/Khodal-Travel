<?php
include('./admin/CRUD/db_connection.php');
include('components/head_links.php');
include('components/header.php');
?>

<div class="container mt-5 mb-4">
    <form method="post" id="user_registration" autocomplete="off">
        <div class="row mx-sm-0 mx-2">
            <div class="col-lg-6 col-sm-9 col-12 mx-auto">
                <div class="card py-sm-4 py-2 px-sm-5 px-3 shadow">
                    <h5><b>Sign Up</b></h5>
                    <p class="my-3">Create an Account to Easily Use OBBMS Services.</p>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First Name ..." required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Last Name ..." required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <select class="form-control" name="doc_type" id="doc_type" required>
                                    <option value="NID">NID</option>
                                    <option value="PP">PP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="doc_number" name="doc_number"
                                    placeholder="Document Number ..." required minlength="6" maxlength="18">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
                                </div>
                                <input type="email" class="form-control" id="email_id" name="email_id"
                                    placeholder="Email ID. ..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa-solid fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="phone_no" name="phone_no"
                                    placeholder="Mobile No. ..." required minlength="10" maxlength="10">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password ..." required minlength="7" maxlength="15">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <input type="password" class="form-control" id="retype_password" name="retype_password"
                                    placeholder="Confirm Password ..." required minlength="7" maxlength="15">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select class="form-control" name="country" id="country" required>
                                    <option value="">Select Country</option>
                                    <?php
                                    $query = "SELECT * FROM `country`;";
                                    $result = mysqli_query($con, $query);
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <option value='[<?php echo $row['id']; ?>]|[<?php echo $row['country_name']; ?>]'>
                                                <?php echo $row['country_name']; ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="termAndConditions"
                                    name="termAndConditions" required>
                                <label class="form-check-label" for="termAndConditions" style="cursor: pointer;">
                                    By creating an account you agree to our Terms And Condition
                                </label>
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">SIGN UP</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>Already have an Account? <a href="login.php">Sign In</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-10 mx-auto">
                            <a href="javascript:void(0)" class="">
                                <div class="row bg-primary border border-primary rounded">
                                    <div class="col-2 pl-0">
                                        <div class="bg-white border border-primary rounded overflow-hidden">
                                            <img src="Images/google.png" alt="" class="w-100">
                                        </div>
                                    </div>
                                    <div class="col-10 d-flex justify-content-center align-items-center">
                                        <b>
                                            Continue with Google
                                        </b>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- ALERT PASSENGER - Modal -->
<?php
require("model/headerModel/closeEventsModel.php");
closeEventsModel("AlertPassengerModal", "fa-solid fa-circle-xmark text-danger", "ALERT PASSENGER", "");
?>
<div class="modal-body">
    <h5 class="d-flex align-items-center">
        <i class="fa-solid fa-triangle-exclamation text-warning pr-3"></i>
        <div style="font-weight: normal;font-size: 18px;" id="passenger_alert_message">
        </div>
    </h5>
</div>
<?php
require("model/footerModel/closeTwoButtonEventsModel.php");
closeTwoButtonEventsModel("btn-danger", "CLOSE", "id='passenger_alert_close_btn'", "btn-success", "OK", "id='passenger_alert_ok_btn'");
?>

<!-- SUCCESS PASSENGER - Modal -->
<?php
closeEventsModel("SuccessPassengerModal", "fa-solid fa-circle-check text-success", "SUCCESS PASSENGER", "onclick='goToThisPage()'");
?>
<div class="modal-body">
    <h5 class="d-flex align-items-center">
        <i class="fa-solid fa-bookmark text-info pr-3"></i>
        <div style="font-weight: normal;font-size: 18px;">
            You Can Register Successfully.
        </div>
    </h5>
</div>
<?php
closeTwoButtonEventsModel("btn-danger", "CLOSE", "onclick='goToThisPage()'", "btn-success", "DONE", "onclick='goToHomePage()'");
?>

<?php
include('components/footer.php');
?>

<script>
    $(document).ready(function () {
        $('#user_registration').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            if (!isNaN(formData.get('phone_no')) && formData.get('password') === formData.get('retype_password')) {
                $.ajax({
                    type: "POST",
                    url: "CRUD/registration/insert.php",
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
                if (isNaN(formData.get('phone_no'))) {
                    $("#passenger_alert_message").html("Mobile Number Is Not Valid.");
                } else if (formData.get('password') != formData.get('retype_password')) {
                    $("#passenger_alert_message").html("Password Is Not Matched With Confirm Password.");
                }
                setTimeout(() => {
                    $('#AlertPassengerModal').modal('show');
                }, 345);
            }
        });
        function clear() {
            document.getElementById('user_registration').reset();
        }
    })
    function goToHomePage() {
        movePage("index.php")
    }
    function goToThisPage() {
        movePage("registration.php")
    }
    function movePage(pageIndex) {
        var changePage = document.createElement("a");
        changePage.href = pageIndex;
        document.body.appendChild(changePage);
        changePage.click();
    }
</script>

<?php
include('components/foot_links.php');
?>