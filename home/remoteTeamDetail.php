<?php
$Id = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$remoteTeam = remote_team()->get("Id='$Id'");

?>
<?php if(!$remoteTeam){?>
  <p>Remote Team Graphs
  </p>
<?php }else{?>
  <img class="pull-right" src="../media/<?=$remoteTeam->uploadedImage;?>">
  <h3 class="text-blue"><?=$remoteTeam->title;?></h3>

  <p><?=$remoteTeam->content;?></p>
  <br>
<?php }?>
