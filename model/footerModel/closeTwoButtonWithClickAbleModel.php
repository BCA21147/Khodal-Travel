<?php
function closeTwoButtonWithClickAbleModel($firstButtonClass, $firstButtonText, $secondButtonEvents, $secondButtonClass, $secondButtonText)
{
    ?>
    <div class="modal-footer">
        <button type="button" class="btn <?php echo $firstButtonClass; ?>" data-dismiss="modal">
            <?php echo $firstButtonText; ?>
        </button>
        <a href="<?php echo $secondButtonEvents; ?>" type="button" class="btn <?php echo $secondButtonClass; ?>">
            <?php echo $secondButtonText; ?>
        </a>
    </div>
    </div>
    </div>
    </div>
    <?php
}
?>