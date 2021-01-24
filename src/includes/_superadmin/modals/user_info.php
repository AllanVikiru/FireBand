<!-- User Information Modal -->
<div class="modal fade" id="modal-user-info" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <!-- Start Form -->
                <form class="js-validate-user-profile" id="update-user-form" action="#" method="post">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title text-white">User Details</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <input type="hidden" id="user-id" name="user-id" />
                    <div class="block-content">
                        <div class="form-group mb-15">
                            <label for="new-username">Full Name</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="user-name" name="user-name">
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