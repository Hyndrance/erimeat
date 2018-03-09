<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$jobList = job()->filter("position like '%$s%'");

function getPositionName($Id){
  $job = position_type()->get("Id='$Id'");
  echo $job->option;
}

function getJobFunction($Id){
    $job = job_function()->get("Id='$Id'");
  echo $job->option;
}

?>
<div align="center" class="m-t-30">
  <div>
    <button class="btn-primary btn-candidate-contact">
      <i class="fa fa-phone fa-3x"></i><br>
      <span class="text-center font-13">Call +61452 364 793</span>
    </button>

    <button class="btn-primary btn-candidate-contact" onclick="location.href='../home/?view=inquiryForm'">
      <i class="fa fa-envelope-o fa-3x"></i><br>
      <span class="text-center font-13">Send an Email</span>
    </button>
  </div>
</div>
  <!-- Start Filter Panel and Results-->
  <div class="form-container container m-t-30">
    <?php foreach($jobList as $row) {
      if ($row->isApproved==1){
    ?>
    <div class="row center-page job-list-row">
        <div class="col-lg-4 job-list-summary">
            <a href="?view=jobDetail&id=<?=$row->Id;?>" class="job-list-title"><?=$row->position;?></a>
            <br>
            <span class="m-b-5"><?=getJobFunction($row->jobFunctionId);?></span>
            <br>
            <span class="m-b-5"><?=$row->refNum;?></span>
            <br>
            <span class="m-b-5"><?=$row->address;?></span>
            <br>
            <span class="m-b-5"><?=$row->zipCode;?></span>
            <br>
            <span class="m-b-5"><?=getPositionName($row->positionTypeId);?></span>
            <br>
            <span class="job-list-date">Posted <?=$row->createDate;?></span>
            <br>
        </div>

        <div class="col-lg-8 job-list-desc">
          <?=$row->comment;?>
          <br>
          <span>
            <a class="job-list-link" href="?view=jobDetail&id=<?=$row->Id;?>">Read More &gt;</a>
          </span>
        </div>
    </div>
<br>
<?php  } } ?>

  </div> <!-- End List Container -->
</div>
