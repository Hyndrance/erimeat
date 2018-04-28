<?php
$jobFunctionList = job_function()->list("isDeleted=0 order by `option` asc");
$cityList = city_option()->list();

function getPositionName($Id){
  $job = position_type()->get("Id='$Id'");
  echo $job->option;
}
?>


<div>
  <div>
    <div class="bgimg-1" style="height: 678px; margin-top: -147px; z-index:-1; position: relative;"></div>
    <div>
      <div class="main-text">
            <div class="text-center container">
                <p class="m-t-30 slideanim tagline">
                  It is our Business to Identify your Needs, Interests, Concerns and Expectations
                  <br>
                  We're Remote Supply Chain Data driven experts.....
                </p>

                <div class="row m-b-20 categ-margin">
                  <button id="myBtn1" class="btn btn-sm xs-btn" style="width:300px; height: 50px;">NEED TO HIRE?</button>
                  <button id="myBtn2" class="btn btn-sm xs-btn" style="width:300px; height: 50px;">LOOKING FOR A JOB?</button>
                </div>

            <div class="">
            <div id="myDIV">
              <form class="form-inline" method="GET">
                <div class="form-group">
                <input type="hidden" name="view" value="searchResume">
                <select name="j" class="form-control categ-select" required>
                  <option value="">Select Category</option>
                  <?php foreach($jobFunctionList as $row){ ?>
                    <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                  <?php } ?>
                </select>
                <button type="submit" class="btn btn-sm btn-blue pull-right m-l-5 waves-effect waves-light categ-btn" style="height: 51px;"><i class="fa fa-search m-r-5"></i> Find Candidates</button>
                </div>
              </form>
            </div>


       <div id="demo1"></div>
       <div id="demo"></div>
        <div id="myP" style="visibility:hidden;">
          <form class="form-inline" method="GET">
          <div class="form-group">
            <input type="hidden" name="view" value="searchJob">
            <input type="text" name="s" class="form-control job-search" placeholder="Job Title, Skills or Keywords">
            <select name="c" class="form-control job-categ" required>
              <option value="">Select Category</option>
              <?php foreach($jobFunctionList as $row){ ?>
                <option value="<?=$row->Id;?>"><?=$row->option;?></option>
              <?php } ?>
            </select>
                <button type="submit" class="btn btn-sm waves-effect waves-light btn-blue search-job-btn" style="height: 51px;"><i class="fa fa-search m-r-5"></i>Search Job</button>

          </div>
        </form>
                </div>
              </div>
            </div>
        </div>
</div>
  </div>
  <div>
<div>
<div class="bgimg-2" style="min-height: 678px;">
<div class="container">
<div class="container-fluid m-t-30 m-b-30" style="padding-top: 6%;">
  <div class="container-80 text-center center-page">
    <h2 class="text-blue slideanim">
      Our Supply Chain Services
    </h2>
    <div class="center-page slideanim" style="height: 2px; width: 20%; background-color: #0064c8;"></div>
    <br>
  </div>
<div class="row slideanim">
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

