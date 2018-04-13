<?php
$jobFunctionList = job_function()->list("isDeleted='0' order by option asc");
$projectList = projects()->list();


?>

<div style="position: relative;">
  <img style="position: absolute; top:0; right:0; height: 300px;" src="../include/assets/images/homepage-bg-1.png">
<div class="container container-fluid m-b-30">
<h2 class="m-t-20 text-center">Supply Chain Projects</h2>
<hr>


<!-- Start of Static Projects List-->

<div class="col-12">
  <div class="col-lg-3" style="height: 300px;">
    <ul style="list-style-type: none; padding-left: 10px !important; padding: 10px;">
      <?php foreach($projectList as $row){?>
      <li style="border-bottom: 1.5px solid #e9e9e9; padding: 8px;"><a href="../home/?view=projects&Id=<?=$row->Id;?>"><?=$row->title;?></li>
    <?php } ?>
    </ul>
  </div>
  <div class="col-lg-9">
    <?php
      include 'projectDetail.php'
    ?>
  </div>
</div>

<!-- End of Static List -->




  <hr class="m-b-30 m-t-30" width="100%">

</div>
</div>
<div class="container-fluid m-b-30">
    <div class="container-80 center-page">
        <div class="col-md-10 center-page p-b-30">
                <form class="form-inline" method="GET">
                <div class="form-group">
                  <input type="hidden" name="view" value="searchJob">
                  <input type="text" name="s" class="form-control" placeholder="Job Title, Skills or Keywords" style="height: 67px;width:450px;">
                  <select name="c" class="form-control" style="height: 67px; width:200px;" required>
                    <option value="">Select Category</option>
                    <?php foreach($jobFunctionList as $row){ ?>
                      <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                    <?php } ?>
                  </select>
                      <button type="submit" class="btn waves-effect waves-light btn-primary" style="margin-top: -1px;">Search</button>

                </div>
              </form>
              </div>
          </div>
            <div class="clearfix"></div>
</div>
</div>
