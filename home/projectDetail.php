<?php
$Id = $_GET['Id'];
$projects = projects()->get("Id='$Id'");

?>
<img class="pull-right" src="../media/<?=$projects->uploadedImage;?>">
<h3 class="text-blue"><?=$projects->title;?></h3>

<p><?=$projects->content;?></p>
<br>
