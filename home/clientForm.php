<?php
$jf = new JobFunction;
$jf->readList();
?>

<div class="row">
    <div class="col-md-12">
      <h2 class="text-center m-t-30 m-b-30">Client Request</h2>
      <div class="jumbotron center-page" style="width: 1140px;">
            <form id="default-wizard" action="process.php?action=clientRequest" method="POST" data-parsley-validate="">
                    <div class="row m-t-20">
                        <div class="col-sm-7 center-page">

                              <div class="form-group">
                                  <label for="firstname">Industry <span style="color: red;">*</span></label>
                                  <select class="form-control" name="jobFunctionId" required>
                                    <?php foreach($jf->readList() as $row) {?>
                                      <option>Please Select</option>
                                      <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                                    <?php } ?>
                                  </select>
                              </div>

                              <div class="form-group">
                                <label for="username">Department <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="department" required>
                              </div>

                              <div class="p-r-10 w-50-p pull-left">
                              <div class="form-group">
                                <label for="username">Company Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="name" required>
                              </div>
                              </div>

                              <div class="p-l-10 w-50-p pull-left">
                              <div class="form-group">
                                <label for="username">Company ABN <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="abn" required>
                              </div>
                              </div>

                              <div class="p-r-10 w-50-p pull-left">
                              <div class="form-group">
                                  <label for="firstname">Client Contact Person <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" name="contactPerson" required>
                              </div>
                              </div>

                              <div class="p-l-10 w-50-p pull-left">
                              <div class="form-group">
                                <label for="username">Client Email <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="email" required>
                              </div>
                              </div>

                            <div class="form-group">
                                <label for="username">Address <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="address" required>
                            </div>

                            <div class="p-r-10 w-50-p pull-left">
                            <div class="form-group">
                              <label for="username">Phone Number <span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="phoneNumber" required>
                            </div>
                            </div>

                            <div class="p-l-10 w-50-p pull-left">
                            <div class="form-group">
                              <label for="username">Mobile Number <span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="mobileNumber" placeholder="">
                            </div>
                            </div>

                            <div class="form-group">
                              <label for="username">Description <span style="color: red;">*</span></label>
                              <textarea id="message" class="form-control" name="description"
                                                data-parsley-trigger="keyup" data-parsley-minlength="20"
                                                data-parsley-maxlength="100"
                                                data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                                data-parsley-validation-threshold="10"></textarea>
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
