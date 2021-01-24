<!-- Password Reset Modal -->
<?php

use Delight\Cookie\Session;
?>
<div class="modal fade" id="modal-pw-reset" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title text-white">Reset Password</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form class= "js-validate-reset-user-pw" id="pw-reset-form" action="#" method="post">
                        <input type="hidden" id="reset-id" name="reset-id" value="<?= Session::get('id') ?>" />
                        <div class="form-group mb-15">
                            <label for="old-password">Old Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="old-password" name="old-password" placeholder="Enter Old Password">
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="new-password">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="new-password" name="new-password" placeholder="New Password">
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="new-password-confirm">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="new-password-confirm" name="new-password-confirm" placeholder="Confirm New Password">
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Password Reset Modal -->