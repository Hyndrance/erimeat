<?php
$jfList = job_function()->filter("isDeleted='0'");
$ptList = position_type()->all();
?>


<div class="row">
    <div class="col-md-12">
      <div class="hiring-form-header center-page">
      <h2 class="text-center m-t-30 m-b-30 text-white">Talent Request</h2>
      <p class="text-center text-white">We will help you build the workforce you desire – quickly</p>
    </div>
     <form  action="process.php?action=create" method="POST" id="default-wizard" data-parsley-validate="">
      <div class="jumbotron center-page container" style="width: 84.5%;">


                                    <div class="alert alert-warning hidden fade in">
                                        <h4>Oh snap!</h4>
                                        <p>This form seems to be invalid :(</p>
                                    </div>

                                    <div class="alert alert-info hidden fade in">
                                        <h4>Yay!</h4>
                                        <p>Everything seems to be ok :)</p>
                                    </div>

                    <div class="row m-t-20">
                        <div class="col-sm-7 center-page">

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

                              <div class="p-r-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="username">Employment Type <span style="color: red;">*</span></label>
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
                                  <label for="username">Job Classification <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" name="position" required="">
                              </div>
                              </div>

                              <div class="p-r-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="username">Company Representative <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" name="contactName" required="">
                              </div>
                              </div>

                              <div class="p-l-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="username">Company Representative Email <span style="color: red;">*</span></label>
                                  <input type="email" class="form-control" name="workEmail" data-parsley-trigger="change" required="">
                              </div>
                              </div>

                              <div class="p-r-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="username">Company Name <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" name="company" required="" >
                              </div>
                              </div>

                              <div class="p-l-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="username">Company ABN <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" data-mask="99999999999" name="abn" required="">
                              </div>
                              </div>

                              <div class="p-r-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="username">Job Position <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" name="jobTitle" required="">
                              </div>
                              </div>

                              <div class="p-l-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="username">Business Phone <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" name="businessPhone" required="">
                              </div>
                              </div>

                              <div class="p-r-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="username">Postal Code <span style="color: red;">*</span></label>
                                  <input type="text" placeholder="" data-mask="9999" class="form-control" name="zipCode" required="">
                              </div>
                              </div>

                              <div class="p-l-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="username">Required Experience <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" name="requiredExperience" required="">
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
                    </div>
                  <div class="text-center m-t-30">
                      <button type="submit" class="btn btn-primary stepy-finish"> SEND REQUEST </button>
                  </div>
                  <div class="text-center m-t-30">
                    <p style="color: #000000;">Or call us at <strong style="color: #4489e4;">+61452 364 793</strong></p>
                  </div>
            </form>
          </div>
    </div>
</div>

<!-- End row -->
