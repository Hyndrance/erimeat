<?php
$jfList = job_function()->filter("isDeleted='0'");
$ptList = position_type()->all();
?>
<div class="row">
    <div class="col-md-12">
      <h2 class="text-center m-t-30 m-b-30">Submit Resume</h2>
      <div class="jumbotron center-page" style="width: 1140px;">
            <form id="default-wizard" action="process.php?action=submitApplication" method="POST" enctype="multipart/form-data" data-parsley-validate="">
                    <div class="row m-t-20">
                        <div class="col-sm-7 center-page">

                              <input type="hidden" name="jobId" value=<?=$_GET['id']?>>
                              <div class="form-group">
                                  <label for="firstname">Job Function <span style="color: red;">*</span></label>
                                  <select class="form-control" name="jobFunctionId" required>
                                    <option>Please Select</option>
                                    <?php foreach($jfList as $row) {?>
                                      <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                                    <?php } ?>
                                  </select>
                              </div>

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
                                  <label for="username">Candidate ABN <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" name="abn" data-mask="99999999999" required>
                              </div>
                              </div>

                              <div class="p-l-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="username">Tax File Number</label>
                                  <input type="text" class="form-control" name="taxNumber">
                                  <span class="help-block"><small>For Australia based only</small></span>
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
                                  <input type="text" class="form-control" name="phoneNumber" required>
                              </div>
                              </div>

                              <div class="form-group">
                                  <label for="username">Primary Address <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" name="address1" required>
                              </div>

                              <div class="form-group">
                                  <label for="username">Secondary Address</label>
                                  <input type="text" class="form-control" name="address2">
                              </div>

                          <div>
                          <div class="form-group w-33-p pull-left p-r-10">
                              <label for="username">City <span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="city" required>
                          </div>

                          <div class="form-group w-33-p pull-left">
                              <label for="username">State <span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="state" required>
                          </div>

                          <div class="form-group w-33-p pull-right">
                              <label for="username">Postal Code <span style="color: red;">*</span></label>
                              <input type="text" class="form-control" data-mask="9999" name="zipCode" required>
                          </div>
                          </div>
                          <div class="form-group">
                              <label for="username">Speedtest</label>
                              <input type="text" class="form-control" name="speedtest">
                              <span class="help-block"><small>To access speedtest. Click the link <a href="#">www.speedtest.com</a></small></span>
                          </div>

                          <div class="form-group">
                            <label for="username">Cover Letter<span style="color: red;">*</span></label>
                            <textarea id="message" class="form-control" name="coverLetter"
                                              data-parsley-trigger="keyup" data-parsley-minlength="20"
                                              data-parsley-maxlength="100"
                                              data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                              data-parsley-validation-threshold="10"></textarea>
                          </div>

                          <div class="form-group">
                            <label>Attach Specs</label>
                            <input type="file" class="filestyle form-control" name="upload_specs"/>
                          </div>
                          <div class="text-center"><h3>Attach Resume</h3>
                          <p>Choose one of the following options:</p></div>
                          <div class="col-sm-3">
                         <a id="myBtnShowResume" class="btn btn-danger btn-file btn-circle btn-lg"><i class="fa fa-file-text-o fa-2x text-white p-t-10 "></i> </a>
                         <br><br><br>
                          </div>
                          <div class="col-md-8">
                          <h4>Upload Your Resume</h4>
                          <p>Supported File Types: pdf, txt, .doc, .docx</p>
                        </div>
                        <div class="form-group">
                        <div id="fileInput" style="display: none;"><input type="file" name="upload_file" class="filestyle form-control" data-input="false"></div>
                     </div>
                    </div>
                    <br><br><br><br>
                    </div>
                  <div class="text-center m-t-30">
                      <button type="submit" class="btn btn-primary stepy-finish"> SUBMIT RESUME </button>
                  </div>
            </form>
          </div>
    </div>
</div>

<!-- End row -->
