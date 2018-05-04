<?php
$Id = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$projects = projects()->get("Id='$Id'");
$firstProject = projects()->list("isDeleted=0 order by `Id` limit 1");
?>

<div>
  <?php if($projects) {?>
    <img class="pull-right" width="30%" height="30%" src="../media/<?=$projects->uploadedImage;?>">
    <h3 class="text-blue"><?=$projects->title;?></h3>

    <p><?=$projects->content;?></p>
  <?php }else if($firstProject){ ?>
    <?php foreach($firstProject as $row){ ?>
      <img class="pull-right" width="30%" height="30%" src="../media/<?=$row->uploadedImage;?>">
      <h3 class="text-blue"><?=$row->title;?></h3>

      <p><?=$row->content;?></p>
    <?php } ?>
  <?php }else{ ?>
    <h4 class="text-center text-muted" style="margin-right: 30%;"><i class="fa fa-file-text-o fa-5x"></i><br><br> New content will be coming soon </h4>
  <?php } ?>
</div>
