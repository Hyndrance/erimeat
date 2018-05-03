<?php
$Id = $_GET['Id'];
$job = job()->get("Id=$Id");

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
    <h2 class="text-black"><?=$job->position;?></h2>
        <p><label class="m-r-5">Required Experience: </label><span class="text-black"><?=$job->requiredExperience;?></span></p>
        <p><label class="m-r-5">Company: </label><span class="text-black"><?=$job->company;?></span></p>
        <p><label class="m-r-5">Address: </label><span class="text-black"><?=$job->address;?></span></p>
        <div class="row">
          <div class="col-lg-6">
            <p><label class="m-r-5">Postal Code: </label><span class="text-black"><?=$job->zipCode;?></span></p>
          </div>
          <div class="col-lg-6">
            <p><label class="m-r-5">Rate: </label><span class="text-black"><?=$job->rate;?></span></p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <p><label class="m-r-5">Job Category: </label><span class="text-black"><?=getJobFunction($job->jobFunctionId);?></span></p>
          </div>
          <div class="col-lg-6">
            <p><label class="m-r-5">Employment Type: </label><span class="text-black"><?=getPosition($job->positionTypeId);?></span></p>
          </div>
        </div>
        <p><label class="m-r-5">Employment Location: </label><span class="text-black"><?=$job->empLocation;?></span></p>
        <div class="row m-t-20">
          <div class="col-lg-6">
            <label class="m-r-5">Contact Person: </label><span class="text-black"><?=$job->contactName;?></span>
            <br>
            <span class="text-black"><?=$job->jobTitle;?></span>
          </div>
          <div class="col-lg-6">
            <i class="fa fa-envelope m-r-5"></i><span class="text-black"><?=$job->workEmail;?></span>
            <br>
            <i class="fa fa-phone m-r-5"></i><span class="text-black"><?=$job->businessPhone;?></span>
          </div>
        </div>
    <div class="clearfix"><br></div>
    <div class="row">
      <div class="col-lg-6">
        <label class="m-r-5">ABN: </label><span class="text-black"><?=$job->abn;?></span>
      </div>
      <div class="col-lg-6">
        <label class="m-r-5">Reference Number: </label><span class="text-black"><?=$job->refNum;?></span>
      </div>
    </div><br>
    <p><label class="m-r-5">Job Openings: </label><span class="text-black"><?=$job->jobOpening;?></span></p>
    <p><label class="m-r-5">Key Skills: </label><span class="text-black"><?=$job->keySkills;?></span></p>
    <div class="row m-t-20">
      <div class="col-lg-6">
        <p><label class="m-r-5">Created at: </label><span class="text-black"><?=formatDate($job->createDate);?></span></p>
      </div>
      <div class="col-lg-6">
        <p><label class="m-r-5">End Date: </label><span class="text-black"><?=formatDate($job->endDate);?></span></p>
      </div>
    </div>
    <div>
      <?php if($job->endDate < date("Y-m-d")) { ?>
        <label>Job Status</label>: <span class=" btn btn-success btn-xs tooltips">Open</span>
      <?php }else{ ?>
        <label>Job Status</label>: <span class=" btn btn-danger btn-xs tooltips">Closed</span>
      <?php } ?>
    </div>
    <div class="clearfix"></div>
    <hr>
    <h3>Comment</h3>
    <span class="text-black"><?=$job->comment;?></span>
    <hr>
        <!--  This button only shows if job is approved -->

        <?php if($job->isApproved==1) {?>
          <div class="center-page text-center">
          <h3 class="m-b-30">Detail</h3>
          <div class="row col-12">
        <div class="col-lg-12">
          <button class="btn btn-warning" onclick="location.href='?view=timesheetList&jobId=<?=$job->Id?>'">
              View <?=timesheet()->count("jobId=$job->Id");?> timesheets
          </button>
        </div>
        </div>
        <div class="clearfix"></div>
        <br>
        <br>
        <?php } ?>
        <br><br><br><br>

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
                  <div class="form-group">
                      <label></label>
                      <div>
                          <textarea required="" name="comment" class="form-control"><?=$job->comment;?></textarea>
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
