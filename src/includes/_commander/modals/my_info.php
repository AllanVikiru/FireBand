<?php ?>
<!-- Slide Up Modal -->
<div class="modal fade" id="modal-my-info" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideright" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
            <form action="#" method="post">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title text-white">My Information</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                        <div class="form-group mb-15">
                            <label for="user-name">Name</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="user-name" name="user-name" value="John Smith">
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
                                <input type="email" class="form-control" id="user-email" name="user-email" value="john.smith@example.com">
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
                                <input type="text" class="form-control" id="user-phone" name="user-phone" placeholder="+254701234567">
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
                                <input type="password" class="form-control" id="user-password" name="user-password" placeholder="New Password..">
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
                                <input type="password" class="form-control" id="user-password-confirm" name="user-password-confirm" placeholder="Confirm New Password..">
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-alt-primary">
                    <i class="fa fa-save"></i>&ensp;Update
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END Slide Up Modal -->