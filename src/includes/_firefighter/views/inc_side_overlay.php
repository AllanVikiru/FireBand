<?php
?>
<!-- Side Overlay-->
<aside id="side-overlay">
    <!-- Side Header -->
    <div class="content-header content-header-fullrow">
        <div class="content-header-section align-parent">
            <!-- Close Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                <i class="fa fa-times text-danger"></i>
            </button>
            <!-- END Close Side Overlay -->

            <!-- User Info -->
            <div class="content-header-item">
                <a class="img-link mr-5" href="javascript:void(0)">
                    <?php $cb->get_avatar('15', '', 32, false); ?>
                </a>
                <a class="align-middle link-effect text-primary-dark font-w600">John Smith</a>
            </div>
            <!-- END User Info -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Side Content -->
    <div class="content-side">
        <!-- Calculate VO2 max -->
        <div class="block pull-r-l">
            <div class="block-header bg-body-light">
                <h3 class="block-title">
                    <i class="si si-calculator font-size-default mr-5"></i>
                    VO<sub>2</sub> max Calculator
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
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
        </div>
        <!-- END Calculate VO2 max -->
        <!-- Edit Profile Biodata -->
        <div class="block pull-r-l">
            <div class="block-header bg-body-light">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-medkit font-size-default mr-5"></i>
                    Biodata
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <form action="#" method="post" onsubmit="return false;">
                    <div class="form-group mb-15">
                        <label for="dob">Date of Birth</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                            <input type="text" class="js-datepicker form-control" id="example-datepicker2" name="example-datepicker2" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
                        </div>
                    </div>
                    <div class="form-group mb-15">
                        <div class="form-group row">
                            <label class="col-12">Sex</label>
                            <div class="col-12">
                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="sex-f" value="0">
                                    <label class="custom-control-label" for="sex-f">Female</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="sex-m" value="1">
                                    <label class="custom-control-label" for="sex-m">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="sex-i" value="2">
                                    <label class="custom-control-label" for="sex-i">Intersex</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline mb-5">
                                    <input class="custom-control-input" type="radio" name="example-inline-radios" id="sex-rns" value="3">
                                    <label class="custom-control-label" for="sex-rns">Rather not say</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-15">
                        <label for="weight">Weight</label>
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
                    <div class="form-group mb-15">
                        <label for="height">Height</label>
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
                    <div class="form-group row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-block btn-alt-primary">
                                <i class="fa fa-save mr-5"></i>
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Auth Profile -->
        <!-- Edit Auth Profile -->
        <div class="block pull-r-l">
            <div class="block-header bg-body-light">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-id-card font-size-default mr-5"></i>
                    Profile
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <form action="#" method="post" onsubmit="return false;">
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
                    <div class="form-group row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-block btn-alt-primary">
                                <i class="fa fa-save mr-5"></i> Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Auth Profile -->
        <!-- Image Credits -->
        <div class="block pull-r-l text-center">
            <mark class="text-primary-dark font-w400">Header Image Credits: <br>
                <a class="link-effect" href="https://www.pexels.com//@duncanoluwaseun">Oluwaseun Duncan</a> from Pexels</mark>
        </div>
        <!-- Image Credits -->
    </div>
    <!-- END Side Content -->
</aside>
<!-- END Side Overlay -->