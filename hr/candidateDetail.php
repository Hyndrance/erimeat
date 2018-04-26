<?php
$success = (isset($_GET['success']) && $_GET['success'] != '') ? $_GET['success'] : '';
$Id = $_GET['Id'];
$candidate = candidate()->get("Id='$Id'");

$certList = certificates()->list("resumeId='$Id'");

$jfList = job_function()->list("isDeleted='0' order by `option` asc");

function getJobFunction($Id){
  $job = job_function()->get("Id='$Id'");
  echo $job->option;
}

function getJobName($Id){
  $job = job()->get("Id='$Id'");
  return $job->position;
}

function getCity($Id){
  $city = city_option()->get("Id='$Id'");
  echo $city->city;
}
?>


<div class="row">
  <?php if($success){?>
  <div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"
              aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <?=$success;?>
  </div>
<?php }?>
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
                    <span class="m-l-15"><a href="<?=$candidate->speedtest;?>" target="_blank"><?=$candidate->speedtest;?></a></span>
                  </p>
                  <p>
                    <label class="text-muted font-13">Status :</label>
                    <?php if($candidate->isHired==0 && $candidate->isApproved==1){ ?>
                    <div class=" btn btn-default btn-xs tooltips">
                      Waiting for Interview Results
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
                  <p class="text-muted font-13"><strong>Key Skills :</strong>
                    <span class="m-l-15"><?=$candidate->keySkills;?></span>
                  </p>
                  <br>
                  <p class="text-muted font-13"><strong>Cover Letter :</strong>
                    <span class="m-l-15"><?=$candidate->coverLetter;?></span>
                  </p>
                  <br><br>
                  <p class="text-muted font-13"><strong>Computer Specification :</strong>
                    <span class="m-l-15">
                      <?php if($candidate->uploadedSpecs) {?>
                        <a href="../media/<?=$candidate->uploadedSpecs;?>" target="blank_">Click to view Computer Specification</a>
                      <?php } ?>
                    </span>
                  </p>
                  <p class="text-muted font-13"><strong>Candidate Resume :</strong>
                    <span class="m-l-15">
                      <?php if($candidate->uploadedResume) { ?>
                        <a href="../media/<?=$candidate->uploadedResume;?>" target="blank_">Click to view Candidate Resume</a>
                      <?php } ?>
                    </span>
                  </p>
                  <p class="text-muted font-13"><strong>Other Certificates :</strong></br>
                    <?php foreach($certList as $row){ ?>
                    <span class="m-l-15"><a href="../media/<?=$row->uploadedCerts;?>" target="blank_">Click to view Other Documents</a></span><br>
                    <?php }?>
                  </p>
              </div>
            </div>
        </div>
        <!-- Personal-Information -->
        <div class="card-box">
        <?php if($candidate->isApproved==0){?>
        <button type="button" class="btn btn-small btn-info waves-effect waves-light" data-toggle="modal" data-target="#schedule-modal">Schedule an Interview</button>
        <button class="btn btn-small btn-default stepy-finish" onclick="location.href='process.php?action=denyCandidateResume&Id=<?=$candidate->Id;?>'">Request for More Info</button>
        <button class="btn btn-small btn-success" type="button" data-toggle="modal" data-target="#update-information-modal">Update Info</button>
        <button onclick="location.href='process.php?action=deleteCandidateResume&Id=<?=$candidate->Id;?>'" class="btn btn-small btn-danger">Delete</button>
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

  <div id="update-information-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
      <div style="width:700px;" class="modal-dialog">
          <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

              <div class="modal-body">
                  <h2 class="text-uppercase text-center m-b-30">
                      <a href="index.html" class="text-success">
                          <span><img src="assets/images/logo_dark.png" alt="" height="30"></span>
                      </a>
                  </h2>

                  <form class="form-horizontal" action="process.php?action=updateCandidateInfo&Id=<?=$Id;?>" method="post">

                    <div class="p-r-10 w-50-p pull-left">
                    <div class="form-group">
                        <label for="username">First Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="firstName" value="<?=$candidate->firstName;?>" required="">
                    </div>
                    </div>

                    <div class="p-l-10 w-50-p pull-left">
                    <div class="form-group">
                        <label for="username">Last Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="lastName" value="<?=$candidate->lastName;?>" required>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname">Job Category <span style="color: red;">*</span></label>
                        <select class="form-control" name="jobFunctionId" required="">
                         <option value="<?=$candidate->jobFunctionId;?>"><?=getJobFunction($candidate->jobFunctionId);?></option>
                          <?php foreach($jfList as $row) {?>
                            <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                          <?php } ?>
                        </select>
                    </div>

                    <div class="p-r-10 w-50-p pull-left">
                    <div class="form-group">
                        <label for="username">ABN </label>
                        <input type="text" class="form-control" name="abn" value="<?=$candidate->abn;?>">
                    </div>
                    </div>

                    <div class="p-l-10 w-50-p pull-left">
                      <div class="form-group">
                          <label for="firstname">Tax File Number </label>
                          <input type="text" class="form-control" name="taxNumber" value="<?=$candidate->taxNumber;?>">
                      </div>
                    </div>

                    <div class="p-r-10 w-50-p pull-left">
                    <div class="form-group">
                        <label for="username">Email <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="email" value="<?=$candidate->email;?>" required="">
                    </div>
                    </div>

                    <div class="p-l-10 w-50-p pull-left">
                    <div class="form-group">
                        <label for="username">Phone Number <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="phoneNumber" value="<?=$candidate->phoneNumber;?>" required="">
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="username">Primary Address <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="address1" value="<?=$candidate->address1;?>" required="">
                    </div>

                    <div class="p-r-10 w-50-p pull-left">
                      <div class="form-group">
                        <label for="username">City</label>
                        <select class="form-control" name="city">
                            <option value="<?=$candidate->city;?>"><?=getCity($candidate->city);?></option>
                            <?php foreach(country_option()->list() as $country){ ?>
                            <optgroup label="<?=$country->country;?>">
                                <?php foreach(city_option()->list("countryId=$country->Id") as $city){ ?>
                                    <option value="<?=$city->Id;?>"><?=$city->city;?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="p-l-10 w-50-p pull-left">
                      <div class="form-group">
                        <label for="username">State </label>
                        <input type="text" class="form-control" name="state" value="<?=$candidate->state;?>">
                      </div>
                    </div>

                    <div class="p-r-10 w-50-p pull-left">
                      <div class="form-group">
                        <label for="username">Postal Code </label>
                        <input type="text" class="form-control" data-mask="9999" name="zipCode" value="<?=$candidate->zipCode;?>">
                      </div>
                    </div>

                    <div class="p-l-10 w-50-p pull-left">
                    <div class="form-group">
                        <label for="username">Key Skills </label>
                        <input type="text" class="form-control" name="keySkills" value="<?=$candidate->keySkills;?>">
                    </div>
                  </div>

                    <div class="form-group">
                        <label>Cover Letter</label>
                        <div>
                            <textarea name="coverLetter" class="summernote" required><?=$candidate->coverLetter;?></textarea>
                        </div>
                    </div>

                    <div class="form-group account-btn text-center m-t-10">
                        <div class="col-xs-12">
                            <button class="btn w-lg btn-rounded btn-lg btn-custom waves-effect waves-light" type="submit">Submit</button>
                        </div>
                    </div>

                  </form>

              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
