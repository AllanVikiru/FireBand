$(document).ready(function () {
  // handle 'read one' button click
  $(document).on("click", ".user-details-button", function (e) {
    e.preventDefault();
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
        $("#user-selected-sex").val(data.sex_id);
        $("#weight").val(data.weight);
        $("#height").val(data.height);
        $("#user-age").val(data.age);
      }
    );
  });
  $('#modal-ff-info').on('hidden.bs.modal', function (e) {

    $('#ff-info-form').find("input[type=hidden]").val("");
})
});
