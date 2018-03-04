<?php
$jf = new JobFunction;
$jf->readList();
?>

  <h2 class="text-center m-t-30 m-b-30">Contact Us</h2>
  <h3 class="text-center m-t-30 m-b-30">Enter your city or ZIP code to find an office near you.</h3>
      <div class="col-md-9 center-page">
          <div class="input-group m-t-5">
              <input type="text" id="" name="" class="form-control" style="height: 70px; border-color: #727B80;" placeholder="Job Title, Skills or Keywords">
              <span class="input-group-btn">
                  <button type="button" class="btn stepy-finish waves-light btn-primary"><i class="fa fa-search"></i> SEARCH </button>
              </span>
          </div>
      </div>
      <div class="clearfix"></div>
      <!--Start 2 panels -->
      <div class="container-80 center-page">
      <div class="row">
        <div class="col-lg-1">&nbsp;</div>
        <div class="col-12 col-lg-4 p-30">
          <h2 class="text-center mt30 mb25">Employers</h2>
          <p class="text-center mb20">Looking for the right candidate?</p>
          <div class="text-center m-b-10"><button class="btn-small btn-primary container-100" onclick="location.href='../home/?view=hiringForm'" role="button">REQUEST TALENT</button></div>
          <div class="text-center m-b-10"><button class="btn-small btn-primary container-100" onclick="location.href='../home/?view=searchResume'" role="button">SEARCH CANDIDATE</button></div>
          <div class="text-center m-b-10"><button class="btn-small btn-primary container-100" href="#" role="button">EMPLOYERS FAQ</button></div>
        </div>
        <div class="col-lg-2">&nbsp;</div>
        <div class="col-12 col-lg-4 p-30">
          <h2 class="text-center mt30 mb25">Job Seekers</h2>
          <p class="text-center mb20">Looking for a job? We can help.</p>
          <div class="text-center m-b-10"><button class="btn-small btn-primary container-100" onclick="location.href='../home/?view=submitResume'" role="button">SUBMIT YOUR RESUME</button></div>
          <div class="text-center m-b-10"><button class="btn-small btn-primary container-100" onclick="location.href='../home/?view=searchJob'" role="button">SEARCH JOB</button></div>
          <div class="text-center m-b-10"><button class="btn-small btn-primary container-100" href="#" role="button">JOB SEEKER FAQ</button></div>
        </div>
        <div class="col-lg-1">&nbsp;</div>
      </div>
    </div>

    <!-- Start Form Container -->
    <div class="form-container container-80 center-page">
      <h3 class="text-center m-b-30">Still have questions?</h3>
      <h3 class="text-center">Payroll and time reporting assistance</h3>
      <div class="row">
        <div class="col-lg-1">&nbsp;</div>
        <div class="col-12 col-lg-5">
          <p class="text-center">For Employers</p>
          <p class="text-center"><a href="#">hr@teamire.com</a></p>
          <p class=" text-center">or <a href="#">+61452 364 793</a></p>
        </div>
        <div class="col-12 col-lg-5">
          <p class="text-center">For Job Seekers</p>
          <p class="text-center"><a href="#">payroll@teamire.com</a></p>
          <p class=" text-center">or <a href="#">+61452 364 793</a></p>
        </div>
        <div class="col-lg-1">&nbsp;</div>
      </div>
      <hr class="h-line m-b-30 m-t-30" width="90%">

      <h3 class="text-center">Send us an email</h3>
      <div class="col-md-8 center-page">
        <form id="default-wizard" action="process.php?action=sendInquiry" method="POST" data-parsley-validate="">
        <div class="row">
            <!-- Start Dropdown-->
            <div class="p-r-10 w-50-p pull-left">
            <div class="form-group">
              <label for="username">First Name <span style="color: red;">*</span></label>
              <input type="text" class="form-control" name="firstName" required>
            </div>
            </div>

            <div class="p-l-10 w-50-p pull-left">
            <div class="form-group">
              <label for="username">Last Name <span style="color: red;">*</span></label>
              <input type="text" class="form-control" name="lastName" required>
            </div>
            </div>

            <div class="p-r-10 w-50-p pull-left">
            <div class="form-group">
                <label for="firstname">Our Services <span style="color: red;">*</span></label>
                <select class="form-control" name="jobFunctionId" required>
                  <option>Please Select</option>
                  <?php foreach($jf->readList() as $row) {?>
                    <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                  <?php } ?>
                </select>
            </div>
            </div>

            <div class="p-l-10 w-50-p pull-left">
            <div class="form-group">
              <label for="username">Work Email <span style="color: red;">*</span></label>
              <input type="text" class="form-control" name="workEmail" required>
            </div>
            </div>

            <div class="p-r-10 w-50-p pull-left">
            <div class="form-group">
              <label for="username">Business Phone <span style="color: red;">*</span></label>
              <input type="text" class="form-control" name="phoneNumber" required>
            </div>
            </div>

            <div class="p-l-10 w-50-p pull-left">
            <div class="form-group">
              <label for="username">Postal Code <span style="color: red;">*</span></label>
              <input type="text" class="form-control" name="zipCode" required>
            </div>
            </div>

            <div class="form-group">
            <label for="username">Message <span style="color: red;">*</span></label>
            <textarea id="message" class="form-control" name="message"
                              data-parsley-trigger="keyup" data-parsley-minlength="20"
                              data-parsley-maxlength="100"
                              data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                              data-parsley-validation-threshold="10"></textarea>
          </div>
            <p>This information will not be transferred, disclosed, or shared with a third party, or used for marketing purposes.</p>
            <div class="text-center m-t-30 m-b-30">
                <button type="submit" class="btn btn-primary stepy-finish"> SUBMIT </button>
            </div>
          </form>
          </div>
        </div> <!-- End Form -->
  </div> <!-- End Form Container -->
