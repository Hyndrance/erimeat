<div class="row">
<?php foreach (company()->list() as $row) {
?>
  <div class="col-md-4">
      <div class="text-center card-box">
          <div class="clearfix"></div>
          <div class="member-card">
              <div class="">
                  <h3 class="m-b-5"><?=$row->name;?></h3>
                  <p class="text-muted"><?=$row->contactPerson;?> <span> | </span> <span> <a href="#" class="text-pink"><?=$row->email;?></a> </span></p>
              </div>

              <p class="text-muted font-13">
                <?=$row->description;?>
              </p>

              <h4>Jobs</h4>
              <button style="width: 140px;" class="btn btn-sm btn-success" onclick="location.href='?view=jobList&abn=<?=$row->abn;?>&isApproved=1'">
                Ongoing:<br> <?=job()->count("abn=$row->abn and isApproved=1")?>
              </button>
              <button style="width: 140px;" class="btn btn-sm btn-warning" onclick="location.href='?view=jobList&abn=<?=$row->abn;?>&isApproved=0'">
                Requests:<br> <?=job()->count("abn=$row->abn and isApproved!=1")?>
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
