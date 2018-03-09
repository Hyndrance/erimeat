<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$downloadList = downloads()->all();

?>
  <div class="row">
    <div class="col-sm-12">
     <br>
    <div class="pull-right">
      <button type="button" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New</button>

    </div>
    <br>
      <div class="card-box table-responsive">
        <h4 class="m-t-0 header-title"><b>List of Files</b></h4>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
            <th>File Name</th>
            <th>File</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>

           <?php foreach($downloadList as $row) {

            if ($row){
              ?>
              <tr>
                <td><?=$row->fileName;?></td>
                  <td><a href=""><?=$row->uploadedFile;?></a></td>
                <td>
                  <a href=""  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-edit"></span> Edit</a>
                </td>
              </tr>
          <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
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
                <input type="file" class="form-control" name="upload_file" placeholder="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary stepy-finish btn-sm">Add File</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div><!-- End row -->
