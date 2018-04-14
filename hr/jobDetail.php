<?php
$Id = $_GET['Id'];
$job = job()->get("Id=$Id");

$jfList = job_function()->list("isDeleted='0' order by `option` asc");
$ptList = position_type()->list();

function getJobFunction($Id){
  $jf = job_function()->get("Id='$Id'");
  echo $jf->option;
}

function getPosition($Id){
  $pt = position_type()->get("Id='$Id'");
  echo $pt->option;
}

function formatDate($val){
  $date = date_create($val);
  return date_format($date, "F d, Y");
}
?>

<div class="container container-fluid">
  <div class="col-12 m-t-30 m-b-30">
    <h2 class="text-blue"><?=$job->position;?></h2>
        <p><label class="m-r-5">Required Experience: </label><?=$job->requiredExperience;?></p>
        <p><label class="m-r-5">Company: </label><?=$job->company;?></p>
        <p><label class="m-r-5">Address: </label><?=$job->address;?></p>
        <p><label class="m-r-5">Postal Code: </label><?=$job->zipCode;?></p>
        <div class="row">
          <div class="col-lg-6">
            <p><label class="m-r-5">Job Category: </label><?=getJobFunction($job->jobFunctionId);?></p>
          </div>
          <div class="col-lg-6">
            <p><label class="m-r-5">Employement Type: </label><?=getPosition($job->positionTypeId);?></p>
          </div>
        </div>

        <p><label class="m-r-5">Employment Location: </label><?=$job->empLocation;?></p>
        <p class="text-muted">Created at: </label><?=formatDate($job->createDate);?></p>
    <div class="col-12 m-t-30">
      <div class="col-lg-4">
        <label class="m-r-5">Contact Person: </label><?=$job->contactName;?>
        <br>
        <?=$job->jobTitle;?>
      </div>
      <div class="col-lg-6">
        <i class="fa fa-envelope m-r-5"></i><?=$job->workEmail;?>
        <br>
        <i class="fa fa-phone m-r-5"></i><?=$job->businessPhone;?>
      </div>
      <div class="col-lg-4">
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row m-t-20">
      <div class="col-lg-6">
        ABN: <?=$job->abn;?>
      </div>
      <div class="col-lg-6">
        Reference Number: <?=$job->refNum;?>
      </div>
    </div>
    <div class="clearfix"></div>
    <hr>
    <h3>Comment</h3>
    <?=$job->comment;?>
    <hr>
        <!--  This button only shows if job is approved -->
        <?php if($job->isApproved==0) {?>
          <button class="btn btn-blue" type="button" onclick="location.href='process.php?action=jobRequest&result=approve&Id=<?=$job->Id?>'">Approve</button>
          <button class="btn btn-warning" type="button" onclick="location.href='process.php?action=jobRequest&result=moreInfo&Id=<?=$job->Id?>'">Request for more info</button>
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#update-information-modal">Update Info</button>
        <?php } ?>
        <?php if($job->isApproved==-1) {?>
          <button class="btn btn-warning" type="button">Waiting for the updated info</button>
        <?php } ?>
        <br>

        <?php if($job->isApproved==1) {?>
          <div class="center-page text-center">
          <h3 class="m-b-30">Detail</h3>
          <div class="row col-12">
            <div class="col-lg-4">
          <button class="btn btn-blue" onclick="location.href='?view=employeeList&jobId=<?=$job->Id?>&status=1'">
              View <?=employee()->count("jobId=$job->Id and status=1");?> employees
          </button>
        </div>
        <div class="col-lg-4">
          <button class="btn btn-warning" onclick="location.href='?view=timesheetList&jobId=<?=$job->Id?>'">
              View <?=timesheet()->count("jobId=$job->Id");?> timesheets
          </button>
        </div>
        <div class="col-lg-4">
          <button class="btn btn-success" onclick="location.href='?view=resumeList&jobId=<?=$job->Id?>&isHired=0'">
              View <?=application()->count("jobId=$job->Id and isHired=0");?> applicants
          </button>
        </div>
        </div>
        <div class="clearfix"></div>
        <br>
        <br>
        <?php } ?>
        <br><br><br><br>
      </div>

<!-- all modals will be here -->

<!-- dispute modal content -->
<div id="update-information-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            <div class="modal-body">
                <h2 class="text-uppercase text-center m-b-30">
                    <a href="index.html" class="text-success">
                        <span><img src="assets/images/logo_dark.png" alt="" height="30"></span>
                    </a>
                </h2>

                <form class="form-horizontal" action="process.php?action=updateInformation&Id=<?=$Id;?>" method="post">
                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Job Position <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="position" value="<?=$job->position;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Company <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="company" value="<?=$job->company;?>" required="">
                  </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                    <div class="form-group">
                      <label>Employment Type <span style="color:red;">*</span></label>
                      <select class="form-control" name="positionTypeId" required="">
                        <option value="<?=$job->positionTypeId;?>"><?=getPosition($job->positionTypeId);?></option>
                        <?php foreach($ptList as $row){?>
                          <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                    <div class="form-group">
                        <label for="firstname">Job Category <span style="color: red;">*</span></label>
                        <select class="form-control" name="jobFunctionId" required="">
                         <option value="<?=$job->jobFunctionId;?>"><?=getJobFunction($job->jobFunctionId);?></option>
                          <?php foreach($jfList as $row) {?>
                            <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                          <?php } ?>
                        </select>
                    </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Contact Person <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="contactName" value="<?=$job->contactName;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Representative Position <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="jobTitle" value="<?=$job->jobTitle;?>" required="">
                  </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Representative Email <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="workEmail" value="<?=$job->workEmail;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Business Phone <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="businessPhone" value="<?=$job->businessPhone;?>" required="">
                  </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                    <div class="form-group">
                        <label for="username">Employee Location <span style="color: red;">*</span></label>
                        <select class="form-control" name="empLocation" required="">
                          <option value="<?=$job->empLocation;?>"><?=$job->empLocation;?></option>
                          <option value="Onsite Staff">Onsite Staff</option>
                          <option value="Remote Staff">Remote Staff</option>
                        </select>
                    </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">ABN </label>
                      <input type="text" class="form-control" name="abn" value="<?=$job->abn;?>">
                  </div>
                  </div>

                  <div class="form-group">
                      <label for="username">Company Address <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="address" value="<?=$job->address;?>" required="">
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
