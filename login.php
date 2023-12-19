<?php
include('./admin/CRUD/db_connection.php');
include('components/head_links.php');
include('components/header.php');
?>

<div class="container mt-5 mb-4">
    <form method="post" id="user_login" autocomplete="off">
        <div class="row mx-sm-0 mx-2">
            <div class="col-lg-6 col-sm-9 col-12 mx-auto">
                <div class="card py-sm-4 py-2 px-sm-5 px-3 shadow">
                    <h5 class="mb-3"><b>Sign In</b></h5>
                    <div class="row">
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
                                    <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                                </div>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password ..." required minlength="7" maxlength="15">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="termAndConditions"
                                    name="termAndConditions" required>
                                <label class="form-check-label" for="termAndConditions" style="cursor: pointer;">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">SIGN IN</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>Don’t have an account? <a href="registration.php">Sign Up</a></p>
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
            No User Founded.
            <br>
            Please ! Try Again ...
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
            You Can Login Successfully.
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
        $('#user_login').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "CRUD/registration/find_user.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data, status) {
                    if (data == 0) {
                        $('#AlertPassengerModal').modal({
                            backdrop: "static",
                            keyboard: false
                        })
                    } else if (data == 1 || data == 2) {
                        $('#SuccessPassengerModal').modal({
                            backdrop: "static",
                            keyboard: false
                        })
                    } else {
                        goToHomePage();
                    }
                    clear();
                }
            })
        });
        function clear() {
            document.getElementById('user_login').reset();
        }
    })
    function goToHomePage() {
        movePage("index.php")
    }
    function goToThisPage() {
        movePage("login.php");
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