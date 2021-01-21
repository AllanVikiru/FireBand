<!-- Set New Firefighter Credentials Modal -->
<div class="modal fade" id="modal-new-ts" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideleft" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <form class="js-validation-new-user" id="set-ts-form" action="#" method="post">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title text-white">Register Firefighter ThingSpeak Credentials</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="form-group mb-15">
                            <label for="new-username">Select Name</label>
                                <div id="users"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="user-channel">FireBand Live Channel ID</label>
                                <input class="form-control" type="text" id="user-channel" name="user-channel">
                            </div>
                            <div class="col-6">
                                <label for="wizard-simple-lastname">FireBand Read Data API Key</label>
                                <input class="form-control" type="text" id="user-key" name="user-key">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-alt-secondary">Clear</button>
                            <button type="submit" class="btn btn-alt-success" name="register" value="register">
                                <i class="fa fa-check"></i>&ensp;Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Set New Firefighter Credentials Modal -->