<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$downloadList = downloads()->list();
?>

  <div class="row">
    <div class="col-sm-12">
     <br>
    <div class="pull-right">
      <button type="button" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New</button>

    </div>
    <br>
    <br>
    <?php if($message){?>
      <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert"
                  aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <?=$message;?>
      </div>
    <?php }?>

    <?php
    $error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
    $s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

    $downloadList = downloads()->list("isDeleted='0'");
    ?>
    <div class="container-fluid">
    <div class="container-80 center-page m-b-30">
      <h2 class="text-center m-b-30">List of Files</h2>
          <div class="clearfix"></div>
          <!--Start 2 panels -->
          <?php if(!$downloadList){?>
            <h4 class="text-center text-muted"> <i class="fa fa-folder-open-o fa-5x"></i><br> No Files Available </h4>
          <?php }else{?>
          <div class="row">
            <?php foreach($downloadList as $row) {
              if ($row->isDeleted==0){
            ?>
              <div class="col-12">
                          <div class="col-lg-3">
                                <div class="file-man-box" data-toggle="modal" data-target="#update-account-modal-<?=$row->Id?>">
                                    <div class="file-img-box">
                                        <img src="../include/assets/images/file_icons/pdf.svg" alt="icon">
                                    </div>
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
    </div>

<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Add New File</h4>
      </div>
      <div class="modal-body">
        <form id="default-wizard" action="process.php?action=addFileFunction" method="POST" method="POST" enctype="multipart/form-data">
           <p class="m-b-0">
              <?=$error?>
          </p>
          <div class="row m-t-20">
            <div class="col-sm-12">
              <div class="form-group">
                <label>File Name</label>
                <input type="text" class="form-control" name="fileName" placeholder="">
              </div>

              <div class="form-group">
                <label>Upload</label>
                <input type="file" class="form-control" name="upload_file" placeholder="" accept=".pdf">
                <span class="help-block"><small>Supported File: .pdf</small></span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary stepy-finish btn-sm">Add File</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div><!-- End row -->

<?php foreach ($downloadList as $row) {?>
<div id="update-account-modal-<?=$row->Id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Update Downloads</h4>
      </div>
      <div class="modal-body">
        <?php $files = array($row->uploadedFile); ?>
        <form id="default-wizard" action="process.php?action=updateDownloads" method="POST">
          <input type="hidden" name="Id" value="<?=$row->Id;?>">
          <p class="m-b-0">
            <?=$error;?>
          </p>
          <div class="row m-t-20">
            <div class="col-sm-12">
              <div class="form-group">
                <label>File Name</label>
                <input type="text" class="form-control" value="<?=$row->fileName;?>" name="fileNae" placeholder="">
              </div>
            </div>
          </div>

          <div class="row m-t-20">
            <div class="col-sm-12">
                    <div class="form-group">
                      <label>File Upload</label>
                      <input type="file" class="form-control" name="upload_file" id="getFileUpload" accept=".pdf">
                      <span class="help-block"><small>Supported File: .pdf</small></span>
                    </div>
                  </div>
          </div>

          <div class="modal-footer">
            <?php
             foreach($files as $file){
            ?>
            <button type="button" onclick="location.href='forceDownloadFunc.php?file=<?=urlencode($file);?>'" class="btn btn-sm btn-warning"><i class="mdi mdi-download"></i> Download</button>
          <?php } ?>
            <button type="submit" class="btn btn-sm btn-primary">Change File</button>
            <button type="button" onclick="location.href='process.php?action=removeDownloads&Id=<?=$row->Id;?>'" class="btn btn-sm btn-danger">Remove</button>
          </div>
        </form>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>
<?php } ?>
