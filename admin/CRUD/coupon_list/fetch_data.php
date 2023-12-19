<?php

extract($_POST);

if (isset($_POST['fetch_data'])) {

    $data = "";

    include('../db_connection.php');
    $query = "SELECT * FROM `coupon`";
    $result = mysqli_query($con, $query);

    if (isset($_POST['search'])) {

        $query = "SELECT * FROM `coupon` WHERE `id` LIKE '%$search%' or `code` LIKE '%$search%' or `start_date` LIKE '%$search%' or `end_date` LIKE '%$search%' or `trip` LIKE '%$search%' or `amount` LIKE '%$search%' or `terms_conditions` LIKE '%$search%';";
        $result = mysqli_query($con, $query);

    }

    if ($result) {
        ?>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Amount</th>
                    <th>Trip Name</th>
                    <th>Terms & Conditions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>.
                        </td>
                        <td>
                            <?php echo $row['code']; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y', strtotime($row['start_date'])); ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y', strtotime($row['end_date'])); ?>
                        </td>
                        <td>
                            <?php echo $row['amount']; ?> ₹
                        </td>
                        <td>
                            <?php echo substr(explode("|", $row['trip'])[1], 1, -1) . " - " . substr(explode("|", $row['trip'])[2], 1, -1); ?>
                        </td>
                        <td>
                            <?php echo $row['terms_conditions']; ?>
                        </td>
                        <td>
                            <div class='d-flex'>
                                <div class='btn btn-info' title='Edit' data-toggle='modal' data-target='#CouponUpdateModal'
                                    onclick='coupon_update(<?php echo $row['id']; ?>)'>
                                    <i class='fa-solid fa-pen-to-square'></i>
                                </div>
                                <div class='px-1'></div>
                                <div class='btn btn-danger' title='Delete' data-toggle='modal' data-target='#CouponDeleteModal'
                                    onclick='coupon_delete(<?php echo $row['id']; ?>)'>
                                    <i class='fa-solid fa-trash-can'></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <div class='py-2 py-md-3'>Showing
            <?php echo ((mysqli_num_rows($result) == 0) ? 0 : 1); ?> to
            <?php echo mysqli_num_rows($result); ?> of
            <?php echo mysqli_num_rows($result); ?> Entries
        </div>
        <?php
    }
}

?>