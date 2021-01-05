$(document).ready(function () {
  // show list of product on first load
  showUsers();
  // when a 'read Users' button was clicked
  $(document).on("click", ".read-Users-button", function () {
    showUsers();
  });
});

// function to show list of Users
function showUsers() {
  // get list of Users from the API
  $.getJSON("../api/user/read_all.php", function (data) {
    // html for listing Users
    var read_users_html = `
    
    <!-- when clicked, it will load the create product form -->

    <div id='create-product' class='btn btn-primary pull-right m-b-15px create-product-button'>
        <span class='glyphicon glyphicon-plus'></span> Create Product
    </div>
    <!-- start table -->
    <table class='table table-bordered table-hover'>
    
    <!-- creating our table heading -->
    <tr>
        <th class='w-25-pct'>Name</th>
        <th class='w-25-pct'>Role</th>
        <th class='w-25-pct text-align-center'>Action</th>
    </tr>`;

    // loop through returned list of data
    $.each(data.records, function (key, val) {
      // creating new table row per record
      read_users_html +=
        `
        <tr>
            <td>` +
        val.name +
        `</td>
            <td>` +
        val.role +
        `</td>
            <!-- 'action' buttons -->
            <td>
                <!-- read product button -->
                <button class='btn btn-primary m-r-10px read-one-product-button' data-id='` +
        val.id +
        `'>
                    <span class='glyphicon glyphicon-eye-open'></span> Read
                </button>
 
                <!-- edit button -->
                <button class='btn btn-info m-r-10px update-product-button' data-id='` +
        val.id +
        `'>
                    <span class='glyphicon glyphicon-edit'></span> Edit
                </button>
 
                <!-- delete button -->
                <button class='btn btn-danger delete-product-button' data-id='` +
        val.id +
        `'>
                    <span class='glyphicon glyphicon-remove'></span> Delete
                </button>
            </td>
 
        </tr>`;
    });

    // end table
    read_users_html += `</table>`;
    // inject to 'page-content' of our app
    $("#page-content").html(read_users_html);
    // chage page title
    changePageTitle("Read Users");
  });
}
