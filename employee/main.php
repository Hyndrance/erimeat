<?php

$username = $_SESSION['employee_session'];
$dateNow = date("Y-m-d");
$app = dtr()->get("owner='$username' and createDate='$dateNow'");

// Get to total hours rendered
function total_time_rendered($record)
{
    $workTime = (strtotime($record->checkOut) - strtotime($record->checkIn)) / 3600;
    $firstBreak = (strtotime($record->breakIn) - strtotime($record->breakOut)) / 3600;
    $secondBreak = (strtotime($record->breakIn2) - strtotime($record->breakOut2)) / 3600;
    $lunch = (strtotime($record->lunchIn) - strtotime($record->lunchOut)) / 3600;

    $totalTime = $workTime - ($firstBreak + $secondBreak + $lunch);
    return number_format((float)$totalTime, 2, '.', '');
}

// Get time difference of break and lunch
function time_rendered($timeIn, $timeOut){
  $result = (strtotime($timeIn) - strtotime($timeOut)) / 3600;
  return number_format((float)$result, 2, '.', '');
}


if ($app){

$login = 0;
$break = 1;
$break2 = 2;
$lunch = 3;
$logout = 4;

?>

<div class="card-box">
    <div class="row">
      <div class="col-sm-12">
        <center>
          <?php if ($app->status==$break) { ?>
                  <div class="alert alert-icon alert-warning alert-dismissible fade in" role="alert">
                      You are currently on first break
                              <!-- <h1><div id="breakTimer"></div></h1>
                              <h1 style="color:red;"><div id="breakTimerAlert"></div></h1> -->
                  </div>
            <?php } else if ($app->status==$break2) { ?>
                  <div class="alert alert-icon alert-warning alert-dismissible fade in" role="alert">
                      You are currently on second break
                              <!-- <h1><div id="breakTimer"></div></h1>
                              <h1 style="color:red;"><div id="breakTimerAlert"></div></h1> -->
                  </div>
            <?php } else if ($app->status==$lunch) { ?>
                  <div class="alert alert-icon alert-warning alert-dismissible fade in" role="alert">
                      You are currently on Lunch
                              <!-- <h1><div id="breakTimer"></div></h1>
                              <h1 style="color:red;"><div id="breakTimerAlert"></div></h1> -->
                  </div>
            <?php } else if ($app->status==$logout) { ?>
                  <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
                      You have already logged out!
                  </div>
            <?php } else { ?>
                  <div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
                      You are logged in!
                  </div>
            <?php } ?>
        <br>
        <?php if ($app->status == $break || $app->status == $break2 || $app->status == $lunch) {?>
              <a href="process.php?action=stampCheckIn" class="btn btn-primary"><span class="fa fa-clock-o"></span>Login</a>
        <?php } else { ?>
              <button  class="btn btn-default"  disabled><span class="fa fa-clock-o"></span>Login</button>
        <?php } ?>
          |
        <?php if ((!$app->breakOut || !$app->breakOut2) && $app->status == $login) {?>
            <?php if (!$app->breakOut) {?>
              <a href="process.php?action=stampBreak" class="btn btn-warning"><span class="fa fa-clock-o"></span>Break</a>
            <?php } else { ?>
              <a href="process.php?action=stampBreak2" class="btn btn-warning"><span class="fa fa-clock-o"></span>Break</a>
            <?php } ?>
        <?php } else { ?>
              <button  class="btn btn-default"  disabled><span class="fa fa-clock-o"></span>Break</button>
        <?php } ?>
          |
        <?php if (!$app->lunchOut && $app->status == $login) {?>
              <a href="process.php?action=stampLunch" class="btn btn-warning"><span class="fa fa-clock-o"></span>Lunch</a>
        <?php } else { ?>
              <button  class="btn btn-default"  disabled><span class="fa fa-clock-o"></span>Lunch</button>
        <?php } ?>
          |
        <?php if (!$app->checkOut && $app->status == $login) {?>
              <a href="process.php?action=stampCheckOut" class="btn btn-danger"><span class="fa fa-clock-o"></span>Logout</a>
        <?php } else { ?>
              <button  class="btn btn-default"  disabled><span class="fa fa-clock-o"></span>Logout</button>
        <?php } ?>

</center>
<br>
<br>
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
                        <th>Total Hrs</th>
                      </tr>
                    </thead>
              <tbody>
              <tr>
                <td><?=$app->createDate;?></td>
                <td><?=$app->checkIn;?></td>
                <td><?=$app->breakOut;?> - <?=$app->breakIn;?> <br>
                  <?php if ($app->breakIn) {?>
                    Duration: <b><?=time_rendered($app->breakIn, $app->breakOut);?></b>
                  <?php } ?>
                </td>
                <td><?=$app->breakOut2;?> - <?=$app->breakIn2;?> <br>
                  <?php if ($app->breakIn2) {?>
                    Duration: <b><?=time_rendered($app->breakIn2, $app->breakOut2);?></b>
                  <?php } ?>
                </td>
                <td><?=$app->lunchOut;?> - <?=$app->lunchIn;?> <br>
                  <?php if ($app->lunchIn) {?>
                    Duration: <b><?=time_rendered($app->lunchIn, $app->lunchOut);?></b>
                  <?php } ?>
                </td>
                <td><?=$app->checkOut;?></td>
                <td><b><?php
                if ($app->status==4){
                echo total_time_rendered($app);
              }
                ?></b></td>
              </tr>

              </tbody>
          </table>
      </div>
  </div>

    </div>  <!-- end row -->
</div>


<!-- Start of time script -->
<?php
$currentTime = "00:00:00";
$condition = "h>0";
if ($app->status==$break){
  $currentTime = $app->breakOut;
  $condition = "s<5";
}
if ($app->status==$break2){
  $currentTime = $app->breakOut2;
  $condition = "s<5";
}
if ($app->status==$lunch){
  $currentTime = $app->lunchOut;
  $condition = "s<10";
}
$splitTimeStamp = explode(":", $currentTime);
$hour = $splitTimeStamp[0];
$minute = $splitTimeStamp[1];
$second = $splitTimeStamp[2];
?>
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    h = hour(h);
    m = minute(m);
    s = second(s);

    // For breaks
    if (<?=$condition;?>){
      document.getElementById('breakTimer').innerHTML = h + ":" + m + ":" + s;
      document.getElementById('breakTimerAlert').innerHTML = "";
    }
    else{
      document.getElementById('breakTimer').innerHTML = "";
      document.getElementById('breakTimerAlert').innerHTML = h + ":" + m + ":" + s;
    }
    timer();

}
function hour(h){
  return Math.abs(h - <?=$hour;?>);
}
function minute(m){
  return Math.abs(m - <?=$minute;?>);
}
function second(s){
  return Math.abs(s - <?=$second;?>);
}
function timer(){
  setTimeout(startTime, 500);
}
timer();
</script>

<!-- End of time script -->

<?php } else {?>

  <div class="card-box">
      <div class="row">
        <div class="col-sm-12">
          <center>
            <div class="alert alert-icon alert-warning alert-dismissible fade in" role="alert">
                You have not logged in yet.
            </div>
                <a href="process.php?action=newCheckIn" class="btn btn-primary"></span>Click here to log in</a>
          </center>
        </div>
      </div>
    </div>

<?php } ?>
