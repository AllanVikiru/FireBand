$(document).ready(function () {
    // handle 'read one' button click
    $(document).on("click", ".fetch-user-info", function (e) {
      e.preventDefault();
      // get user id
      var id = $(this).attr("data-id");
      $.getJSON(
        "../src/api/models/profile/read_one.php?id=" + id,
        function (data) {
          // inject html to 'page-content' of our app
          //$("#ff-profile-form")[0].reset();
          $("#user-profile-id").val(data.user_id);
          $("#example-datepicker2").val(data.dob);
          $("input[type=radio][value=" + data.sex_id + "]").click();
          $("#weight").val(data.weight);
          $("#height").val(data.height);
        }
      );
    });
});