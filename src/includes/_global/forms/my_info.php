<?php

use Delight\Cookie\Session;
?>
<form id="my-user-form" action="#" method="post">
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
    <!-- TODO: Password Reset -->
    <!-- <div class="form-group mb-15">
                        <label for="user-password">New Password</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-asterisk"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" id="old-password" name="user-password" placeholder="New Password..">
                        </div>
                    </div>
                    <div class="form-group mb-15">
                        <label for="user-password-confirm">Confirm New Password</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-asterisk"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" id="new-password-confirm" name="user-password-confirm" placeholder="Confirm New Password..">
                        </div>
                    </div> -->
    <div class="form-group row">
        <div class="col-3">
            <button type="button" class="btn btn-block btn-alt-secondary " data-dismiss="modal">Cancel</button>
        </div>
        <div class="col-5"></div>
        <div class="col-4">
            <button type="submit" class="btn btn-block btn-alt-primary">
                <i class="fa fa-save"></i>&ensp;Update
            </button>
        </div>
    </div>
</form>