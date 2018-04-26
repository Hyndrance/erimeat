<?php
$companyList = company()->list("isDeleted=0");
?>

<div class="row">
  <br>
  <div class="pull-right">
    <button type="button" onclick="location.href='../home/?view=clientForm'" class="btn btn-primary waves-effect waves-light btn-sm"><i class="fa fa-plus"></i> Add New Client</button>
  </div>
  <br>
  <br>
<?php if(empty($companyList)) {?>
  <h2 class="text-muted text-center" style="margin-top:18%;"><i class="mdi mdi-account-off mdi-48px"></i><br>No Clients Available</h2>
<?php }else {?>
  <?php foreach ($companyList as $row) {
  ?>
  <div class="col-md-4">
      <div class="text-center card-box">
          <div class="clearfix"></div>
          <div class="member-card">
              <div class="">
                  <h3 class="m-b-5"><?=$row->name;?></h3>
                  <hr>
                  <p><i class="fa fa-user m-r-5"></i><b><?=$row->contactPerson;?></b><br>
                  <i class="fa fa-envelope m-r-5 text-blue"></i><a href="#" class="text-blue"><?=$row->email;?></a>
                  </p>
              </div>

              <div style="height: 100px;">
              <p class="truncate" style="height: 80px;">
                <?=$row->description;?>
              </p>
            </div>

              <h4>Jobs</h4>
              <button style="width: 140px;" class="btn btn-sm btn-success" onclick="location.href='?view=jobList&email=<?=$row->email;?>&isApproved=1'">
                Ongoing:<br> <?=job()->count("workEmail='$row->email' and isApproved=1 and isDeleted=0")?>
              </button>
              <button style="width: 140px;" class="btn btn-sm btn-warning" onclick="location.href='?view=jobList&email=<?=$row->email;?>&isApproved=0'">
                Requests:<br> <?=job()->count("workEmail='$row->email' and isApproved!=1")?>
              </button>
              <br><br>
              <button class="btn btn-blue" style="width: 285px;" onclick="location.href='?view=clientDetail&Id=<?=$row->Id;?>'">View Detail</button>
          </div>
      </div>
  </div> <!-- end col -->

<?php
} }
?>

</div>
