<?php
$Id = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$projects = projects()->get("Id='$Id'");

?>
<?php if(!$projects){?>
  <p>Teamire Project Professionals involvement and thousands of hours of
    experience hold them in high esteem for managing various types of Supply Chain Projects
    which were not only challenging but that required high degree of accuracy in analysis.
  </p>
<?php }else{?>
  <img class="pull-right" src="../media/<?=$projects->uploadedImage;?>">
  <h3 class="text-blue"><?=$projects->title;?></h3>

  <p><?=$projects->content;?></p>
  <br>
<?php }?>
