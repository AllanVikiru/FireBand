$(document).ready(function () {
  // fetch single vo2max details on click 'fetch user-info'
  $(document).on("click", ".fetch-user-info", function (e) {
    e.preventDefault();
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON(
      "src/api/v1/models/vo2max/read_one.php?id=" + id,
      function (data) {
        $("#ff-vo2-form")[0].reset();
        $("#user-vo2-id").val(data.user_id);
        $("#user-vo2").val(data.value);
        $("#user-status").val(data.status);
      }
    );
    $.getJSON(
      "src/api/v1/models/profile/read_one.php?id=" + id,
      function (data) {
        // inject values to fields
        $("#user-vo2-id").val(data.user_id);
        $("#user-age").val(data.age);
        $("#user-selected-sex").val(data.sex_id);
        $("#user-kg").val(data.weight);
      }
    );
  });
});
