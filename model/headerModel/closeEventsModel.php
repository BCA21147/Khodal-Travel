<?php
function closeEventsModel($modelId, $modelIcon, $modelTitle, $modelEvents)
{
    ?>
    <div class="modal fade" id="<?php echo $modelId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="<?php echo $modelIcon; ?> pr-3"></i>
                        <b>
                            <?php echo $modelTitle; ?>
                        </b>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" <?php echo $modelEvents; ?>>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
}
?>