<?php
$success = (isset($_GET['success']) && $_GET['success'] != '') ? $_GET['success'] : '';
$username = $_GET['username'];
$application = application()->get("username='$username'");
$Id = $application->Id;

$certList = certificates()->list("resumeId='$application->Id'");

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
  <?php if($success){?>
  <div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"
              aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <?=$success;?>
  </div>
<?php }?>
  <div class="col-12 m-t-30 m-b-30">
      <h2 class="text-blue"><?=$application->firstName;?> <?=$application->lastName;?></h2>
      <p><label class="m-r-5">Email: </label><?=$application->email;?></p>
      <p><label class="m-r-5">Job Category: </label><?=getJobFunction($application->jobFunctionId);?></p>
      <p><label class="m-r-5">Phone Number: </label><?=$application->phoneNumber;?></p>
      <div class="row">
        <div class="col-lg-6">
          <p><label class="m-r-5">Candidate ABN :</label><?=$application->abn;?></p>
        </div>
        <div class="col-lg-6">
          <p><label class="m-r-5">Tax File Number :</label><?=$application->taxNumber;?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <p><label class="m-r-5">Address 1 :</label><?=$application->address1;?></p>
        </div>
        <div class="col-lg-6">
          <p><label class="m-r-5">Address 2 :</label><?=$application->address2;?></p>
        </div>
      </div>
      <p><label class="m-r-5">City :</label><?=getCity($application->city);?></p>
      <p><label class="m-r-5">State :</label><?=$application->state;?></p>
      <p><label class="m-r-5">Postal Code :</label><?=$application->zipCode;?></p>
      <p><label class="m-r-5">Speedtest :</label>
        <span class="m-l-15"><a href="<?=$application->speedtest;?>" target="_blank"><?=$application->speedtest;?></a></span>
      </p>
      <p>
        <label class="m-r-5">Status :</label>
        <?php if($application->isHired==0 && $application->isApproved==1){ ?>
        <div class=" btn btn-default btn-xs tooltips">
          Waiting for Interview Results
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
      <p><label class="m-r-5">Key Skills :</label><?=$application->keySkills;?></p>
      <hr>
      <div class="col-12 row">
        <div class="col-lg-6 row">
          <p><label class="m-r-5"><strong>Computer Specification :</label><br>
            <?php if($application->uploadedSpecs) { ?>
              <a href="../media/<?=$application->uploadedSpecs;?>" target="blank_">Click to view Computer Specifications</a>
            <?php } ?>
          </p>
        </div>
        <div class="col-lg-6 row">
          <p><label class="m-r-5"><strong>Resume :</label><br>
            <?php if($application->uploadedResume) {?>
              <a href="../media/<?=$application->uploadedResume;?>" target="blank_">Click to view Resume</a>
            <?php } ?></p>
        </div>
      </div>

      <div class="col-12 row">
        <div class="col-lg-6 row">
          <p><label class="m-r-5">Cover Letter :</label><br><?=nl2br($application->coverLetter);?></p>
        </div>
        <div class="col-lg-6 row">
            <p><label class="m-r-5"><strong>Other Certificates :</label><br>
              <?php foreach($certList as $row){ ?>
                <a href="../media/<?=$row->uploadedCerts;?>" target="blank_">Click to view other certificates</a><br>
              <?php }?>
            </p>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-12 m-t-30">
        <div class="col-lg-12 text-center">
          <button class="btn btn-info" onclick="location.href='?view=timesheetList&employee=<?=$application->username;?>'">
            View timesheet
          </button>
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#update-information-modal">Update Info</button>
        </div>
      </div>
  </div>
</div>
</div>

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

                <form class="form-horizontal" action="process.php?action=updateEmployeeInfo&Id=<?=$Id;?>&username=<?=$username;?>" method="post">

                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">First Name <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="firstName" value="<?=$application->firstName;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Last Name <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="lastName" value="<?=$application->lastName;?>" required>
                  </div>
                  </div>

                  <div class="form-group">
                      <label for="firstname">Job Category <span style="color: red;">*</span></label>
                      <select class="form-control" name="jobFunctionId" required="">
                       <option value="<?=$application->jobFunctionId;?>"><?=getJobFunction($application->jobFunctionId);?></option>
                        <?php foreach($jfList as $row) {?>
                          <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                        <?php } ?>
                      </select>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">ABN </label>
                      <input type="text" class="form-control" name="abn" value="<?=$application->abn;?>">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                    <div class="form-group">
                        <label for="firstname">Tax File Number </label>
                        <input type="text" class="form-control" name="taxNumber" value="<?=$application->taxNumber;?>">
                    </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Email <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="email" value="<?=$application->email;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Phone Number <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="phoneNumber" value="<?=$application->phoneNumber;?>" required="">
                  </div>
                  </div>

                  <div class="form-group">
                      <label for="username">Primary Address <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="address1" value="<?=$application->address1;?>" required="">
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                    <div class="form-group">
                      <label for="username">City</label>
                      <select class="form-control" name="city">
                          <option value="<?=$application->city;?>"><?=getCity($application->city);?></option>
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
                      <input type="text" class="form-control" name="state" value="<?=$application->state;?>">
                    </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                    <div class="form-group">
                      <label for="username">Postal Code </label>
                      <input type="text" class="form-control" data-mask="9999" name="zipCode" value="<?=$application->zipCode;?>">
                    </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Key Skills </label>
                      <input type="text" class="form-control" name="keySkills" value="<?=$application->keySkills;?>">
                  </div>
                </div>

                  <div class="form-group">
                      <label>Cover Letter</label>
                      <div>
                          <textarea name="coverLetter" class="form-control" required><?=$application->coverLetter;?></textarea>
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
