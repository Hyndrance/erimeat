<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$jfList = job_function()->list("isDeleted='0' order by `option` asc");
$ptList = position_type()->list();
?>
<div class="row">
    <div class="col-md-12">
      <div class="text-center" style="position:relative;">
        <h2 style="position: absolute;top: 25%; width: 900px; left: 17%;" class="text-white text-mobile"> Submit Resume </h2>
        <img style="top:0;" src="../include/assets/images/submit-header.png">
      </div>
      <div class="jumbotron center-page container" style="width:1139px;">
            <form id="default-wizard" action="process.php?action=submitResume" method="POST" enctype="multipart/form-data" data-parsley-validate="">
              <?php if($error){?>
                <div>
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert"
                              aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      <?=$error;?>
                  </div>
                </div>
              <?php } ?>
                    <div class="row m-t-20">
                        <div class="col-sm-7 center-page">

                              <div class="form-group">
                                  <label for="firstname">Job Category <span style="color: red;">*</span></label>
                                  <select class="form-control" name="jobFunctionId" required>
                                    <option selected disabled>Please Select</option>
                                    <?php foreach($jfList as $row) {?>
                                      <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                                    <?php } ?>
                                  </select>
                              </div>

                              <div class="row" style="max-width: 660px; margin: 0 auto;">
                              <div class="form-group w-33-p pull-left p-r-10">
                                  <div class="truncate-xxs"><label for="username">First Name <span style="color: red;">*</span></label></div>
                                  <input type="text" class="form-control" name="firstName" required>
                              </div>


                              <div class="form-group w-33-p pull-left">
                                  <div class="truncate-xxs"><label for="username">Last Name <span style="color: red;">*</span></label></div>
                                  <input type="text" class="form-control" name="lastName" required>
                              </div>


                            <div class="form-group w-33-p pull-right">
                                  <label for="username">Birthdate</label>
                                  <input type="date" class="form-control" name="birthdate">
                              </div>
                              </div>

                              <div class="row" style="max-width: 660px; margin: 0 auto;">
                                <div class="p-r-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="username">Contractor ABN</label>
                                    <input type="text" class="form-control" id="ltr" name="abn" data-mask="99999999999">
                                </div>
                                </div>

                                <div class="p-l-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="username">Tax File Number</label>
                                    <input type="text" class="form-control" name="taxNumber">
                                    <span class="help-block"><small>For Australian applicants only</small></span>
                                </div>
                                </div>
                              </div>

                              <div class="p-r-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="username">Email <span style="color: red;">*</span></label>
                                  <input type="email" class="form-control" name="email" required>
                              </div>
                              </div>

                              <div class="p-l-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="username">Phone Number <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control"  name="phoneNumber" required>
                              </div>
                              </div>


                          <div class="form-group">
                              <label for="username">Primary Address <span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="address1" required>
                          </div>

                          <div class="form-group">
                              <label for="username">Secondary Address </label>
                              <input type="text" class="form-control" name="address2">
                          </div>

                          <div>
                          <div class="form-group w-33-p pull-left p-r-10">
                              <label for="username">City</label>
                              <select class="form-control select2" name="city">
                                  <option value="">Select City</option>
                                  <?php foreach(country_option()->list("isDeleted=0") as $country){ ?>
                                  <optgroup label="<?=$country->country;?>">
                                      <?php foreach(city_option()->list("countryId=$country->Id and isDeleted=0") as $city){ ?>
                                          <option value="<?=$city->Id;?>"><?=$city->city;?></option>
                                      <?php } ?>
                                  <?php } ?>
                              </select>
                          </div>
                          <div class="form-group w-33-p pull-left">
                              <label for="username">State </label>
                              <input type="text" class="form-control" name="state">
                          </div>

                          <div class="form-group w-33-p pull-right">
                              <label for="username">Postal Code </label>
                              <input type="text" class="form-control" id="ltr2" data-mask="9999" name="zipCode">
                          </div>

                          </div>
                          <div class="form-group">
                              <label for="username">Speedtest</label>
                              <input type="text" class="form-control" name="speedtest">
                              <span class="help-block"><small>To access speedtest. Click the link <a href="http://www.bandwidthplace.com/" target="blank_">www.bandwidthplace.com</a></small></span>
                              <span class="help-block"><small>Click start speedtest. Click Share Results, Copy URL and paste on the speedtest form.</small></span>
                          </div>

                          <div class="form-group">
                            <label for="username">Cover Letter <span style="color: red;">*</span></label>
                            <textarea id="message" class="form-control" name="coverLetter"
                                              data-parsley-trigger="keyup" data-parsley-minlength="20"
                                              data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                              data-parsley-validation-threshold="10"></textarea>
                          </div>

                          <div class="form-group">
                              <label for="username">Key Skills</label>
                              <input type="text" class="form-control" name="keySkills">
                              <span class="help-block"><small>Separate with comma ",".</small></span>
                          </div>

                          <div class="p-r-10 w-50-p pull-left">
                          <div class="form-group">
                            <div class="truncate-xxs"><label>Attach Computer Specification </label></div>
                            <input type="file" class="filestyle form-control" name="upload_specs" accept=".png, .jpg, .jpeg" />
                          </div>
                          </div>

                          <div class="p-l-10 w-50-p pull-left">
                          <div class="form-group">
                            <div class="truncate-xxs"><label>Attach Other Files </label></div>
                            <input type="file" name="upload_certs[]" multiple="multiple" class="form-control" accept=".pdf, .png, .jpg, .jpeg," />
                          </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="row">
                            <div class="text-center m-b-30" style="margin: 0 auto;"><h3>Attach Resume <span style="color: red;">*</span></h3></div>
                            <div class="text-center m-b-10">
                              <a id="myBtnShowResume" style="border-radius: 50%;height: 70px;width: 70px;" class="btn btn-danger btn-file btn-circle btn-lg"><i class="fa fa-file-text-o fa-2x text-white"></i> </a>
                              <a id="myLinkShowResume" style="color:black; font-size: 20px; font-weight: bold;">Upload Your Resume</a>
                            </div>
                          </div>

                        <div class="form-group">
                        <div id="fileInput" style="display: none;"><input type="file" name="upload_file" class="filestyle form-control" data-input="false" accept=".pdf, .doc, .docx" required></div>
                     </div>
                    </div>
                  </div>
                  <div class="text-center m-t-30">
                      <button type="submit" class="btn btn-primary stepy-finish"> SUBMIT RESUME </button>
                  </div>
            </form>
          </div>
    </div>
</div>

<!-- End row -->
