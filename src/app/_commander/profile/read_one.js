$(document).ready(function () {
  // handle 'read one' button click
  $(document).on("click", ".user-details-button", function () {
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON(
      "../src/api/models/profile/read_one.php?id=" + id,
      function (data) {
        // inject html to 'page-content' of our app
        $("#example-datepicker2").val(data.dob);
        $("input[name=example-inline-radios][value=" + data.sex_id + "]").prop(
          "checked",
          true
        );
        $("#ff-weight").val(data.weight);
        $("#ff-height").val(data.height);
        $("#ff-age").val(data.age);
      }
    );
  });
});
