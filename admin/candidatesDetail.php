<?php
$Id = $_GET['Id'];
$resume = resume()->get("Id='$Id'");

function getJobFunction($Id){
  $job = job_function()->get("Id='$Id'");
  echo $job->option;
}
?>

<div class="container container-fluid">
  <div class="col-12 m-t-30 m-b-30">
      <h2 class="text-blue"><?=$resume->firstName;?> <?=$resume->lastName;?></h2>
      <p><label class="m-r-5">Email: </label><?=$resume->email;?></p>
      <p><label class="m-r-5">Job Category: </label><?=getJobFunction($resume->jobFunctionId);?></p>
      <p><label class="m-r-5">Phone Number: </label><?=$resume->phoneNumber;?></p>
      <div class="col-12">
        <div class="col-lg-6">
          <p><label class="m-r-5">Candidate ABN :</label><?=$resume->abn;?></p>
        </div>
        <div class="col-lg-6">
          <p><label class="m-r-5">Tax File Number :</label><?=$resume->taxNumber;?></p>
        </div>
      </div>
      <div class="col-12">
        <div class="col-lg-6">
          <p><label class="m-r-5">Address 1 :</label><?=$resume->address1;?></p>
        </div>
        <div class="col-lg-6">
          <p><label class="m-r-5">Address 2 :</label><?=$resume->address2;?></p>
        </div>
      </div>
      <p><label class="m-r-5">City :</label><?=$resume->city;?></p>
      <p><label class="m-r-5">State :</label><?=$resume->state;?></p>
      <p><label class="m-r-5">Postal Code :</label><?=$resume->zipCode;?></p>
      <hr>
      <div class="col-12 text-center">
        <div class="col-lg-6">
          <p><label class="m-r-5">Cover Letter :</label><br><?=$resume->coverLetter;?></p>
        </div>
        <div class="col-lg-6">
            <p><label class="m-r-5"><strong>Resume :</label><br><?=$resume->uploadedResume;?></p>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-12 m-t-30">
        <div class="col-lg-6">
          <button class="btn btn-success pull-right" style="width:350px;">Update</button>
        </div>
        <div class="col-lg-6">
          <button class="btn btn-danger pull-left" style="width:350px;" onclick="location.href='process.php?action=removeCandidate&Id=<?=$resume->Id;?>'">Remove</button>
        </div>
      </div>
  </div>
</div>
