<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$jobList = job()->list();

$username = $_SESSION['payroll_session'];
$company = company()->get("username='$username'");

function getJobFunction($Id){
  $jf = job_function()->get("Id='$Id'");
  return $jf->option;
}

function getCount($Id){
  $employee = employee()->count("jobId='$Id'");
  return $employee;
}

?>
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
          <h4 class="page-title">Timekeeping</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Job Category</th>
              <th>Company Name</th>
              <th>Job Reference #</th>
              <th>Job Classification</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($jobList as $row) {
              if ($row->isApproved==1 && getCount($row->Id)!=0){
            ?>
            <tr>
              <td><?=getJobFunction($row->jobFunctionId);?></td>
              <td><?=$row->company;?></td>
              <td><?=$row->refNum;?></td>
              <td><?=$row->position;?></td>
              <td>
              <?php
                if($row->isApproved) {
              ?>
                <div class=" btn btn-success btn-xs tooltips" title="Click To Edit">Approved</div>
              <?php }
                else {
              ?>
              <div class=" btn btn-warning btn-xs tooltips" title="Click To Edit">Pending</div>
              <?php
                }
              ?>

              </td>
              <td>
                <a href="?view=timesheets&jobId=<?=$row->Id;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> View Details</a>
              </td>
            </tr>
            <?php
          }
            }


            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
