$(document).ready(function () {
  // fetch single vo2max details on click 'user-details-button'
  $(document).on("click", ".user-details-button", function (e) {
    e.preventDefault();
    // get user id
    var id = $(this).attr("data-id");
    // inject values to fields
    $.getJSON(
      "src/api/v1/models/vo2max/read_one.php?id=" + id,
      function (data) {
        $("#ff-vo2-form")[0].reset();
        $("#user-vo2-id").val(data.user_id);
        $("#user-vo2").val(data.value);
        $("#user-status").val(data.status);
      }
    );
    // inject values to fields
    $.getJSON(
      "src/api/v1/models/profile/read_one.php?id=" + id,
      function (data) {
        $("#user-age").val(data.age);
        $("#user-selected-sex").val(data.sex_id);
        $("#user-kg").val(data.weight);
      }
    );
  });
  //clear all hidden values
  $("#modal-ff-info").on("hidden.bs.modal", function (e) {
    $("#ff-vo2-form").find("input[type=hidden]").val("");
  });
});
