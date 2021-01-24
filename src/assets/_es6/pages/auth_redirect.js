// Initialise Logout

$(document).ready(function () {
  $(document).on("click", "#logout-user", function (e) {
    e.preventDefault();
    location.href= "src/auth/v1/logout.php";
  });
});

