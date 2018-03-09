<?php
$Id = $_GET['Id'];
$projects = projects()->get("Id='$Id'");
?>

<div class="container-fluid">
  <div class="container-80 center-page">
    <div class="col-md-10 center-page p-b-30">
      <img class="img-thumbnail" width="100%" src="../media/<?=$projects->uploadedImage;?>">
      <h2 class="m-b-30 m-t-20 text-center"><?=$projects->title;?></h2>
      <p class="font-13 text-center"><?=$projects->createDate;?></p>
      <p style="text-align: justify; text-justify: inter-word;"><?=$projects->content;?></p>
    </div>
  </div>
</div>
