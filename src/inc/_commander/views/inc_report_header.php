<?php
// header section for commander dashboard
?>

<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <div class="content-header-section">
        <mark class="text-dark-op font-italic font-w400">Header Image Credits: 
            <a class="link-effect" href="https://www.pexels.com//@tomfisk">Tom Fisk</a> from Pexels</mark> 
        </div>
        <!-- Right Section -->
        <div class="content-header-section">
            <!-- User Dropdown -->
            <div class="btn-group float-right" role="group">
                <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-md d-sm-none"></i>
                    <span class="d-none d-sm-inline-block">Dr. Stone</span>
                    <i class="fa fa-angle-down ml-5"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                    <a class="dropdown-item" href="../src/commander.php">
                        <i class="fa fa-home mr-5"></i> Back to Dashboard
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="si si-logout mr-5"></i> Sign Out
                    </a>
                </div>
            </div>
            <!-- END User Dropdown -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
    <!-- Header Loader -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->
