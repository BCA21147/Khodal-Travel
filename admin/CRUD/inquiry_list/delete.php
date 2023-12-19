<?php

include('../db_connection.php');

extract($_GET);
extract($_POST);

if (isset($_POST['delete_id'])) {

    $query = "DELETE FROM `inquiry` WHERE `id` = '$delete_id';";
    mysqli_query($con, $query);

}

if (isset($_GET['id'])) {

    $query = "SELECT * FROM `inquiry` WHERE id = $id";
    $result_inquiry = mysqli_query($con, $query);
    if ($result_inquiry) {
        $inquiry = mysqli_fetch_assoc($result_inquiry);
        ?>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>DELETE INQUIRY</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>

                <h5>The Following Data Will Be Deleted.</h5>

                <div class='py-2'>
                    <div class='py-1 px-3 display-5' style='background-color: rgba(108, 117, 125,.3);font-weight: bold'>Inquiry
                    </div>
                    <div class='table-responsive py-2'>
                        <table class='table table-hover table-bordered'>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No.</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $inquiry['id']; ?>.
                                    </td>
                                    <td>
                                        <?php echo $inquiry['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $inquiry['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $inquiry['mobile_no']; ?>
                                    </td>
                                    <td>
                                        <?php echo $inquiry['subject']; ?>
                                    </td>
                                    <td>
                                        <?php echo $inquiry['message']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-danger' data-dismiss='modal'
                    onclick='inquiry_delete_data(<?php echo $inquiry['id']; ?>)'>Confirm</button>
            </div>
        </div>
        <?php
    }
}

if (isset($_POST['status_id']) && isset($_POST['status'])) {

    $query = "UPDATE `inquiry` SET `status` = $status WHERE `id` = '$status_id';";
    mysqli_query($con, $query);

}

?>