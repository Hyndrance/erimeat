<?php
$owner = (isset($_GET['owner']) && $_GET['owner'] != '') ? $_GET['owner'] : '';

$invoice = invoice()->get("owner='$owner'");
$resume = resume()->get("username='$owner'");
$timesheet = timesheet()->get("employee='$owner' and status='3'");
$job = job()->get("Id='$timesheet->jobId'");

$dtrList = dtr()->list("timesheetId='$timesheet->Id' and owner='$owner'");

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

Invoice Reference #: <?=$invoice->refNum;?>
<br><br>
Employee Reference #: <?=$resume->refNum;?>
<br><br>
Employee Name: <?=$resume->firstName;?> <?=$resume->lastName;?>
<br><br>
Employee ABN: <?=$resume->abn;?>
<br><br>
Company ABN: <?=$job->abn;?>
<br><br>
Job Classification: <?=$job->position;?>
<br><br>
Approved Timesheet:<br>
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
  <?php } ?>

            </tbody>