<div class="row m-t-20 slideanim">
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
    <a href="../home?view=otherServices">
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
</div>
<!-- Basic Form Wizard -->
<div class="bgimg-3" style="min-height: 910px; padding: 0px !important;">
  <div class="text-center text-blue" style="font-size: 25px; font-weight: 900; padding-top: 18px;">Distributed Teamire Crew</div>
   <div class="container-80 center-page" >

                                   <ul class="nav nav-tabs navtab-bg nav-justified" style="padding-top: 450px;">
                                       <li class="active" style="background-color:#f2f2f2; border-radius: 5px; color: #fff;">
                                           <a href="#home1" data-toggle="tab" aria-expanded="false">
                                               <span class="visible-xs"><i class="mdi mdi-format-list-bulleted-type"></i></span>
                                               <span class="hidden-xs text-blue">Four Simple Steps to Hire</span>
                                           </a>
                                       </li>
                                       <li class="" style="background-color: #f2f2f2; border-radius:5px;">
                                           <a href="#profile1" data-toggle="tab" aria-expanded="true">
                                               <span class="visible-xs"><i class="mdi mdi-account-search"></i></span>
                                               <span class="hidden-xs text-blue">How We Help You Find a Job</span>
                                           </a>
                                       </li>

                                   </ul>
                                   <div class="tab-content">
                                       <div class="tab-pane" id="home1">
                                           <form id="wizard-clickable" class="text-blue">
                                       <fieldset title="1">
                                           <legend>Tell us about your hiring needs</legend>
                                           <div class="row"  >
                                               <div class="col-md-4">
                                                   <img src="../include/assets/images/wizard-img1.png" style="width: 40%;height:40%;" class="img-circle img-circle-mobile  img-circle-md-mobile img-thumbnail">
                                               </div>
                                               <div class="col-md-8">
                                                   <h4 class="text-blue"><strong>Step 1: Tell us about your hiring needs</strong></h4>
                                                   <p class="wizard-content-mobile">
                                                       Submit your job opening online in just minutes, or simply call us. Either way, our recruiting specialists will evaluate the skills, experience and corporate culture fit you require. We are 100% committed to finding employees who are the best fit for your company. Need someone today, or even weeks from now? No problem, we have you covered.
                                                   </p>
                                               </div>
                                               <div class="clearfix"></div>
                                           </div>

                                       </fieldset>

                                       <fieldset title="2">
                                           <legend>Your staffing options</legend>

                                      <div class="row"  >
                                               <div class="col-md-4">
                                                   <img src="../include/assets/images/wizard-img2.png" style=" width: 40%;height:40%;" class="img-circle img-circle-mobile img-circle-md-mobile  img-thumbnail">
                                               </div>
                                               <div class="col-md-8">
                                                   <h4 class="text-blue"><strong>Step 2: Your staffing options</strong></h4>
                                                   <p class="wizard-content-mobile">
                                                     Teamire is known for providing a selection of highly skilled professionals, and our staffing professionals can provide you with temporary, temporary-to-full-time, project and full-time staffing solutions. We even have our own full-time specialized employees, who you can hire on an interim or recurring basis. Wondering how to make the most of your hiring budget? There is no cost until you hire, so let’s talk.
                                                   </p>
                                               </div>
                                           </div>
                                       </fieldset>

                                       <fieldset title="3">
                                           <legend>Review and select candidates</legend>

                                       <div class="row"  >
                                               <div class="col-md-4">
                                                   <img src="../include/assets/images/wizard-img3.png" style=" width: 40%;height:40%;" class="img-circle img-circle-mobile img-circle-md-mobile  img-thumbnail">
                                               </div>
                                               <div class="col-md-8">
                                                   <h4 class="text-blue"><strong>Step 3: Review and select candidates</strong></h4>
                                                   <p class="wizard-content-mobile">
                                                     Finding candidates who are just the right fit for your role is our top priority. We will provide you with your choice of well-matched candidates, and our recommendations will be tailored to the nuances of your role and business. Then, once you select the best candidate, we’ll coordinate all aspects of the recruiting process, working hard to ensure a smooth start for you and your new employee.
                                                   </p>
                                               </div>
                                           </div>
                                       </fieldset>
                                                <fieldset title="4">
                                           <legend>Service and your happiness</legend>

                                         <div class="row"  >
                                               <div class="col-md-4">
                                                   <img src="../include/assets/images/wizard-img4.png" style=" width: 40%;height:40%;" class="img-circle img-circle-mobile img-circle-md-mobile  img-thumbnail">
                                               </div>
                                               <div class="col-md-8">
                                                   <h4 class="text-blue"><strong>Step 4: Service and your happiness</strong></h4>
                                                   <p class="wizard-content-mobile">
                                                     Ensuring you are happy with your hiring experience is what defines Robert Half. We are committed to the highest level of customer service, and we back it up with a satisfaction guarantee. Our communication, expert advice and recruiting support is provided on your terms, not just during the hiring process but beyond, creating a lasting relationship with you.
                                                   </p>
                                               </div>
                                           </div>
                                       </fieldset>
                                       <center>
                                           <a href="../home/?view=hiringForm"  class="btn btn-primary m-t-30 m-b-30">REQUEST TALENT</a>
                                       </center>
                                          <button style="display: none;" type="submit" class="btn btn-blue btn-sm stepy-finish">Submit</button>
                                   </form>

                                       </div>
                                       <div class="tab-pane active" id="profile1">
                                         <form id="default-wizard" class="text-blue">
                                       <fieldset title="1">
                                              <legend>Search for jobs and apply</legend>
                                           <div class="row"  >
                                               <div class="col-md-4">
                                                   <img src="../include/assets/images/wizard-img5.png" style=" width: 40%;height:40%;" class="img-circle img-circle-mobile img-circle-md-mobile  img-thumbnail">
                                               </div>
                                               <div class="col-md-8">
                                                   <h4 class="text-blue"><strong>Step 1: Search for jobs and apply</strong></h4>
                                                   <p class="wizard-content-mobile">
                                                      Quickly and easily search our open positions to find one that fits your skills and experience. We have jobs with top local companies in your area.
                                                   </p>
                                               </div>
                                           </div>


                                       </fieldset>

                                       <fieldset title="2">
                                           <legend>Upload your resume</legend>

                                      <div class="row"  >
                                               <div class="col-md-4">
                                                   <img src="../include/assets/images/wizard-img6.png" style=" width: 40%;height:40%;" class="img-circle img-circle-mobile img-circle-md-mobile  img-thumbnail">
                                               </div>
                                               <div class="col-md-8">
                                                   <h4 class="text-blue"><strong>Step 2: Upload your resume</strong></h4>
                                                   <p class="wizard-content-mobile">
                                                   Our online form makes it easy to send us your resume or upload the details of your LinkedIn profile. We’ll then contact you if your qualifications meet the requirements of an open position or match what our clients typically look for.
                                                   </p>
                                               </div>
                                           </div>
                                       </fieldset>

                                       <fieldset title="3">
                                           <legend>Getting to know you</legend>

                                       <div class="row"  >
                                               <div class="col-md-4">
                                                   <img src="../include/assets/images/wizard-img7.png" style=" width: 40%;height:40%;" class="img-circle img-circle-mobile img-circle-md-mobile  img-thumbnail">
                                               </div>
                                               <div class="col-md-8">
                                                   <h4 class="text-blue"><strong>Step 3: Getting to know you</strong></h4>
                                                   <p class="wizard-content-mobile">
                                                    You are more than just a resume or an application. That is why we work so hard to understand your career goals, so that we can help you find a job that is just the right fit for you.
                                                   </p>
                                               </div>
                                           </div>
                                       </fieldset>
                                       <fieldset title="4">
                                           <legend>While we find the right fit</legend>
                                              <div class="row">
                                               <div class="col-md-4">
                                                   <img src="../include/assets/images/wizard-img8.png" style=" width: 40%;height:40%;" class="img-circle img-circle-mobile img-circle-md-mobile  img-thumbnail">
                                               </div>
                                               <div class="col-md-8">
                                                   <h4 class="text-blue"><strong>Step 4: While we find the right fit</strong></h4>
                                                   <p class="wizard-content-mobile">
                                                    In addition to helping find your next career move, we are also here to help you with refining your resume, prepping you for interviews, and sharing local salary and hiring trends.
                                                   </p>
                                               </div>
                                           </div>

                                       </fieldset>

                                       <button style="display: none;" type="submit" class="btn btn-blue btn-sm stepy-finish">Submit</button>
                                   </form>
                                     <center>
                                           <a href="../home/?view=submitResume"  class="btn btn-blue m-t-30 m-b-30">SUBMIT RESUME</a>
                                       </center>
                                       </div>
                                   </div>
                               </div>
                     </div>
                        <!-- End row -->
