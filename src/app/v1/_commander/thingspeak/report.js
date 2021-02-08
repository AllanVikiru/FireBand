$(document).ready(function () {
  //select id from url
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
      sURLVariables = sPageURL.split("&"),
      sParameterName,
      i;

    for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split("=");

      if (sParameterName[0] === sParam) {
        return sParameterName[1] === undefined
          ? true
          : decodeURIComponent(sParameterName[1]);
      }
    }
  };
  var id = getUrlParameter("id");
  //fetch username, email
  $.getJSON("src/api/v1/models/user/read_one.php?id=" + id, function (data) {
    $("#username").text(data.username);
    $("#email").text(data.email);
  });
  //fetch firefighter age, weight, height, sex
  $.getJSON("src/api/v1/models/profile/read_one.php?id=" + id, function (data) {
    $("#ff-age").text(data.age);
    $("#ff-weight").text(data.weight);
    $("#ff-height").text(data.height);
    //select sex based on sex_id
    $.getJSON(
      "src/api/v1/models/sex/read_one.php?id=" + data.sex_id,
      function (data) {
        $("#ff-sex").text(data.sex);
      }
    );
  });
  //fetch firefighter vo2max value, status, test_date
  $.getJSON("src/api/v1/models/vo2max/read_one.php?id=" + id, function (data) {
    $("#ff-value").text(data.value);
    $("#ff-status").text(data.status);
    $("#ff-date").text(data.test_date);
  });
  //fetch thingspeak visualisations
  $.getJSON(
    "src/api/v1/models/thingspeak/read_one.php?id=" + id,
    function (data) {
      //heartrate
      var hr =
        "https://thingspeak.com/channels/" +
        data.channel +
        "/charts/2?api_key=" +
        data.key +
        "&bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Heart+Rate+%28bpm%29&type=line&xaxis=Time&yaxis=Average+BPM";
      //speed
      var spd =
        "https://thingspeak.com/channels/" +
        data.channel +
        "/charts/7?api_key=" +
        data.key +
        "&bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Ground+Speed+%28m%2Fs%29&type=spline";
      //temp
      var temp =
        "https://thingspeak.com/channels/" +
        data.channel +
        "/charts/3?api_key=" +
        data.key +
        "&bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&timescale=10&title=External+Temperature+%28%C2%B0C%29&type=spline";
      //hum
      var hum =
        "https://thingspeak.com/channels/" +
        data.channel +
        "/charts/4?api_key=" +
        data.key +
        "&bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Relative+Humidity+%28%25%29&type=spline";
      //location
      var loc =
        "https://thingspeak.com/apps/matlab_visualizations/" + data.location;

      //set thingspeak charts to html
      document.getElementById("heartrate").setAttribute("src", hr);
      document.getElementById("speed").setAttribute("src", spd);
      document.getElementById("temperature").setAttribute("src", temp);
      document.getElementById("humidity").setAttribute("src", hum);
      document.getElementById("location").setAttribute("src", loc);
    }
  );
});