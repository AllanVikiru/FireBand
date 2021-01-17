<!-- Create New User Modal -->
<div class="modal fade" id="modal-new-user" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideleft" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <form class="js-validation-new-user" id="create-user-form" action="#" method="post">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title text-white">Register User</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="form-group mb-15">
                            <label for="new-username">Full Name</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="new-username" name="new-username" placeholder="Jane Q. User">
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="new-email">Email</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" id="new-email" name="new-email" placeholder="example@mail.com">
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <div class="form-group row">
                                <div class="col-2">
                                    <label for=>Role</label>
                                </div>
                                <div class="col-10">
                                    <div id="roles"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-alt-secondary">Clear</button>
                        <button type="submit" class="btn btn-alt-success" name="register" value="register">
                            <i class="fa fa-check"></i>&ensp;Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Create New User Modal -->