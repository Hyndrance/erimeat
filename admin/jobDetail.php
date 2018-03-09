<?php
$Id = $_GET['id'];
$job = job()->get("Id='$Id'");
?>


<div class="row">
    <div class="col-md-12">
        <!-- Personal-Information -->
        <div class="card-box">
            <h4 class="header-title mt-0 m-b-20">Job Detail</h4>
            <div class="panel-body">
                <div class="text-left">
                    <p class="text-muted font-13"><strong>Job Reference Number :</strong>
                      <span class="m-l-15"><?=$job->refNum;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Job Position :</strong>
                      <span class="m-l-15"><?=$job->position;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Company Name:</strong>
                      <span class="m-l-15"><?=$job->company;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Company ABN:</strong>
                      <span class="m-l-15"><?=$job->abn;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Work Email :</strong>
                      <span class="m-l-15"><?=$job->workEmail;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Contact Person:</strong>
                      <span class="m-l-15"><?=$job->contactName;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Job Title :</strong>
                      <span class="m-l-15"><?=$job->jobTitle;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Business Phone :</strong>
                      <span class="m-l-15"><?=$job->businessPhone;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Address :</strong>
                      <span class="m-l-15"><?=$job->address;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Required Experience :</strong>
                      <span class="m-l-15"><?=$job->requiredExperience;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Comment :</strong>
                      <span class="m-l-15"><?=$job->comment;?></span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Personal-Information -->
        <div class="card-box">
          <button>Update</button>
          <button onclick="location.href='process.php?action=removeJob&Id=<?=$job->Id;?>'">Remove</button>
        </div>
    </div>
  </div>
