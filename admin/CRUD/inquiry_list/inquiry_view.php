<?php

include('../db_connection.php');

extract($_GET);

// Single Inquiry Data :- 
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `inquiry` WHERE id = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class='modal-content'>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">VIEW INQUIRY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center py-2 px-3">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <div class="table-responsive">
                                <table class="table table-borderless border border-dark">
                                    <tr class="border border-dark">
                                        <th>Name</th>
                                        <td>
                                            <?php echo $row['name']; ?>
                                        </td>
                                    </tr>
                                    <tr class="border border-dark">
                                        <th>Email ID</th>
                                        <td>
                                            <?php echo $row['email']; ?>
                                        </td>
                                    </tr>
                                    <tr class="border border-dark">
                                        <th>Mobile No.</th>
                                        <td>
                                            <?php echo $row['mobile_no']; ?>
                                        </td>
                                    </tr>
                                    <tr class="border border-dark">
                                        <th>Subject</th>
                                        <td>
                                            <?php echo $row['subject']; ?>
                                        </td>
                                    </tr>
                                    <tr class="border border-dark">
                                        <th>Message</th>
                                        <td>
                                            <?php echo $row['message']; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        <?php
    }
}

?>