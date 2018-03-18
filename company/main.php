<?php
$user =$_SESSION["company_session"];
$company = company()->get("username='$user'");

function getJobFunction($Id){
    $jf = job_function()->get("Id='$Id'");
    echo $jf->option;
}
?>

<div class="container container-fluid">
  <div class="col-12 m-t-30">
    <h2><?=$company->name;?></h2>
    <div class="row p-t-10 p-b-10">
    <div class="col-12">
      <div class="col-lg-4">
        <label class="m-r-5">Department: </label><?=$company->department;?>
        <br>
        <i class="fa fa-phone m-r-5"></i><?=$company->phoneNumber;?>
      </div>
      <div class="col-lg-4">
        <label class="m-r-5">Contact Person: </label><?=$company->contactPerson;?><br>
        <i class="fa fa-mobile-phone m-r-5"></i><?=$company->mobileNumber;?>
      </div>
      <div class="col-lg-4">
        <label class="m-r-5">Email: </label><?=$company->email;?><br>
        <i class="fa fa-map-marker m-r-5"></i><?=$company->address;?>

      </div>
    </div>
    </div>
    <h4 class="m-t-30 m-b-30">Job Category: <?=getJobFunction($company->jobFunctionId);?></h4>
    <hr>
    <?=$company->description;?>
              <!-- // foreach ($company as $key => $value) {
              //   echo $key . ": " . $value . "<br>";
              // } -->

  </div> <!-- end col -->
  <div class="center-page text-center p-t-10 m-b-30">
    <h4>Jobs</h4>
    <div class="row">
      <button class="btn btn-success stepy-finish" onclick="location.href='?view=jobList&abn=<?=$company->abn;?>&isApproved=1'">
        Ongoing: <?=job()->count("abn=$company->abn and isApproved=1")?>
      </button>
      <button class="btn btn-warning stepy-finish" onclick="location.href='?view=jobList&abn=<?=$company->abn;?>&isApproved=0'">
        Requests: <?=job()->count("abn=$company->abn and isApproved!=1")?>
      </button>
    </div>
  </div>
</div>
