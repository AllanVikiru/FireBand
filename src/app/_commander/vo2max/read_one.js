$(document).ready(function () {
  // handle 'read one' button click
  $(document).on("click", ".user-details-button", function (e) {
    e.preventDefault();
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON(
      "../src/api/models/vo2max/read_one.php?id=" + id,
      function (data) {
        $("#ff-vo2-form")[0].reset();
        $("#user-vo2-id").val(data.user_id);
        $("#user-vo2").val(data.value);
        $("#user-status").val(data.status);
      }
    );
    $.getJSON(
      "../src/api/models/profile/read_one.php?id=" + id,
      function (data) {
        $("#user-age").val(data.age);
        $("#user-selected-sex").val(data.sex_id);
        $("#user-kg").val(data.weight);
      }
    );
  });
  $("#modal-ff-info").on("hidden.bs.modal", function (e) {
    $("#ff-vo2-form").find("input[type=hidden]").val("");
  });
});
