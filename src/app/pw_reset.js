$(document).ready(function () {
  $(document).on("click", ".reset-pw", function () {
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON("../src/api/models/user/read_one.php?id=" + id, function (data) {
      // inject html to 'page-content' of our app
      $("#modal-pw-reset").modal("show");
    });
  });
  //'create product form' handle will be here - will run if create product form was submitted
  $(document).on("submit", "#pw-reset-form", function (e) {
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
          message: "<h4>Password reset successful. Login again with your new password.</h4>",
          buttons: {
            confirm: {
              label: '<span class="glyphicon glyphicon-ok"></span> Clear',
              className: "btn-outline-success",
            },
          },
          callback: function (result) {
            location.href = "../src/auth/logout.php";
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
