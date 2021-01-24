<!-- Start VO2 Calculator Form -->
<div class="alert alert-info" role="alert">
    <h5 class="alert-heading font-size-h5 font-w600">One Mile Jog Test</h5>
    <mark> 1 mile = 1.6093 km </mark>
    <p class="mb-0"><strong class="font-w700">Women:</strong> 100.5 - (0.1636 x weight in kg) - (1.438 x run time in min) - (0.1928 x heart rate)</p>
    <p class="mb-0"><strong class="font-w700">Men:</strong> 108.844 - (0.1636 x weight in kg) - (1.438 x run time in min) - (0.1928 x heart rate)</p>
</div>
<input type="hidden" id="user-age" name="user-age" />
<input type="hidden" id="user-selected-sex" name="user-selected-sex" />
<input type="hidden" id="user-kg" name="user-kg" />
<div class="form-group mb-15">
    <label for="user-runtime">Run Time</label>
    <div class="input-group">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fa fa-clock-o"></i>
            </span>
        </div>
        <input type="number" class="form-control" id="user-runtime" name="user-runtime">
        <div class="input-group-append">
            <span class="input-group-text">minutes</span>
        </div>
    </div>
</div>
<div class="form-group mb-15">
    <label for="user-heartrate">Heart Rate</label>
    <div class="input-group">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fa fa-heartbeat"></i>
            </span>
        </div>
        <input type="number" class="form-control" id="user-heartrate" name="user-heartrate">
        <div class="input-group-append">
            <span class="input-group-text">bpm</span>
        </div>
    </div>
</div>
<div class="form-group mb-15">
    <label for="user-vo2">VO<sub>2</sub></label>
    <div class="input-group">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fa fa-sliders"></i>
            </span>
        </div>
        <input type="text" class="form-control" id="user-vo2" name="user-vo2">
        <div class="input-group-append">
            <span class="input-group-text">ml/kg/min</span>
        </div>
    </div>
</div>
<div class="form-group mb-15">
    <label for="status">Status</label>
    <div class="input-group">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fa fa-info"></i>
            </span>
        </div>
        <input type="text" class="form-control" id="user-status" name="user-status">
    </div>
</div>
<div class="form-group row">
    <div class="col-6">
        <button type="reset" class="btn btn-block btn-alt-secondary">
            <i class="si si-reload mr-5"></i>
            Reset
        </button>
    </div>
    <div class="col-6">
        <button type="submit" class="calculate-vo2max btn btn-block btn-alt-info">
            <i class="fa fa-calculator mr-5"></i>
            Calculate
        </button>
    </div>
</div>
</form>
<!-- END VO2 Calculator Form -->