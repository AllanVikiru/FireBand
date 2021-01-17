$(document).ready(function () {
    // handle 'read one' button click
    $(document).on("click", ".fetch-user-info", function () {
      // get user id
      var id = $(this).attr("data-id");
      $.getJSON("../src/api/models/profile/read_one.php?id=" + id, function (data) {
        // inject html to 'page-content' of our app
        $("#user-info-id").val(data.id);
        $("#user-age").val(data.age);
        $("#user-sex").val(data.sex_id);
        $("#user-weight").val(data.weight);
      });
    });
});