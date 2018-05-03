<?php
$Id = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$projects = projects()->get("Id='$Id'");
?>

<div>
<?php if(!$projects){?>
  <h4 class="text-center text-muted" style="margin-right: 30%;"><i class="fa fa-file-text-o fa-5x"></i><br><br> New content will be coming soon </h4>
<?php }else{?>
  <img class="pull-right" width="30%" height="30%" src="../media/<?=$projects->uploadedImage;?>">
  <h3 class="text-blue"><?=$projects->title;?></h3>

  <p><?=$projects->content;?></p>
<?php }?>
</div>
