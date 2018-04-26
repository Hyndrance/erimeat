<?php
$code = (isset($_GET['code']) && $_GET['code'] != '') ? $_GET['code'] : '';
$jfList = job_function()->list("isDeleted='0' order by `option` asc");
$ptList = position_type()->list();
$jobFunctionList = job_function()->list("isDeleted=0 order by `option` asc");

$jobFunc = job_function()->get("code='$code'");
?>

<div class="m-b-30" style="position:relative;">
  <img src="../include/assets/images/teamire-aboutus-img.png" style="width: 100%;">
  <div class="homepage-top-text text-center m-t-50 container-fluid">
    <h2 class="text-white services-mobile"><?=$jobFunc->title;?></h2>
  </div>
</div>
<div class="container-fluid m-b-30">

  <!-- Start About Us Content -->
  <div class="center-page container-80">

    <h3 class="text-center m-b-30"><?=$jobFunc->header;?></h3>
    <p class="text-center m-b-30" style="font-size: 17px;">
      <?=$jobFunc->description;?>
    </p>

    <div class="form-container m-b-30 m-t-30" style="height: 100%;">
      <div class="row">
        <form action="process.php?action=create" method="POST" id="default-wizard" data-parsley-validate="">
        <div class="col-sm-8 center-page">
              <div class="form-group">
                  <label for="firstname">Job Category <span style="color: red;">*</span></label>
                  <select class="form-control" name="jobFunctionId" required="">
                   <option>Please Select</option>
                    <?php
                      foreach($jfList as $row) {
                    ?>
                      <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                    <?php } ?>
                  </select>
              </div>
              <div id="hire" class="display-none">
              <div class="p-r-10 w-50-p pull-left">
              <div class="form-group">
                  <div class="truncate-xxs"><label for="username">Employment Type <span style="color: red;">*</span></label></div>
                  <select class="form-control" name="positionTypeId" required="">
                  <option>Please Select</option>
                    <?php foreach($ptList as $row) {?>
                      <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                    <?php } ?>
                  </select>
              </div>
              </div>

              <div class="p-l-10 w-50-p pull-left">
              <div class="form-group">
                  <div class="truncate-xxs"><label for="username">Job Classification <span style="color: red;">*</span></label></div>
                  <input type="text" class="form-control" name="position" required="">
              </div>
              </div>

              <div class="p-r-10 w-50-p pull-left">
              <div class="form-group">
                  <div class="truncate-xxs"><label for="username">Company Representative <span style="color: red;">*</span></label></div>
                  <input type="text" class="form-control" name="contactName" required="">
              </div>
              </div>

              <div class="p-l-10 w-50-p pull-left">
              <div class="form-group">
                  <div class="truncate-xxs"><label for="username">Company Representative Email <span style="color: red;">*</span></label></div>
                  <input type="email" class="form-control" name="workEmail" data-parsley-trigger="change" required="">
              </div>
              </div>

              <div class="p-r-10 w-50-p pull-left">
              <div class="form-group">
                  <div class="truncate-xxs"><label for="username">Company Name <span style="color: red;">*</span></label></div>
                  <input type="text" class="form-control" name="company" required="" >
              </div>
              </div>

              <div class="p-l-10 w-50-p pull-left">
              <div class="form-group">
                  <div class="truncate-xxs"><label for="username">Company ABN <span style="color: red;">*</span></label></div>
                  <input type="text" class="form-control" data-mask="99999999999" name="abn" required="">
              </div>
              </div>

              <div class="p-r-10 w-50-p pull-left">
              <div class="form-group">
                  <div class="truncate-xxs"><label for="username">Job Position <span style="color: red;">*</span></label></div>
                  <input type="text" class="form-control" name="jobTitle" required="">
              </div>
              </div>

              <div class="p-l-10 w-50-p pull-left">
              <div class="form-group">
                  <div class="truncate-xxs"><label for="username">Business Phone <span style="color: red;">*</span></label></div>
                  <input type="text" placeholder="" data-mask="(+61) 999-999-999" class="form-control" name="businessPhone" required="">
              </div>
              </div>

              <div class="p-r-10 w-50-p pull-left">
              <div class="form-group">
                  <div class="truncate-xxs"><label for="username">Postal Code <span style="color: red;">*</span></label></div>
                  <input type="text" placeholder="" data-mask="9999" class="form-control" name="zipCode" required="">
              </div>
              </div>

              <div class="p-l-10 w-50-p pull-left">
              <div class="form-group">
                  <div class="truncate-xxs"><label for="username">Required Experience <span style="color: red;">*</span></label></div>
                  <select class="form-control" name="requiredExperience" required="">
                    <option>Please Select</option>
                    <option value="0-1 Year">0-1 Year</option>
                    <option value="1-3 Years">1-3 Years</option>
                    <option value="3-5 Years">3-5 Years</option>
                    <option value="5-7 Years">5-7 Years</option>
                    <option value="7-10 Years">7-10 Years</option>
                    <option value="10+ Years Years">10+ Years</option>
                  </select>
              </div>
              </div>

              <div class="form-group">
                  <label for="username">Company Address <span style="color: red;">*</span></label>
                  <input type="text" class="form-control" name="address" required="">
              </div>

              <div class="form-group">
                  <label for="username">Tell us your hiring needs</label>

                    <textarea id="message" class="form-control" name="comment"
                                      data-parsley-trigger="keyup" data-parsley-minlength="20"
                                      data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                      data-parsley-validation-threshold="10"></textarea>
              </div>
            <div class="text-center m-t-30">
                <button type="submit" class="btn btn-primary stepy-finish btn-sm-mobile"> SEND REQUEST </button>
            </div>
            <div class="text-center m-t-30">
              <p style="color: #000000;">Or call us at <strong style="color: #4489e4;">+61452 364 793</strong></p>
            </div>
          </form>

          </div>
          <div class="text-center m-t-30">
            <button type="button" id="requestBtn" class="btn btn-primary stepy-finish btn-sm-mobile">REQUEST TALENT</button>
          </div>

        </div>
      </div>
    </div>
</div>
      <div class="row form-container container-80 center-page">
          <div class="col-md-12 center-page">
              <div class="input-group m-t-5">
                <form class="form-inline" method="GET">
                <div class="form-group">
                  <input type="hidden" name="view" value="searchJob">
                  <input type="text" name="s" class="m-r-5 form-control select-xs-mobile" placeholder="Job Title, Skills or Keywords" style="height: 67px;width:500px; border-radius: 5px;">
                  <select name="c" class="form-control m-r-5 select-xs-mobile" style="height: 67px; width:265px; border-radius: 5px;" required>
                    <option value="">Select Category</option>
                    <?php foreach($jobFunctionList as $row){ ?>
                      <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                    <?php } ?>
                  </select>
                      <button type="submit" class="btn waves-effect waves-light btn-primary btn-search-xs-mobile">Search</button>

                </div>
              </form>
              </div>
          </div>
      </div>
</div>
