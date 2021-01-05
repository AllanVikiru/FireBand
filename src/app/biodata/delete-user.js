$(document).ready(function () {
  // will run if the delete button was clicked
  $(document).on("click", ".delete-product-button", function () {
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
          className: "btn-primary",
        },
      },
      callback: function (result) {
        if (result == true) {
          // send delete request to api / remote server
          $.ajax({
            url: "../api/user/delete.php",
            type: "POST",
            dataType: "json",
            data: JSON.stringify({ id: id }),
            success: function (result) {
              // re-load list of products
              showUsers();
            },
            error: function (xhr, resp, text) {
              console.log(xhr, resp, text);
            },
          });
        }
      },
    });
  });
});
