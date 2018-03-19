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
?>

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
      <button class="btn-primary btn-candidate-contact" onclick="myFunction()">
        <i class="fa fa-phone fa-3x"></i><br>
        <span class="text-center font-13">Call +61452 364 793</span>
      </button>

      <button class="btn-primary btn-candidate-contact" onclick="location.href='../home/?view=inquiryForm'">
        <i class="fa fa-envelope-o fa-3x"></i><br>
        <span class="text-center font-13">Send an Email</span>
      </button>
    </div>
  </div>
  <br>
  <div class="clearfix"></div>

<?php foreach($resumeList as $row) {?>
  <div class="form-container container m-t-30 m-b-30">
  <h4>Search Results: 1 - 10 of 100</h4>
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
        <i class="fa fa-globe"></i> <?=$row->city;?>&nbsp;<?=$row->state;?>&nbsp;<?=$row->zipCode;?>
      </div>

      <span ><?=$row->coverLetter;?></span>
    </div>
    <hr>
  </div>
   <!-- End Job List -->

    <!-- Start Pages -->
    <ul class="pull-left pagination pagination-split">
      <li class="disabled">
          <a href="#"><i class="fa fa-angle-left"></i></a>
      </li>
      <li class="active">
          <a href="#">1</a>
      </li>
      <li>
          <a href="#">2</a>
      </li>
      <li>
          <a href="#">3</a>
      </li>
      <li>
          <a href="#">4</a>
      </li>
      <li>
          <a href="#">5</a>
      </li>
      <li>
          <a href="#"><i class="fa fa-angle-right"></i></a>
      </li>
    </ul>
</div>
<?php } ?>
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
