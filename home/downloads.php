
<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$downloadList = downloads()->list();

?>
<div class="container-80 center-page m-b-30">
  <h2 class="text-center m-t-30 m-b-30">Downloads</h2>
      <div class="clearfix"></div>
      <!--Start 2 panels -->
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
        ?>
      </div>
</div>
