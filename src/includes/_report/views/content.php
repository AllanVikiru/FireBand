<!-- Report Content -->
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Data Report</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
                <i class="si si-printer"></i> Print Report
            </button>
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
        </div>
    </div>
    <div class="content">
        <div class="row invisible" data-toggle="appear">
            <div class="col-xl-6">
                <p><strong class="font-w700">Age: </strong> <mark id="ff-age"></mark> </p>
                <p><strong class="font-w700">Sex: </strong> <mark id="ff-sex"></mark> </p>
                <p><strong class="font-w700">Weight (kg): </strong> <mark id="ff-height"></mark> </p>
                <p><strong class="font-w700">Height (cm): </strong> <mark id="ff-weight"></mark> </p>
            </div>
            <div class="col-xl-6">
                <p><strong class="font-w700">VO<sub>2</sub> max estimate [One Mile Jog Test]</strong></p>
                <p><strong class="font-w700">Value (ml/kg/min): </strong> <mark id="ff-value"></mark> </p>
                <p><strong class="font-w700">Rating: </strong> <mark id="ff-status"></mark> </p>
                <p><strong class="font-w700">Last Test Date: </strong> <mark id="ff-date"></mark> </p>
            </div>

            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-primary-lighter">
                        <h3 class="block-title">
                            Heart Rate <small>All time</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe id="heartrate" width="100%" height="300" style="border: 1px solid #cccccc;"></iframe>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-primary-lighter">
                        <h3 class="block-title">
                            Ground Speed <small>All time</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe id="speed" width="100%" height="300" style="border: 1px solid #cccccc;"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row invisible" data-toggle="appear">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-primary-lighter">
                        <h3 class="block-title">
                            Air Temperature <small>All time</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe id="temperature" width="100%" height="300" style="border: 1px solid #cccccc;"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-primary-lighter">
                        <h3 class="block-title">
                            Relative Humidity <small>All time</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe id="humidity" width="100%" height="300" style="border: 1px solid #cccccc;"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row invisible" data-toggle="appear">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header bg-primary-lighter">
                        <h3 class="block-title">
                            Geographical Map <small>Last Path Travelled</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <iframe id="location" width="100%" height="300" style="border: 1px solid #cccccc;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Report Content -->