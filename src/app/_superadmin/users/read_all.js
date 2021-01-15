$(document).ready(function () {
  // show list of users on first load
  showUsers();
});
function showUsers() {
  // get list of users from the API
  $.getJSON("../src/api/models/user/read_all.php", function (data) {
    var users_table = `
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th style="width: 25%;">Name</th>
                    <th class="d-none d-sm-table-cell" style="width: 20%;">Email</th>
                    <th class="d-none d-sm-table-cell" style="width: 20%;">Role</th>
                    <th class="text-center" style="width: 20%;">Actions</th>
                </tr>
            </thead>
            <tbody>`;

    $.each(data.records, function (key, val) {
      // creating new table row per record
      users_table +=
        `
                    <tr>
                        <td class="font-w600">` +
        val.first_name +
        `&nbsp;` +
        val.last_name +
        `</td>
                        <td class="d-none d-sm-table-cell">` +
        val.email +
        `</td>
                        <td class="d-none d-sm-table-cell">` +
        val.role +
        `</td>
                        <td class="text-center">
                        <!-- edit button -->
                <button class='btn  btn-secondary btn-sm read-user-button' data-id='` +
        val.id +
        `'>Edit </button>
 
                <!-- delete button -->
                <button class='btn btn-secondary btn-sm delete-user-button' data-id='` +
        val.id +
        `'> Delete </button> 
        </td>         
            </tr>`;
    });
    // end table
    users_table += `</table>`;
    // inject to users table
    $("#users-table").html(users_table);
  });
}
