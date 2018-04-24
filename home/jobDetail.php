<?php
$Id = $_GET['id'];
$job = job()->get("Id='$Id'");

$jobFunctionList = job_function()->list("isDeleted=0 order by `option` asc");

function getPositionName($Id){
  $job = position_type()->get("Id='$Id'");
  echo $job->option;
}

function getJobFunction($Id){
  $jf = job_function()->get("Id='$Id'");
  echo $jf->option;
}

function getApplicantCount($Id){
  $applicantList = application()->count("jobId='$Id' and isApproved='0'");
  return $applicantList;
}

function formatDate($val){
  $date = date_create($val);
  return date_format($date, "F d, Y");
}
?>

<div class="container-fluid m-t-10">
  <div class="row center-page container">
    <div class="row m-l-5">
      <a href="#" onclick="window.history.go(-1); return false;">< Return</a>
    </div>
  <!-- Start Job Detail -->
  <div class="col-md-9">
    <h1><?=$job->position;?></h1>
    <div class="row col-lg-12">
      <div class="col-md-6"></div>
      <div class="col-md-2 text-center">
        <h2 data-plugin="counterup"><?=$job->jobOpening;?></h2>
        <p>Openings</p>
      </div>
      <div class="col-md-2 text-center">
        <h2 data-plugin="counterup"><?=getApplicantCount($Id);?></h2>
        <p>Applicants</p>
      </div>
      <div class="col-md-2 text-center">
        <h2 data-plugin="counterup"><?=$job->viewCounter;?></h2>
        <p>Views</p>
      </div>
    </div>
    <button onclick="location.href='../home/?view=application&id=<?=$job->Id;?>'" class="btn btn-primary" style="width: 200px; padding: 15px 15px 15px  15px!important;">APPLY NOW</button>
    <hr>
    <!-- Job Information -->
    <div class="row clearfix">
      <p class="col-lg-3 col-6 col-md-4 text-bold m-b-20">Salary</p>
      <p class="col-lg-9 col-md-8 col-6"><?=$job->rate;?></p>
    </div>
    <div class="row clearfix">
      <p class="col-lg-3 col-6 col-md-4 text-bold m-b-20">Location:</p>
      <p class="col-lg-9 col-md-8 col-6"><?=$job->address;?> PC <?=$job->zipCode;?></p>
    </div>
    <div class="row clearfix">
      <p class="col-lg-3 col-6 col-md-4 text-bold m-b-20">Employment Type:</p>
      <p class="col-lg-9 col-md-8 col-6"><?=getPositionName($job->positionTypeId);?></p>
    </div>
    <div class="row clearfix">
      <p class="col-lg-3 col-6 col-md-4 text-bold m-b-20">Date Posted:</p>
      <p class="col-lg-9 col-md-8 col-6"><?=formatDate($job->createDate);?></p>
    </div>
    <div class="row clearfix">
      <p class="col-lg-3 col-6 col-md-4 text-bold m-b-20">Job Reference:</p>
      <p class="col-lg-9 col-md-8 col-6"><?=$job->refNum;?></p>
    </div>
    <div class="row clearfix">
      <p class="col-lg-3 col-6 col-md-4 text-bold m-b-20">Job Category:</p>
      <p class="col-lg-9 col-md-8 col-6"><?=getJobFunction($job->jobFunctionId);?></p>
    </div>
    <div class="row clearfix">
      <p class="col-lg-3 col-6 col-md-4 text-bold m-b-20">Required Experience:</p>
      <p class="col-lg-9 col-md-8 col-6"><?=$job->requiredExperience;?></p>
    </div>
    <div class="row clearfix">
      <p class="col-lg-3 col-6 col-md-4 text-bold m-b-20">Key Skills:</p>
      <p class="col-lg-9 col-md-8 col-6"><?=$job->keySkills;?></p>
    </div>
    <hr>
    <h2>Description</h2>
    <p>
      <?=$job->comment;?>
    </p>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="col-md-2 text-center">
      <h2 data-plugin="counterup"><?=$job->jobOpening;?></h2>
      <p>Openings</p>
    </div>
    <div class="col-md-2 text-center">
      <h2 data-plugin="counterup"><?=getApplicantCount($Id);?></h2>
      <p>Applicants</p>
    </div>
    <div class="col-md-2 text-center m-b-30">
      <h2 data-plugin="counterup"><?=$job->viewCounter;?></h2>
      <p>Views</p>
    </div>
    <div class="clearfix"></div>
    <button onclick="location.href='../home/?view=application&id=<?=$job->Id;?>'" class="btn btn-primary" style="width: 200px; padding: 15px 15px 15px  15px!important;">APPLY NOW</button>
    <hr>

    <div class="m-b-30">
    <h3><?=$job->address;?></h3>
    PC <?=$job->zipCode;?>
  </div>
  </div> <!-- End Job Detail -->


  <div class="col-md-3 job-detail-search-container" style="height:850px;">
    <h3>Search Jobs</h3>
    <hr style="border-top: 1px solid #c2c2c2;">
    <div>
      <form method="GET" accept-charset="UTF-8">
        <input type="hidden" name="view" value="searchJob">
          <input class="job-detail-search-form m-b-20" size="60" maxlength="128" type="text" name="s" placeholder="Job Title, Skills or Keywords">
          <select name="c" class="form-control m-b-20" style="height: 67px; width:250px;" required>
            <option value="">Select Category</option>
            <?php foreach($jobFunctionList as $row){ ?>
              <option value="<?=$row->Id;?>"><?=$row->option;?></option>
            <?php } ?>
          </select>
          <button type="submit" class="btn btn-primary" style="width: 100%; padding-left: 25%;">SEARCH JOBS</button>
      </form>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
</div>

<!-- Add view counter -->
<?php
$vc = job();
$vc->obj["viewCounter"] = $job->viewCounter + 1;
$vc->update("Id='$Id'");
?>
