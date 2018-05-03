<?php
$Id = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$remoteTeam = remote_team()->get("Id='$Id'");
?>

<div>
<?php if(!$remoteTeam){?>
  <h4 class="text-center text-muted" style="margin-right: 35%;"><i class="fa fa-file-text-o fa-5x"></i><br><br> New content will be coming soon </h4>
<?php }else{?>
  <img class="pull-right" width="30%" height="30%" src="../media/<?=$remoteTeam->uploadedImage;?>">
  <h3 class="text-blue"><?=$remoteTeam->title;?></h3>

  <p><?=$remoteTeam->content;?></p>
<?php }?>
</div>
