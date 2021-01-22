<?php

use Delight\Cookie\Session;

$id = Session::get('id');
//TODO: reset password for users through the form. information through commander and s/a
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
                <a class="align-middle link-effect text-primary-dark font-w600"><?= Session::get('username') ?></a>
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
                <?php require_once '../src/includes/_global/forms/v02_calculator.php' ?>
            </div>
        </div>
        <!-- END Calculate VO2 max -->
        <!-- Edit health Profile  -->
        <div class="block pull-r-l">
            <div class="block-header bg-body-light">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-medkit font-size-default mr-5"></i>
                    Health Profile
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <?php require_once '../src/includes/_global/forms/health_profile.php' ?>
            </div>
        </div>
        <!-- END Health Profile -->
        <!-- Edit Account Profile -->
        <div class="block pull-r-l">
            <div class="block-header bg-body-light">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-id-card font-size-default mr-5"></i>
                    My Account
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <?php require_once '../src/includes/_global/forms/my_info.php' ?>
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