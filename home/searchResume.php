<?php
$j = (isset($_GET['j']) && $_GET['j'] != '') ? $_GET['j'] : '';
$c = (isset($_GET['c']) && $_GET['c'] != '') ? $_GET['c'] : '';

$cityList = city_option()->list();
$resumeList = resume()->list("jobFunctionId=$j and city=$c");
$jobFunctionList = job_function()->list("isDeleted=0");

function getJobFunction($Id){
  $jf = job_function()->get("Id='$Id'");
  echo $jf->option;
}

function getCity($Id){
  $city = city_option()->get("Id='$Id'");
  echo $city->city;
}
?>

<div style="position: relative;">
  <img style="position: absolute; top:0; right:0; height: 300px;" src="../include/assets/images/homepage-bg-1.png">
<div class="container-fluid m-b-30">
  <div class="container-80 center-page">
  <div class="col-md-10 center-page p-b-30">
    <h2 class="m-b-30 m-t-20 text-center">Candidate Search</h2>
    <h3 class="text-center">Find candidates for your open role or assignment. Search by skills and location below, let us do the rest.</h3>
    <form class="form-inline" method="GET">
    <div class="form-group">
      <input type="hidden" name="view" value="searchResume">
      <select name="c" class="form-control" style="height: 67px; width:350px;">
        <option>Select City</option>
        <?php foreach($cityList as $row){ ?>
          <option value="<?=$row->Id;?>"><?=$row->city;?></option>
        <?php } ?>
      </select>
      <select name="j" class="form-control" style="height: 67px; width:300px;" required>
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

<div class="col-md-12 clearfix">
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
  <br>
  <div class="clearfix"></div>

<!-- Static Date -->

<div class="container m-t-30 m-b-30">
<div class="row m-t-10">
  <div style="width: 100%; padding: 10px; padding-left: 25px;">
    <!-- Start Job List -->
    <div class="row">
      <div class="col-md-10">
      <span style="font-size: 25px; font-weight: bold;" class="text-primary">
        <a href="../home/?view=candidateDetail&Id=<?=$row->Id;?>'">
          <u>Sample Data White Background</u>
        </a>
      </span>
      </div>
    </div>
    <!-- Reference -->
    <span>Candidate Reference #: 1234567890</span>
    <div class="clearfix"></div>
    <!-- Location -->
    <div class="col-md-4">
      <i class="fa fa-map-marker"></i> Address 1
    </div>
    <!-- College -->
    <div class="col-md-4">
      <i class="fa fa-map-o"></i> Address 2
    </div>
    <!-- Experience -->
    <div class="col-md-4 m-b-10">
      <i class="fa fa-globe"></i> 6100
    </div>

    <span >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
      text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
      make a type specimen book. It has survived not only five centuries, but also the leap into electroni</span>
  </div>
  <hr>
</div>

<!-- End of Static Data -->

<?php foreach($resumeList as $row) {?>
  <div class="form-container container m-t-30 m-b-30">
  <div class="row m-t-10">
    <div style="width: 100%; padding: 10px; padding-left: 25px;">
      <!-- Start Job List -->
      <div class="row">
        <div class="col-md-10">
        <span style="font-size: 25px; font-weight: bold;" class="text-primary">
          <a href="../home/?view=candidateDetail&Id=<?=$row->Id;?>'">
            <u><?=getJobFunction($row->jobFunctionId); ?></u>
          </a>
        </span>
        </div>
      </div>
      <!-- Reference -->
      <span>Candidate Reference #: <?=$row->refNum;?></span>
      <div class="clearfix"></div>
      <!-- Location -->
      <div class="col-md-4">
        <i class="fa fa-map-marker"></i> <?=$row->address1;?>
      </div>
      <!-- College -->
      <div class="col-md-4">
        <i class="fa fa-map-o"></i> <?=$row->address2;?>
      </div>
      <!-- Experience -->
      <div class="col-md-4 m-b-10">
        <i class="fa fa-globe"></i> <?=getCity($row->city);?>&nbsp;<?=$row->state;?>&nbsp;<?=$row->zipCode;?>
      </div>

      <span ><?=$row->coverLetter;?></span>
    </div>
    <hr>
  </div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
