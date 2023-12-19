<div class="py-sm-4 py-3" id="footer">
    <div class="container py-3">
        <div class="row px-sm-0 px-3">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="h5 text-dark-blue" style="font-weight: bold;">
                    Get in Touch
                </div>
                <div class="py-md-2 py-1"></div>
                <h6 class="text-green">Don’t miss any updates of our new templates and extensions.!</h6>
                <form action="#" method="post" class="py-2" autocomplete="off">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <button type="submit" class="btn bg-green px-5 text-white" style="font-weight:bold;">
                        SUBMIT
                    </button>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="h5 text-dark-blue" style="font-weight: bold;">
                    Top 5 - Trips
                </div>
                <div class="py-md-2 py-1"></div>
                <div class="mx-3">
                    <?php
                    $query = "SELECT * FROM (SELECT * FROM `trip` WHERE `status`='1' ORDER BY `id` DESC LIMIT 5) AS `Trip` ORDER BY `id` ASC;";
                    include('./admin/CRUD/db_connection.php');
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="top_5_trip">
                            <a href="#" class="d-block p-1"
                                onclick="search_Trip('<?php echo $row['trip_pick_up']; ?>','<?php echo $row['trip_drop']; ?>')">
                                <?php echo substr(explode("|", $row['trip_pick_up'])[1], 1, -1); ?> -
                                <?php echo substr(explode("|", $row['trip_drop'])[1], 1, -1); ?>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                    <div id="setSubmitForm"></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="h5 text-dark-blue" style="font-weight: bold;">
                    OBBMS
                </div>
                <div class="py-md-2 py-1"></div>
                <div class="mx-3">
                    <?php

                    $menu = array(["link" => "index.php", "text" => "home"], ["link" => "ticket_booking.php", "text" => "booking"], ["link" => "contact_us.php", "text" => "contact us"], ["link" => "trace-ticket.php", "text" => "trace"]);

                    if (!isset($_SESSION['OBBMS_username'])) {
                        array_push($menu, ["link" => "login.php", "text" => "login"]);
                        array_push($menu, ["link" => "registration.php", "text" => "registraion"]);
                    } else {
                        if ($_SESSION["OBBMS_username"]["status"] == 2) {
                            array_push($menu, ["link" => "admin/index.php", "text" => "ADMIN"]);
                        } else {
                            array_push($menu, ["link" => "users-dashboard.php", "text" => $_SESSION["OBBMS_username"]["username"]]);
                        }
                        array_push($menu, ["link" => "logout.php", "text" => "logout"]);
                    }
                    for ($num = 0; $num < sizeof($menu); $num++) {
                        ?>
                        <div class="top_5_trip text-capitalize">
                            <a href="<?php echo $menu[$num]['link']; ?>" class="d-block p-1">
                                <?php echo $menu[$num]['text']; ?>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="h5 text-dark-blue" style="font-weight: bold;">
                    Team Solutions
                </div>
                <div class="py-md-2 py-1"></div>
                <div class="mx-3">
                    <div class="team_solution d-flex flex-wrap justify-content-center">
                        <a href="#" class="py-1 px-2 d-block m-1">
                            <i class="fa-brands fa-facebook h4 m-0"></i>
                        </a>
                        <a href="#" class="py-1 px-2 d-block m-1">
                            <i class="fa-brands fa-twitter h4 m-0"></i>
                        </a>
                        <a href="#" class="py-1 px-2 d-block m-1">
                            <i class="fa-brands fa-linkedin h4 m-0"></i>
                        </a>
                        <a href="#" class="py-1 px-2 d-block m-1">
                            <i class="fa-brands fa-pinterest h4 m-0"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="position-relative overflow-hidden">
        <img src="Images/Footer.png" alt="" class="w-100" style="transform: scale(1.07);">
        <div class="w-25 position-absolute" style="top: 58%;right: 100%;" id="footer_cycle">
            <img src="Images/Footer_Cycle.gif" alt="" class="w-25">
        </div>
        <img src="Images/Footer_Car.gif" alt="" class="w-25 position-absolute" style="top: 50%;right: 100%;"
            id="footer_car">
        <img src="Images/Footer_Bus.gif" alt="" class="w-25 position-absolute" style="top: 25%;right: 100%;"
            id="footer_bus">
    </div>
</div>

<script>

    function search_Trip(pick_up_value, drop_value) {

        var date_value = new Date();

        var form = document.createElement("form");
        form.setAttribute("action", "ticket_booking.php");
        form.setAttribute("method", "post");
        form.setAttribute("class", "d-none");

        var pick_up = document.createElement("input");
        pick_up.setAttribute("type", "text");
        pick_up.setAttribute("name", "trip_pick_up");
        pick_up.setAttribute("value", pick_up_value);

        var drop = document.createElement("input");
        drop.setAttribute("type", "text");
        drop.setAttribute("name", "trip_drop");
        drop.setAttribute("value", drop_value);

        var date = document.createElement("input");
        date.setAttribute("type", "text");
        date.setAttribute("name", "trip_start_date");
        date.setAttribute("value", (((date_value.getFullYear() > 10) ? date_value.getFullYear() : "0" + date_value.getFullYear()) + '-' + (((date_value.getMonth() + 1) >= 10) ? (date_value.getMonth() + 1) : "0" + (date_value.getMonth() + 1)) + '-' + ((date_value.getDate() > 10) ? date_value.getDate() : "0" + date_value.getDate())));

        var submit = document.createElement("input");
        submit.setAttribute("type", "submit");
        submit.setAttribute("value", "Submit");
        submit.setAttribute("id", "footer_top_trip_search");

        form.appendChild(pick_up);
        form.appendChild(drop);
        form.appendChild(date);
        form.appendChild(submit);

        document.getElementById("setSubmitForm").appendChild(form);
        document.getElementById("footer_top_trip_search").click();

    }

</script>