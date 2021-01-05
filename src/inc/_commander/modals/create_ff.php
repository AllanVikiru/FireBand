<?php ?>
<div class="modal fade" id="modal-create-ff" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideleft" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <form action="login.php" method="post">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title text-white">Register Firefighter</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <!-- Progress Wizard -->
                        <div class="js-wizard-simple block">
                            <!-- Step Tabs -->
                            <ul class="nav nav-tabs nav-tabs-block nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#wizard-progress-step1" data-toggle="tab">1. Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#wizard-progress-step2" data-toggle="tab">2. Biodata</a>
                                </li>
                            </ul>
                            <!-- END Step Tabs -->
                                <!-- Wizard Progress Bar -->
                                <div class="block-content block-content-sm">
                                    <div class="progress" data-wizard="progress" style="height: 8px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!-- END Wizard Progress Bar -->

                                <!-- Steps Content -->
                                <div class="block-content block-content-full tab-content" style="min-height: 265px;">
                                    <!-- Step 1 -->
                                    <div class="tab-pane active" id="wizard-progress-step1" role="tabpanel">
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label for="wizard-simple-firstname">First Name</label>
                                                <input class="form-control" type="text" id="wizard-simple-firstname" name="wizard-simple-firstname">
                                            </div>
                                            <div class="col-6">
                                                <label for="wizard-simple-lastname">Last Name</label>
                                                <input class="form-control" type="text" id="wizard-simple-lastname" name="wizard-simple-lastname">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="wizard-simple-email">Email</label>
                                                <input class="form-control" type="email" id="wizard-simple-email" name="wizard-simple-email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="wizard-simple-email">Phone</label>
                                                <input class="form-control" type="email" id="wizard-simple-email" name="wizard-simple-email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label for="wizard-simple-firstname">FireBand Live Channel ID</label>
                                                <input class="form-control" type="text" id="wizard-simple-firstname" name="wizard-simple-firstname">
                                            </div>
                                            <div class="col-6">
                                                <label for="wizard-simple-lastname">FireBand Read Data API Key</label>
                                                <input class="form-control" type="text" id="wizard-simple-lastname" name="wizard-simple-lastname">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Step 1 -->

                                    <!-- Step 2 -->
                                    <div class="tab-pane" id="wizard-progress-step2" role="tabpanel">
                                        <div class="form-group row">
                                            <div class="col-3">
                                                <label for="wizard-simple-firstname">Date of Birth</label>
                                            </div>
                                            <div class="col-9">
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="js-masked-date-dash form-control" id="example-masked-date2" name="example-masked-date2" placeholder="dd-mm-yyyy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-3">
                                                <label for="wizard-simple-firstname">Gender</label>
                                            </div>
                                            <div class="col-9">
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="gender-f" value="0">
                                                    <label class="custom-control-label" for="gender-f">Female</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="gender-m" value="1">
                                                    <label class="custom-control-label" for="gender-m">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="gender-nb" value="2">
                                                    <label class="custom-control-label" for="gender-nb">Non-binary</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="gender-rns" value="3">
                                                    <label class="custom-control-label" for="gender-rns">Rather not say</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-3">
                                                <label for="wizard-simple-firstname">Weight</label>
                                            </div>
                                            <div class="col-9">
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-balance-scale"></i>
                                                        </span>
                                                    </div>
                                                    <input type="number" class="form-control" id="weight" name="weight">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kg</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-3">
                                                <label for="wizard-simple-firstname">Height</label>
                                            </div>
                                            <div class="col-9">
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-line-chart"></i>
                                                        </span>
                                                    </div>
                                                    <input type="number" class="form-control" id="height" name="height">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Step 2 -->
                                </div>
                                <!-- END Steps Content -->

                                <!-- Steps Navigation -->
                                <div class="block-content block-content-sm block-content-full bg-body-light">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-alt-secondary" data-wizard="prev">
                                                <i class="fa fa-angle-left mr-5"></i> Previous
                                            </button>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="button" class="btn btn-alt-secondary" data-wizard="next">
                                                Next <i class="fa fa-angle-right ml-5"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Steps Navigation -->
                        </div>
                        <!-- END Progress Wizard -->
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-alt-secondary">Cancel</button>
                        <button type="submit" class="btn btn-alt-success">
                            <i class="fa fa-check"></i> Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>