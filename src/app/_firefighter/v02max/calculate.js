$(document).ready(function () {
  // show html form when 'create product' button was clicked
  $(document).on("click", ".calculate-v02max", function () {
    var age = $("#user-age").val();
    var sex = $("#user-sex").val();
    var weight = $("#user-weight").val();
    var time = $("#user-runtime").val();
    var hr = $("#user-heartrate").val();

    var v02max = (100.5 - 0.1636(weight) - 1.438(time) - 0.1928(hr));
    var status;
    switch (sex) {
      case "1": //female
        if (13 <= age >= 19) {
          if (v02max < 25.0) {
            status = "Very Poor";
          }
          if (25.0 <= v02max >= 30.9) {
            status = "Poor";
          }
          if (31.0 <= v02max >= 34.9) {
            status = "Fair";
          }
          if (35.0 <= v02max >= 36.9) {
            status = "Good";
          }
          if (37.0 <= v02max >= 41.0) {
            status = "Excellent";
          }
          if (v02max > 41.0) {
            status = "Superior";
          }
        } else if (20 <= age >= 29) {
          if (v02max < 23.6) {
            status = "Very Poor";
          }
          if (23.6 <= v02max >= 28.9) {
            status = "Poor";
          }
          if (29.0 <= v02max >= 32.9) {
            status = "Fair";
          }
          if (33.0 <= v02max >= 36.9) {
            status = "Good";
          }
          if (37.0 <= v02max >= 41.0) {
            status = "Excellent";
          }
          if (v02max > 41.0) {
            status = "Superior";
          }
        } else if (30 <= age >= 39) {
          if (v02max < 22.8) {
            status = "Very Poor";
          }
          if (22.8 <= v02max >= 26.9) {
            status = "Poor";
          }
          if (27.0 <= v02max >= 31.4) {
            status = "Fair";
          }
          if (31.5 <= v02max >= 35.6) {
            status = "Good";
          }
          if (35.7 <= v02max >= 40.0) {
            status = "Excellent";
          }
          if (v02max > 40.0) {
            status = "Superior";
          }
        } else if (40 <= age >= 49) {
          if (v02max < 21.0) {
            status = "Very Poor";
          }
          if (21.0 <= v02max >= 24.4) {
            status = "Poor";
          }
          if (24.5 <= v02max >= 28.9) {
            status = "Fair";
          }
          if (29.0 <= v02max >= 32.8) {
            status = "Good";
          }
          if (32.9 <= v02max >= 36.9) {
            status = "Excellent";
          }
          if (v02max > 36.9) {
            status = "Superior";
          }
        } else if (50 <= age >= 59) {
          if (v02max < 20.2) {
            status = "Very Poor";
          }
          if (20.2 <= v02max >= 22.7) {
            status = "Poor";
          }
          if (22.8 <= v02max >= 26.9) {
            status = "Fair";
          }
          if (27.0 <= v02max >= 31.4) {
            status = "Good";
          }
          if (31.5 <= v02max >= 35.7) {
            status = "Excellent";
          }
          if (v02max > 35.7) {
            status = "Superior";
          }
        } else {
          if (v02max < 17.5) {
            status = "Very Poor";
          }
          if (17.5 <= v02max >= 20.1) {
            status = "Poor";
          }
          if (20.2 <= v02max >= 24.4) {
            status = "Fair";
          }
          if (24.5 <= v02max >= 30.2) {
            status = "Good";
          }
          if (30.3 <= v02max >= 31.4) {
            status = "Excellent";
          }
          if (v02max > 31.4) {
            status = "Superior";
          }
        }
        break;
      case "2": //male
        if (13 <= age >= 19) {
          if (v02max < 35.0) {
            status = "Very Poor";
          }
          if (35.0 <= v02max >= 38.3) {
            status = "Poor";
          }
          if (38.4 <= v02max >= 45.1) {
            status = "Fair";
          }
          if (45.2 <= v02max >= 50.9) {
            status = "Good";
          }
          if (51.0 <= v02max >= 55.9) {
            status = "Excellent";
          }
          if (v02max > 55.9) {
            status = "Superior";
          }
        } else if (20 <= age >= 29) {
          if (v02max < 33.0) {
            status = "Very Poor";
          }
          if (33.0 <= v02max >= 36.4) {
            status = "Poor";
          }
          if (36.5 <= v02max >= 42.4) {
            status = "Fair";
          }
          if (42.5 <= v02max >= 46.4) {
            status = "Good";
          }
          if (46.5 <= v02max >= 52.4) {
            status = "Excellent";
          }
          if (v02max > 52.4) {
            status = "Superior";
          }
        } else if (30 <= age >= 39) {
          if (v02max < 31.5) {
            status = "Very Poor";
          }
          if (31.5 <= v02max >= 35.4) {
            status = "Poor";
          }
          if (35.5 <= v02max >= 40.9) {
            status = "Fair";
          }
          if (41.0 <= v02max >= 44.9) {
            status = "Good";
          }
          if (45.0 <= v02max >= 49.4) {
            status = "Excellent";
          }
          if (v02max > 49.4) {
            status = "Superior";
          }
        } else if (40 <= age >= 49) {
          if (v02max < 30.2) {
            status = "Very Poor";
          }
          if (30.2 <= v02max >= 33.5) {
            status = "Poor";
          }
          if (33.6 <= v02max >= 38.9) {
            status = "Fair";
          }
          if (39.0 <= v02max >= 43.7) {
            status = "Good";
          }
          if (43.8 <= v02max >= 48.0) {
            status = "Excellent";
          }
          if (v02max > 48.0) {
            status = "Superior";
          }
        } else if (50 <= age >= 59) {
          if (v02max < 26.1) {
            status = "Very Poor";
          }
          if (26.1 <= v02max >= 30.9) {
            status = "Poor";
          }
          if (31.0 <= v02max >= 35.7) {
            status = "Fair";
          }
          if (35.8 <= v02max >= 40.9) {
            status = "Good";
          }
          if (41.0 <= v02max >= 45.3) {
            status = "Excellent";
          }
          if (v02max > 45.3) {
            status = "Superior";
          }
        } else {
          if (v02max < 20.5) {
            status = "Very Poor";
          }
          if (20.5 <= v02max >= 26.0) {
            status = "Poor";
          }
          if (26.1 <= v02max >= 32.2) {
            status = "Fair";
          }
          if (32.3 <= v02max >= 36.4) {
            status = "Good";
          }
          if (36.5 <= v02max >= 44.2) {
            status = "Excellent";
          }
          if (v02max > 44.2) {
            status = "Superior";
          }
        }
        break;
      default: //intersex /r.n.s - female v02max values //todo: determine v02max intersex ra
      if (13 <= age >= 19) {
        if (v02max < 25.0) {
          status = "Very Poor";
        }
        if (25.0 <= v02max >= 30.9) {
          status = "Poor";
        }
        if (31.0 <= v02max >= 34.9) {
          status = "Fair";
        }
        if (35.0 <= v02max >= 36.9) {
          status = "Good";
        }
        if (37.0 <= v02max >= 41.0) {
          status = "Excellent";
        }
        if (v02max > 41.0) {
          status = "Superior";
        }
      } else if (20 <= age >= 29) {
        if (v02max < 23.6) {
          status = "Very Poor";
        }
        if (23.6 <= v02max >= 28.9) {
          status = "Poor";
        }
        if (29.0 <= v02max >= 32.9) {
          status = "Fair";
        }
        if (33.0 <= v02max >= 36.9) {
          status = "Good";
        }
        if (37.0 <= v02max >= 41.0) {
          status = "Excellent";
        }
        if (v02max > 41.0) {
          status = "Superior";
        }
      } else if (30 <= age >= 39) {
        if (v02max < 22.8) {
          status = "Very Poor";
        }
        if (22.8 <= v02max >= 26.9) {
          status = "Poor";
        }
        if (27.0 <= v02max >= 31.4) {
          status = "Fair";
        }
        if (31.5 <= v02max >= 35.6) {
          status = "Good";
        }
        if (35.7 <= v02max >= 40.0) {
          status = "Excellent";
        }
        if (v02max > 40.0) {
          status = "Superior";
        }
      } else if (40 <= age >= 49) {
        if (v02max < 21.0) {
          status = "Very Poor";
        }
        if (21.0 <= v02max >= 24.4) {
          status = "Poor";
        }
        if (24.5 <= v02max >= 28.9) {
          status = "Fair";
        }
        if (29.0 <= v02max >= 32.8) {
          status = "Good";
        }
        if (32.9 <= v02max >= 36.9) {
          status = "Excellent";
        }
        if (v02max > 36.9) {
          status = "Superior";
        }
      } else if (50 <= age >= 59) {
        if (v02max < 20.2) {
          status = "Very Poor";
        }
        if (20.2 <= v02max >= 22.7) {
          status = "Poor";
        }
        if (22.8 <= v02max >= 26.9) {
          status = "Fair";
        }
        if (27.0 <= v02max >= 31.4) {
          status = "Good";
        }
        if (31.5 <= v02max >= 35.7) {
          status = "Excellent";
        }
        if (v02max > 35.7) {
          status = "Superior";
        }
      } else {
        if (v02max < 17.5) {
          status = "Very Poor";
        }
        if (17.5 <= v02max >= 20.1) {
          status = "Poor";
        }
        if (20.2 <= v02max >= 24.4) {
          status = "Fair";
        }
        if (24.5 <= v02max >= 30.2) {
          status = "Good";
        }
        if (30.3 <= v02max >= 31.4) {
          status = "Excellent";
        }
        if (v02max > 31.4) {
          status = "Superior";
        }
      }
        break;
    }
  });

  //'create product form' handle will be here - will run if create product form was submitted
  $(document).on("submit", "#health-profile-info", function () {
    // form data will be here get form data
    var form_data = JSON.stringify($(this).serializeObject());
    // submit form data to api
    $.ajax({
      url: "../src/api/models/profile/update.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message: "<h4>Profile updated successfully</h4>",
          buttons: {
            confirm: {
              label: '<span class="glyphicon glyphicon-ok"></span> Clear',
              className: "btn-outline-secondary",
            },
          },
          callback: function (result) {},
        });
      },
      error: function (xhr, resp, text) {
        bootbox.confirm({
          message: "<h4>An error occurred. Try again later.</h4>",
          buttons: {
            confirm: {
              label: '<span class="glyphicon glyphicon-ok"></span> Clear',
              className: "btn-outline-secondary",
            },
          },
          callback: function (result) {
            console.log(xhr, resp, text);
          },
        });
      },
    });
    return false;
  });
});
