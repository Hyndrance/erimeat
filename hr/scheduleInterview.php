<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$resume = resume()->all();

function getJobName($Id){
  $job = job()->get("Id='$Id'");
  echo $job->position;
}

function getInterviewDate($Id){
  $interviewDate = interview_date()->get("resumeId='$Id'");
  return $interviewDate->date;
}

function getInterviewTime($Id){
  $interviewDate = interview_date()->get("resumeId='$Id'");
  return $interviewDate->time;
}
?>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Applicants Schedule</b></h4>

            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th>Applying For</th>
                    <th>Candidate Reference #</th>
                    <th>Full Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($resume as $row) {
                  if ($row->jobId!=0 && $row->isApproved==1 && $row->isHired==0) {?>
                <tr>
                    <td><?=getJobName($row->jobId); ?></td>
                    <td><?=$row->refNum; ?></td>
                    <td><?=$row->firstName; ?> <?=$row->lastName; ?></td>
                    <td><?=getInterviewDate($row->Id); ?></td>
                    <td><?=getInterviewTime($row->Id); ?></td>
                    <td>
                        <a href="?view=hiringApplicant&Id=<?=$row->Id;?>&jobId=<?=$row->jobId;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> View Applicant </a>
                    </td>
                </tr>

              <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
