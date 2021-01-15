<?php ?>
<!-- User Information Modal -->
<div class="modal fade" id="modal-user-info" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <!-- Start Form -->
                <form class="js-validation-user" id="update-user-form" action="#" method="post">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title text-white">User Details</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <input type="hidden" id="user-id" name="user-id"/>
                    <div class="block-content">
                        <div class="form-group row mb-15">
                            <div class="col-6">
                                <label for="user-firstname">First Name</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="user-firstname" name="user-firstname">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="user-lastname">Last Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="user-lastname" name="user-lastname">
                                </div>
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
                                <input type="email" class="form-control" id="user-email" name="user-email">
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="user-phone">Phone</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                </div>
                                <input type="text" data-mask = "+254000000000" class="form-control" id="user-phone" name="user-phone">
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="user-password">New Password</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-asterisk"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" id="user-pw" name="user-pw" placeholder="New Password..">
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
                                <input type="password" class="form-control" id="user-pw-confirm" name="user-pw-confirm" placeholder="Confirm New Password..">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group row">
                            <div class="col-3 text-left">
                                <button type="button" class="btn btn-alt-secondary " data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-9 text-right">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-save"></i>&ensp;Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END Form -->
            </div>
        </div>
    </div>
</div>
<!-- END User Information Modal -->