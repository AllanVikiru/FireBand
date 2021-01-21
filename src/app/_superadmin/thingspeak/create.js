$(document).on("click", ".set-ff-ts", function (e) {
    e.preventDefault();
    // load list of categories
    $.getJSON("../src/api/models/thingspeak/read_all.php", function (data) {
      // build categories option html
      // loop through returned list of data
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
      // we have our html form here where product information will be entered
      // inject html to 'page-content' of our app
      $("#users").html(users_dropdown_html);
      $("#modal-new-ts").modal("show");
    });
  });

  // 'create product form' handle will be here - will run if create product form was submitted
  $(document).on("submit", "#set-ts-form", function () {
    // form data will be here get form data
    var form_data = JSON.stringify($(this).serializeObject());
    console.log(form_data);
    // submit form data to api
    $.ajax({
      url: "../src/api/models/thingspeak/create.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message: "<h4>User ThingSpeak information was set successfully</h4>",
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
          message: "<h4>An error occurred. Try again later.</h4>",
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