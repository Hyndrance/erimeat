<?php
$Id = $_GET['Id'];
$job = job()->get("Id=$Id");
?>
<div class="row">
  <div class="col-md-7">
      <div class="text-center card-box">
          <div class="clearfix"></div>
          <div class="member-card">

              <?php
              foreach ($job as $key => $value) {
                echo $key . ": " . $value . "<br>";
              }
              ?>
              <br>
          </div>
      </div>
  </div> <!-- end col -->

  <div class="col-md-5">
      <div class="text-center card-box">

        <!--  This button only shows if job is approved -->

        <?php if($job->isApproved==1) {?>
          <h4>Detail</h4>
          <button onclick="location.href='?view=employeeList&jobId=<?=$job->Id?>&status=1'">
              View <?=employee()->count("jobId=$job->Id and status=1");?> employees
          </button> <br>
          <button onclick="location.href='?view=timesheetList&jobId=<?=$job->Id?>'">
              View <?=timesheet()->count("jobId=$job->Id");?> timesheets
          </button> <br>
          <button onclick="location.href='?view=resumeList&jobId=<?=$job->Id?>&isApproved=0'">
              View <?=resume()->count("jobId=$job->Id and isApproved=0");?> applicants
          </button>
        <?php } ?>
      </div>
  </div>
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
