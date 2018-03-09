<?php
$Id = $_GET['Id'];
$resume = resume()->get("Id='$Id'");

function getJobFunction($Id){
  $job = job_function()->get("Id='$Id'");
  echo $job->option;
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Personal-Information -->
        <div class="card-box">
            <h4 class="header-title mt-0 m-b-20">Candidate Detail</h4>
            <div class="panel-body">
                <div class="text-left">
                    <p class="text-muted font-13"><strong>Candidate Name :</strong>
                      <span class="m-l-15"><?=$resume->firstName;?> <?=$resume->lastName;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Candidate ABN :</strong>
                      <span class="m-l-15"><?=$resume->abn;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Tax File Number :</strong>
                      <span class="m-l-15"><?=$resume->taxNumber;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Candidate Email :</strong>
                      <span class="m-l-15"><?=$resume->email;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Job Category :</strong>
                      <span class="m-l-15"><?=getJobFunction($resume->jobFunctionId);?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Phone Number :</strong>
                      <span class="m-l-15"><?=$resume->phoneNumber;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Address 1 :</strong>
                      <span class="m-l-15"><?=$resume->address1;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Address 2 :</strong>
                      <span class="m-l-15"><?=$resume->address2;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>City :</strong>
                      <span class="m-l-15"><?=$resume->city;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>State :</strong>
                      <span class="m-l-15"><?=$resume->state;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Postal Code :</strong>
                      <span class="m-l-15"><?=$resume->zipCode;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Cover Letter :</strong>
                      <span class="m-l-15"><?=$resume->coverLetter;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Resume :</strong>
                      <span class="m-l-15"><?=$resume->uploadedResume;?></span>
                    </a>
                    </p>
                </div>
            </div>
        </div>
        <!-- Personal-Information -->
        <div class="card-box">
          <button>Update</button>
          <button onclick="location.href='process.php?action=removeCandidate&Id=<?=$resume->Id;?>'">Remove</button>
        </div>
    </div>
  </div>
