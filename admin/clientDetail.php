<?php
$Id = $_GET['Id'];
$company = company()->get("Id=$Id");

function getJobFunction($Id){
    $jf = job_function()->get("Id='$Id'");
    echo $jf->option;
}
?>

<div class="container container-fluid">
  <div class="col-12">

    <h2><?=$company->name;?></h2>
    Business Number: <?=$company->abn;?><br>
    Username: <?=$company->username;?>

    <div class="row">
      <div class="col-12">
        <div class="col-lg-4">

          name: <?=$company->address;?>
<br>
                  name: <?=$company->phoneNumber;?>
        </div>
        <div class="col-lg-4">
              name: <?=$company->contactPerson;?><br>
                            name: <?=$company->mobileNumber;?>
        </div>
        <div class="col-lg-4">

                  name: <?=$company->email;?><br>

                                name: <?=$company->department;?>
        </div>
      </div>
    </div>

              Job Category: <?=getJobFunction($company->jobFunctionId);?>



              <!-- // foreach ($company as $key => $value) {
              //   echo $key . ": " . $value . "<br>";
              // } -->

  </div> <!-- end col -->

</div>
