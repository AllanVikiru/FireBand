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