$(document).ready(function () {
    // handle 'read one' button click
    $(document).on("click", ".user-details-button", function (e) {
      e.preventDefault();
      // get user id
      var id = $(this).attr("data-id");
      $.getJSON("../src/api/models/vo2max/read_one.php?id=" + id, function (data) {
        // inject html to 'page-content' of our app $("#user-id").val(data.id);
        $("#user-vo2").val(data.value);
        $("#user-status").val(data.status);
      });
    });
});