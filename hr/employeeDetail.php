<?php
$username = $_GET['username'];
$application = application()->get("username='$username'");

$certList = certificates()->list("resumeId='$application->Id'");

function getJobFunction($Id){
  $job = job_function()->get("Id='$Id'");
  echo $job->option;
}

function getCity($Id){
  $city = city_option()->get("Id='$Id'");
  echo $city->city;
}
?>

<div class="container container-fluid">
  <div class="col-12 m-t-30 m-b-30">
      <h2 class="text-blue"><?=$application->firstName;?> <?=$application->lastName;?></h2>
      <p><label class="m-r-5">Email: </label><?=$application->email;?></p>
      <p><label class="m-r-5">Job Category: </label><?=getJobFunction($application->jobFunctionId);?></p>
      <p><label class="m-r-5">Phone Number: </label><?=$application->phoneNumber;?></p>
      <div class="row">
        <div class="col-lg-6">
          <p><label class="m-r-5">Candidate ABN :</label><?=$application->abn;?></p>
        </div>
        <div class="col-lg-6">
          <p><label class="m-r-5">Tax File Number :</label><?=$application->taxNumber;?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <p><label class="m-r-5">Address 1 :</label><?=$application->address1;?></p>
        </div>
        <div class="col-lg-6">
          <p><label class="m-r-5">Address 2 :</label><?=$application->address2;?></p>
        </div>
      </div>
      <p><label class="m-r-5">City :</label><?=getCity($application->city);?></p>
      <p><label class="m-r-5">State :</label><?=$application->state;?></p>
      <p><label class="m-r-5">Postal Code :</label><?=$application->zipCode;?></p>
      <p>
        <label class="m-r-5">Status :</label>
        <?php if($application->isHired==0 && $application->isApproved==1){ ?>
        <div class=" btn btn-default btn-xs tooltips">
          Waiting for Interview
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
      <p><label class="m-r-5">Key Skills :</label><?=$application->keySkills;?></p>
      <hr>
      <div class="col-12 text-center">
        <div class="col-lg-6">
          <p><label class="m-r-5"><strong>Computer Specification :</label><br><a href="../media/<?=$application->uploadedSpecs;?>" target="blank_">Click to view Computer Specifications</a></p>
        </div>
        <div class="col-lg-6">
          <p><label class="m-r-5"><strong>Resume :</label><br><a href="../media/<?=$application->uploadedResume;?>" target="blank_">Click to view Resume</a></p>
        </div>
      </div>

      <div class="col-12 text-center">
        <div class="col-lg-6">
          <p><label class="m-r-5">Cover Letter :</label><br><?=$application->coverLetter;?></p>
        </div>
        <div class="col-lg-6">
            <p><label class="m-r-5"><strong>Other Certificates :</label><br>
              <?php foreach($certList as $row){ ?>
                <a href="../media/<?=$row->uploadedCerts;?>" target="blank_">Click to view other certificates</a><br>
              <?php }?>
            </p>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-12 m-t-30">
        <div class="col-lg-12 text-center">
          <button class="btn btn-info" style="width:350px;" onclick="location.href='?view=timesheetList&employee=<?=$application->username;?>'">
            View timesheet
          </button>
        </div>
      </div>
  </div>
</div>
</div>
