<?php
$Id = $_GET['id'];
$company = company()->get("Id='$Id'");

function getJobFunction($Id){
  $jobFunc = job_function()->get("Id='$Id'");
  echo $jobFunc->option;
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Personal-Information -->
        <div class="card-box">
            <h4 class="header-title mt-0 m-b-20">Client Detail</h4>
            <div class="panel-body">
                <div class="text-left">
                    <p class="text-muted font-13"><strong>Company Name :</strong>
                      <span class="m-l-15"><?=$company->name;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Company ABN :</strong>
                      <span class="m-l-15"><?=$company->abn;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Industry :</strong>
                      <span class="m-l-15"><?=getJobFunction($company->jobFunctionId);?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Department :</strong>
                      <span class="m-l-15"><?=$company->department;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Contact Person :</strong>
                      <span class="m-l-15"><?=$company->contactPerson;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Client Email :</strong>
                      <span class="m-l-15"><?=$company->email;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Address :</strong>
                      <span class="m-l-15"><?=$company->address;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Phone Number :</strong>
                      <span class="m-l-15"><?=$company->phoneNumber;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Mobile Number :</strong>
                      <span class="m-l-15"><?=$company->mobileNumber;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Status :</strong>
                        <?php if($company ->isApproved==0){ ?>
                        <span class=" btn btn-success btn-xs tooltips">
                          Pending
                        </span>
                        <?php }else{ ?>
                        <span class=" btn btn-warning btn-xs tooltips">
                          Waiting for Info
                        </span>
                        <?php } ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- Personal-Information -->
        <div class="card-box">
          <button class="btn btn-default stepy-finish" onclick="location.href='process.php?action=clientRequest&result=approve&Id=<?=$company->Id;?>'">Approve</button>
          <button class="btn btn-default stepy-finish" onclick="location.href='process.php?action=clientRequest&result=deny&Id=<?=$company->Id;?>'">More Info</button>
        </div>
    </div>
  </div>
