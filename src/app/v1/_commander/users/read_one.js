$(document).ready(function () {
  // fetch single user details on click 'user-details-button'
  $(document).on("click", ".user-details-button", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    $.getJSON("src/api/v1/models/user/read_one.php?id=" + id, function (data) {
      // inject values to fields
      $("#ff-user-form")[0].reset();
      $("#user-id").val(data.id);
      $("#user-name").val(data.username);
      $("#user-email").val(data.email);
      $("#modal-ff-info").modal("show");
    });
    $.getJSON("src/api/v1/models/sex/read_all.php", function (data) {
      // build sexes options
      var sexes_options_html = `<span>`;
      $.each(data.records, function (key, val) {
        sexes_options_html +=
          `
                      <div class="custom-control custom-radio custom-control-inline mb-5">
                          <input class="custom-control-input" type="radio" name="example-inline-radios" id='` +
          val.sex_id +
          `' value='` +
          val.sex_id +
          `'>
                          <label class="custom-control-label" for='` +
          val.sex_id +
          `'>` +
          val.sex +
          `</label>
                      </div>`;
      });
      sexes_options_html += `<span>`;
      // inject radios to 'sexes div' of form
      $("#sexes").html(sexes_options_html);
    });
  });
  $(document).on("click", ".my-profile", function () {
    // fetch single user details on click 'my-profile'
    var id = $(this).attr("data-id");
    $.getJSON("src/api/v1/models/user/read_one.php?id=" + id, function (data) {
      // inject values to fields
      $("#my-id").val(data.id);
      $("#my-name").val(data.username);
      $("#my-email").val(data.email);
      $("#modal-my-info").modal("show");
    });
  });
  //clear all hidden values
  $("#modal-ff-info").on("hidden.bs.modal", function (e) {
    $("#ff-user-form").find("input[type=hidden]").val("");
  });
});
