<?php
include('./admin/CRUD/db_connection.php');
include('components/head_links.php');
include('components/header.php');
?>

<div class="pb-4">
    <form action="ticket_booking.php" method="post">
        <div id="HomePage" class="position-relative mb-5">
            <div class="Bus_Image position-relative">
                <img src="Images/Bus_Home.jpg" alt="" class="w-100">
            </div>
            <div class="position-absolute w-100 h-100 d-md-block d-none" style="top: 0;left: 0;z-index:1;">
                <div class="container h-100 text-white d-flex flex-column justify-content-center align-items-center">
                    <h1><b>BOOK YOUR BUS TICKET</b></h1>
                    <h5>Choose Your Destinations And Dates To Reserve A Ticket</h5>
                    <input type="submit" value="Book Now" class="btn btn-info py-2 px-4" style="font-weight: bold;">
                </div>
            </div>
            <div class="findTicket position-absolute w-100" style="left: 0;z-index:1;">
                <div
                    class="container h-100 d-flex flex-column justify-content-md-end justify-content-center align-items-center px-3">
                    <div class="row w-100">
                        <div class="col-lg-10 col-12 bg-white shadow-lg py-1 pb-3 px-3 mx-auto rounded">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="trip_pick_up">From <span class="text-danger">*</span> </label>
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
                                        <label for="trip_drop">To <span class="text-danger">*</span> </label>
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
                                            onfocus="set_clear_date()" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="trip_end_date">Return Date </label>
                                        <input type="date" class="form-control" name="trip_end_date" id="trip_end_date"
                                            placeholder="Return Date ..." onfocus="set_return_date()">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <input type="submit" value="Find Tickets" class="btn btn-info py-2 px-4"
                                        style="font-weight: bold;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container my-5">
    <div class="text-center">
        <h2>
            <b>HOW IT WORKS</b>
        </h2>
        <h5>
            Book Cheap Trip On Your Favourite Buses
        </h5>
    </div>
    <?php
    $work = array(["image" => "Work-1.png", "head" => "Book Online"], ["image" => "Work-2.png", "head" => "Payment"], ["image" => "Work-3.png", "head" => "Get Ticket"]);
    ?>
    <div>
        <div class="row py-4">
            <?php
            for ($num = 0; $num < count($work); $num++) {
                ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card shadow-lg overflow-hidden m-2">
                        <div class="row">
                            <div class="col-12">
                                <img src="Images/<?php echo $work[$num]["image"]; ?>" alt="" class="w-100"
                                    style="object-fit: cover;">
                            </div>
                            <div class="col-12 p-4">
                                <h4>
                                    <b>
                                        <?php echo $work[$num]["head"]; ?>
                                    </b>
                                </h4>
                                <p class="text-secondary">Lorem Ipsum is simply dummy text of...</p>
                                <button class="btn btn-info">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<div>
    <div class="mb-5">
        <div class="w-100 h-100 py-5" id="Book_Discount" style="top: 0;left: 0;z-index:1;">
            <div class="container h-100 text-white d-flex flex-column justify-content-center align-items-center">
                <h5 class="alert alert-danger"><b>Hurry Up!</b></h5>
                <h2 class="text-center"><b>Up To 25% Discount Check it Out</b></h2>
                <div class="row w-100 my-3 justify-content-center">
                    <?php
                    $time = array(["id" => "discount_days", "title" => "DAYS"], ["id" => "discount_hours", "title" => "HOURS"], ["id" => "discount_minutes", "title" => "MINUTES"], ["id" => "discount_seconds", "title" => "SECONDS"]);

                    for ($num = 0; $num < count($time); $num++) {
                        ?>
                        <div class="col-md-2 col-sm-4 col-5 text-dark text-center border m-2 p-1">
                            <div class="card py-3 m-0">
                                <h1><b id="<?php echo $time[$num]["id"]; ?>">-</b></h1>
                                <h5>
                                    <b>
                                        <?php echo $time[$num]["title"]; ?>
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <a href="ticket_booking.php" class="btn btn-info py-2 px-4"><b>Book Now</b></a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="text-center">
        <h2>
            <b>CUSTOMER TESTIMONIALS RR</b>
        </h2>
        <h5>
            Read what our customers have to say about our fleet and services. ter
        </h5>
    </div>
    <div>
        <div class="py-4">
            <div class="row">
                <div class="offset-1 col-11">
                    <div class="owl-carousel owl-theme" id="HomeClientSlider">
                        <?php
                        $query = "SELECT * FROM `inquiry` WHERE `status` = 1;";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="item h-100">
                                <div class="card shadow overflow-hidden m-2 h-100 pt-2">
                                    <div class="row h-100 align-items-start">
                                        <div class="col-12 py-2 px-4">
                                            <img src="Images/Client-Qutes.svg" alt="" class="w-25">
                                        </div>
                                        <div class="col-12 py-2 px-4 h-100">
                                            <h5 class="text-truncate">
                                                <i>
                                                    <?php echo ($row['name'] != "") ? $row['name'] : "<br />"; ?>
                                                </i>
                                            </h5>
                                            <h6 class="text-truncate">
                                                <?php echo ($row['email'] != "") ? $row['email'] : "<br />"; ?>
                                            </h6>
                                            <hr class="border border-info">
                                            <h4 class="text-truncate">
                                                <b>
                                                    <?php echo ($row['subject'] != "") ? $row['subject'] : "<br />"; ?>
                                                </b>
                                            </h4>
                                            <p class="text-secondary overflow-hidden"
                                                style="min-height: 123px;max-height: 123px;">
                                                <?php echo ($row['message'] != "") ? $row['message'] : "<br />"; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('components/footer.php');
?>
<script>

    setInterval(() => {
        var CreateDate = new Date("01-08-2004");
        var diffrence = (CreateDate) - (new Date());
        while (diffrence < 0) {
            CreateDate.setFullYear(CreateDate.getFullYear() + 1);
            diffrence = (CreateDate) - (new Date());
        }
        var date = Math.floor(diffrence / 1000 / 60 / 60 / 24);
        var hour = Math.floor(diffrence / 1000 / 60 / 60) % 24;
        var minute = Math.floor(diffrence / 1000 / 60) % 60;
        var second = Math.floor(diffrence / 1000) % 60;
        $('#discount_days').html((date < 10) ? "0" + date : date);
        $('#discount_hours').html((hour < 10) ? "0" + hour : hour);
        $('#discount_minutes').html((minute < 10) ? "0" + minute : minute);
        $('#discount_seconds').html((second < 10) ? "0" + second : second);
    }, 1000)

    $(document).ready(function () {

        set_journey_date();

        $('#HomeClientSlider').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })

    })

    function set_journey_date() {
        var min_date = "<?php echo date("Y-m-d"); ?>";
        var max_date = "<?php echo date('Y-m-d', strtotime('+1 year')); ?>";
        $('#trip_start_date').attr({ "min": min_date, "max": max_date });
        $('#trip_end_date').attr({ "min": min_date, "max": max_date });
    }

    function set_return_date() {
        if
            ($('#trip_start_date').val() != "") {
            var date = new Date($('#trip_start_date').val());
            var max_date = (date.getFullYear() + 1) + "-" + ((date.getMonth() + 1 < 10) ? "0" + (date.getMonth() + 1) : date.getMonth() + 1) + "-" + ((date.getDate() < 10) ? "0" + date.getDate() : date.getDate());
            $('#trip_end_date').attr({ "max": max_date });
        }
    }

    function set_clear_date() {
        $('#trip_end_date').val("");
        set_journey_date();
    }

</script>
<?php
include('components/foot_links.php');
?>