$(document).ready(function () {
  // handle 'read one' button click
  $(document).on("click", ".fetch-user-info", function (e) {
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
        // inject html to 'page-content' of our app
        $("#user-vo2-id").val(data.user_id);
        $("#user-age").val(data.age);
        $("#user-selected-sex").val(data.sex_id);
        $("#user-kg").val(data.weight);
      }
    );
  });
});
