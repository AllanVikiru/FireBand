$(document).ready(function () {
  // will run if the delete button was clicked
  $(document).on("click", ".delete-user-button", function (e) {
    e.preventDefault();
    // get the product id
    var id = $(this).attr("data-id");
    // bootbox for good looking 'confirm pop up'
    bootbox.confirm({
      message: "<h4>Are you sure?</h4>",
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
          // send delete request to api / remote server
          $.ajax({
            url: "../src/api/models/user/delete.php",
            type: "POST",
            dataType: "json",
            data: JSON.stringify({ id: id }),
            success: function (result) {
              bootbox.confirm({
                message: "<h4>User deleted successfully.</h4>",
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
        }
      },
    });
  });
  $(document).on("click", ".delete-throttling", function (e) {
    e.preventDefault();
    // bootbox for good looking 'confirm pop up'
    bootbox.confirm({
      message: "<h4>Clear User Tokens?</h4>",
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
          // send delete request to api / remote server
          $.ajax({
            url: "../src/api/models/user/clear.php",
            type: "POST",
            dataType: "json",
            success: function (result) {
              bootbox.confirm({
                message: "<h4>Tokens cleared.</h4>",
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
        }
      },
    });
  });
});
