<?php
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$jobList = job()->all();

function getJobFunction($Id){
  $job = job_function()->get("Id='$Id'");
  echo $job->option;
}
?>

<p class="m-b-0">
  <?=$message?></p>
</div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
        <h4 class="page-title">Jobs</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Job Reference #</th>
              <th>Job Category</th>
              <th>Job Classification</th>
              <th>Company Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($jobList as $row) {
              if ($row->isApproved==1){
            ?>
            <tr>
              <td><?=$row->refNum;?></td>
              <td><?=getJobFunction($row->jobFunctionId);?></td>
              <td><?=$row->position;?> </td>
              <td><?=$row->company;?> </td>
              <td>
                <a href="?view=jobDetail&id=<?=$row->Id;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> View Details</a>
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
