<?php
$jobFunctionList = job_function()->list("isDeleted=0");
$cityList = city_option()->list();

function getPositionName($Id){
  $job = position_type()->get("Id='$Id'");
  echo $job->option;
}
?>

<div>
  <div style="position:inherit;">

    <div>
      <img src="../include/assets/images/worldMap.png"  style="width: 100%;">
    </div>

        <div>
        <div class="main-text hidden-xs">
                <div class="col-md-12 text-center">
                    <p class="carousel-title m-t-10 center-page" style="font-size: 40px; width: 100%; color: #fff; text-shadow: 2px 2px 2px #000000;">
                      Ask us how to go virtual and hire the most qualified
                      Supply Chain Professional for your business in unpredicted ways
                    </p>
                    <div class="row m-b-20" style="margin-top: 100px;">
                      <button id="myBtn1" class="btn" style="width:382px;">NEED TO HIRE?</button>
                      <button id="myBtn2" class="btn" style="width:382px;">LOOKING FOR A JOB?</button>
                    </div>

                <div class="">
                <div id="myDIV">
                  <form class="form-inline" method="GET">
                    <div class="form-group" style="margin-top:1px;">
                    <input type="hidden" name="view" value="searchResume">
                    <select name="c" class="form-control" style="height: 67px; width:250px;" required>
                        <option>Select City</option>
                        <?php foreach(country_option()->list() as $country){ ?>
                        <optgroup label="<?=$country->country;?>">
                            <?php foreach(city_option()->list("countryId=$country->Id") as $city){ ?>
                                <option value="<?=$city->Id;?>"><?=$city->city;?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <select name="j" class="form-control" style="height: 67px; width:200px;" required>
                      <option value="">Select Category</option>
                      <?php foreach($jobFunctionList as $row){ ?>
                        <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                      <?php } ?>
                    </select>
                    <button type="submit" class="btn btn-blue pull-right m-l-5 waves-effect waves-light"><i class="fa fa-search m-r-5"></i> Find Candidates</button>
                    </div>
                  </form>
                </div>


           <div id="demo1"></div>
           <div id="demo"></div>
            <div id="myP" style="visibility:hidden;">
              <form class="form-inline" method="GET">
              <div class="form-group">
                <input type="hidden" name="view" value="searchJob">
                <input type="text" name="s" class="form-control" placeholder="Job Title, Skills or Keywords" style="height: 67px;width:305px;">
                <select name="c" class="form-control" style="height: 67px; width:200px;" required>
                  <option value="">Select Category</option>
                  <?php foreach($jobFunctionList as $row){ ?>
                    <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                  <?php } ?>
                </select>
                    <button type="submit" class="btn waves-effect waves-light btn-blue"><i class="fa fa-search m-r-5"></i>Search Job</button>

              </div>
            </form>
                    </div></div>
                </div>
                <div class="clearfix"></div>
            </div>
    </div>
  </div>
  <div>
<div style="position: relative;">
  <img style="position: absolute; top:0; right:0;" src="../include/assets/images/homepage-bg-1.png">
<div class="container">

<div class="container-fluid m-t-30 m-b-30">
  <div class="container-80 text-center center-page">
    <h2>
      Our Supply Chain Services
    </h2>
    <div class="center-page" style="height: 2px; width: 20%; background-color: #3a3a3a;"></div>
    <br>
  </div>
<div class="row">
  <div class="col-lg-1"></div>
  <div class="col-lg-2">
    <a href="../home?view=servicesDetail&code=dem">
      <div class="icons icons-container text-center">
      <img src="../include/assets/images/demandPlanning.png">
        <p class="text-white"><b>Demand Planning</b></p>
      </div>
    </a>
  </div>
  <div class="col-lg-2">
    <a href="../home?view=servicesDetail&code=sup">
      <div class="icons icons-container text-center">
      <img src="../include/assets/images/supplyPlanning.png">
        <p class="text-white"><b>Supply Planning</b></p>
      </div>
    </a>
  </div>
  <div class="col-lg-2">
    <a href="../home?view=servicesDetail&code=ord">
      <div class="icons icons-container text-center">
        <img src="../include/assets/images/orderFulfilment.png">
        <p class="text-white"><b>Order Fulfillment</b></p>
      </div>
    </a>
  </div>
  <div class="col-lg-2">
    <a href="../home?view=servicesDetail&code=log">
      <div class="icons icons-container text-center">
        <img src="../include/assets/images/logistics.png">
        <p class="text-white"><b>Logistics</b></p>
      </div>
    </a>
  </div>
  <div class="col-lg-2">
    <a href="../home?view=servicesDetail&code=man">
      <div class="icons icons-container text-center">
        <img src="../include/assets/images/manufacturing.png">
        <p class="text-white"><b>Manufacturing</b></p>
      </div>
    </a>
  </div>
  <div class="col-lg-1"></div>
</div>

<div class="row m-t-20">
  <div class="col-lg-1"></div>
  <div class="col-lg-2">
    <a href="../home?view=servicesDetail&code=tran">
      <div class="icons icons-container text-center">
        <img src="../include/assets/images/transportation.png">
        <p class="text-white"><b>Transportation</b></p>
      </div>
    </a>
  </div>
  <div class="col-lg-2">
    <a href="../home?view=servicesDetail&code=pro">
      <div class="icons icons-container text-center">
        <img src="../include/assets/images/procurement.png">
        <p class="text-white"><b>Procurement</b></p>
      </div>
    </a>
  </div>
  <div class="col-lg-2">
    <a href="../home?view=servicesDetail&code=tra">
      <div class="icons icons-container text-center">
        <img src="../include/assets/images/certificate.png">
        <p class="text-white"><b>Training Certification</b></p>
      </div>
    </a>
  </div>
  <div class="col-lg-2">
    <a href="../home?view=servicesDetail&code=war">
      <div class="icons icons-container text-center">
        <img src="../include/assets/images/warehousing.png">
        <p class="text-white"><b>Warehousing</b></p>
      </div>
    </a>
  </div>
  <div class="col-lg-2">
    <a href="#">
      <div class="icons icons-container text-center">
        <img src="../include/assets/images/others.png">
        <p class="text-white"><b>Others</b></p>
      </div>
    </a>
  </div>
  <div class="col-lg-1"></div>
</div>

</div> <!-- container -->
</div>
    <!-- Basic Form Wizard -->
<div style="position: relative;">
  <hr>
  <img style="position: absolute; top:0; left:0;" src="../include/assets/images/homepage-bg-2.png">
  <br>
    <div class="container-80 center-page">


                                    <ul class="nav nav-tabs navtab-bg nav-justified">
                                        <li class="active" style="background-color:#f2f2f2; border-radius: 5px; color: #fff;">
                                            <a href="#home1" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-home"></i></span>
                                                <h3 class="hidden-xs">Four Simple Steps to Hire</h3>
                                            </a>
                                        </li>
                                        <li class="" style="background-color: #f2f2f2; border-radius:5px;">
                                            <a href="#profile1" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-user"></i></span>
                                                <h3 class="hidden-xs">How We Help You Find a Job</h3>
                                            </a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="home1">
                                            <form id="wizard-clickable">
                                        <fieldset title="1">
                                            <legend>Tell us about your hiring needs</legend>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="../include/assets/images/services-img1.jpg" style="width: 30%;height:30%;" class="img-circle img-thumbnail">
                                                </div>
                                                <div class="col-md-8">
                                                    <h4><strong>Step 1: Tell us about your hiring needs</strong></h4>
                                                    <p>
                                                        Submit your job opening online in just minutes, or simply call us. Either way, our recruiting specialists will evaluate the skills, experience and corporate culture fit you require. We are 100% committed to finding employees who are the best fit for your company. Need someone today, or even weeks from now? No problem, we have you covered.
                                                    </p>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset title="2">
                                            <legend>Your staffing options</legend>

                                       <div class="row">
                                                <div class="col-md-4">
                                                    <img src="../include/assets/images/services-img2.jpg" style="width: 30%;height:30%;" class="img-circle img-thumbnail">
                                                </div>
                                                <div class="col-md-8">
                                                    <h4><strong>Step 2: Your staffing options</strong></h4>
                                                    <p>
                                                      Teamire is known for providing a selection of highly skilled professionals, and our staffing professionals can provide you with temporary, temporary-to-full-time, project and full-time staffing solutions. We even have our own full-time specialized employees, who you can hire on an interim or recurring basis. Wondering how to make the most of your hiring budget? There is no cost until you hire, so let’s talk.
                                                    </p>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset title="3">
                                            <legend>Review and select candidates</legend>

                                        <div class="row">
                                                <div class="col-md-4">
                                                    <img src="../include/assets/images/services-img3.jpg" style="width: 30%;height:30%;" class="img-circle img-thumbnail">
                                                </div>
                                                <div class="col-md-8">
                                                    <h4><strong>Step 3: Review and select candidates</strong></h4>
                                                    <p>
                                                      Finding candidates who are just the right fit for your role is our top priority. We will provide you with your choice of well-matched candidates, and our recommendations will be tailored to the nuances of your role and business. Then, once you select the best candidate, we’ll coordinate all aspects of the recruiting process, working hard to ensure a smooth start for you and your new employee.
                                                    </p>
                                                </div>
                                            </div>
                                        </fieldset>
                                                 <fieldset title="4">
                                            <legend>Service and your happiness</legend>

                                          <div class="row">
                                                <div class="col-md-4">
                                                    <img src="../include/assets/images/about-us-img6.jpg" style="width: 30%;height:30%;" class="img-circle img-thumbnail">
                                                </div>
                                                <div class="col-md-8">
                                                    <h4><strong>Step 4: Service and your happiness</strong></h4>
                                                    <p>
                                                      Ensuring you are happy with your hiring experience is what defines Robert Half. We are committed to the highest level of customer service, and we back it up with a satisfaction guarantee. Our communication, expert advice and recruiting support is provided on your terms, not just during the hiring process but beyond, creating a lasting relationship with you.
                                                    </p>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <center>
                                            <a href="../home/?view=hiringForm"  class="btn btn-primary">REQUEST TALENT</a>
                                        </center>
                                           <button style="display: none;" type="submit" class="btn btn-blue btn-sm stepy-finish">Submit</button>
                                    </form>

                                        </div>
                                        <div class="tab-pane active" id="profile1">
                                          <form id="default-wizard">
                                        <fieldset title="1">
                                               <legend>Search for jobs and apply</legend>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="../include/assets/images/services-img1.jpg" style="width: 30%;height:30%;" class="img-circle img-thumbnail">
                                                </div>
                                                <div class="col-md-8">
                                                    <h4><strong>Step 1: Search for jobs and apply</strong></h4>
                                                    <p>
                                                       Quickly and easily search our open positions to find one that fits your skills and experience. We have jobs with top local companies in your area.
                                                    </p>
                                                </div>
                                            </div>


                                        </fieldset>

                                        <fieldset title="2">
                                            <legend>Upload your resume</legend>

                                       <div class="row">
                                                <div class="col-md-4">
                                                    <img src="../include/assets/images/services-img2.jpg" style="width: 30%;height:30%;" class="img-circle img-thumbnail">
                                                </div>
                                                <div class="col-md-8">
                                                    <h4><strong>Step 2: Upload your resume</strong></h4>
                                                    <p>
                                                    Our online form makes it easy to send us your resume or upload the details of your LinkedIn profile. We’ll then contact you if your qualifications meet the requirements of an open position or match what our clients typically look for.
                                                    </p>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset title="3">
                                            <legend>Getting to know you</legend>

                                        <div class="row">
                                                <div class="col-md-4">
                                                    <img src="../include/assets/images/services-img3.jpg" style="width: 30%;height:30%;" class="img-circle img-thumbnail">
                                                </div>
                                                <div class="col-md-8">
                                                    <h4><strong>Step 3: Getting to know you</strong></h4>
                                                    <p>
                                                     You are more than just a resume or an application. That is why we work so hard to understand your career goals, so that we can help you find a job that is just the right fit for you.
                                                    </p>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset title="4">
                                            <legend>While we find the right fit</legend>
                                               <div class="row">
                                                <div class="col-md-4">
                                                    <img src="../include/assets/images/about-us-img6.jpg" style="width: 30%;height:30%;" class="img-circle img-thumbnail">
                                                </div>
                                                <div class="col-md-8">
                                                    <h4><strong>Step 4: While we find the right fit</strong></h4>
                                                    <p>
                                                     In addition to helping find your next career move, we are also here to help you with refining your resume, prepping you for interviews, and sharing local salary and hiring trends.
                                                    </p>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <button style="display: none;" type="submit" class="btn btn-blue btn-sm stepy-finish">Submit</button>
                                    </form>
                                      <center>
                                            <a href="../home/?view=submitResume"  class="btn btn-blue m-t-30">SUBMIT RESUME</a>
                                        </center>
                                        </div>


                                    </div>


                      </div>
                        <!-- End row -->
</div>
  <!-- Start Location Panels-->
  <div style="position: relative;">
    <hr>
    <img style="position: absolute; top:0; right:0;" src="../include/assets/images/homepage-bg-3.png">
      <div class="container center-page">
        <h2 class="text-center">Business Partners</h2>
        <div class="center-page" style="height: 2px; width: 20%; background-color: #3a3a3a;"></div>
        <div class="row m-t-30">
          <div class="col-lg-1"></div>

          <div class="col-md-6 col-lg-2">
            <h3 class="text-center text-blue">SYDNEY HQ</h3>
            <div class="annex-img">
              <img src="../include/assets/images/home-img4.png" class="annex-img-layer_bottom">
            </div>
          </div>

          <div class="col-md-6 col-lg-2">
            <h3 class="text-center text-blue">MANILA</h3>
            <div class="annex-img">
            	<img src="../include/assets/images/home-img1.png" class="annex-img-layer_bottom">
            </div>
          </div>

            <div class="col-md-6 col-lg-2">
              <h3 class="text-center text-blue">DELHI</h3>
              <div class="annex-img">
              	<img src="../include/assets/images/home-img2.png" class="annex-img-layer_bottom">
              </div>
            </div>

            <div class="col-md-6 col-lg-2">
              <h3 class="text-center text-blue">BANGALORE</h3>
              <div class="annex-img">
              	<img src="../include/assets/images/home-img3.png" class="annex-img-layer_bottom">
              </div>
            </div>

            <div class="col-md-6 col-lg-2">
              <h3 class="text-center text-blue">PROVIDENCE</h3>
              <div class="annex-img">
                <img src="../include/assets/images/home-img5.png" class="annex-img-layer_bottom">
              </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
      </div>
      <div class="clearfix m-b-30"></div>
        <!-- end row -->
  <!-- End Location Panels-->
  </div>
  <br>
</div>
</div>
<script>
var x = document.getElementById("myBtn1");
var y = document.getElementById("myBtn2");

x.addEventListener("click", myFirstFunction);
y.addEventListener("click", mySecondFunction);



function myFirstFunction() {
     var x = document.getElementById("myDIV").innerHTML;
    document.getElementById("demo1").innerHTML = x;

}

function mySecondFunction() {
       var x = document.getElementById("myP").innerHTML;
    document.getElementById("demo").innerHTML = x;

}


</script>
