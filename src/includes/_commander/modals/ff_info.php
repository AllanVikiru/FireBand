<!-- Slide Up Modal -->
<div class="modal fade" id="modal-ff-info" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title text-white">Firefighter Details</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="js-wizard-simple block">
                        <!-- Step Tabs -->
                        <ul class="nav nav-tabs nav-tabs-block nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#wizard-simple-step1" data-toggle="tab">1. VO<sub>2</sub> max </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#wizard-simple-step2" data-toggle="tab">2. Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#wizard-simple-step3" data-toggle="tab">3. Health Profile</a>
                            </li>
                        </ul>
                        <!-- END Step Tabs -->
                        <!-- Steps Content -->
                        <div class="block-content block-content-full tab-content" style="min-height: 265px;">
                            <!-- Step 1 -->
                            <div class="tab-pane active" id="wizard-simple-step1" role="tabpanel">
                                <?php require_once '../src/includes/_global/forms/v02_calculator.php' ?>
                            </div>
                            <!-- END Step 1 -->

                            <!-- Step 2 -->
                            <div class="tab-pane" id="wizard-simple-step2" role="tabpanel">
                                <form id="ff-user-form" action="#" method="post">
                                    <input type="hidden" id="user-id" name="user-id" />
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="user-name">Full Name</label>
                                            <input class="form-control" type="text" id="user-name" name="user-name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="user-email">Email</label>
                                            <input class="form-control" type="email" id="user-email" name="user-email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label for="user-channel">FireBand Live Channel ID</label>
                                        </div>
                                        <div class="col-6">
                                            <label for="user-key">FireBand Read Data API Key</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <mark id="user-channel" name="user-channel"></mark>
                                        </div>
                                        <div class="col-6">
                                            <mark id="user-key" name="user-key"></mark>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-block btn-alt-secondary" data-dismiss="modal"> Cancel</button>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-block btn-alt-primary">
                                                <i class="fa fa-save"></i>&ensp;Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- END Step 2 -->

                            <!-- Step 3 -->
                            <div class="tab-pane" id="wizard-simple-step3" role="tabpanel">
                            <?php require_once '../src/includes/_global/forms/health_profile.php' ?>
                            </div>
                            <!-- END Step 3 -->
                        </div>
                        <!-- END Steps Content -->
                    </div>
                </div>
                </form>
                <!-- END Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Slide Up Modal -->