$(document).ready(function () {
  // handle 'read one' button click
  $(document).on("click", ".read-user-button", function () {
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON("../src/api/models/user/read_one.php?id=" + id, function (data) {
      // inject html to 'page-content' of our app
      $("#user-id").val(data.id);
      $("#user-firstname").val(data.first_name);
      $("#user-lastname").val(data.last_name);
      $("#user-email").val(data.email);
      $("#user-phone").val(data.phone);
      $("#modal-user-info").modal("show");
    });
  });
});
