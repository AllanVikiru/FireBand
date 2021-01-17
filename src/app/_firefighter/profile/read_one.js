$(document).ready(function () {
    // handle 'read one' button click
    $(document).on("click", ".fetch-user-info", function () {
      // get user id
      var id = $(this).attr("data-id");
      $.getJSON("../src/api/models/profile/read_one.php?id=" + id, function (data) {
        // inject html to 'page-content' of our app
        $("#user-info-id").val(data.id);
        $("#example-datepicker2").val(data.dob);
        $("input[name=example-inline-radios][value=" + data.sex_id + "]").prop("checked", true);
        $("#weight").val(data.weight);
        $("#height").val(data.height);
      });
    });
});