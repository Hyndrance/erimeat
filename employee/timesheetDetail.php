<?php
$timesheetId = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$user = $_SESSION['employee_session'];
$dtrList = dtr()->filter("owner='$user'");

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
                            <td><?=$row->breakOut;?> - <?=$row->breakIn;?> <br>
                              <?php if ($row->breakIn) {?>
                                Duration: <b><?=time_rendered($row->breakIn, $row->breakOut);?></b>
                              <?php } ?>
                            </td>
                            <td><?=$row->breakOut2;?> - <?=$row->breakIn2;?> <br>
                              <?php if ($row->breakIn2) {?>
                                Duration: <b><?=time_rendered($row->breakIn2, $row->breakOut2);?></b>
                              <?php } ?>
                            </td>
                            <td><?=$row->lunchOut;?> - <?=$row->lunchIn;?> <br>
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
                                </div>
                            </div>
