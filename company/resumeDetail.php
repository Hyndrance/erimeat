<?php
$Id = $_GET['Id'];
$resume = resume()->get("Id=$Id");

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
    <h2 class="text-blue"> <?=$resume->lastName;?>, <?=$resume->firstName;?> </h2>
    <p><label class="m-r-5 m-t-15">Job Category: </label><?=getJobFunction($resume->jobFunctionId);?><p>
    <p><label class="m-r-5">Email: </label><?=$resume->email;?></p>
    <p><label class="m-r-5">Birthdate: </label><?=$resume->birthdate;?></p>
    <div class="col-12">
      <div class="col-lg-4">
        <p><label class="m-r-5">Employee Reference: </label><?=$resume->refNum;?></p>
      </div>
      <div class="col-lg-4">
        <p><label class="m-r-5">Employee ABN: </label><?=$resume->abn;?></p>
      </div>
      <div class="col-lg-4">
        <p><label class="m-r-5">Tax Number: </label><?=$resume->taxNumber;?></p>
      </div>
    </div>
      <div class="col-12">
        <div class="col-lg-6">
          <p><label class="m-r-5">Address 1: </label><?=$resume->address1;?></p>
        </div>
        <div class="col-lg-6">
          <p><label class="m-r-5">Address 2: </label><?=$resume->address2;?></p>
        </div>
      </div>
      <p><label class="m-r-5 m-t-15">City: </label><?=getCity($resume->city);?></p>
      <p><label class="m-r-5">State: </label><?=$resume->state;?></p>
      <p><label class="m-r-5">Postal Code: </label><?=$resume->zipCode;?></p>
      <hr>
      <p><label class="m-r-5">Cover Letter: </label><?=$resume->coverLetter;?><p>
      <p><label class="m-r-5">Speedtest: </label><?=$resume->speedtest;?><p>
        <div class="col-12 text-center">
          <div class="col-lg-4">
      <p><label class="m-r-5">Uploaded Specs: </label><br><?=$resume->uploadedSpecs;?><p>
      </div>
      <div class="col-lg-4">
      <p><label class="m-r-5">Uploaded Certificate: </label><br><?=$resume->uploadedCerts;?><p>
      </div>
      <div class="col-lg-4">
      <p><label class="m-r-5">Uploaded Resume: </label><br><?=$resume->uploadedResume;?><p>
      </div>
    </div>
    </div>
  </div>
<hr>
          <h3 class="text-center">STATUS</h3>
            <div class="row  text-center m-b-30">
              <?php if($resume->isHired==0){ ?>
              <div class=" btn btn-warning btn-xs tooltips">
                Pending
              </div>
              <?php }else{ ?>
              <div class=" btn btn-success btn-xs tooltips">
                Hired
              </div>
              <?php } ?>
            </div>
