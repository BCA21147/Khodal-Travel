<?php

include('../db_connection.php');
extract($_POST);

if (isset($_POST['fetch_data'])) {

    $data = "";

    $query = "SELECT * FROM `inquiry`";
    $result = mysqli_query($con, $query);

    if (isset($_POST['search'])) {

        $query = "SELECT * FROM `inquiry` WHERE `id` LIKE '%$search%' or `name` LIKE '%$search%' or `email` LIKE '%$search%' or `mobile_no` LIKE '%$search%' or `subject` LIKE '%$search%' or `message` LIKE '%$search%';";
        $result = mysqli_query($con, $query);

    }

    if ($result) {
        ?>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
                    <th>Subject</th>
                    <th>Status</th>
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
                            <?php echo $row['name']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['mobile_no']; ?>
                        </td>
                        <td>
                            <?php echo $row['subject']; ?>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input"
                                        id="inquiry_status_<?php echo $row['id']; ?>" <?php echo ($row['status'] == 1) ? 'checked' : ''; ?> onchange="ChangeInquiryStatus('<?php echo $row['id']; ?>')">
                                    <label class="custom-control-label" for="inquiry_status_<?php echo $row['id']; ?>">
                                        <?php echo ($row['status'] == 1) ? 'ACTIVE' : 'DISABLE'; ?>
                                    </label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class='d-flex'>
                                <div class='btn btn-primary' title='View' data-toggle='modal' data-target='#InquiryViewModal'
                                    onclick='inquiry_view(<?php echo $row['id']; ?>)'>
                                    <i class='fa-solid fa-eye'></i>
                                </div>
                                <div class='px-1'></div>
                                <div class='btn btn-danger' title='Delete' data-toggle='modal' data-target='#InquiryDeleteModal'
                                    onclick='inquiry_delete(<?php echo $row['id']; ?>)'>
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