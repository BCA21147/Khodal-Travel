<?php

include("../db_connection.php");

extract($_POST);

if (isset($_POST['id'])) {
    if ($id != '') {
        echo "<option value='' selected disabled> None</option>";
        $query = "SELECT * FROM vehical WHERE fleet_type LIKE '[$id]|[%%]';";
        $result = mysqli_query($con, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <option value='[<?php echo $row['id']; ?>]|[<?php echo $row['reg_no']; ?>]'>
                    <?php echo $row['reg_no'] ?>
                </option>
                <?php
            }
        }
    } else {
        echo "<option value='' selected disabled> None</option>";
    }
}

?>