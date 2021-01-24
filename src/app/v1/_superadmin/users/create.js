$(document).ready(function () {
  $(document).on("click", ".create-new-user", function (e) {
    e.preventDefault();
    // load list of roles
    $.getJSON("src/api/v1/models/role/read_all.php", function (data) {
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
      // inject dropdown to form and show new user modal
      $("#roles").html(roles_options_html);
      $("#modal-new-user").modal("show");
    });
  });

  // form data is serialised and submitted to api on submit new user
  $(document).on("submit", "#create-user-form", function () {
    var form_data = JSON.stringify($(this).serializeObject());
    $.ajax({
      url: "src/api/v1/models/user/create.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message:
            "<p class='font-size-h5 font-w600 mb-5'>User was created successfully</p>",
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
          message:
            "<p class='font-size-h5 font-w600 mb-5'>An error occurred. Try again later.</p>",
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
