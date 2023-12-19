<?php

function DeleteUpdateModel($firstName, $secondName, $thirdName)
{
    ?>
    <!-- DELETE <?php echo $firstName; ?> - Model -->
    <div class='modal fade' id='<?php echo $secondName; ?>DeleteModal' tabindex='-1' role='dialog'
        aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable' role='document'
            id="<?php echo $thirdName; ?>_delete_model">

        </div>
    </div>
    <!-- UPDATE <?php echo $firstName; ?> - Modal -->
    <form method="post" id="update_<?php echo $thirdName; ?>_id" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="<?php echo $secondName; ?>UpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document"
                id="<?php echo $thirdName; ?>_update_model">

            </div>
        </div>
    </form>
    <?php
}

?>