</div>
  <!-- Start Location Panels-->
    <div style="position: relative; min-height: 500px;">
      <img style="position: absolute; top:0; width: 100%;" src="../include/assets/images/our-services-bg.png">
      <div class="container center-page slideanim" style="padding-top: 5%;">
        <h2 class="text-center m-t-30 text-blue">Business Partners</h2>
        <div class="center-page" style="height: 2px; width: 20%; background-color: #0064c8;"></div>
        <div class="row m-t-30">
          <div class="col-lg-1"></div>

          <div class="col-lg-2 text-center">
            <div class="annex-img">
              <img src="../include/assets/images/home-img4.png">
            </div>
            <h3 class="center-page text-blue">SYDNEY HQ</h3>
          </div>

          <div class="col-lg-2 text-center">
            <div class="annex-img">
            	<img src="../include/assets/images/home-img1.png">
            </div>
            <h3 class="center-page text-blue">MANILA</h3>
          </div>

            <div class="col-lg-2 text-center">
              <div class="annex-img">
              	<img src="../include/assets/images/home-img2.png">
              </div>
              <h3 class="center-page text-blue">DELHI</h3>
            </div>

            <div class="col-lg-2 text-center">
              <div class="annex-img">
              	<img src="../include/assets/images/home-img3.png">
              </div>
              <h3 class="center-page text-blue">BANGALORE</h3>
            </div>

            <div class="col-lg-2 text-center">
              <div class="annex-img">
                <img src="../include/assets/images/home-img5.png">
              </div>
              <h3 class="center-page text-blue">PROVIDENCE</h3>
            </div>
            <div class="col-lg-1"></div>
        </div>
      </div>
      <div class="clearfix"></div>
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
