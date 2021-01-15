<?php ?>
<div class="modal fade" id="modal-new-user" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideleft" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <form action="../src/app/_superadmin/users/create.php" method="post">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title text-white">Register User</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
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
                                    <input type="text" class="form-control" id="user-firstname" name="new-firstname" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="user-lastname">Last Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="user-lastname" name="new-lastname" placeholder="Last Name">
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
                                <input type="email" class="form-control" id="new-email" name="new-email" placeholder="example@mail.com">
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
                                <input type="text" class="form-control" id="new-phone" name="new-phone" placeholder="+254701234567">
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <div class="form-group row">
                                <div class="col-2">
                                    <label for=>Role</label>
                                </div>
                                <div class="col-10">
                                    <div class="custom-control custom-radio custom-control-inline mb-5">
                                        <input class="custom-control-input" type="radio" name="example-inline-radios" id="ff" value="3">
                                        <label class="custom-control-label" for="ff">Firefighter</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mb-5">
                                        <input class="custom-control-input" type="radio" name="example-inline-radios" id="comm" value="2">
                                        <label class="custom-control-label" for="comm">Commander</label>
                                    </div>
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