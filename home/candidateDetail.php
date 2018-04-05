<?php
$Id = $_GET['Id'];
$candidate = candidate()->get("Id='$Id'");

function getJobFunction($Id){
  $jf = job_function()->get("Id='$Id'");
  echo $jf->option;
}

function getCity($Id){
  $city = city_option()->get("Id='$Id'");
  echo $city->city;
}
?>

<div class="container-fluid m-t-10">
  <div class="row center-page container">
    <a href="#" onclick="window.history.go(-1); return false;">< Return</a>
    <h1><?=getJobFunction($candidate->jobFunctionId);?></h1>
    <b>Reference: </b> <?=$candidate->refNum;?>

    <div class="col-12 row">
      <div class="col-md-4">
        <i class="fa fa-map-marker"></i> <?=$candidate->address1;?>
      </div>
      <!-- College -->
      <div class="col-md-4">
        <i class="fa fa-map-o"></i> <?=$candidate->address2;?>
      </div>
      <!-- Experience -->
      <div class="col-md-4 m-b-10">
        <i class="fa fa-globe"></i> <?=getCity($candidate->city);?> <?=$candidate->state;?> <?=$candidate->zipCode;?>
      </div>
    </div>
      <hr>
      <h3>Cover Letter</h3>
      <p><?=$candidate->coverLetter;?></p>
      </div>
    <div align="center" class="m-t-30 m-b-30">
      <div>
        <button class="btn-primary btn-candidate-contact">
          <i class="fa fa-phone fa-3x"></i><br>
          <span class="text-center font-13">Call +61452 364 793</span>
        </button>

        <button class="btn-primary btn-candidate-contact" onclick="location.href='../home/?view=inquiryForm'">
          <i class="fa fa-envelope-o fa-3x"></i><br>
          <span class="text-center font-13">Send an Email</span>
        </button>
      </div>
    </div>
  </div>
</div>
