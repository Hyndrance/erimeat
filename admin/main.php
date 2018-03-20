<?php

function __setFullName($owner){
  $resume = resume()->get("username='$owner'");
  return $resume->firstName . " " . $resume->lastName;
}

?>
<center><h1>Welcome to Admin home page</h1></center>

<div class="row">

  <!-- Total clients -->
    <div class="col-lg-3 col-md-6">
      <div class="card-box widget-box-two widget-two-custom">
       <i class="mdi mdi-clipboard-text widget-two-icon"></i>
          <div class="wigdet-two-content">
          <h2 class="font-600">
            <span data-plugin="counterup"><?=company()->count();?></span></h2>
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
              <span data-plugin="counterup"><?=job()->count("isApproved=1");?></span></h2>
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
                <span data-plugin="counterup"><?=employee()->count();?></span></h2>
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
                <span data-plugin="counterup"><?=resume()->count("isApproved=0");?></span></h2>
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
            <h4 class="m-t-0 header-title"><b>Recent Talent Requests</b></h4>
            <div class="table-responsive">
                <table class="table table-hover m-0 table-actions-bar">
                    <thead>
                    <tr>
                        <th>Job</th>
                        <th>Required Experience</th>
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
                            <td colspan="3"><a href="?view=jobList&isApproved=0">View all</a>
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
