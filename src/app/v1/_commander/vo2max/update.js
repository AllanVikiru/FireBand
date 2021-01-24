$(document).ready(function () {
  // update single vo2max details on submit 'ff-vo2-form'
  $(document).on("submit", "#ff-vo2-form", function (e) {
    e.preventDefault();
    calculate(); //calculate vo2max value and status
    // form data is serialised and submitted to api
    var form_data = JSON.stringify($(this).serializeObject());
    $.ajax({
      url: "src/api/v1/models/vo2max/update.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message: "<p class='font-size-h5 font-w600 mb-5'>Value updated successfully</p>",
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
          message: "<p class='font-size-h5 font-w600 mb-5'>An error occurred. Reload the page or try again later.</p>",
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
