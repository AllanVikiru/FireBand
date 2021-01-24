$(document).ready(function () {
  // on click reset-pw button show pw reset form
  $(document).on("click", ".reset-pw", function () {
    var id = $(this).attr("data-id");
    $.getJSON("src/api/v1/models/user/read_one.php?id=" + id, function (data) {
      $("#modal-pw-reset").modal("show");
    });
  });
  // on submit pw-reset-form, form data is serialised and submitted to api
  $(document).on("submit", "#pw-reset-form", function (e) {
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
            "<p class='font-size-h5 font-w600 mb-5'>Password reset successful.<br/>Login again with your new password.</p>",
          buttons: {
            confirm: {
              label: '<span class="glyphicon glyphicon-ok"></span> Clear',
              className: "btn-outline-success",
            },
          },
          callback: function (result) {
            location.href = "src/auth/v1/logout.php";
          },
        });
      },
      error: function (xhr, resp, text) {
        bootbox.confirm({
          message:
            "<p class='font-size-h5 font-w600 mb-5'>An error occurred. Reload the page or try again later.</p>",
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
