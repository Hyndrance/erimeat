<?php
$jobFunctionList = job_function()->list("isDeleted='0' order by `option` asc");
$projectList = projects()->list();
?>

<div style="position: relative;">
  <img style="position: absolute; top:0; right:0; height: 300px;" src="../include/assets/images/homepage-bg-1.png">
  <div class="container container-fluid m-b-30">
    <h2 class="m-t-20 text-center">Supply Chain Projects</h2>
    <hr>
  <!-- Start of Projects List-->
    <div class="col-lg-12 row">
      <div class="col-lg-3">
        <ul style="list-style-type: none; padding-left: 10px !important; padding: 10px;">
          <?php foreach($projectList as $row) {?>
          <li class="project-list"><a href="../home/?view=projects&Id=<?=$row->Id;?>"><?=$row->title;?></a></li>
          <?php } ?>
        </ul>
      </div>
      <div class="col-lg-9">
        <?php
          include 'projectDetail.php'
        ?>
      </div>
    </div>
    <div class="clearfix"></div>
  <!-- End of Project List -->
  </div>
</div>
