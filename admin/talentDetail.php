<?php
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$Id = $_GET['Id'];
$job = job()->get("Id='$Id'");
?>


<div class="row">
    <div class="col-md-12">
      <br>
      <?php if($message){?>
      <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert"
                  aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <?=$message;?>
      </div>
    <?php }?>
        <!-- Personal-Information -->
        <div class="card-box">
            <h4 class="header-title mt-0 m-b-20">Job Detail</h4>
            <button type="button" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i> Update Request</button>

            <div class="panel-body">
                <div class="text-left">
                    <p class="text-muted font-13"><strong>Job Reference # :</strong>
                      <span class="m-l-15"><?=$job->refNum;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Job Position :</strong>
                      <span class="m-l-15"><?=$job->position;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Company Name :</strong>
                      <span class="m-l-15"><?=$job->company;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Company ABN :</strong>
                      <span class="m-l-15"><?=$job->abn;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Work Email :</strong>
                      <span class="m-l-15"><?=$job->workEmail;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Job Title :</strong>
                      <span class="m-l-15"><?=$job->jobTitle;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Contact Person :</strong>
                      <span class="m-l-15"><?=$job->contactName;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Business Phone :</strong>
                      <span class="m-l-15"><?=$job->businessPhone;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Address :</strong>
                      <span class="m-l-15"><?=$job->address;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Required Experience :</strong>
                      <span class="m-l-15"><?=$job->requiredExperience;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Status :</strong>
                        <?php if($job ->isApproved==0){ ?>
                        <span class=" btn btn-success btn-xs tooltips">
                          Pending
                        </span>
                        <?php }else{ ?>
                        <span class=" btn btn-warning btn-xs tooltips">
                          Waiting for Info
                        </span>
                        <?php } ?>
                    </p>
                    <p class="text-muted font-13"><strong>Hiring Needs :</strong>
                      <span class="m-l-15"><?=$job->comment;?></span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Personal-Information -->
        <div class="card-box">
          <button class="btn btn-default stepy-finish" onclick="location.href='process.php?action=jobRequest&result=approve&Id=<?=$job->Id;?>'">Approve</button>
          <button class="btn btn-default stepy-finish" onclick="location.href='process.php?action=jobRequest&result=deny&Id=<?=$job->Id;?>'">Request for More Info</button>
        </div>
    </div>
  </div>

  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myModalLabel">Update Request</h4>
        </div>
        <div class="modal-body">
          <form id="default-wizard" action="process.php?action=updateRequest" method="POST">
            <p class="m-b-0">
              <?=$error?>
            </p>
            <div class="row m-t-20">
              <input type="hidden" name="Id" value="<?=$job->Id;?>">
              <div class="col-sm-12">
                <div class="form-group">
                    <label>Hiring Needs</label>
                    <textarea  class="form-control" name="comment"
                                        data-parsley-trigger="keyup" data-parsley-minlength="20"
                                        data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                        data-parsley-validation-threshold="10"><?=$job->comment;?></textarea>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary stepy-finish">Update</button>
            </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
