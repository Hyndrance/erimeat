
<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$downloadList = downloads()->list("isDeleted='0'");

?>
<div style="position: relative; height: auto; height: 300px;">
  <img style="position: absolute; top:0; right:0; height: 300px;" src="../include/assets/images/homepage-bg-1.png">
  <div class="container-fluid">
<div class="container-80 center-page m-b-30">
  <h2 class="text-center m-b-30">Downloads</h2>
      <div class="clearfix"></div>
      <!--Start 2 panels -->
      <?php if(!$downloadList){?>
        <h4 class="text-center text-muted"> <i class="fa fa-folder-open-o fa-5x"></i><br> No Download Available </h4>
      <?php }else{?>
      <div class="row">
        <?php foreach($downloadList as $row) {
          if ($row->isDeleted==0){
            $files = array($row->uploadedFile);
        ?>
          <div class="col-12">
                      <div class="col-lg-3">

                            <div class="file-man-box">
                                <div class="file-img-box">
                                    <img src="../include/assets/images/file_icons/pdf.svg" alt="icon">
                                </div>
                                <?php
                                 foreach($files as $file){
                                ?>
                                <?php
                                echo '<a href="forceDownloadFunc.php?file=' . urlencode($file) . '" class="file-download"><i class="mdi mdi-download"></i></a>';
                                ?>
                                <div class="file-man-title">
                                    <h5 class="m-b-0 text-overflow"><?=$row->fileName?>.pdf</h5>
                                </div>
                            </div>
              </div>
          </div><!-- end col -->

        <?php
          }
        }
      }
    }
        ?>
      </div>
    </div>
</div>
</div>
