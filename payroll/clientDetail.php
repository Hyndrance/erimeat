<?php
$Id = $_GET['Id'];
$company = company()->get("Id=$Id");

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
        <label class="m-r-5">Department: </label><span class="text-black"><?=$company->department;?></span>
        <br>
        <i class="fa fa-phone m-r-5"></i><span class="text-black"><?=$company->phoneNumber;?></span>
      </div>
      <div class="col-lg-4">
        <label class="m-r-5">Contact Person: </label><span class="text-black"><?=$company->contactPerson;?></span><br>
        <i class="fa fa-mobile-phone m-r-5"></i><span class="text-black"><?=$company->mobileNumber;?></span>
      </div>
      <div class="col-lg-4">
        <label class="m-r-5">Email: </label><span class="text-black"><?=$company->email;?></span><br>
        <i class="fa fa-map-marker m-r-5"></i><span class="text-black"><?=$company->address;?></span>

      </div>
    </div>
    </div>
    <h4 class="m-t-30 m-b-30">Job Category: <?=getJobFunction($company->jobFunctionId);?></h4>
    <hr>
    <span class="text-black"><?=$company->description;?></span>
              <!-- // foreach ($company as $key => $value) {
              //   echo $key . ": " . $value . "<br>";
              // } -->

  </div> <!-- end col -->
  <div class="center-page text-center p-t-10 m-b-30">
    <h4>Jobs</h4>
    <div class="row">
      <button class="btn btn-success stepy-finish" onclick="location.href='?view=jobList&email=<?=$company->email;?>&isApproved=1'">
        Ongoing: <?=job()->count("workEmail='$company->email' and isApproved=1")?>
      </button>
      <button class="btn btn-warning stepy-finish" onclick="location.href='?view=jobList&email=<?=$company->email;?>&isApproved=0'">
        Requests: <?=job()->count("workEmail='$company->email' and isApproved!=1")?>
      </button>
    </div>
  </div>
</div>
