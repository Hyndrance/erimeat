<?php
$Id = $_GET['Id'];
$resume = resume()->get("Id='$Id'");
$jobId = $_GET['jobId'];

function getJobName($Id){
  $job = job()->get("Id='$Id'");
  return $job->position;
}

function getJobCategory($Id){
  $jobFunc = job_function()->get("Id='$Id'");
  return $jobFunc->option;
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Personal-Information -->
        <div class="card-box">
            <h4 class="header-title mt-0 m-b-20">Resume Detail</h4>
            <div class="panel-body">
                <div class="text-left">
                    <p class="text-muted font-13"><strong>Applying for :</strong>
                      <span class="m-l-15"><?=getJobName($resume->jobId);?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Candidate Name :</strong>
                      <span class="m-l-15"><?=$resume->firstName;?> <?=$resume->lastName;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Candidate ABN :</strong>
                      <span class="m-l-15"><?=$resume->abn;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Candidate Email :</strong>
                      <span class="m-l-15"><?=$resume->email;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Job Category :</strong>
                      <span class="m-l-15"><?=getJobCategory($resume->jobFunctionId);?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Phone Number :</strong>
                      <span class="m-l-15"><?=$resume->phoneNumber;?></span>
                    </p>
                    <p>
                      <label class="text-muted font-13">Status :</label>
                      <?php if($resume->isHired==0 && $resume->isApproved==1){ ?>
                      <div class=" btn btn-default btn-xs tooltips">
                        Waiting for Interview
                      </div>
                      <?php }elseif($resume->isHired==1 && $resume->isApproved==1){ ?>
                      <div class=" btn btn-success btn-xs tooltips">
                        Hired
                      </div>
                      <?php }else{ ?>
                      <div class=" btn btn-warning btn-xs tooltips">
                        Pending
                      </div>
                      <?php } ?>
                    </p>
                    <br>
                    <p class="text-muted font-13"><strong>Click to view resume :</strong>
                      <span class="m-l-15"><a href="../media/<?=$resume->uploadedResume;?>" target="blank_">Candidate Resume</a></span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Personal-Information -->
        <div class="card-box">
          <?php if($resume->isApproved==1 && $resume->jobId!=0){?>
          <button class="btn btn-default" onclick="location.href='process.php?action=hireApplicant&result=approve&Id=<?=$resume->Id;?>&jobId=<?=$jobId;?>'">Hire</button>
          <button class="btn btn-default" onclick="location.href='process.php?action=hireApplicant&result=deny&Id=<?=$resume->Id;?>'">Deny</button>
          <?php } ?>
          <?php if($resume->isApproved==1 && $resume->isHired==0 && $resume->jobId==0){?>
          <button onclick="location.href='?view=openJobs&Id=<?=$resume->Id;?>'" class="btn btn-info" style="width:350px;">
            Assign Job
          </button>
          <?php } ?>
        </div>
    </div>
  </div>
