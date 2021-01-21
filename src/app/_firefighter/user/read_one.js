$(document).ready(function () {
  // handle 'read one' button click
  $(document).on("click", ".fetch-user-info", function (e) {
    e.preventDefault();
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON("../src/api/models/user/read_one.php?id=" + id, function (data) {
      // inject html to 'page-content' of our app
      $("#my-id").val(data.id);
      $("#my-name").val(data.username);
      $("#my-email").val(data.email);
    });
    $.getJSON("../src/api/models/sex/read_all.php", function (data) {
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
      // we have our html form here where product information will be entered
      // inject html to 'page-content' of our app
      $("#sexes").html(sexes_options_html);
    });
  });
});
