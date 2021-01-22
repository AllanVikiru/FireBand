$(document).ready(function () {
  // handle 'read one' button click
  $(document).on("click", ".user-details-button", function (e) {
    e.preventDefault();
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON(
      "../src/api/models/thingspeak/read_one.php?id=" + id,
      function (data) {
        // inject html to 'page-content' of our app
        $("#user-channel").html(data.channel);
        $("#user-key").html(data.key);
      }
    );
  });
  $(document).on("click", ".monitor-user-button", function (e) {
    e.preventDefault();
    // get user id
    var id = $(this).attr("data-id");
    $.getJSON(
      "../src/api/models/thingspeak/read_one.php?id=" + id,
      function (data) {
        window.open(
          "https://thingspeak.com/channels/" + data.channel + "/private_show", "_blank");
      }
    );
  });
  $(document).on("click", ".print-report-button", function (e) {
    e.preventDefault();
    // get user id
    var id = $(this).attr("data-id");
    window.open("../src/report.php?id=" + id, "_blank");
  });
});
