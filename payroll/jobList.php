<?php
$isApproved = $_GET['isApproved'];
$abn = $_GET['abn'];

$jobList = job()->list("abn='$abn' and isApproved='$isApproved'");
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
                <th>Employees</th>
                <th>Timesheets</th>
                <th>Applicants</th>
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
                  <td><button class="btn btn-sm btn-primary" onclick="location.href='?view=employeeList&jobId=<?=$row->Id?>&status=1'">
                      View <?=employee()->count("jobId=$row->Id and status=1");?> employees
                  </button></td>
                  <td><button class="btn btn-sm btn-warning" onclick="location.href='?view=timesheetList&jobId=<?=$row->Id?>'">
                      View <?=timesheet()->count("jobId=$row->Id");?> timesheets
                  </button></td>
                  <td><button class="btn btn-sm btn-success" onclick="location.href='?view=resumeList&jobId=<?=$row->Id?>&isApproved=0'">
                      View <?=resume()->count("jobId=$row->Id and isApproved=0");?> applicants
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
