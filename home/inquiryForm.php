<?php
$jfList = job_function()->list();
?>

<div class="row m-b-30">
    <div class="col-md-12">
      <div class="text-center" style="position:relative;">
        <h2 style="position: absolute;top: 23%; left: 44%;" class="text-white"> Inquiry Form </h2>
        <img style="top:0;" src="../include/assets/images/submit-header.png">
      </div>
      <div class="jumbotron center-page container" style="width: 1139px;">
            <form id="default-wizard" action="process.php?action=sendInquiry" method="POST" data-parsley-validate="">
                    <div class="row m-t-20">
                        <div class="col-md-8 center-page">
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
                                    <?php foreach($jfList as $row) {?>
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
                                <input type="text" class="form-control" name="phoneNumber"   data-mask="(02) 9999-9999" required>
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
                                                data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                                data-parsley-validation-threshold="10"></textarea>
                            </div>
                          </div>
                    <div class="text-center m-t-30">
                        <button type="submit" class="btn btn-primary"> SUBMIT </button>
                    </div>
            </form>
          </div>
    </div>
</div>
</div>
<!-- End row -->
