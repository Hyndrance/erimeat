<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$jobList = job()->all();

function getJobFunction($Id){
  $jobFunc = job_function()->get("Id='$Id'");
  echo $jobFunc->option;
}

function getPositionType($Id){
  $position = position_type()->get("Id='$Id'");
  echo $position->option;
}

?>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Talent Request</b></h4>

            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th>Job Category</th>
                    <th>Employment Type</th>
                    <th>Job Classification</th>
                    <th>Company Name</th>
                    <th>Company ABN</th>
                    <th>Status</th>
                    <th>Review</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($jobList as $row) {
                  if ($row->isApproved!=1){
                ?>
                <tr>
                    <td><?=getJobFunction($row->jobFunctionId);?></td>
                    <td><?=getPositionType($row->positionTypeId);?></td>
                    <td><?=$row->position;?></td>
                    <td><?=$row->company;?></td>
                    <td><?=$row->abn;?></td>
                    <td>
                    <?php if($row->isApproved==0){ ?>
                    <div class=" btn btn-success btn-xs tooltips">
                      Pending
                    </div>
                    <?php }else{ ?>
                    <div class=" btn btn-warning btn-xs tooltips">
                      Waiting for Info
                    </div>
                    <?php } ?>
                    </td>
                    <td><a href="?view=jobDetail&Id=<?=$row->Id;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> Review</a>
                    </td>
                </tr>

              <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
