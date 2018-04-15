<?php
$Id = $_GET['Id'];
$candidate = candidate()->get("Id='$Id'");

$certList = certificates()->list("resumeId='$Id'");

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
      <h2 class="text-blue"><?=$candidate->firstName;?> <?=$candidate->lastName;?></h2>
      <p><label class="m-r-5">Email: </label><?=$candidate->email;?></p>
      <p><label class="m-r-5">Job Category: </label><?=getJobFunction($candidate->jobFunctionId);?></p>
      <p><label class="m-r-5">Phone Number: </label><?=$candidate->phoneNumber;?></p>
      <div class="row">
        <div class="col-lg-6">
          <p><label class="m-r-5">Candidate ABN :</label><?=$candidate->abn;?></p>
        </div>
        <div class="col-lg-6">
          <p><label class="m-r-5">Tax File Number :</label><?=$candidate->taxNumber;?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <p><label class="m-r-5">Address 1 :</label><?=$candidate->address1;?></p>
        </div>
        <div class="col-lg-6">
          <p><label class="m-r-5">Address 2 :</label><?=$candidate->address2;?></p>
        </div>
      </div>
      <p><label class="m-r-5">City :</label><?=getCity($candidate->city);?></p>
      <p><label class="m-r-5">State :</label><?=$candidate->state;?></p>
      <p><label class="m-r-5">Postal Code :</label><?=$candidate->zipCode;?></p>
      <p>
        <label class="m-r-5">Status :</label>
        <?php if($candidate->isHired==0 && $candidate->isApproved==1){ ?>
        <div class=" btn btn-default btn-xs tooltips">
          Waiting for Interview
        </div>
        <?php }elseif($candidate->isHired==1 && $candidate->isApproved==1){ ?>
        <div class=" btn btn-success btn-xs tooltips">
          Hired
        </div>
        <?php }else{ ?>
        <div class=" btn btn-warning btn-xs tooltips">
          Available
        </div>
        <?php } ?>
      </p>
      <p><label class="m-r-5">Key Skills :</label><?=$candidate->keySkills;?></p>
      <hr>
      <div class="col-12 text-center">
        <div class="col-lg-6">
          <p><label class="m-r-5"><strong>Computer Specification :</label><br><a href="../media/<?=$candidate->uploadedSpecs;?>" target="blank_">Click to view Computer Specifications</a></p>
        </div>
        <div class="col-lg-6">
          <p><label class="m-r-5"><strong>Resume :</label><br><a href="../media/<?=$candidate->uploadedResume;?>" target="blank_">Click to view Resume</a></p>
        </div>
      </div>

      <div class="col-12 text-center">
        <div class="col-lg-6">
          <p><label class="m-r-5">Cover Letter :</label><br><?=$candidate->coverLetter;?></p>
        </div>
        <div class="col-lg-6">
            <p><label class="m-r-5"><strong>Other Certificates :</label><br>
              <?php foreach($certList as $row){ ?>
                <a href="../media/<?=$row->uploadedCerts;?>" target="blank_">Click to view other certificates</a><br>
              <?php }?>
            </p>
        </div>
      </div>
      <div class="clearfix"></div>
      <?php if($candidate->isApproved==0){?>
      <div class="col-12 m-t-30">
          <button class="btn btn-lg btn-info" data-toggle="modal" data-target="#schedule-modal">
            Set an Interview
          </button>
          <button onclick="location.href='process.php?action=denyCandidateResume&Id=<?=$candidate->Id;?>'" class="btn btn-lg btn-default">Request for More Info</button>
          <button onclick="location.href='process.php?action=deleteCandidateResume&Id=<?=$candidate->Id;?>'" class="btn btn-lg btn-danger">Delete</button>
      </div>
      <?php } ?>
      <?php if($candidate->isApproved==1 && $candidate->isHired==0 && $candidate->jobId==0){?>
      <div class="col-12 m-t-30">
        <div class="col-lg-12 text-center">
          <button onclick="location.href='?view=openJobs&Id=<?=$candidate->Id;?>'" class="btn btn-info" style="width:350px;">
            Assign Job
          </button>
        </div>
      </div>
      <?php } ?>
      <?php if($candidate->isApproved==1 && $candidate->jobId!=0 && $candidate->isHired==0){?>
      <div class="col-12 m-t-30">
        <div class="col-lg-6">
          <button class="btn btn-success pull-right" style="width:350px;" onclick="location.href='process.php?action=hireApplicant&result=approve&Id=<?=$candidate->Id;?>&jobId=<?=$candidate->jobId;?>'">
            Hire
          </button>
        </div>
        <div class="col-lg-6">
          <button class="btn btn-danger pull-left" style="width:350px;" onclick="location.href='process.php?action=hireApplicant&result=reject&Id=<?=$candidate->Id;?>'">
            Reject
          </button>
        </div>
      </div>
      <?php } ?>
      <?php if($candidate->isApproved==1 && $candidate->jobId!=0 && $candidate->isHired==1){?>
      <div class="col-12 m-t-30 text-center">
        <button onclick="location.href='process.php?action=deleteCandidateResume&Id=<?=$candidate->Id;?>'" class="btn btn-lg btn-danger">Delete</button>
      </div>
      <?php } ?>
  </div>
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

                <form class="form-horizontal" action="process.php?action=setCandidateInterview" method="post">

                      <input type="hidden" name="resumeId" value="<?=$candidate->Id;?>">
                      <input type="hidden" name="email" value="<?=$candidate->email;?>">
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
</div>
</div>
