<?php

function JSOperationFunction($firstName)
{
    ?>
    <script>

        function fetch_data() {
            $.ajax({
                type: "POST",
                url: "CRUD/<?php echo $firstName; ?>_list/fetch_data.php",
                data: {
                    fetch_data: "fetch_data"
                },
                success: function (data, status) {
                    $('#fetch_<?php echo $firstName; ?>_data').html(data);
                }
            })
        }

        function search_<?php echo $firstName; ?>_data(value) {
            $.ajax({
                type: "POST",
                url: "CRUD/<?php echo $firstName; ?>_list/fetch_data.php",
                data: {
                    fetch_data: "fetch_data",
                    search: value
                },
                success: function (data, status) {
                    $('#fetch_<?php echo $firstName; ?>_data').html(data);
                }
            })
        }

        function <?php echo $firstName; ?>_update(id) {
            $.ajax({
                type: "GET",
                url: `CRUD/<?php echo $firstName; ?>_list/update.php?id=${id}`,
                success: function (data, status) {
                    $('#<?php echo $firstName; ?>_update_model').html(data);
                }
            })
        }

        function <?php echo $firstName; ?>_delete(id) {
            $.ajax({
                type: "GET",
                url: `CRUD/<?php echo $firstName; ?>_list/delete.php?id=${id}`,
                success: function (data, status) {
                    $('#<?php echo $firstName; ?>_delete_model').html(data);
                }
            })
        }

        function <?php echo $firstName; ?>_delete_data(id) {
            $.ajax({
                type: "POST",
                url: 'CRUD/<?php echo $firstName; ?>_list/delete.php',
                data: {
                    delete_id: id
                },
                success: function (data, status) {
                    fetch_data();
                }
            })
        }
    </script>
    <?php
}

?>