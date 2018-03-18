<?php
$timesheetId = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$dtrList = dtr()->list("timesheetId='$timesheetId'");

// Get timesheet record
$ts = timesheet()->get("Id='$timesheetId'");
$dispute = timesheet_dispute()->get("timesheetId='$timesheetId'");

function get_time_difference($record)
{
    $workTime = (strtotime("1/1/1980 $record->checkOut") - strtotime("1/1/1980 $record->checkIn")) / 3600;
    $firstBreak = (strtotime("1/1/1980 $record->breakIn") - strtotime("1/1/1980 $record->breakOut")) / 3600;
    $secondBreak = (strtotime("1/1/1980 $record->breakIn2") - strtotime("1/1/1980 $record->breakOut2")) / 3600;
    $lunch = (strtotime("1/1/1980 $record->lunchIn") - strtotime("1/1/1980 $record->lunchOut")) / 3600;

    $totalTime = $workTime - ($firstBreak + $secondBreak + $lunch);

    return number_format((float)$totalTime, 2, '.', '');
}

// Get time difference of break and lunch
function time_rendered($timeIn, $timeOut){
  $result = (strtotime("1/1/1980 $timeIn") - strtotime("1/1/1980 $timeOut")) / 3600;
  return number_format((float)$result, 2, '.', '');
}
?>
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="page-title"><?=$ts->name;?> by <?=$ts->employee;?></h4><br>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Login</th>
                            <th>First Break</th>
                            <th>Second Break</th>
                            <th>Lunch</th>
                            <th>Logout</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php foreach($dtrList as $row) {
                       if ($row->timesheetId==$timesheetId){
                       ?>
                          <tr>
                            <td> <?=$row->createDate;?></td>
                            <td> <?=$row->checkIn;?></td>
                            <td> <?=$row->breakOut;?> - <?=$row->breakIn;?><br>
                              <?php if ($row->breakIn) {?>
                                Duration: <b><?=time_rendered($row->breakIn, $row->breakOut);?></b>
                              <?php } ?>
                            </td>
                            <td> <?=$row->breakOut2;?> - <?=$row->breakIn2;?><br>
                              <?php if ($row->breakIn2) {?>
                                Duration: <b><?=time_rendered($row->breakIn2, $row->breakOut2);?></b>
                              <?php } ?>
                            </td>
                            <td> <?=$row->lunchOut;?> - <?=$row->lunchIn;?><br>
                              <?php if ($row->lunchIn) {?>
                                Duration: <b><?=time_rendered($row->lunchIn, $row->lunchOut);?></b>
                              <?php } ?>
                            </td>
                            <td> <?=$row->checkOut;?></td>
                            <td> <?=get_time_difference($row)?></td>
                         </tr>
                  <?php } } ?>

                            </tbody>
                        </table>
                        <?php if($ts->status=="0"){?>
                        <button class="btn btn-primary stepy-finish" onclick="location.href='process.php?action=verifyTimesheet&Id=<?=$timesheetId;?>'">Verify</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#dispute-modal">Despute</button>
                      <?php } ?>

                      <?php if($ts->status=="2"){?>
                      <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#dispute-message-modal">View Dispute message</button>
                    <?php } ?>
                          </div>
                      </div>

                      <!-- dispute modal content -->
                      <div id="dispute-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                                  <div class="modal-body">
                                      <h2 class="text-uppercase text-center m-b-30">
                                          <a href="index.html" class="text-success">
                                              <span><img src="assets/images/logo_dark.png" alt="" height="30"></span>
                                          </a>
                                      </h2>

                                      <form class="form-horizontal" action="process.php?action=timesheetDispute&Id=<?=$timesheetId;?>" method="post">
                                        <div class="form-group">
                                            <label>Reason to despute</label>
                                            <div>
                                                <textarea required="" name="reason" class="form-control"></textarea>
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


                      <!-- dispute modal content -->
                      <div id="dispute-message-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                                  <div class="modal-body">
                                      <h2 class="text-uppercase text-center m-b-30">
                                          <a href="index.html" class="text-success">
                                              <span><img src="assets/images/logo_dark.png" alt="" height="30"></span>
                                          </a>
                                      </h2>

                                      <form class="form-horizontal" action="" method="post">
                                        <div class="form-group">
                                            <label>Reason of dispute</label>
                                            <div>
                                                <textarea required="" name="reason" class="form-control" disabled>
                                                    <?=$dispute->reason;?>
                                                </textarea>
                                            </div>
                                        </div>

                                      </form>

                                  </div>
                              </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
