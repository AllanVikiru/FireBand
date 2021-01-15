$(document).ready(function () {
  // handle 'read one' button click
  $(document).on("click", ".read-user-button", function () {
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON("../src/api/models/user/read_one.php?id=" + id, function (data) {
      var first_name_html = data.first_name;
      var last_name_html = data.last_name;
      var email_html = data.email;
      var phone_html = data.phone;
      // inject html to 'page-content' of our app
      $("#user-first-name").html(first_name_html);
      $("#user-last-name").html(last_name_html);
      $("#user-email").html(email_html);
      $("#user-phone").html(phone_html);
      $("#modal-user-info").modal("show");
      //todo: rework read-one
    });
  });
});
