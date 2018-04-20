<?php
$Id = $_GET['Id'];
$application = application()->get("Id='$Id'");
$jobId = $_GET['jobId'];

$certList = certificates()->list("resumeId='$Id'");

function getJobName($Id){
  if($Id=='0'){
    echo 'N/A';
  }else{
  $job = job()->get("Id='$Id'");
  return $job->position;
  }
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
                      <span class="m-l-15"><?=getJobName($application->jobId);?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Candidate Name :</strong>
                      <span class="m-l-15"><?=$application->firstName;?> <?=$application->lastName;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Candidate ABN :</strong>
                      <span class="m-l-15"><?=$application->abn;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Candidate Email :</strong>
                      <span class="m-l-15"><?=$application->email;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Job Category :</strong>
                      <span class="m-l-15"><?=getJobCategory($application->jobFunctionId);?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Phone Number :</strong>
                      <span class="m-l-15"><?=$application->phoneNumber;?></span>
                    </p>
                    <p>
                      <label class="text-muted font-13">Status :</label>
                      <?php if($application->isHired==0 && $application->isApproved==1){ ?>
                      <div class=" btn btn-default btn-xs tooltips">
                        Waiting for Interview Results
                      </div>
                      <?php }elseif($application->isHired==1 && $application->isApproved==1){ ?>
                      <div class=" btn btn-success btn-xs tooltips">
                        Hired
                      </div>
                      <?php }else{ ?>
                      <div class=" btn btn-warning btn-xs tooltips">
                        Pending
                      </div>
                      <?php } ?>
                    </p>

                    <p class="text-muted font-13"><strong>Key Skills :</strong>
                      <span class="m-l-15"><?=$application->keySkills;?></span>
                    </p>
                    <br>
                    <p class="text-muted font-13"><strong>Click to view resume :</strong>
                      <span class="m-l-15"><a href="../media/<?=$application->uploadedResume;?>" target="blank_">Candidate Resume</a></span>
                    </p>
                    <p class="text-muted font-13"><strong>Click to view Computer Specification :</strong>
                      <span class="m-l-15"><a href="../media/<?=$application->uploadedSpecs;?>" target="blank_">Candidate Computer Specification</a></span>
                    </p>
                    <p class="text-muted font-13"><strong>Click to view other Certificates :</strong>
                      <?php foreach($certList as $row){ ?>
                      <span class="m-l-15"><a href="../media/<?=$row->uploadedCerts;?>" target="blank_">Other Certificates</a></span>
                      <?php } ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- Personal-Information -->
        <div class="card-box">
          <?php if($application->isApproved==1 && $application->jobId!=0){?>
          <button class="btn btn-default" onclick="location.href='process.php?action=hireApplicant&result=approve&Id=<?=$application->Id;?>&jobId=<?=$jobId;?>'">Hire</button>
          <button class="btn btn-default" onclick="location.href='process.php?action=hireApplicant&result=deny&Id=<?=$application->Id;?>'">Reject</button>
          <?php } ?>
          <?php if($application->isApproved==1 && $application->isHired==0 && $application->jobId==0){?>
          <button onclick="location.href='?view=openJobs&Id=<?=$application->Id;?>'" class="btn btn-info" style="width:350px;">
            Assign Job
          </button>
          <?php } ?>
        </div>
    </div>
  </div>
