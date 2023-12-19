<?php

function SearchTableDataModel($firstName, $secondName, $iconName)
{
    ?>
    <div class="row justify-content-center p-lg-4 p-md-2 p-0">
        <div class="col-12">
            <div class="card m-0">
                <div class="h5 fw-bold px-2 px-md-4 py-3 m-0">
                    <?php echo $firstName; ?> List
                </div>
                <hr class="m-0">
                <div class="px-2 px-md-4 py-3">
                    <div class="pb-3">
                        <div class="row m-0 justify-content-between">
                            <div class="col-lg-4 col-md-6 col-sm-7 p-0">
                                <div class="form-group h-100 d-flex align-items-center">
                                    <label for="search" class="px-3 mb-0">Search: </label>
                                    <input type="text" name="search" id="search" class="form-control"
                                        onkeyup="search_<?php echo $secondName; ?>_data(this.value)"
                                        onkeydown="search_<?php echo $secondName; ?>_data(this.value)">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 p-0">
                                <div class="h-100 d-flex align-items-center justify-content-end">
                                    <div class="w-100 btn btn-primary" title="Add <?php echo $firstName; ?>"
                                        data-toggle="modal"
                                        data-target="#<?php echo str_replace(' ', '', $firstName); ?>Modal">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="pr-4">
                                                <i class="fa-solid <?php echo $iconName; ?>"></i>
                                                <i class="fa-solid fa-add position-absolute"
                                                    style="transform:scale(.8);"></i>
                                            </div>
                                            <div>Add
                                                <?php echo $firstName; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" id="fetch_<?php echo $secondName; ?>_data">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

?>