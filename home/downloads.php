
<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$downloadList = downloads()->all();

?>
<h2 class="text-center m-t-30 m-b-30">Downloads</h2>


      <div class="clearfix"></div>
      <!--Start 2 panels -->
      <center>
      <div class="container">
      <div class="row">
        <div class="col-lg-1">&nbsp;</div>
         <?php foreach($downloadList as $row) {

            if ($row){
               $files = array($row->uploadedFile);
              ?>
        <div class="col-12 col-lg-4 p-30">
          <h4 class="text-center m-t-30 m-b-20">Download <?=$row->fileName;?></h4>

          <div class="text-center m-b-10">
         <?php
                 foreach($files as $file){

      ?>

          <?php
echo '<a href="forceDownloadFunc.php?file=' . urlencode($file) . '" class="btn-small btn-primary container-100"><span class="fa fa-download"></span> Download</a>';
?>

           <?php

    }
    ?>
          </div>

        </div>
        <?php
              }
            }
            ?>
        <div class="col-lg-2">&nbsp;</div>

      </div>
    </div>
</center>
