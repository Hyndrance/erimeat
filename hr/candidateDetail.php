<?php
$Id = $_GET['Id'];
$candidate = candidate()->get("Id='$Id'");

$certList = certificates()->list("resumeId='$Id'");

function getJobName($Id){
  $job = job()->get("Id='$Id'");
  return $job->position;
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Personal-Information -->
        <div class="card-box">
            <h4 class="header-title mt-0 m-b-20">Resume Detail</h4>
            <div class="panel-body">
              <div class="text-left">
                  <p class="text-muted font-13"><strong>Candidate Reference # :</strong>
                    <span class="m-l-15"><?=$candidate->refNum;?></span>
                  </p>
                  <p class="text-muted font-13"><strong>Candidate ABN :</strong>
                    <span class="m-l-15"><?=$candidate->abn;?></span>
                  </p>
                  <p class="text-muted font-13"><strong>First Name :</strong>
                    <span class="m-l-15"><?=$candidate->firstName;?></span>
                  </p>
                  <p class="text-muted font-13"><strong>Last Name :</strong>
                    <span class="m-l-15"><?=$candidate->lastName;?></span>
                  </p>
                  <p class="text-muted font-13"><strong>Email :</strong>
                    <span class="m-l-15"><?=$candidate->email;?></span>
                  </p>
                  <p class="text-muted font-13"><strong>Phone Number :</strong>
                    <span class="m-l-15"><?=$candidate->phoneNumber;?></span>
                  </p>
                  <p class="text-muted font-13"><strong>Address :</strong>
                    <span class="m-l-15"><?=$candidate->address1;?> <?=$candidate->city;?> <?=$candidate->state;?> <?=$candidate->zipCode;?></span>
                  </p>
                  <p class="text-muted font-13"><strong>Speedtest :</strong>
                    <span class="m-l-15"><?=$candidate->speedtest;?></span>
                  </p>
                  <p>
                    <label class="text-muted font-13">Status :</label>
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
                      Pending
                    </div>
                    <?php } ?>
                  </p>
                  <br>
                  <p class="text-muted font-13"><strong>Cover Letter :</strong>
                    <span class="m-l-15"><?=$candidate->coverLetter;?></span>
                  </p>
                  <br><br>
                  <p class="text-muted font-13"><strong>Click to view specs</strong>
                    <span class="m-l-15"><a href="../media/<?=$candidate->uploadedSpecs;?>" target="blank_">Computer Specification</a></span>
                  </p>
                  <p class="text-muted font-13"><strong>Click to view resume :</strong>
                    <span class="m-l-15"><a href="../media/<?=$candidate->uploadedResume;?>" target="blank_">Candidate Resume</a></span>
                  </p>
                  <p class="text-muted font-13"><strong>Click to view certificates :</strong></br>
                    <?php foreach($certList as $row){ ?>
                    <span class="m-l-15"><a href="../media/<?=$row->uploadedCerts;?>" target="blank_">Supporting Documents</a></span><br>
                    <?php }?>
                  </p>
              </div>
            </div>
        </div>
        <!-- Personal-Information -->
        <div class="card-box">
        <?php if($candidate->isApproved==0){?>
        <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#schedule-modal">Schedule an Interview</button>
        <button class="btn btn-default stepy-finish" onclick="location.href='process.php?action=denyResume&Id=<?=$candidate->Id;?>'">Request for More Info</button>
        <button onclick="location.href='process.php?action=deleteCandidateResume&Id=<?=$candidate->Id;?>'" class="btn btn-danger">Delete</button>
        <?php } ?>
        <?php if($candidate->isApproved==1 && $candidate->isHired==0 && $candidate->jobId==0){?>
        <button onclick="location.href='?view=openJobs&Id=<?=$candidate->Id;?>'" class="btn btn-info" style="width:350px;">
          Assign Job
        </button>
        <?php } ?>
        <?php if($candidate->isApproved==1 && $candidate->jobId!=0){?>
        <button class="btn btn-success" style="width:350px;" onclick="location.href='process.php?action=hireApplicant&result=approve&Id=<?=$candidate->Id;?>&jobId=<?=$candidate->jobId;?>'">
          Hire
        </button>
        <button class="btn btn-danger" style="width:350px;" onclick="location.href='process.php?action=hireApplicant&result=reject&Id=<?=$candidate->Id;?>'">
          Reject
        </button>
        <?php } ?>
      </div>
  </div>
</div>

  <!-- Signup modal content -->
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
                        <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                    </div>
                  </div>

                  <div class="form-group account-btn text-center m-t-10">
                    <div class="input-group">
                          <input id="timepicker" name="time" type="time" class="form-control" required>
                          <span class="input-group-addon"><i class="mdi mdi-clock"></i></span>
                      </div>  </div>

                      <div class="form-group account-btn text-center m-t-10">
                          <div class="col-xs-12">
                              <button class="btn w-lg btn-rounded btn-lg btn-custom waves-effect waves-light" type="submit">Set</button>
                          </div>
                      </div>

                  </form>

              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
