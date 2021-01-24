$(document).ready(function () {
  // on click read user select user based on id and inject values to fields
  $(document).on("click", ".read-user-button", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    $.getJSON("src/api/v1/models/user/read_one.php?id=" + id, function (data) {
      $("#user-id").val(data.id);
      $("#user-name").val(data.username);
      $("#user-email").val(data.email);
      $("#modal-user-info").modal("show");
    });
  });
  // on click read user select user based on id and inject values to fields
  $(document).on("click", ".my-profile", function () {
    var id = $(this).attr("data-id");
    $.getJSON("src/api/v1/models/user/read_one.php?id=" + id, function (data) {
      $("#my-id").val(data.id);
      $("#my-name").val(data.username);
      $("#my-email").val(data.email);
      $("#modal-my-info").modal("show");
    });
  });
});
