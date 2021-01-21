function calculate() {
  var age = $("#user-age").val();
  var sex = $("#user-selected-sex").val();
  var weight = $("#user-kg").val();
  var time = $("#user-runtime").val();
  var hr = $("#user-heartrate").val();
  var vo2max = 100.5 - 0.1636 * weight - 1.438 * time - 0.1928 * hr;
  vo2max = Math.round(vo2max * 100 + Number.EPSILON) / 100;
  $("#user-vo2").val(vo2max);
  console.log(vo2max);
  var status;

  function range(x, min, max) {
    return x >= min && x <= max;
  }

  switch (sex) {
    case "1": //female
      if (range(age, 13, 19)) {
        if (vo2max < 25.0) {
          status = "Very Poor";
        }
        if (range(vo2max, 25.0, 30.9)) {
          status = "Poor";
        }
        if (range(vo2max, 31.0, 34.9)) {
          status = "Fair";
        }
        if (range(vo2max, 35.0, 36.9)) {
          status = "Good";
        }
        if (range(vo2max, 37.0, 41.0)) {
          status = "Excellent";
        }
        if (vo2max > 41.0) {
          status = "Superior";
        }
      } else if (range(age, 20, 29)) {
        if (vo2max < 23.6) {
          status = "Very Poor";
        }
        if (range(vo2max, 23.6, 28.9)) {
          status = "Poor";
        }
        if (range(vo2max, 29.0, 32.9)) {
          status = "Fair";
        }
        if (range(vo2max, 33.0, 36.9)) {
          status = "Good";
        }
        if (range(vo2max, 37.0, 41.0)) {
          status = "Excellent";
        }
        if (vo2max > 41.0) {
          status = "Superior";
        }
      } else if (range(age, 30, 39)) {
        if (vo2max < 22.8) {
          status = "Very Poor";
        }
        if (range(vo2max, 22.8, 26.9)) {
          status = "Poor";
        }
        if (range(vo2max, 27.0, 31.4)) {
          status = "Fair";
        }
        if (range(vo2max, 31.5, 35.6)) {
          status = "Good";
        }
        if (range(vo2max, 35.7, 40.0)) {
          status = "Excellent";
        }
        if (vo2max > 40.0) {
          status = "Superior";
        }
      } else if (range(age, 40, 49)) {
        if (vo2max < 21.0) {
          status = "Very Poor";
        }
        if (range(vo2max, 21.0, 24.4)) {
          status = "Poor";
        }
        if (range(vo2max, 24.5, 28.9)) {
          status = "Fair";
        }
        if (range(vo2max, 29.0, 32.8)) {
          status = "Good";
        }
        if (range(vo2max, 32.9, 36.9)) {
          status = "Excellent";
        }
        if (vo2max > 36.9) {
          status = "Superior";
        }
      } else if (range(age, 50, 59)) {
        if (vo2max < 20.2) {
          status = "Very Poor";
        }
        if (range(vo2max, 20.2, 22.7)) {
          status = "Poor";
        }
        if (range(vo2max, 22.8, 26.9)) {
          status = "Fair";
        }
        if (range(vo2max, 27.0, 31.4)) {
          status = "Good";
        }
        if (range(vo2max, 31.5, 35.7)) {
          status = "Excellent";
        }
        if (vo2max > 35.7) {
          status = "Superior";
        }
      } else {
        if (vo2max < 17.5) {
          status = "Very Poor";
        }
        if (range(vo2max, 17.5, 20.1)) {
          status = "Poor";
        }
        if (range(vo2max, 20.2, 24.4)) {
          status = "Fair";
        }
        if (range(vo2max, 24.5, 30.2)) {
          status = "Good";
        }
        if (range(vo2max, 30.3, 31.4)) {
          status = "Excellent";
        }
        if (vo2max > 31.4) {
          status = "Superior";
        }
      }
      console.log(status);
      $("#user-status").val(status);
      break;
    case "2": //male
      if (range(age, 13, 19)) {
        if (vo2max < 35.0) {
          status = "Very Poor";
        }
        if (range(vo2max, 35.0, 38.3)) {
          status = "Poor";
        }
        if (range(vo2max, 38.4, 45.1)) {
          status = "Fair";
        }
        if (range(vo2max, 45.2, 50.9)) {
          status = "Good";
        }
        if (range(vo2max, 51.0, 55.9)) {
          status = "Excellent";
        }
        if (vo2max > 55.9) {
          status = "Superior";
        }
      } else if (range(age, 20, 29)) {
        if (vo2max < 33.0) {
          status = "Very Poor";
        }
        if (range(vo2max, 33.0, 36.4)) {
          status = "Poor";
        }
        if (range(vo2max, 36.5, 42.4)) {
          status = "Fair";
        }
        if (range(vo2max, 42.5, 46.4)) {
          status = "Good";
        }
        if (range(vo2max, 46.5, 52.4)) {
          status = "Excellent";
        }
        if (vo2max > 52.4) {
          status = "Superior";
        }
      } else if (range(age, 30, 39)) {
        if (vo2max < 31.5) {
          status = "Very Poor";
        }
        if (range(vo2max, 31.5, 35.4)) {
          status = "Poor";
        }
        if (range(vo2max, 35.5, 40.9)) {
          status = "Fair";
        }
        if (range(vo2max, 41.0, 44.9)) {
          status = "Good";
        }
        if (range(vo2max, 45.0, 49.4)) {
          status = "Excellent";
        }
        if (vo2max > 49.4) {
          status = "Superior";
        }
      } else if (range(age, 40, 49)) {
        if (vo2max < 30.2) {
          status = "Very Poor";
        }
        if (range(vo2max, 30.2, 33.5)) {
          status = "Poor";
        }
        if (range(vo2max, 33.6, 38.9)) {
          status = "Fair";
        }
        if (range(vo2max, 39.0, 43.7)) {
          status = "Good";
        }
        if (range(vo2max, 43.8, 48.0)) {
          status = "Excellent";
        }
        if (vo2max > 48.0) {
          status = "Superior";
        }
      } else if (range(age, 50, 59)) {
        if (vo2max < 26.1) {
          status = "Very Poor";
        }
        if (range(vo2max, 26.1, 30.9)) {
          status = "Poor";
        }
        if (range(vo2max, 31.0, 35.7)) {
          status = "Fair";
        }
        if (range(vo2max, 35.8, 40.9)) {
          status = "Good";
        }
        if (range(vo2max, 41.0, 45.3)) {
          status = "Excellent";
        }
        if (vo2max > 45.3) {
          status = "Superior";
        }
      } else {
        if (vo2max < 20.5) {
          status = "Very Poor";
        }
        if (range(vo2max, 20.5, 26.0)) {
          status = "Poor";
        }
        if (range(vo2max, 26.1, 32.2)) {
          status = "Fair";
        }
        if (range(vo2max, 32.3, 36.4)) {
          status = "Good";
        }
        if (range(vo2max, 36.5, 44.2)) {
          status = "Excellent";
        }
        if (vo2max > 44.2) {
          status = "Superior";
        }
      }
      console.log(status);
      $("#user-status").val(status);
      break;
    default:
      //intersex /r.n.s - female vo2max values //TODO: determine vo2max intersex ratings
      if (range(age, 13, 19)) {
        if (vo2max < 25.0) {
          status = "Very Poor";
        }
        if (range(vo2max, 25.0, 30.9)) {
          status = "Poor";
        }
        if (range(vo2max, 31.0, 34.9)) {
          status = "Fair";
        }
        if (range(vo2max, 35.0, 36.9)) {
          status = "Good";
        }
        if (range(vo2max, 37.0, 41.0)) {
          status = "Excellent";
        }
        if (vo2max > 41.0) {
          status = "Superior";
        }
      } else if (range(age, 20, 29)) {
        if (vo2max < 23.6) {
          status = "Very Poor";
        }
        if (range(vo2max, 23.6, 28.9)) {
          status = "Poor";
        }
        if (range(vo2max, 29.0, 32.9)) {
          status = "Fair";
        }
        if (range(vo2max, 33.0, 36.9)) {
          status = "Good";
        }
        if (range(vo2max, 37.0, 41.0)) {
          status = "Excellent";
        }
        if (vo2max > 41.0) {
          status = "Superior";
        }
      } else if (range(age, 30, 39)) {
        if (vo2max < 22.8) {
          status = "Very Poor";
        }
        if (range(vo2max, 22.8, 26.9)) {
          status = "Poor";
        }
        if (range(vo2max, 27.0, 31.4)) {
          status = "Fair";
        }
        if (range(vo2max, 31.5, 35.6)) {
          status = "Good";
        }
        if (range(vo2max, 35.7, 40.0)) {
          status = "Excellent";
        }
        if (vo2max > 40.0) {
          status = "Superior";
        }
      } else if (range(age, 40, 49)) {
        if (vo2max < 21.0) {
          status = "Very Poor";
        }
        if (range(vo2max, 21.0, 24.4)) {
          status = "Poor";
        }
        if (range(vo2max, 24.5, 28.9)) {
          status = "Fair";
        }
        if (range(vo2max, 29.0, 32.8)) {
          status = "Good";
        }
        if (range(vo2max, 32.9, 36.9)) {
          status = "Excellent";
        }
        if (vo2max > 36.9) {
          status = "Superior";
        }
      } else if (range(age, 50, 59)) {
        if (vo2max < 20.2) {
          status = "Very Poor";
        }
        if (range(vo2max, 20.2, 22.7)) {
          status = "Poor";
        }
        if (range(vo2max, 22.8, 26.9)) {
          status = "Fair";
        }
        if (range(vo2max, 27.0, 31.4)) {
          status = "Good";
        }
        if (range(vo2max, 31.5, 35.7)) {
          status = "Excellent";
        }
        if (vo2max > 35.7) {
          status = "Superior";
        }
      } else {
        if (vo2max < 17.5) {
          status = "Very Poor";
        }
        if (range(vo2max, 17.5, 20.1)) {
          status = "Poor";
        }
        if (range(vo2max, 20.2, 24.4)) {
          status = "Fair";
        }
        if (range(vo2max, 24.5, 30.2)) {
          status = "Good";
        }
        if (range(vo2max, 30.3, 31.4)) {
          status = "Excellent";
        }
        if (vo2max > 31.4) {
          status = "Superior";
        }
      }
      console.log(status);
      $("#user-status").val(status);
      break;
  }
}
