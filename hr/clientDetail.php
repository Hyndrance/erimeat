<?php
$success = (isset($_GET['success']) && $_GET['success'] != '') ? $_GET['success'] : '';
$Id = $_GET['Id'];
$company = company()->get("Id=$Id");

$jfList = job_function()->list("isDeleted='0' order by `option` asc");

function getJobFunction($Id){
    $jf = job_function()->get("Id='$Id'");
    echo $jf->option;
}
?>

<div class="container container-fluid">
  <?php if($success){?>
  <div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"
              aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <?=$success;?>
  </div>
<?php }?>
  <div class="col-12 m-t-30">
    <h2><?=$company->name;?></h2>
    <div class="row p-t-10 p-b-10">
    <div class="col-12">
      <div class="col-lg-4">
        <label class="m-r-5">Department: </label><?=$company->department;?>
        <br>
        <i class="fa fa-phone m-r-5"></i><?=$company->phoneNumber;?>
      </div>
      <div class="col-lg-4">
        <label class="m-r-5">Contact Person: </label><?=$company->contactPerson;?><br>
        <i class="fa fa-mobile-phone m-r-5"></i><?=$company->mobileNumber;?>
      </div>
      <div class="col-lg-4">
        <label class="m-r-5">Email: </label><?=$company->email;?><br>
        <i class="fa fa-map-marker m-r-5"></i><?=$company->address;?>

      </div>
    </div>
    </div>
    <h4 class="m-t-30 m-b-30">Job Category: <?=getJobFunction($company->jobFunctionId);?></h4>
    <hr>
    <?=nl2br($company->description);?>
              <!-- // foreach ($company as $key => $value) {
              //   echo $key . ": " . $value . "<br>";
              // } -->

  </div> <!-- end col -->
  <div class="center-page text-center p-t-10 m-b-30">
    <h4>Jobs</h4>
    <div class="row">
      <button class="btn btn-success stepy-finish" onclick="location.href='?view=jobList&email=<?=$company->email;?>&isApproved=1'">
        Ongoing: <?=job()->count("workEmail='$company->email' and isApproved=1")?>
      </button>
      <button class="btn btn-warning stepy-finish" onclick="location.href='?view=jobList&email=<?=$company->email;?>&isApproved=0'">
        Requests: <?=job()->count("workEmail='$company->email' and isApproved!=1")?>
      </button>
    </div>
    <br>
    <button class="btn btn-lg btn-success" type="button" data-toggle="modal" data-target="#update-information-modal">Update Info</button>
  </div>
</div>
<div class="clearfix"></div>

<div id="update-information-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div style="width:700px;" class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            <div class="modal-body">
                <h2 class="text-uppercase text-center m-b-30">
                    <a href="index.html" class="text-success">
                        <span><img src="assets/images/logo_dark.png" alt="" height="30"></span>
                    </a>
                </h2>

                <form class="form-horizontal" action="process.php?action=updateClientInfo&Id=<?=$Id;?>" method="post">

                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Company Name <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="name" value="<?=$company->name;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">ABN </label>
                      <input type="text" class="form-control" name="abn" value="<?=$company->abn;?>">
                  </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Department <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="department" value="<?=$company->department;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                    <div class="form-group">
                        <label for="firstname">Job Category <span style="color: red;">*</span></label>
                        <select class="form-control" name="jobFunctionId" required="">
                         <option value="<?=$company->jobFunctionId;?>"><?=getJobFunction($company->jobFunctionId);?></option>
                          <?php foreach($jfList as $row) {?>
                            <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                          <?php } ?>
                        </select>
                    </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Contact Person <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="contactPerson" value="<?=$company->contactPerson;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Email <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="email" value="<?=$company->email;?>" required="">
                  </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Business Phone Number <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="phoneNumber" data-mask="(+61) 999-999-999" value="<?=$company->phoneNumber;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Business Mobile Number <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="mobileNumber" data-mask="(+61) 999-999-999" value="<?=$company->mobileNumber;?>" required="">
                  </div>
                  </div>

                  <div class="form-group">
                      <label for="username">Business Address <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="address" value="<?=$company->address;?>" required="">
                  </div>

                  <div class="form-group">
                      <label>Company Description</label>
                      <div>
                          <textarea required="" name="description" class="form-control"><?=$company->description;?></textarea>
                      </div>
                  </div>

                  <div class="form-group account-btn text-center m-t-10">
                      <div class="col-xs-12">
                          <button class="btn w-lg btn-rounded btn-lg btn-custom waves-effect waves-light" type="submit">Submit</button>
                      </div>
                  </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
