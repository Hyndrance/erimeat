<?php
$jobId = $_GET['jobId'];
$status = $_GET['status'];

$employeeList = employee()->list("status='$status' and jobId='$jobId'");
$job = job()->get("Id=$jobId");

// Functions

function __getName($username){
    $get = resume()->get("username='$username'");
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
              <th>Terminate</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($employeeList as $row) {
            ?>
            <tr>
              <td><a href="?view=employeeDetail&username=<?=$row->username;?>"><?=__getName($row->username);?></a></td>
              <td><button class="btn btn-sm btn-warning" onclick="location.href='?view=timesheetList&employee=<?=$row->username;?>'">View Timesheets</button></td>
              <td><button class="btn btn-sm btn-danger" href="#delete-alert-modal<?=$row->Id;?>" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="50" data-overlaycolor="#36404a">Terminate</button>
              </td>
              </td>
            </tr>
              <?php
                }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


<!-- Modal -->
<?php foreach($employeeList as $row) {
?>
  <div id="delete-alert-modal<?=$row->Id;?>" class="modal-demo">
      <div class="custom-modal-text">
          Are you sure you want to terminate <?=__getName($row->username);?>? <br>
          <button class="btn btn-sm btn-danger" onclick="location.href='process.php?action=terminateEmployee&username=<?=$row->username;?>'">Terminate</button>
          <button class="btn btn-sm btn-warning" onclick="Custombox.close();">Cancel</button>
      </div>
  </div>
  <?php
    }
  ?>
