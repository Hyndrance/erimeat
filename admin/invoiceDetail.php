<?php
$timesheetId = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';

$invoice = invoice()->get("timesheetId='$timesheetId'");
$application = application()->get("username='$invoice->owner'");
$timesheet = timesheet()->get("Id='$timesheetId'");

$dtrList = dtr()->list("timesheetId='$timesheet->Id' and owner='$invoice->owner'");
$job = job()->get("Id='$timesheet->jobId'");

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

<!-- Start content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="clearfix">
                        <div class="pull-left">
                            <img src="assets/images/logo_dark.png" alt="" height="30">
                        </div>
                        <div class="pull-right">
                            <h3 class="m-0 hidden-print">Invoice</h3>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-6">
                        </div><!-- end col -->
                        <div class="col-sm-3 col-sm-offset-3 col-xs-4 col-xs-offset-2">
                            <div class="m-t-30 pull-right">
                                <p><small><strong>Invoice #: </strong></small><?=$invoice->refNum;?></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row m-t-30">
                        <div class="col-xs-6">
                            <h5>Employee Detail</h5>
                            <address class="line-h-24">
                                <?=$application->refNum;?><br>
                                <?=$application->firstName;?> <?=$application->lastName;?><br>
                                <?=$application->abn;?><br>
                            </address>
                        </div>

                        <div class="col-xs-6">
                            <h5>Client Detail</h5>
                            <address class="line-h-24">
                                <?=$job->position;?><br>
                                <?=$job->company;?><br>
                                <?=$job->abn;?><br>
                            </address>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table m-t-30">
                                    <thead>
                                    <tr><th>Date</th>
                                        <th>Login</th>
                                        <th>First Break</th>
                                        <th>Second Break</th>
                                        <th>Lunch</th>
                                        <th>Logout</th>
                                        <th class="text-right">Total</th>
                                    </tr></thead>
                                    <tbody>
                                    <?php foreach($dtrList as $row) { ?>
                                    <tr>
                                        <td><?=$row->createDate;?></td>
                                        <td><?=$row->checkIn;?></td>
                                        <td><?=$row->breakOut;?> - <?=$row->breakIn;?></td>
                                        <td><?=$row->breakOut2;?> - <?=$row->breakIn2;?></td>
                                        <td><?=$row->lunchOut;?> - <?=$row->lunchIn;?></td>
                                        <td><?=$row->checkOut;?></td>
                                        <td class="text-right"><?=get_time_difference($row)?></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->
