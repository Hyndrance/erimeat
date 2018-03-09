<?php
$timesheetId = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$dtr = dtr()->all();

function get_time_difference($record)
{
    $workTime = (strtotime("1/1/1980 $record->checkOut") - strtotime("1/1/1980 $record->checkIn")) / 3600;
    $firstBreak = (strtotime("1/1/1980 $record->breakIn") - strtotime("1/1/1980 $record->breakOut")) / 3600;
    $secondBreak = (strtotime("1/1/1980 $record->breakIn2") - strtotime("1/1/1980 $record->breakOut2")) / 3600;
    $lunch = (strtotime("1/1/1980 $record->lunchIn") - strtotime("1/1/1980 $record->lunchOut")) / 3600;

    $totalTime = $workTime - ($firstBreak + $secondBreak + $lunch);

    return number_format((float)$totalTime, 2, '.', '');
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
                     <?php foreach($dtr as $row) {
                       if ($row->timesheetId==$timesheetId){
                       ?>
                          <tr>
                            <td> <?=$row->createDate;?></td>
                            <td> <?=$row->checkIn;?></td>
                            <td> <?=$row->breakOut;?> - <?=$row->breakIn;?></td>
                            <td> <?=$row->breakOut2;?> - <?=$row->breakIn2;?></td>
                            <td> <?=$row->lunchOut;?> - <?=$row->lunchIn;?></td>
                            <td> <?=$row->checkOut;?></td>
                            <td> <?=get_time_difference($row)?></td>
                         </tr>
                  <?php } } ?>

                                        </tbody>
                                    </table>
                              </div>
                            </div>
