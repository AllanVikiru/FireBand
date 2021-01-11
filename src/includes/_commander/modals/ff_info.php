<?php ?>
<!-- Slide Up Modal -->
<div class="modal fade" id="modal-ff-info" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <form action="be_forms_wizard.php" method="post">
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
                                    <a class="nav-link active" href="#wizard-simple-step1" data-toggle="tab">1. V0<sub>2</sub> max </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#wizard-simple-step2" data-toggle="tab">2. Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#wizard-simple-step3" data-toggle="tab">3. Biodata</a>
                                </li>
                            </ul>
                            <!-- END Step Tabs -->
                            <!-- Steps Content -->
                            <div class="block-content block-content-full tab-content" style="min-height: 265px;">
                                <!-- Step 1 -->
                                <div class="tab-pane active" id="wizard-simple-step1" role="tabpanel">
                                    <div class="alert alert-info" role="alert">
                                        <h5 class="alert-heading font-size-h5 font-w600">One Mile Jog Test</h5>
                                        <mark> 1 mile = 1.6093 km </mark>
                                        <p class="mb-0"><strong class="font-w700">Women:</strong> 100.5 - (0.1636 x weight in kg) - (1.438 x run time in min) - (0.1928 x heart rate)</p>
                                        <p class="mb-0"><strong class="font-w700">Men:</strong> 108.844 - (0.1636 x weight in kg) - (1.438 x run time in min) - (0.1928 x heart rate)</p>
                                    </div>
                                    <form action="#" method="post" onsubmit="return false;">
                                        <div class="form-group mb-15">
                                            <label for="run-time">Run Time</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-clock-o"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" id="run-time" name="run-time">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">minutes</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-15">
                                            <label for="heartrate">Heart Rate</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-heartbeat"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" id="heartrate" name="heartrate">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">bpm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-block btn-alt-info">
                                                    <i class="fa fa-calculator mr-5"></i>
                                                    Calculate
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <button type="reset" class="btn btn-block btn-alt-secondary">
                                                    <i class="si si-reload mr-5"></i>
                                                    Reset
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group mb-15">
                                            <label for="heartrate">V0<sub>2</sub></label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-sliders"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="v02" name="v02" disabled>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">ml/kg/min</span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- END Step 1 -->

                                <!-- Step 2 -->
                                <div class="tab-pane" id="wizard-simple-step2" role="tabpanel">
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
                                <!-- END Step 2 -->

                                <!-- Step 3 -->
                                <div class="tab-pane" id="wizard-simple-step3" role="tabpanel">
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
                                <!-- END Step 3 -->
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
            <!-- END Form -->
        </div>
    </div>
</div>
<!-- END Slide Up Modal -->