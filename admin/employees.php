<?php
$employeeList = employee()->list("status='1'");

// Functions

function __getName($username){
    $get = application()->get("username='$username'");
    return $get ? $get->firstName . " " . $get->lastName : "Name not in database";
}

function __getJobName($Id){
  $get = job()->get("Id='$Id'");
  return $get->position;
}

function __getCompanyName($Id){
  $get = job()->get("Id='$Id'");
  return $get->company;
}
?>
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
          <h4 class="page-title">Employee List</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Company</th>
              <th>Job Position</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($employeeList as $row) {
            ?>
            <tr>
              <td><a href="?view=employeeDetail&username=<?=$row->username;?>"><?=__getName($row->username);?></a></td>
              <td><?=__getCompanyName($row->jobId);?></td>
              <td><?=__getJobName($row->jobId);?></td>
              <td><a href="?view=employeeDetail&username=<?=$row->username;?>" class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> View Details</a></td>
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
          <button class="btn btn-sm btn-danger" onclick="location.href='process.php?action=terminateEmployee&username=<?=$row->username;?>&jobId=<?=$row->jobId;?>&status=1'">Terminate</button>
          <button class="btn btn-sm btn-warning" onclick="Custombox.close();">Cancel</button>
      </div>
  </div>
  <?php
    }
  ?>
