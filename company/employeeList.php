<?php
$jobId = $_GET['jobId'];
$status = $_GET['status'];

$employeeList = employee()->list("status='$status' and jobId='$jobId'");
$job = job()->get("Id=$jobId");

// Functions

function __getName($username){
    $get = application()->get("username='$username'");
    return $get ? $get->firstName . " " . $get->lastName : "Name not in database";
}
?>
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
          <h4 class="page-title"><?=$job->position;?></h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Timesheets</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($employeeList as $row) {
            ?>
            <tr>
              <td><a href="?view=employeeDetail&username=<?=$row->username;?>"><?=__getName($row->username);?></a></td>
              <td><button class="btn btn-sm btn-warning" onclick="location.href='?view=timesheetList&employee=<?=$row->username;?>'">View Timesheets</button></td>
            </tr>
              <?php
                }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
