$(document).on("click", ".set-ff-ts", function (e) {
  e.preventDefault();
  // load list of firefighters
  $.getJSON("src/api/v1/models/thingspeak/read_all.php", function (data) {
    var users_dropdown_html = `<select class="form-control" id="example-select" name="example-select">`;
    $.each(data.records, function (key, val) {
      users_dropdown_html +=
        `
            <option value='` +
        val.id +
        `'>` +
        val.username +
        `</option>`;
    });
    users_dropdown_html += `<select>`;
    // set users list and show thingspeak modal
    $("#users").html(users_dropdown_html);
    $("#modal-new-ts").modal("show");
  });
});

// form data is serialised and submitted to api on submit
$(document).on("submit", "#set-ts-form", function () {
  var form_data = JSON.stringify($(this).serializeObject());
  console.log(form_data);
  $.ajax({
    url: "src/api/v1/models/thingspeak/update.php",
    type: "POST",
    contentType: "application/json",
    data: form_data,
    success: function (result) {
      bootbox.confirm({
        message:
          "<p class='font-size-h5 font-w600 mb-5'>User ThingSpeak information was set successfully</p>",
        buttons: {
          confirm: {
            label: '<span class="glyphicon glyphicon-ok"></span> Clear',
            className: "btn-outline-success",
          },
        },
        callback: function (result) {
          $("#modal-new-ts").modal("hide");
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
          $("#modal-new-ts").modal("hide");
          showUsers();
          console.log(xhr, resp, text);
        },
      });
    },
  });
  return false;
});
