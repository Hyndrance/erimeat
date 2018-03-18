<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$c = (isset($_GET['c']) && $_GET['c'] != '') ? $_GET['c'] : '';
$jobList = job()->list("position like '%$s%' and jobFunctionId=$c");

$jobFunctionList = job_function()->list("isDeleted=0");

function getPositionName($Id){
  $job = position_type()->get("Id='$Id'");
  echo $job->option;
}
?>

<div style="position: relative;">
  <img style="position: absolute; top:0; right:0; height: 300px;" src="../include/assets/images/homepage-bg-1.png">
<div class="container-fluid">
  <div class="container-80 center-page">
  <div class="col-md-10 center-page p-b-30">
    <h2 class="m-b-30 m-t-20 text-center">Search Jobs</h2>
    <form class="form-inline" method="GET">
    <div class="form-group">
      <input type="hidden" name="view" value="searchJob">
      <input type="text" name="s" class="form-control" placeholder="Job Title, Skills or Keywords" style="height: 67px;width:450px;">
      <select name="c" class="form-control" style="height: 67px; width:200px;" required>
        <option value="">Select Category</option>
        <?php foreach($jobFunctionList as $row){ ?>
          <option value="<?=$row->Id;?>"><?=$row->option;?></option>
        <?php } ?>
      </select>
          <button type="submit" class="btn waves-effect waves-light btn-primary">Search</button>

    </div>
  </form>
  </div>
</div>
  <div class="clearfix"></div>

  <!-- Display contact and email buttons -->
  <div align="center" class="m-t-30">
    <div>
      <button class="btn-primary btn-candidate-contact">
        <i class="fa fa-phone fa-3x"></i><br>
        <span class="text-center font-13">Call +61 452 364 793</span>
      </button>

      <button class="btn-primary btn-candidate-contact" onclick="location.href='../home/?view=inquiryForm'">
        <i class="fa fa-envelope-o fa-3x"></i><br>
        <span class="text-center font-13">Send an Email</span>
      </button>
    </div>
  </div>
  <!-- Start Filter Panel and Results-->

    <!-- TODO: Filters -->
    <!-- <h4>Filters: </h4>
    <div class="form-inline m-b-30" style="padding: 0; margin: 0; width: 100%;">
    <select class="form-control" style="height: 50px; width:199px; border-right: none; ">
        <option>Select City</option>
    </select>
    <select class="form-control" style="height: 50px;width:199px; border-right: none; border-radius: 0px; margin-left: -6px;">
        <option>Select City</option>
    </select>
    <select class="form-control" style="height: 50px;width:199px; border-right: none; border-radius: 0px; margin-left: -5px;">
        <option>Select City</option>
    </select>
    <select class="form-control" style="height: 50px;width:199px; border-right: none; border-radius: 0px; margin-left: -5px;">
        <option>Select City</option>
    </select>
    <select class="form-control" style="height: 50px;width:199px; border-radius: 0px; margin-left: -3px;">
        <option>Select City</option>
    </select>
    <select class="form-control" style="height: 50px;width:199px; border-left:none; margin-left: -5px;">
        <option>Select City</option>
    </select>
    </div> -->
    <!-- TODO: Filters -->
    <!-- <h4>Sort by: </h4> -->
    <!-- <div class="form-inline m-b-30" style=""> -->
    <!-- <select class="form-control" style="height: 50px; width:199px;">
        <option>Select City</option>
    </select> -->
    <!-- </div> -->

<?php foreach($jobList as $row) {
  if ($row->isApproved==1){
?>
  <div class="form-container container m-t-30 m-b-30">
    <div class="row center-page job-list-row">
        <div class="col-lg-4 job-list-summary">

            <a href="?view=jobDetail&id=<?=$row->Id;?>" class="job-list-title"><?=$row->position;?></a>
            <br>
            <span class="m-b-5"><?=$row->address;?></span>
            <br>
            <span class="m-b-5"><?=getPositionName($row->positionTypeId);?></span>
            <br>
            <span class="job-list-date"><?=$row->createDate;?></span>
            <br>
        </div>

        <div class="col-lg-8 job-list-desc m-b-10">
          <?=$row->comment;?>
          <br>
          <span>
            <a style="font-weight: 600;" class="job-list-link" href="?view=jobDetail&id=<?=$row->Id;?>">Read More &gt;</a>
          </span>
        </div>
        <?php } ?>
    </div>
    <br>

  </div> <!-- End List Container -->
<?php }?>
</div>
<br>
</div>
