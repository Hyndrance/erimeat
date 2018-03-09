<?php
$Id = $_GET['Id'];
$resume = resume()->get("Id='$Id'");
$jobId = $_GET['jobId'];
?>


<div class="row">
    <div class="col-md-12">
        <!-- Personal-Information -->
        <div class="card-box">
            <h4 class="header-title mt-0 m-b-20">Resume Detail</h4>
            <div class="panel-body">
                <div class="text-left">
                    <p class="text-muted font-13"><strong>First Name :</strong>
                      <span class="m-l-15"><?=$resume->firstName;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Last Name :</strong>
                      <span class="m-l-15"><?=$resume->lastName;?></span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Personal-Information -->
        <div class="card-box">
          <button class="btn btn-default" onclick="location.href='process.php?action=hireApplicant&result=approve&Id=<?=$resume->Id;?>&jobId=<?=$jobId;?>'">Hire</button>
          <button class="btn btn-default" onclick="location.href='process.php?action=hireApplicant&result=deny&Id=<?=$resume->Id;?>'">Deny</button>
        </div>
    </div>
  </div>
