<?php

function __setFullName($owner){
  $resume = resume()->get("username='$owner'");
  return $resume->firstName . " " . $resume->lastName;
}

?>
<center><h1>Welcome to payroll home page</h1></center>

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
                <span data-plugin="counterup"><?=resume()->count("jobId!=0 and isApproved=0");?></span></h2>
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
            <h4 class="m-t-0 header-title"><b>Recent Timesheet</b></h4>
            <div class="table-responsive">
                <table class="table table-hover m-0 table-actions-bar">
                    <thead>
                    <tr>
                        <th>Timesheet</th>
                        <th>Employee</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach(timesheet()->list("Id>0 order by Id desc limit 5") as $row){?>
                        <tr>
                            <td width="150">
                              <?=$row->name;?>
                            </td>
                            <td>
                                <?=__setFullName($row->employee);?>
                            </td>
                            <td>
                                <a class="table-action-btn">view</a>
                            </td>
                        </tr>
                      <?php } ?>
                        <tr>
                            <td colspan="3"><a href="?view=timesheetList">View all</a>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  <!-- Right lists -->
  <div class="col-lg-6">
      <div class="card-box">
          <h4 class="m-t-0 header-title"><b>Recent Invoices</b></h4>
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
                              <a class="table-action-btn">view</a>
                          </td>
                      </tr>
                    <?php } ?>
                      <tr>
                          <td colspan="3"><a href="?view=invoiceList">View all</a>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>


</div>
