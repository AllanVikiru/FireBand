$(document).ready(function () {
  // handle 'read one' button click
  $(document).on("click", ".read-user-button", function () {
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON("../src/api/models/user/read_one.php?id=" + id, function (data) {
      // inject html to 'page-content' of our app
      $("#user-id").val(data.id);
      $("#user-name").val(data.username);
      $("#user-email").val(data.email);
      $("#modal-user-info").modal("show");
    });
  });
  $(document).on("click", ".my-profile", function () {
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON("../src/api/models/user/read_one.php?id=" + id, function (data) {
      // inject html to 'page-content' of our app
      $("#user-id").val(data.id);
      $("#my-name").val(data.username);
      $("#my-email").val(data.email);
      $("#modal-my-info").modal("show");
    });
  });
});
