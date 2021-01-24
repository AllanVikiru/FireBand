$(document).ready(function () {
  //on click delete-user, form data is serialised and submitted to api on submit 
  $(document).on("click", ".delete-user-button", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    bootbox.confirm({
      message: "<p class='font-size-h5 font-w600 mb-5'>Are you sure?</p>",
      buttons: {
        confirm: {
          label: '<span class="glyphicon glyphicon-ok"></span> Yes',
          className: "btn-danger",
        },
        cancel: {
          label: '<span class="glyphicon glyphicon-remove"></span> No',
          className: "btn-secondary",
        },
      },
      callback: function (result) {
        if (result == true) {
          $.ajax({
            url: "src/api/v1/models/user/delete.php",
            type: "POST",
            dataType: "json",
            data: JSON.stringify({ id: id }),
            success: function (result) {
              bootbox.confirm({
                message:
                  "<p class='font-size-h5 font-w600 mb-5'>User deleted successfully.</p>",
                buttons: {
                  confirm: {
                    label: '<span class="glyphicon glyphicon-ok"></span> Clear',
                    className: "btn-outline-success",
                  },
                },
                callback: function (result) {
                  showUsers();
                },
              });
            },
            error: function (xhr, resp, text) {
              bootbox.confirm({
                message:
                  "<p class='font-size-h5 font-w600 mb-5'>An error occurred. Try again later.</p>",
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
        }
      },
    });
  });
  //on click delete-throttling/tokens, form data is serialised and submitted to api on submit 
  $(document).on("click", ".delete-throttling", function (e) {
    e.preventDefault();
    bootbox.confirm({
      message: "<p class='font-size-h5 font-w600 mb-5'>Clear User Tokens?</p>",
      buttons: {
        confirm: {
          label: '<span class="glyphicon glyphicon-ok"></span> Yes',
          className: "btn-danger",
        },
        cancel: {
          label: '<span class="glyphicon glyphicon-remove"></span> No',
          className: "btn-secondary",
        },
      },
      callback: function (result) {
        if (result == true) {
          $.ajax({
            url: "src/api/v1/models/user/clear.php",
            type: "POST",
            dataType: "json",
            success: function (result) {
              bootbox.confirm({
                message:
                  "<p class='font-size-h5 font-w600 mb-5'>Tokens cleared.</p>",
                buttons: {
                  confirm: {
                    label: '<span class="glyphicon glyphicon-ok"></span> Clear',
                    className: "btn-outline-success",
                  },
                },
                callback: function (result) {
                  showUsers();
                },
              });
            },
            error: function (xhr, resp, text) {
              bootbox.confirm({
                message:
                  "<p class='font-size-h5 font-w600 mb-5'>An error occurred. Try again later.</p>",
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
        }
      },
    });
  });
});
