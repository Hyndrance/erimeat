<?php
  $projectList = projects()->all();
?>
<div class="m-t-30 container-80 container-fluid m-b-30">

  <!-- Start About Us Content -->
  <div class="center-page container-80">
  <?php
    foreach($projectList as $row){
  ?>
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-primary">Title lorem</h3>
      <p class="font-13" style="margin-top: -">Posted last <?=$row->createDate;?></p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <img class="img-thumbnail" src=../media/<?=$row->uploadedImage;?>>
    </div>
    <div class="col-lg-9" style="height: 150px;">
      <p><?=$row->content;?></p>
    <button onclick="location.href='../home/?view=projectDetail&Id=<?=$row->Id;?>'" style="width: 20%; bottom: 0; position: absolute;"
    class="btn btn-sm btn-block btn-warning waves-effect waves-light" type="submit">READ MORE</button>
    </div>
  </div>

  <hr class="m-b-30 m-t-30" width="100%">
  <?php }?>



</div>

      <div class="row form-container">
          <div class="col-md-9 center-page">
              <div class="input-group m-t-5">
                <form method="GET">
                <div class="input-group">
                  <input type="hidden" name="view" value="jobList">
                  <input type="text" id="example-input2-group2" name="s" class="form-control" style="width:560px; height:67px;" placeholder="Job Title, Skills or Keywords">
                      <span class="input-group-btn">
                      <button type="submit" class="btn waves-effect waves-light btn-primary">Search</button>
                      </span>
                </div>
              </form>
              </div>
          </div>
      </div>
</div>
