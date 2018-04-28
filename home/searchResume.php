<?php
$j = (isset($_GET['j']) && $_GET['j'] != '') ? $_GET['j'] : '';

$cityList = city_option()->list();
$candidateList = candidate()->list("jobFunctionId=$j and isDeleted=0");
$jobFunctionList = job_function()->list("isDeleted=0 order by `option` asc");

function getJobFunction($Id){
  $jf = job_function()->get("Id='$Id'");
  echo $jf->option;
}

function getCity($Id){
  if($Id!=0){
    $city = city_option()->get("Id='$Id'");
    echo $city->city;
  }else{
    echo "N/A";
  }
}
?>

<div style="position: relative;" >
  <img style="position: absolute; top:0; right:0; height: 300px; z-index:-1;" src="../include/assets/images/homepage-bg-1.png">
<div class="container-fluid m-b-30">
  <div class="container-80 center-page">
  <div class="col-md-10 center-page p-b-30">
    <h2 class="m-b-30 m-t-20 text-center">Search Candidates</h2>
    <h3 class="text-center">Find candidates for your open role or assignment. Search by skills and let us do the rest.</h3>
    <form class="form-inline" method="GET">
    <div class="form-group">
      <input type="hidden" name="view" value="searchResume">
      <select name="j" class="form-control select-md-mobile select-sm-mobile" style="height: 67px; width:650px;" required>
        <option value="">Select Category</option>
        <?php foreach($jobFunctionList as $row){ ?>
          <option value="<?=$row->Id;?>"><?=$row->option;?></option>
        <?php } ?>
      </select>
      <button type="submit" class="btn waves-effect waves-light btn-primary btn-md-mobile btn-sm-mobile">Search</button>
    </div>
  </form>
  </div>
</div>

<div class="col-md-12 clearfix">
  <!-- Display contact and email buttons -->
  <div align="center" class="m-t-30">
    <div>
      <button class="m-r-5 btn-primary btn-candidate-contact btn-mobile" style="margin-left: 9px; line-height: 1.4em;" onclick="myFunction()">
        <i class="fa fa-phone fa-2x"></i><br>
        <span class="text-center">Call +61 452 364 793</span>
      </button>

      <button class="m-l-5 btn-primary btn-candidate-contact btn-mobile" style="line-height: 1.4em;" onclick="location.href='../home/?view=inquiryForm'">
        <i class="fa fa-envelope-o fa-2x"></i><br>
        <span class="text-center">Send an Email</span>
      </button>
    </div>
  </div>
  <br>
  <div class="clearfix"></div>

<!-- Static Date -->

<div class="container m-t-30 m-b-30">
  <?php if(!$candidateList && $j){?>
    <h3 class="text-center text-muted"><i class="mdi mdi-account-off mdi-48px"></i><br>No Candidates Found</h3>
  <?php }else{?>

  <ul style="padding-left: 0;">
    <?php foreach($candidateList as $row) {?>
    <li class="candidates">
<div class="row m-t-10">
  <div style="width: 100%; padding: 10px; padding-left: 25px;">
    <!-- Start Job List -->
    <div class="row">
      <div class="col-md-10">
      <span style="font-size: 25px; font-weight: bold;" class="text-primary">
        <a href="../home/?view=candidateDetail&Id=<?=$row->Id;?>">
          <u><?=getJobFunction($row->jobFunctionId); ?></u>
        </a>
      </span>
      </div>
    </div>
    <!-- Reference -->
    <span>Reference: <?=$row->refNum;?></span>
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

    <div class="truncate">
      <span><?=nl2br($row->coverLetter);?></span>
    </div>
  </div>
</div>
</li>
<?php } } ?>
</ul>

<!-- End of Static Data -->

</div>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
          panel.style.display = "none";
      } else {
          panel.style.display = "block";
      }
  });
}
</script>
<script>
function myFunction() {
    var txt;
    if (confirm("Open Pick an app?")) {
        OpenWith.exe;
    } else {
        txt = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = txt;
}
</script>
</div>
</div>
