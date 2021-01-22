$(document).ready(function () {
  // show list of users on first load
  showUsers();
   // $("#modal-ff-info").on("hidden.bs.modal", function (e) {
  //   $("#ff-vo2-form").find("input[type=hidden]").val("");
  // });
});
function showUsers() {
  $.getJSON("../src/api/models/vo2max/read_all.php", function (data) {
    var ff_table = `
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                    <th class="d-none d-sm-table-cell" style="width: 20%;">Name</th>
                    <th class="d-none d-sm-table-cell" style="width: 20%;">Last Test Date</th>
                    <th class="d-none d-sm-table-cell" style="width: 20%;">Status</th>
                    <th class="text-center" style="width: 20%;">Actions</th>
                    </tr>
                </thead>
                <tbody>`;

    $.each(data.records, function (key, val) {
      if (
        val.test_date === "" ||
        val.test_date === null ||
        val.status === "" ||
        val.status === null
      ) {
        val.test_date = "Not Yet Tested";
        val.status = "Not Yet Tested";
      }

      // creating new table row per record
      ff_table +=
        `
                        <tr>
                            <td class="font-w600">` +
        val.username +
        `</td>
          <td class="d-none d-sm-table-cell">` +
        val.test_date +
        `</td>
                            <td class="d-none d-sm-table-cell">` +
        val.status +
        `</td>
                            <td class="text-center">
                            <!-- monitor button -->
                    <button class='btn btn-secondary btn-sm monitor-user-button' data-id='` +
        val.id +
        `'>Monitor</button>
     
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
