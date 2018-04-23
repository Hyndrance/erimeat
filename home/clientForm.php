<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$jfList = job_function()->list("isDeleted='0' order by `option` asc");
?>

  <div class="row">
    <div class="col-md-12">
      <div class="text-center" style="position:relative;">
        <h2 style="position: absolute;top: 25%; left: 36%;" class="text-white"> Employer Registration Form </h2>
        <img style="top:0;" src="../include/assets/images/submit-header.png">
      </div>
      <div class="jumbotron center-page container" style="width: 1139px;">
            <form id="default-wizard" action="process.php?action=clientRequest" method="POST" data-parsley-validate="">
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
                                  <label for="firstname">Industry <span style="color: red;">*</span></label>
                                  <select class="form-control" name="jobFunctionId" required>
                                    <option>Please Select</option>
                                    <?php foreach($jfList as $row) {?>
                                      <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                                    <?php } ?>
                                  </select>
                              </div>

                              <div class="form-group">
                                <label for="username">Department <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="department" required>
                              </div>

                              <div class="row" style="max-width: 640px; margin: 0 auto;">
                                <div class="p-r-10 w-50-p pull-left">
                                <div class="form-group">
                                  <div class="truncate-xs"><label for="username">Employer's Company Name <span style="color: red;">*</span></label></div>
                                  <input type="text" class="form-control" name="name" required>
                                </div>
                                </div>

                                <div class="p-l-10 w-50-p pull-left">
                                <div class="form-group">
                                  <label for="username">Employer ABN </label>
                                  <input type="text" class="form-control" id="ltr" data-mask="99999999999" name="abn">
                                </div>
                                </div>
                              </div>

                              <div class="p-r-10 w-50-p pull-left">
                              <div class="form-group">
                                  <div class="truncate-xs"><label for="firstname">Employer Representative <span style="color: red;">*</span></label></div>
                                  <input type="text" class="form-control" name="contactPerson" required>
                              </div>
                              </div>

                              <div class="p-l-10 w-50-p pull-left">
                              <div class="form-group">
                                <div class="truncate-xs"><label for="username">Company Representative Email <span style="color: red;">*</span></label></div>
                                <input type="email" class="form-control" name="email" required>
                              </div>
                              </div>

                            <div class="form-group">
                                <label for="username">Business Address <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="address" required>
                            </div>

                            <div class="p-r-10 w-50-p pull-left">
                            <div class="form-group">
                              <div class="truncate-xs"><label for="username">Business Phone Registration <span style="color: red;">*</span></label></div>
                              <input type="text" class="form-control" name="phoneNumber"  data-mask="(+61) 999-999-999" required>
                            </div>
                            </div>

                            <div class="p-l-10 w-50-p pull-left">
                            <div class="form-group">
                              <div class="truncate-xs"><label for="username">Business Mobile Number <span style="color: red;">*</span></label></div>
                              <input type="text" class="form-control" name="mobileNumber" placeholder=""  data-mask="(+61) 999-999-999" required="">
                            </div>
                            </div>

                            <div class="form-group">
                              <label for="username">Please provide a brief description of your company <span style="color: red;">*</span></label>
                              <textarea id="message" class="form-control" name="description"
                                                data-parsley-trigger="keyup" data-parsley-minlength="20"
                                                data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                                data-parsley-validation-threshold="10" required></textarea>
                            </div>
                          </div>
                    <div class="text-center m-t-30">
                        <button type="submit" class="btn btn-primary stepy-finish"> SEND REQUEST </button>
                    </div>
            </form>
          </div>
    </div>
</div>
<!-- End row -->
