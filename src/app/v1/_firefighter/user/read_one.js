$(document).ready(function () {
  // fetch single user details on click 'fetch user-info'
  $(document).on("click", ".fetch-user-info", function (e) {
    e.preventDefault();
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON("src/api/v1/models/user/read_one.php?id=" + id, function (data) {
      // inject values to fields
      $("#my-id").val(data.id);
      $("#my-name").val(data.username);
      $("#my-email").val(data.email);
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
      //inject radios to div
      $("#sexes").html(sexes_options_html);
    });
  });
});
