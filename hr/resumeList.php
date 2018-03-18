<?php
$jobId = $_GET['jobId'];
$isApproved = $_GET['isApproved'];

$resumeList = resume()->list("isApproved='$isApproved' and jobId=$jobId");
$job = job()->get("Id=$jobId");
?>
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
          <h4 class="page-title">Resumes for <?=$job->position;?></h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($resumeList as $row) {
            ?>
            <tr>
              <td><a href="?view=resumeDetail&Id=<?=$row->Id;?>"><?=$row->firstName;?> <?=$row->lastName;?></a></td>
            </tr>
              <?php
                }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
