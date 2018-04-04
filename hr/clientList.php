<div class="row">
<?php foreach (company()->list("isDeleted=0") as $row) {
?>

  <div class="col-md-4">
      <div class="text-center card-box">
          <div class="clearfix"></div>
          <div class="member-card">
              <div class="">
                  <h3 class="m-b-5"><?=$row->name;?></h3>
                  <hr>
                  <p><i class="fa fa-user m-r-5"></i><b><?=$row->contactPerson;?></b><br>
                  <i class="fa fa-envelope m-r-5"></i><a href="#" class="text-blue"><?=$row->email;?></a></p>
              </div>

              <div style="height: 100px;">
                <p class="truncate">
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
}
?>

</div>
