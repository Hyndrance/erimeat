<?php
$user = (isset($_GET['user']) && $_GET['user'] != '') ? $_GET['user'] : '';
$timesheet = timesheet()->all();

function get_fullname($username){
  $user = user()->get("username='$username'");
  return $user->firstName . " " . $user->lastName;
}
?>

<div class="row">
    <div class="col-xs-12">
        <div class="page-title-box">
            <h4 class="page-title">Timekeeping of: <?=get_fullname($user)?></h4>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="col-sm-12">
  <div class="card-box table-responsive">
    <h4 class="m-t-0 header-title"><b>List of Timesheets</b></h4>
    <table id="datatable" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Timesheet</th>
          <th>Status</th>
          <th width="10%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($timesheet as $row) {
          if ($row->status == 0)
          {
        ?>
        <tr>
        <td><?=$row->name;?> </td>
          <td>
            <?php if ($row->status==1){?>
              <div
                class=" btn btn-success btn-xs tooltips">
                Approved
              </div>
            <?php } else if ($row->status==-1){?>
              <div
                class=" btn btn-danger btn-xs tooltips">
                Denied
              </div>
            <?php } else { ?>
              <div
                class=" btn btn-warning btn-xs tooltips">
                Pending
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
