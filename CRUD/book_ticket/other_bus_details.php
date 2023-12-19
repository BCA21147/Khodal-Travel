<?php
include('../../admin/CRUD/db_connection.php');
extract($_POST);

if (isset($_POST['action']) && isset($_POST['data'])) {

    ?>
    <div class="row mx-0 mb-3">
        <div class="col-12">
            <div class="card p-3 m-0 shadow border">
                <?php
                if ($action == "BUSPHOTOS") {
                    ?>
                    <?php
                    $query = "SELECT * FROM `vehical` WHERE CONCAT('[',id,']|[',reg_no,']')='$data';";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="row">
                            <?php
                            foreach (unserialize($row['images']) as $index => $image) {
                                if (file_exists("../../Images/$image")) {
                                    ?>
                                    <div class="col-md-4 col-sm-6 col-12 p-2">
                                        <div class="p-1 border border-primary rounded">
                                            <img src="Images/<?php echo $image; ?>" alt="" class="w-100 rounded">
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-md-4 col-sm-6 col-12 p-2">
                                        <div
                                            class="p-1 h-100 border border-primary rounded d-flex justify-content-center align-items-center">
                                            <b>
                                                <center>No Image Found.</center>
                                            </b>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                } else if ($action == "REVIEWS") {
                    ?>
                        <h5>
                            <b>No Any Reviews Are Available At Time.</b>
                        </h5>
                    <?php
                } else if ($action == "POLICIES") {
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
                } else {
                    ?>
                            <h3>
                                <center><b>No Data Found.</b></center>
                            </h3>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php

}

?>