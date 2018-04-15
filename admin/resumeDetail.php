<?php
$Id = $_GET['Id'];
$application = application()->get("Id=$Id");

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
    <h2 class="text-blue"> <?=$application->lastName;?>, <?=$application->firstName;?> </h2>
    <p><label class="m-r-5 m-t-15">Job Category: </label><?=getJobFunction($application->jobFunctionId);?><p>
    <p><label class="m-r-5">Email: </label><?=$application->email;?></p>
    <p><label class="m-r-5">Birthdate: </label><?=$application->birthdate;?></p>
    <div class="row">
      <div class="col-lg-4">
        <p><label class="m-r-5">Employee Reference: </label><?=$application->refNum;?></p>
      </div>
      <div class="col-lg-4">
        <p><label class="m-r-5">Employee ABN: </label><?=$application->abn;?></p>
      </div>
      <div class="col-lg-4">
        <p><label class="m-r-5">Tax Number: </label><?=$application->taxNumber;?></p>
      </div>
    </div>
      <div class="row">
        <div class="col-lg-6">
          <p><label class="m-r-5">Address 1: </label><?=$application->address1;?></p>
        </div>
        <div class="col-lg-6">
          <p><label class="m-r-5">Address 2: </label><?=$application->address2;?></p>
        </div>
      </div>
      <p><label class="m-r-5 m-t-15">City: </label><?=getCity($application->city);?></p>
      <p><label class="m-r-5">State: </label><?=$application->state;?></p>
      <p><label class="m-r-5">Postal Code: </label><?=$application->zipCode;?></p>

      <p>
        <label class="m-r-5">Status :</label>
        <?php if($application->isHired==0 && $application->isApproved==1){ ?>
        <div class=" btn btn-default btn-xs tooltips">
          Waiting for Interview
        </div>
        <?php }elseif($application->isHired==1 && $application->isApproved==1){ ?>
        <div class=" btn btn-success btn-xs tooltips">
          Hired
        </div>
        <?php }else{ ?>
        <div class=" btn btn-warning btn-xs tooltips">
          Pending
        </div>
        <?php } ?>
      </p>
      <p><label class="m-r-5">Key Skills: </label><?=$application->keySkills;?></p>
      <hr>
      <p><label class="m-r-5">Cover Letter: </label><?=$application->coverLetter;?><p>
      <p><label class="m-r-5">Speedtest: </label><?=$application->speedtest;?><p>
        <div class="col-12 text-center">
          <div class="col-lg-4">
      <p><label class="m-r-5">Uploaded Specs: </label><br><a href="../media/<?=$application->uploadedSpecs;?>" target="blank_">Click to view Computer Specification</a><p>
      </div>
      <div class="col-lg-4">
      <p><label class="m-r-5">Uploaded Certificate: </label><br><a href="../media/<?=$application->uploadedCerts;?>" target="blank_">Click to view Candidate Resume</a><p>
      </div>
      <div class="col-lg-4">
      <p><label class="m-r-5">Uploaded Resume: </label><br><a href="../media/<?=$application->uploadedResume;?>" target="blank_">Click to view Candidate Resume</a><p>
      </div>
    </div>
    </div>
  </div>
</div> <!-- end col -->
<hr>
          <h3 class="text-center">Detail</h3>
          <?php if($application->isApproved==0){?>
            <div class="row text-center m-b-30">
              <div class="col-12">
                <div class="col-lg-6">
                  <button class="btn btn-success pull-right" style="width:350px;" data-toggle="modal" data-target="#schedule-modal">
                    Schedule an Interview
                  </button>
                </div>
                <div class="col-lg-6">
                  <button class="btn btn-danger pull-left" style="width:350px;"onclick="location.href='process.php?action=denyResume&Id=<?=$application->Id;?>'">
                    Deny
                  </button>
                </div>
              </div>
        <?php } ?>
        <?php if($application->isApproved==1 && $application->jobId!=0){?>
            <div class="col-12">
              <div class="col-lg-6">
                <button class="btn btn-success pull-right" style="width:350px;" onclick="location.href='process.php?action=hireApplicant&result=approve&Id=<?=$application->Id;?>&jobId=<?=$application->jobId;?>'">
                  Hire
                </button>
              </div>
              <div class="col-lg-6">
                <button class="btn btn-danger pull-left" style="width:350px;" onclick="location.href='process.php?action=hireApplicant&result=reject&Id=<?=$application->Id;?>'">
                  Reject
                </button>
              </div>
            </div>
        <?php } ?>
        <?php if($application->isApproved==1 && $application->jobId==0){?>
        <div class="col-12">
          <div class="text-center">
            <button class="btn btn-success" style="width:350px;" onclick="location.href='?view=openJobs&Id=<?=$application->Id;?>'">
              AssignJob
            </button>
          </div>
        </div>
        <?php } ?>
      </div>

<!-- Schedule and interview modal content -->
<div id="schedule-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            <div class="modal-body">
                <h2 class="text-uppercase text-center m-b-30">
                    <a href="index.html" class="text-success">
                        <span><img src="assets/images/logo_dark.png" alt="" height="30"></span>
                    </a>
                </h2>

                <form class="form-horizontal" action="process.php?action=setInterViewDate" method="post">

                      <input type="hidden" name="resumeId" value="<?=$application->Id;?>">
                      <input type="hidden" name="email" value="<?=$application->email;?>">
                                        <div class="form-group account-btn text-center m-t-10">
                  <div class="input-group">
                      <input type="date" name="date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" required>
                      <span class="input-group-addon bg-primary b-0"><i class="mdi mdi-calendar text-white mdi-24px"></i></span>
                  </div>
                </div>

                <div class="form-group account-btn text-center m-t-10">
                  <div class="input-group">
                        <input id="timepicker" name="time" type="time" class="form-control" required>
                        <span class="input-group-addon"><i class="mdi mdi-clock mdi-24px"></i></span>
                    </div>  </div>

                    <div class="form-group account-btn text-center m-t-10">
                        <div class="col-xs-12">
                            <button class="btn w-lg btn-rounded btn-lg btn-blue waves-effect waves-light" type="submit">Set</button>
                        </div>
                    </div>

                </form>
  </div>
</div>
