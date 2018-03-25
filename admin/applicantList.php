<?php
$resume = resume()->list("isDeleted=0");

function getJobName($Id){
  $job = job()->get("Id='$Id'");
  echo $job->position;
}

function getJobFunction($Id){
  $jobFunc = job_function()->get("Id='$Id'");
  echo $jobFunc->option;
}
?>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Pending Applicants</b></h4>

            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th>Applying For</th>
                    <th>Job Function</th>
                    <th>Candidate Reference #</th>
                    <th>Full Name</th>
                    <th>City, State</th>
                    <th>Review</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($resume as $row) {
                  if ($row->jobId!=0 && $row->isApproved==0) {?>
                <tr>
                    <td><?=getJobName($row->jobId);?></td>
                    <td><?=getJobFunction($row->jobFunctionId);?></td>
                    <td><?=$row->refNum;?></td>
                    <td><?=$row->firstName; ?> <?=$row->lastName; ?></td>
                    <td><?=$row->city; ?>, <?=$row->state; ?></td>
                    <td>
                      <a href="?view=applicantDetail&Id=<?=$row->Id;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> Review</a>
                    </td>
                </tr>

              <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
