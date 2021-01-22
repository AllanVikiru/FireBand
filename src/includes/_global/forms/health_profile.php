<form id="ff-profile-form" action="#" method="post">
    <input type="hidden" id="user-profile-id" name="user-profile-id" />
    <div class="form-group row">
        <div class="col-3">
            <label for="user-dob">Date of Birth</label>
        </div>
        <div class="col-9">
            <div class="input-group">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
                <input type="text" class="js-datepicker form-control" id="example-datepicker2" name="example-datepicker2" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-3">
            <label for="user-sex">Sex</label>
        </div>

        <div class="col-9">
            <div id="sexes"></div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-3">
            <label for="user-weight">Weight</label>
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
            <label for="user-height">Height</label>
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
    <div class="form-group row">
        <div class="col-6">
            <button type="button" class="btn btn-block btn-alt-secondary " data-dismiss="modal">Cancel</button>
        </div>
        <div class="col-6">
            <button type="submit" class="btn btn-block btn-alt-primary">
                <i class="fa fa-save"></i>&ensp;Update
            </button>
        </div>
    </div>
</form>