$(document).ready(function () {
 // update single user details on submit 'ff-user-form'
  $(document).on("submit", "#ff-user-form", function (e) {
    e.preventDefault();
    // form data will be here get form data
    var form_data = JSON.stringify($(this).serializeObject());
    // submit form data to api
    $.ajax({
      url: "src/api/v1/models/user/update.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message:
            "<p class='font-size-h5 font-w600 mb-5'>User updated successfully</p>",
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
            "<p class='font-size-h5 font-w600 mb-5'>An error occurred.<br/>Reload the page or try again later.</p>",
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
  // update single user details on submit 'my-user-form'
  $(document).on("submit", "#my-user-form", function (e) {
    e.preventDefault();
    // form data is serialised and submitted to api
    var form_data = JSON.stringify($(this).serializeObject());
    $.ajax({
      url: "src/api/v1/models/user/update.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message:
            "<h4>Info updated successfully<br/>Your changes will effect next time you log in.</h4>",
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
            "<h4>An error occurred.<br/> Reload the page or try again later.</h4>",
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
