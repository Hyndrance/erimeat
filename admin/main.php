<?php
$email = (isset($_GET['email']) && $_GET['email'] != '') ? $_GET['email'] : '';
$isApproved = (isset($_GET['isApproved']) && $_GET['isApproved'] != '') ? 'isApproved=\''.$_GET['isApproved'].'\' and ' : '';
$workEmail = (isset($_GET['email']) && $_GET['email'] != '') ?  'workEmail=\''.$_GET['email'].'\' and '  : '';

$jobList = job()->list("$workEmail $isApproved Id>0 and isDeleted=0");
$company = company()->get("email='$email' and Id>0");
$title = $email ?  $company->name  : 'Job Lists';

function __setFullName($owner){
  $application = application()->get("username='$owner'");
  return $application->firstName . " " . $application->lastName;
}

function getJobFunction($Id){
  $jf = job_function()->get("Id='$Id'");
  echo $jf->option;
}

?>
<center><h1>Welcome to Admin Home Page</h1></center>

<div class="row">

  <!-- Total clients -->
    <div class="col-lg-3 col-md-6">
      <div class="card-box widget-box-two widget-two-custom">
       <i class="mdi mdi-clipboard-text widget-two-icon"></i>
          <div class="wigdet-two-content">
          <h2 class="font-600">
            <span data-plugin="counterup"><?=company()->count("isDeleted=0");?></span></h2>
              <p class="m-0">Total Clients</p>
          </div>
      </div>
    </div>
    <!-- Total jobs -->
    <div class="col-lg-3 col-md-6">
      <div class="card-box widget-box-two widget-two-custom">
       <i class="mdi mdi-account-network widget-two-icon"></i>
          <div class="wigdet-two-content">
              <h2 class="font-600">
              <span data-plugin="counterup"><?=job()->count("isApproved=1 and isDeleted=0");?></span></h2>
              <p class="m-0">Total Jobs</p>
          </div>
      </div>
    </div>
    <!-- Total employees -->
    <div class="col-lg-3 col-md-6">
      <div class="card-box widget-box-two widget-two-custom">
       <i class="mdi mdi-account widget-two-icon"></i>
          <div class="wigdet-two-content">
              <h2 class="font-600">
                <span data-plugin="counterup"><?=employee()->count("status=1");?></span></h2>
              <p class="m-0">Total Employees</p>
          </div>
      </div>
    </div>
    <!-- Total applicants -->
    <div class="col-lg-3 col-md-6">
      <div class="card-box widget-box-two widget-two-custom">
       <i class="mdi mdi-account widget-two-icon"></i>
          <div class="wigdet-two-content">
              <h2 class="font-600">
                <span data-plugin="counterup"><?=application()->count("isApproved=0");?></span></h2>
              <p class="m-0">Total Applicants</p>
          </div>
      </div>
    </div>
</div>

<hr>

<div class="row">

<!-- Left lists -->
    <div class="col-lg-6">
        <div class="card-box">
            <h4 class="m-t-0 header-title text-blue"><b>Recent Talent Requests</b></h4>
            <div class="table-responsive">
                <table class="table table-hover m-0 table-actions-bar">
                    <thead>
                    <tr>
                        <th>Job</th>
                        <th>Address</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach(job()->list("isApproved=0 order by createDate desc limit 5") as $row){?>
                        <tr>
                            <td width="150">
                                <h5 class="m-b-0 m-t-0 font-600"><?=$row->position;?></h5>
                                <p class="m-b-0"><small><?=$row->company;?></small></p>
                            </td>
                            <td>
                                <?=$row->address;?>
                            </td>
                            <td>
                                <a href="?view=jobDetail&Id=<?=$row->Id?>" class="table-action-btn">view</a>
                            </td>
                        </tr>
                      <?php } ?>
                        <tr>
                            <td colspan="3"><a href="?view=jobList&isApproved=0"><button class="btn-sm btn-blue">View all</button></a>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Right lists -->
<div class="col-lg-6">
    <div class="card-box">
        <h4 class="m-t-0 header-title text-blue"><b>Recent Invoices</b></h4>
        <div class="table-responsive">
            <table class="table table-hover m-0 table-actions-bar">
                <thead>
                <tr>
                    <th>Ref. Number</th>
                    <th>Employee</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach(invoice()->list("Id>0 order by Id desc limit 5") as $row){?>
                    <tr>
                        <td width="150">
                          <?=$row->refNum;?>
                        </td>
                        <td>
                            <?=__setFullName($row->owner);?>
                        </td>
                        <td>
                            <a class="table-action-btn" href="?view=invoiceDetail&Id=<?=$row->timesheetId;?>">view</a>
                        </td>
                    </tr>
                  <?php } ?>
                    <tr>
                        <td colspan="3"><a href="?view=invoiceList"><button class="btn-sm btn-blue">View all</button></a>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="card-box table-responsive">
        <h4 class="page-title"><?=$title;?></h4><br>
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Jobs</th>
            <th>Job Category</th>
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
            <td><?=getJobFunction($row->jobFunctionId);?></td>
            <!-- Display this column only for approved jobs -->
            <?php if ($isApproved==1) {?>
                <td><button class="btn btn-sm btn-primary" onclick="location.href='?view=employeeList&jobId=<?=$row->Id?>&status=1'">
                    View <?=employee()->count("jobId=$row->Id and status=1");?> employees
                </button></td>
                <td><button class="btn btn-sm btn-warning" onclick="location.href='?view=timesheetList&jobId=<?=$row->Id?>'">
                    View <?=timesheet()->count("jobId=$row->Id");?> timesheets
                </button></td>
                <td><button class="btn btn-sm btn-success" onclick="location.href='?view=resumeList&jobId=<?=$row->Id?>&isApproved=0'">
                    View <?=application()->count("jobId=$row->Id and isApproved=0");?> applicants
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


</div>
