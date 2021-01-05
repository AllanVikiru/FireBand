$(document).ready(function () {
  // show html form when 'update product' button was clicked
  $(document).on("click", ".update-product-button", function () {
    // get product id
    var id = $(this).attr("data-id");
    // read one record based on given product id
    $.getJSON("../api/user/read_one.php?id=" + id, function (data) {
      // values will be used to fill out our form
      var name = data.name;
      var role_id = data.role_id;
      var role = data.role;

      // load list of categories
      $.getJSON("../api/role/read_all.php", function (data) {
        // build 'categories option' html
        // loop through returned list of data
        var categories_options_html = `<select name='role' class='form-control'>`;

        $.each(data.records, function (key, val) {
          // pre-select option is category id is the same
          if (val.id == role_id) {
            categories_options_html +=
              `<option value='` +
              val.role_id +
              `' selected>` +
              val.role +
              `</option>`;
          } else {
            categories_options_html +=
              `<option value='` + val.role_id + `'>` + val.role + `</option>`;
          }
        });
        categories_options_html += `</select>`;

        // store 'update product' html to this variable
        var update_product_html =
          `
                <div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
                    <span class='glyphicon glyphicon-list'></span> Read Products
                </div>
                <!-- build 'update product' html form -->
                <!-- we used the 'required' html5 property to prevent empty fields -->
                <form id='update-product-form' action='#' method='post' border='0'>
                    <table class='table table-hover table-responsive table-bordered'>

                        <!-- name field -->
                        <tr>
                            <td>Name</td>
                            <td><input value=\"` +
          name +
          `\" type='text' name='name' class='form-control' required /></td>
                        </tr>

                        <!-- categories 'select' field -->
                        <tr>
                            <td>Category</td>
                            <td>` +
          categories_options_html +
          `</td>
                        </tr>

                        <tr>

                            <!-- hidden 'product id' to identify which record to delete -->
                            <td><input value=\"` +
          id +
          `\" name='id' type='hidden' /></td>

                            <!-- button to submit form -->
                            <td>
                                <button type='submit' class='btn btn-info'>
                                    <span class='glyphicon glyphicon-edit'></span> Update Product
                                </button>
                            </td>

                        </tr>

                    </table>
                </form>`;
        // inject to 'page-content' of our app
        $("#page-content").html(update_product_html);

        // chage page title
        changePageTitle("Update Product");
      });
    });
  });

  // will run if 'create product' form was submitted
  $(document).on("submit", "#update-product-form", function () {
    // get form data
    var form_data = JSON.stringify($(this).serializeObject());
    // submit form data to api
    $.ajax({
      url: "../api/user/update.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message: "<h4>User updated successfully.</h4>",
          buttons: {
            confirm: {
              label: '<span class="glyphicon glyphicon-ok"></span> Clear',
              className: "btn-primary",
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
              className: "btn-primary",
            },
          },
          callback: function (result) {
            showUsers();
            console.log(xhr, resp, text);
          },
        });
      },
    });
    return false;
  });
});
