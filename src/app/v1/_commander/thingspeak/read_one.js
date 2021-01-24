$(document).ready(function () {
  // fetch single user thingspeak details on click 'users-details-button'
  $(document).on("click", ".user-details-button", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    // inject values to fields
    $.getJSON(
      "src/api/v1/models/thingspeak/read_one.php?id=" + id,
      function (data) {
        $("#user-channel").html(data.channel);
        $("#user-key").html(data.key);
      }
    );
  });
  // redirect to thingspeak channel on click 'monitor-details-button'
  $(document).on("click", ".monitor-user-button", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    // inject values to fields
    $.getJSON(
      "src/api/v1/models/thingspeak/read_one.php?id=" + id,
      function (data) {
        window.open(
          "https://thingspeak.com/channels/" + data.channel + "/private_show", "_blank");
      }
    );
  });
   // redirect to firefighter report page on click 'print-report-button'
  $(document).on("click", ".print-report-button", function (e) {
    e.preventDefault();
    // get user id
    var id = $(this).attr("data-id");
    window.open("report.php?id=" + id, "_blank");
  });
});
