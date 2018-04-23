<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$app = application()->list();

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
                    <th>Candidate Reference #</th>
                    <th>Full Name</th>
                    <th>Review</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($app as $row) {
                  if ($row->jobId!=0 && $row->isApproved==0) {?>
                <tr>
                    <td><?=getJobName($row->jobId);?></td>
                    <td><?=$row->refNum;?></td>
                    <td><?=$row->firstName; ?> <?=$row->lastName; ?></td>
                    <td>
                      <a href="?view=resumeDetail&Id=<?=$row->Id;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> Review</a>
                    </td>
                </tr>

              <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
