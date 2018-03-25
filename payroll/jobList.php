<?php
$isApproved = $_GET['isApproved'];
$abn = $_GET['abn'];

$jobList = job()->list("abn='$abn' and isApproved='$isApproved' and isDeleted=0");
$company = company()->get("abn='$abn'");

?>
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
          <h4 class="page-title"><?=$company->name;?></h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Jobs</th>
              <!-- Display this column only for approved jobs -->
              <?php if ($isApproved==1) {?>
                <th>Timesheets</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach($jobList as $row) {
            ?>
            <tr>
              <td><a href="?view=jobDetail&Id=<?=$row->Id;?>"><?=$row->position;?></a></td>
              <!-- Display this column only for approved jobs -->
              <?php if ($isApproved==1) {?>
                  <td><button class="btn btn-sm btn-warning" onclick="location.href='?view=timesheetList&jobId=<?=$row->Id?>'">
                      View <?=timesheet()->count("jobId=$row->Id");?> timesheets
                  </button></td>
              <?php } ?>
              <?php
                }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
