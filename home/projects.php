<?php
$jobFunctionList = job_function()->list("isDeleted=0");
$projectList = projects()->list();

function getPositionName($Id){
  $job = position_type()->get("Id='$Id'");
  echo $job->option;
}

function formatDate($val){
  $date = date_create($val);
  return date_format($date, "F d, Y g:i A");
}
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
      <li style="border-bottom: 1.5px solid #e9e9e9; padding: 8px;" class="text-white bg-primary">Sample Lorem Ipsum</li>
      <li style="border-bottom: 1.5px solid #e9e9e9; padding: 8px;">Lorem Ipsum</li>
      <li style="border-bottom: 1.5px solid #e9e9e9; padding: 8px;">Lorem Ipsum</li>
      <li style="border-bottom: 1.5px solid #e9e9e9; padding: 8px;">Lorem Ipsum</li>
      <li style="border-bottom: 1.5px solid #e9e9e9; padding: 8px;">Lorem Ipsum</li>
    </ul>
  </div>
  <div class="col-lg-9">
    <img class="pull-right" src="../include/assets/images/aboutus-img.png">
    <h3 class="text-blue">Sample Lorem Ipsum</h3>

    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
  </div>
</div>

<!-- End of Static List -->


  <!-- Start About Us Content -->
  <div class="center-page container-80">
    <?php if(!$projectList){?>
      <h4 class="text-center text-muted"> <i class="fa fa-folder-open-o fa-5x"></i><br> No Projects Available </h4>
    <?php }else{?>
  <?php
    foreach($projectList as $row){
      if($row->isDeleted==0){
  ?>
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-primary"><?=$row->title?></h3>
      <p class="font-13" style="margin-top: -">Posted last <?=formatDate($row->createDate);?></p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <img class="img-thumbnail" src=../media/<?=$row->uploadedImage;?>>
    </div>
    <div class="col-lg-9" style="height: 150px;">
      <div class="truncate">
        <p><?=$row->content;?></p>
      </div>
    <button onclick="location.href='../home/?view=projectDetail&Id=<?=$row->Id;?>'" style="width: 20%; bottom: 0; position: absolute;"
    class="btn btn-sm btn-block btn-warning waves-effect waves-light" type="submit">READ MORE</button>
    </div>
  </div>

  <hr class="m-b-30 m-t-30" width="100%">
<?php }}?>

<?php
}
?>
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
