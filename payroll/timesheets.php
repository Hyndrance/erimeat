<?php
$jobId = $_GET['jobId'];
$emp = employee()->get("jobId='$jobId'");

$timesheets = timesheet()->list("employee='$emp->username'");
?>
<div class="col-sm-12">
  <div class="card-box table-responsive">
    <h4 class="page-title">Timekeeping of <?=$emp->username;?></h4><br>
    <table id="datatable" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Timesheet</th>
          <th>Status</th>
          <th width="10%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($timesheets as $row) {
          if ($row->status == 0 || $row->status == 1)
          {
        ?>
        <tr>
        <td><?=$row->name;?> </td>
          <td>
            <?php if ($row->status==3){?>
              <div
                class=" btn btn-success btn-xs tooltips">
                Approved
              </div>
            <?php } else if ($row->status==2){?>
              <div
                class=" btn btn-danger btn-xs tooltips">
                Disputed
              </div>
            <?php } else if ($row->status==1){?>
              <div
                class=" btn btn-primary btn-xs tooltips">
                Verified
              </div>
            <?php } else { ?>
              <div
                class=" btn btn-warning btn-xs tooltips">
                <i>Waiting to be verified</i>
              </div>
            <?php }
           ?>

          </td>
          <td>
            <a href="?view=timesheetDetail&Id=<?=$row->Id;?>"
              class=" btn btn-success btn-xs tooltips"
              title="Click To Edit">
              <span class="fa fa-eye"></span>
              View
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
