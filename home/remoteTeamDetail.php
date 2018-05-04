<?php
$Id = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$remoteTeam = remote_team()->get("Id='$Id'");
$firstRemoteTeam = remote_team()->list("isDeleted=0 order by `Id` limit 1");
?>

<div>
  <?php if($remoteTeam) {?>
    <img class="pull-right" width="30%" height="30%" src="../media/<?=$remoteTeam->uploadedImage;?>">
    <h3 class="text-blue"><?=$remoteTeam->title;?></h3>

    <p><?=$remoteTeam->content;?></p>
  <?php }else if($firstRemoteTeam){ ?>
    <?php foreach($firstRemoteTeam as $row){ ?>
      <img class="pull-right" width="30%" height="30%" src="../media/<?=$row->uploadedImage;?>">
      <h3 class="text-blue"><?=$row->title;?></h3>

      <p><?=$row->content;?></p>
    <?php } ?>
  <?php }else{ ?>
    <h4 class="text-center text-muted" style="margin-right: 35%;"><i class="fa fa-file-text-o fa-5x"></i><br><br> New content will be coming soon </h4>
  <?php } ?>
</div>
