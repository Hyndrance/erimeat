<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$resume = resume()->all();

function getJobFunction($Id){
  $jobFunc = job_function()->get("Id='$Id'");
  echo $jobFunc->option;
}
?>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Candidates Resume</b></h4>

            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th>Job Function</th>
                    <th>Full Name</th>
                    <th>City, State</th>
                    <th>Status</th>
                    <th>Review</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($resume as $row) {
                ?>
                <tr>
                    <td><?=getJobFunction($row->jobFunctionId); ?></td>
                    <td><?=$row->firstName; ?> <?=$row->lastName; ?></td>
                    <td><?=$row->city; ?>, <?=$row->state; ?></td>
                    <td>
                      <?php if($row->isHired==0){ ?>
                      <div class=" btn btn-warning btn-xs tooltips">
                        Pending
                      </div>
                      <?php }else{ ?>
                      <div class=" btn btn-success btn-xs tooltips">
                        Hired
                      </div>
                      <?php } ?>
                    </td>
                    <td><a href="?view=candidateDetail&Id=<?=$row->Id;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> Review</a>
                    </td>
                </tr>

              <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
