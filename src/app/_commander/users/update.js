$(document).ready(function () {
  //'create product form' handle will be here - will run if create product form was submitted
  $(document).on("submit", "#ff-user-form", function (e) {
    e.preventDefault();
    // form data will be here get form data
    var form_data = JSON.stringify($(this).serializeObject());
    // submit form data to api
    $.ajax({
      url: "../src/api/models/user/update.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message: "<h4>User updated successfully</h4>",
          buttons: {
            confirm: {
              label: '<span class="glyphicon glyphicon-ok"></span> Clear',
              className: "btn-outline-success",
            },
          },
          callback: function (result) {
            $("#modal-ff-info").modal("hide");
            showUsers();
          },
        });
      },
      error: function (xhr, resp, text) {
        bootbox.confirm({
          message:
            "<h4>An error occurred. Reload the page or try again later.</h4>",
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
  $(document).on("submit", "#my-user-form", function (e) {
    e.preventDefault();
    // form data will be here get form data
    var form_data = JSON.stringify($(this).serializeObject());
    // submit form data to api
    $.ajax({
      url: "../src/api/models/user/update.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message: "<h4>Info updated successfully</h4>",
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
            "<h4>An error occurred. Reload the page or try again later.</h4>",
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
