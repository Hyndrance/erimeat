<?php
$Id = $_GET['Id'];
$candidate = candidate()->get("Id='$Id'");

function getJobFunction($Id){
  $jf = job_function()->get("Id='$Id'");
  echo $jf->option;
}

function getCity($Id){
  if ($Id!=0){
  $city = city_option()->get("Id='$Id'");
  echo $city->city;
  }else{
    echo "N/A";
  }
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
      <div>
        <ul class="nav nav-tabs navtab-bg nav-justified">
            <li class="active" style="background-color:#f2f2f2; border-radius: 5px; color: #fff;">
                <a href="#home1" data-toggle="tab" aria-expanded="false">
                    <span class="visible-xs"><i class="fa fa-home"></i></span>
                    <span class="hidden-xs text-blue">Skills</span>
                </a>
            </li>
            <li style="background-color: #f2f2f2; border-radius:5px;">
                <a href="#profile1" data-toggle="tab" aria-expanded="true">
                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                    <span class="hidden-xs text-blue">Description</span>
                </a>
            </li>

        </ul>
        <div class="tab-content" style="border: 1px solid #d2d2d2; border-top: none; margin-top: -10px;">

              <div class="tab-pane active" id="home1" style="padding: 10px;">
              <?=$candidate->keySkills;?>
            </div>

            <div class="tab-pane" id="profile1" style="padding: 10px;">
              <?=$candidate->coverLetter;?>
            </div>

        </div>
      </div>
      </div>
    <div align="center" class="m-t-30 m-b-30">
      <div align="center" class="m-t-30">
        <div>
          <button class="m-r-5 btn-primary btn-candidate-contact btn-mobile" style=" margin-left: 9px; line-height: 1.4em;" onclick="myFunction()">
            <i class="fa fa-phone fa-2x"></i><br>
            <span class="text-center">Call +61 452 364 793</span>
          </button>

          <button class="m-l-5 btn-primary btn-candidate-contact btn-mobile" style="line-height: 1.4em;" onclick="location.href='../home/?view=inquiryForm'">
            <i class="fa fa-envelope-o fa-2x"></i><br>
            <span class="text-center">Send an Email</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
