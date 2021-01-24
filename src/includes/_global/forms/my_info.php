<?php

use Delight\Cookie\Session;
?>
<!-- Start My Profile Form -->
<form class="js-validate-my-profile" id="my-user-form" action="#" method="post">
    <input type="hidden" id="my-id" name="my-id" value="<?= Session::get('id') ?>" />
    <div class="form-group mb-15">
        <label for="new-username">Full Name</label>
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fa fa-user"></i>
                </span>
            </div>
            <input type="text" class="form-control" id="my-name" name="my-name">
        </div>
    </div>
    <div class="form-group mb-15">
        <label for="user-email">Email</label>
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
            <input type="email" class="form-control" id="my-email" name="my-email">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-6">
            <button type="button" class="btn btn-block btn-alt-secondary " data-dismiss="modal">Cancel</button>
        </div>
        <div class="col-6">
            <button type="submit" class="btn btn-block btn-alt-primary">
                <i class="fa fa-save"></i>&ensp;Update
            </button>
        </div>
    </div>
</form>
<!-- END My Profile Form -->