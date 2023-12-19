<?php
function singleButtonModel($buttonClass, $buttonText)
{
    ?>
    <div class="modal-footer">
        <button type="button" class="btn <?php echo $buttonClass; ?>" data-dismiss="modal">
            <?php echo $buttonText; ?>
        </button>
    </div>
    </div>
    </div>
    </div>
    <?php
}
?>