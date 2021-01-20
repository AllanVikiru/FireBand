$(document).ready(function () {
  // show html form when 'create product' button was clicked
  $(document).on("click", ".create-new-user", function (e) {
    e.preventDefault();
    // load list of categories
    $.getJSON("../src/api/models/role/read_all.php", function (data) {
      // build categories option html
      // loop through returned list of data
      var roles_options_html = `<span>`;
      $.each(data.records, function (key, val) {
        roles_options_html +=
          `
            <div class="custom-control custom-radio custom-control-inline mb-5">
                <input class="custom-control-input" type="radio" name="example-inline-radios" id='` +
          val.role_id +
          `' value='` +
          val.role_id +
          `'>
                <label class="custom-control-label" for='` +
          val.role_id +
          `'>` +
          val.role +
          `</label>
            </div>`;
      });
      roles_options_html += `<span>`;
      // we have our html form here where product information will be entered
      // inject html to 'page-content' of our app
      $("#roles").html(roles_options_html);
      $("#modal-new-user").modal("show");
    });
  });

  // 'create product form' handle will be here - will run if create product form was submitted
  $(document).on("submit", "#create-user-form", function () {
    // form data will be here get form data
    var form_data = JSON.stringify($(this).serializeObject());
    // submit form data to api
    $.ajax({
      url: "../src/api/models/user/create.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message: "<h4>User was created successfully</h4>",
          buttons: {
            confirm: {
              label: '<span class="glyphicon glyphicon-ok"></span> Clear',
              className: "btn-outline-success",
            },
          },
          callback: function (result) {
            $("#modal-new-user").modal("hide");
            showUsers();
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
            $("#modal-new-user").modal("hide");
            showUsers();
            console.log(xhr, resp, text);
          },
        });
      },
    });
    return false;
  });
});
