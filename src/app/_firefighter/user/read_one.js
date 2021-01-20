$(document).ready(function () {
  // handle 'read one' button click
  $(document).on("click", ".fetch-user-info", function (e) {
    e.preventDefault();
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON("../src/api/models/user/read_one.php?id=" + id, function (data) {
      // inject html to 'page-content' of our app
      $("#user-info-id").val(data.id);
      $("#user-name").val(data.username);
      $("#user-email").val(data.email);
    });
  });
});
