<script>
    setInterval(() => {
        var height = $('#HeaderFixed').height();
        $('#DummySetHeader').height(height);
    }, 1);
</script>
<div class="py-md-2 py-0 bg-dark-blue w-100 position-fixed" style="z-index: 2;" id="HeaderFixed">
    <div class="container py-md-0 py-3 px-md-0 px-4">
        <div class="row py-md-1 py-0 justify-content-between">
            <div class="col-md-1 col-sm-2 col-3 d-flex align-items-center">
                <img src="Images/Khodal-Travel.png" alt="" srcset="" class="w-100" style="transform: scale(1.2);">
            </div>
            <div class="col-9 w-100 text-dark d-md-none d-block d-flex align-items-center justify-content-end">
                <div class="d-flex justify-content-end align-items-center text-white" style="cursor: pointer;">
                    <i class="fa-solid fa-bars h2 m-0 p-2" id="openMenu" onclick="openMenu()"></i>
                    <i class="fa-solid fa-xmark h2 m-0 p-2 d-none" id="closeMenu" onclick="closeMenu()"></i>
                </div>
            </div>
            <div class="col-md-11 col-sm-12 col-12 d-flex align-items-center justify-content-end" id="user_header">
                <div class="d-md-block d-none h-100 position-relative" id="MenuList">
                    <ul class="d-flex h-100 m-0 p-0" id="home_page_menu_list">
                        <?php
                        session_start();

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
                            <li class="d-flex align-items-center text-capitalize">
                                <a href="<?php echo $menu[$num]['link']; ?>"
                                    class="d-block h-100 w-100 m-1 px-3 px-lg-4 d-flex align-items-center"
                                    onmouseover="setRoadMap('<?php echo $num + 1; ?>')" onmouseout="setRemoveRoadMap()">
                                    <?php echo $menu[$num]['text']; ?>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="position-absolute d-md-block d-none" id="home_page_road_map_right"
                        style="top:95%;left:0;transition:.5s">
                        <div class="py-1 bg-dark" style="border-radius: 2.5px;">
                            <div class="road"></div>
                        </div>
                    </div>
                    <div class="position-absolute d-block d-md-none px-1 bg-dark" id="home_page_road_map_down"
                        style="top:0%;left:0;transition:.5s;border-radius: 2.5px;">
                        <div class="h-100">
                            <div class="road h-100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="DummySetHeader"></div>