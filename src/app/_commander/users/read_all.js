$(document).ready(function () {
  // show list of users on first load
  showUsers();
});
function showUsers() {
  // get list of users from the API
  $.getJSON("../src/api/models/user/read_all_ff.php", function (data) {
    var ff_table = `
          <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
              <thead>
                  <tr>
                  <th class="d-none d-sm-table-cell" style="width: 20%;">Name</th>
                  <th class="d-none d-sm-table-cell" style="width: 20%;">Email</th>
                  <th class="text-center" style="width: 20%;">Actions</th>
                  </tr>
              </thead>
              <tbody>`;

    $.each(data.records, function (key, val) {
      // creating new table row per record
      ff_table +=
        `
                      <tr>
                          <td class="font-w600">` +
        val.first_name +
        ` ` +
        val.last_name +
        `</td>
                          <td class="d-none d-sm-table-cell">` +
        val.email +
        `</td>
                          <td class="text-center">
                          <!-- monitor button -->
                  <button class='btn  btn-secondary btn-sm monitor-user-button' data-id='` +
        val.id +
        `'>Monitor </button>
   
                  <!-- details button -->
                  <button class='btn btn-secondary btn-sm user-details-button' data-id='` +
        val.id +
        `'> Details </button> 
          <!-- print button -->
                  <button class='btn btn-secondary btn-sm print-report-button' data-id='` +
        val.id +
        `'> Print </button> 
          
          </td>         
              </tr>`;
       
    });
    // end table
    ff_table += `</table>`;

    // inject to users table
    $("#ff-table").html(ff_table);
  });
}
