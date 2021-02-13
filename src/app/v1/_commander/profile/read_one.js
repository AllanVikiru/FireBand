// fetch single user profile details on click 'users-details-button'

$(document).ready(function () {
  
  $(document).on("click", ".user-details-button", function (e) {
    e.preventDefault();
    // get user id
    var id = $(this).attr("data-id");
    // inject values to fields
    $.getJSON(
      "src/api/v1/models/profile/read_one.php?id=" + id,
      function (data) {
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