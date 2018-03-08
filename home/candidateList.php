<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$resumeList = resume()->all();

function getJobFunction($Id){
  $jf = job_function()->get("Id='$Id'");
  echo $job->option;
}
?>

<div class="container-fluid">
  <div class="container center-page">
  <div class="col-md-10 center-page p-b-30">
    <h2 class="m-b-30 m-t-20 text-center">Candidate Search</h2>
    <h3 class="text-center m-t-30 m-b-30">Find candidates for your open role or assignment.</h3>
    <div class="clearfix"></div>
    <div class="row">
      <form class="form-inline center-page">
        <div class="form-group center-page">
        <input type="text" id="" name="" class="form-control" placeholder="Job Title, Skills or Keywords" style="height: 67px;width:450px; margin-left: 5px;" >
        <select class="form-control" style="height: 67px;width:250px;">
            <option>Select City</option>
        </select>
        <button type="button" class="btn waves-effect waves-light btn-success"><i class="fa fa-search "></i> Find Candidates</button>
        </div>
   </form>
    </div>
    <div class="row m-b-30 m-t-30">
      <div class="text-center">
        <span>Click on a related keyword to enhance your results.</span>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <h3>Refine Results</h3>
    <div style="width: 100%; height: 100%;">
      <div style="padding: 8px;background-color: #eee; border-top: 4px solid #3399cc;" class="m-b-10">
        <button class="accordion">Section 1</button>
        <div class="accordion-panel">
          <select class="form-control center-page" style="height: 45px; border-radius: 0px;">
              <option>Select City</option>
          </select>
        </div>
      </div>

      <div style="padding: 8px; background-color: #eee; border-top: 4px solid #3399cc;" class="m-b-10">
        <button class="accordion">Lorem Ipsum</button>
        <div class="accordion-panel">
        <div class="checkbox">
          <input id="checkbox0" type="checkbox">
          <label for="checkbox0" style="line-height: 15px;">
              Default
          </label>
          </div>

          <div class="checkbox">
            <input id="checkbox2" type="checkbox">
            <label for="checkbox2" style="line-height: 15px;">
                Default
            </label>
          </div>

          <div class="checkbox">
            <input id="checkbox3" type="checkbox">
            <label for="checkbox3" style="line-height: 15px;">
                Default
            </label>
          </div>
        </div>
      </div>

      <div style="padding: 8px; background-color: #eee; border-top: 4px solid #3399cc;">
          <button class="accordion">Section 1</button>
          <div class="accordion-panel">
            <select class="form-control center-page" style="height: 45px; border-radius: 0px;">
                <option>Select City</option>
            </select>
          </div>
      </div>
    </div>
  </div>

  <div class="col-md-9 clearfix">
    <div align="center" class="m-t-30">
      <button class="accordion pull-right" style="width: 15%;">Contact Us</button>
      <div class="accordion-panel">
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
    <div class="clearfix"></div>
    <div class="row m-t-10">
      <div style="width: 100%; padding: 10px; padding-left: 25px;">
        <h4>Search Results: 1 - 10 of 100</h4>
        <!-- Start Job List -->
        <div class="row">
          <div class="col-md-10">
          <span style="font-size: 25px; font-weight: bold;" class="text-primary">
            <u>Job position</u>
          </span>
          </div>
          <div class="col-md-2" style="text-align: right;"><a href="#" class="text-primary font-13">+ Add to Short List</a></div>
        </div>
        </br>
        <!-- Reference -->
        <span>Reference: 123123123</span>
        <div class="clearfix"></div>
        <!-- Location -->
        <div class="col-md-4">
          <i class="fa fa-map-marker"></i> Location
        </div>
        <!-- College -->
        <div class="col-md-4">
          <i class="fa fa-graduation-cap"></i> College
        </div>
        <!-- Experience -->
        <div class="col-md-4 m-b-10">
          <i class="fa fa-certificate"></i> Experience
        </div>

        <span >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
           labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat.</span>
      </div>
    </div>
    <hr> <!-- End Job List -->

    <!-- Start Candidate List -->
    <div class="row">
        <div class="col-md-12">
          <?php foreach($resumeList as $row) {?>
          <div class="">
            <div class="col-md-10">
              <h4 class="header-title mt-0 m-b-20"><?=getJobFunction($row->jobFunctionId); ?></h4>
            </div>
            <div class="col-md-2">
              <button type="button" class="" onclick="location.href='../home/?view=candidateDetail&Id=<?=$row->Id;?>'">View</button>
            </div>
            <div class="clearfix"></div>
            <div class="">
                <div class="">
                    <h5 class="text-custom m-b-5"><?=$row->firstName;?>&nbsp;<?=$row->lastName;?></h5>
                    <p class="m-b-0"><i class="mdi mdi-map-marker m-r-5"></i><?=$row->address1;?></p>
                    <p class="m-b-0"><i class="mdi mdi-map-marker m-r-5"></i><?=$row->address2;?></p>
                    <p class="m-b-0"><i class="mdi mdi-google-maps m-r-5"></i><?=$row->city;?>&nbsp;<?=$row->state;?>&nbsp;<?=$row->zipCode;?></p>

                    <hr>
                </div>
              </div>
          </div>
        <?php } ?>
        </div>
      </div> <!-- End Candidate List -->
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
