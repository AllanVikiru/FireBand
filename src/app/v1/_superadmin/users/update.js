$(document).ready(function () {
  // on submit update-user-form, form data is serialised and submitted to api
  $(document).on("submit", "#update-user-form", function (e) {
    e.preventDefault();
    var form_data = JSON.stringify($(this).serializeObject());
    $.ajax({
      url: "src/api/v1/models/user/update.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message:
            "<p class='font-size-h5 font-w600 mb-5'>User updated successfully.</p>",
          buttons: {
            confirm: {
              label: '<span class="glyphicon glyphicon-ok"></span> Clear',
              className: "btn-outline-success",
            },
          },
          callback: function (result) {
            $("#modal-user-info").modal("hide");
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
            $("#modal-user-info").modal("hide");
            showUsers();
            console.log(xhr, resp, text);
          },
        });
      },
    });
    return false;
  });
  // on submit update-user-form, form data is serialised and submitted to api
  $(document).on("submit", "#my-user-form", function () {
    var form_data = JSON.stringify($(this).serializeObject());
    $.ajax({
      url: "src/api/v1/models/user/update.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message:
            "<p class='font-size-h5 font-w600 mb-5'>User updated successfully.<br/>Your changes will effect next time you log in.</p>",
          buttons: {
            confirm: {
              label: '<span class="glyphicon glyphicon-ok"></span> Clear',
              className: "btn-outline-success",
            },
          },
          callback: function (result) {
            $("#modal-my-info").modal("hide");
            showUsers();
          },
        });
      },
      error: function (xhr, resp, text) {
        bootbox.confirm({
          message:
            "<p class='font-size-h5 font-w600 mb-5'>An error occurred.<br/> Try again later.</p>",
          buttons: {
            confirm: {
              label: '<span class="glyphicon glyphicon-ok"></span> Clear',
              className: "btn-outline-secondary",
            },
          },
          callback: function (result) {
            $("#modal-my-info").modal("hide");
            showUsers();
            console.log(xhr, resp, text);
          },
        });
      },
    });
    return false;
  });
});
