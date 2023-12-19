<?php
function closeTwoButtonEventsModel($firstButtonClass, $firstButtonText, $firstButtonEvents, $secondButtonClass, $secondButtonText, $secondButtonEvents)
{
    ?>
    <div class="modal-footer">
        <button type="button" class="btn <?php echo $firstButtonClass; ?>" data-dismiss="modal" <?php echo $firstButtonEvents; ?>>
            <?php echo $firstButtonText; ?>
        </button>
        <button type="button" class="btn <?php echo $secondButtonClass; ?>" data-dismiss="modal" <?php echo $secondButtonEvents; ?>>
            <?php echo $secondButtonText; ?>
        </button>
    </div>
    </div>
    </div>
    </div>
    <?php
}
?>