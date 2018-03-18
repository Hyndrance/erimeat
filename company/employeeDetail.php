<?php
$username = $_GET['username'];
$resume = resume()->get("username='$username'");
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
          <h4>Timesheet</h4>
          <button onclick="location.href='?view=timesheetList&employee=<?=$resume->username;?>'">
            View timesheet
          </button>
      </div>
  </div>
</div>
