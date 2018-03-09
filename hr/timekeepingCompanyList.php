<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$job = job()->all();
?>
<div class="row">
    <div class="col-xs-12">
        <div class="page-title-box">
            <h4 class="page-title">Select a job to view timekeeping</h4>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="col-sm-12">
  <div class="card-box table-responsive">
    <h4 class="m-t-0 header-title"><b>List of Companies</b></h4>
    <table id="datatable" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Company Name</th>
          <th width="10%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($job as $row) {
          if ($row->isApproved==1){
        ?>
        <tr>
          <td><?=$row->company;?> </td>
          <td>
            <a href="?view=timekeepingCompanyDetail&Id=<?=$row->Id;?>"
              class=" btn btn-success btn-xs tooltips"
              title="Click To Edit">
              <span class="fa fa-eye"></span>
              View Employees
            </a>
          </td>
        </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
