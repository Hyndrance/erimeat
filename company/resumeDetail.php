<?php
$Id = $_GET['Id'];
$resume = resume()->get("Id=$Id");
?>
<div class="row">
  <div class="col-md-7">
      <div class="text-center card-box">
          <div class="clearfix"></div>
          <div class="member-card">

              <?php
              if($resume){
                foreach ($resume as $key => $value) {
                  echo $key . ": " . $value . "<br>";
                }
              }
              ?>
          </div>
      </div>
  </div> <!-- end col -->

  <div class="col-md-5">
      <div class="text-center card-box">
          <h4>Detail</h4>
          <?php if($resume->isApproved==0){?>
            <button data-toggle="modal" data-target="#schedule-modal">
              Schedule an Interview
            </button>
            <button onclick="location.href='process.php?action=denyResume&Id=<?=$resume->Id;?>'">
              Deny
            </button>
        <?php } ?>
        <?php if($resume->isApproved==1){?>
          <button onclick="location.href='process.php?action=hireApplicant&result=approve&Id=<?=$resume->Id;?>'">
            Hire
          </button>
          <button onclick="location.href='process.php?action=hireApplicant&result=reject&Id=<?=$resume->Id;?>'">
            Reject
          </button>
      <?php } ?>
      </div>
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

                <form class="form-horizontal" action="process.php?action=setInterViewDate" method="post">

                      <input type="hidden" name="resumeId" value="<?=$resume->Id;?>">
                      <input type="hidden" name="email" value="<?=$resume->email;?>">
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
