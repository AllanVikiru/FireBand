$(document).ready(function () {
  // show html form when 'create product' button was clicked
  $(document).on("click", ".fetch-user-info", function (e) {
    e.preventDefault();
    // load list of categories
    $.getJSON("../src/api/models/sex/read_all.php", function (data) {
      // build categories option html
      // loop through returned list of data
      var sexes_options_html = `<span>`;
      $.each(data.records, function (key, val) {
        sexes_options_html +=
          `
              <div class="custom-control custom-radio custom-control-inline mb-5">
                  <input class="custom-control-input" type="radio" name="example-inline-radios" id='` +
          val.sex_id +
          `' value='` +
          val.sex_id +
          `'>
                  <label class="custom-control-label" for='` +
          val.sex_id +
          `'>` +
          val.sex +
          `</label>
              </div>`;
      });
      sexes_options_html += `<span>`;
      // we have our html form here where product information will be entered
      // inject html to 'page-content' of our app
      $("#sexes").html(sexes_options_html);
    });
  });

  //'create product form' handle will be here - will run if create product form was submitted
  $(document).on("submit", "#health-profile-info", function () {
    // form data will be here get form data
    var form_data = JSON.stringify($(this).serializeObject());
    // submit form data to api
    $.ajax({
      url: "../src/api/models/profile/update.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message: "<h4>Profile updated successfully</h4>",
          buttons: {
            confirm: {
              label: '<span class="glyphicon glyphicon-ok"></span> Clear',
              className: "btn-outline-secondary",
            },
          },
          callback: function (result) {
          },
        });
      },
      error: function (xhr, resp, text) {
        bootbox.confirm({
          message: "<h4>An error occurred. Try again later.</h4>",
          buttons: {
            confirm: {
              label: '<span class="glyphicon glyphicon-ok"></span> Clear',
              className: "btn-outline-secondary",
            },
          },
          callback: function (result) {
            console.log(xhr, resp, text);
          },
        });
      },
    });
    return false;
  });
});
