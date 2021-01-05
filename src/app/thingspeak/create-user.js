$(document).ready(function () {
  // show html form when 'create product' button was clicked
  $(document).on("click", ".create-product-button", function () {
    // load list of categories
    $.getJSON("../api/role/read_all.php", function (data) {
      // build categories option html
      // loop through returned list of data
      var categories_options_html = `<select name='role' class='form-control'>`;
      $.each(data.records, function (key, val) {
        categories_options_html +=
          `<option value='` + val.role_id + `'>` + val.role + `</option>`; //set values
      });
      categories_options_html += `</select>`;
      // we have our html form here where product information will be entered
      // we used the 'required' html5 property to prevent empty fields
      var create_product_html =
        `
        <!-- 'read products' button to show list of products -->
        <div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
            <span class='glyphicon glyphicon-list'></span> Read Products
        </div>
        <!-- 'create product' html form -->
        <form id='create-product-form' action='#' method='post' border='0'>
        <table class='table table-hover table-responsive table-bordered'>

            <!-- name field -->
            <tr>
                <td>Name</td>
                <td><input type='text' name='name' class='form-control' required /></td>
            </tr>
            <!-- roles 'select' field -->
            <tr>
                <td>Roles</td>
                <td>` +
        categories_options_html +
        `</td>
            </tr>

            <!-- button to submit form -->
            <tr>
                <td></td>
                <td>
                    <button type='submit' class='btn btn-primary'>
                        <span class='glyphicon glyphicon-plus'></span> Create User
                    </button>
                </td>
            </tr>

        </table>
        </form>`;
      // inject html to 'page-content' of our app
      $("#page-content").html(create_product_html);

      // chage page title
      changePageTitle("Create User");
    });
  });

  // 'create product form' handle will be here - will run if create product form was submitted
  $(document).on("submit", "#create-product-form", function () {
    // form data will be here get form data
    var form_data = JSON.stringify($(this).serializeObject());
    // submit form data to api
    $.ajax({
      url: "../api/user/create.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        bootbox.confirm({
          message: "<h4>User was created successfully</h4>",
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
