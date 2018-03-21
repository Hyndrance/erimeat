<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$projectsList = projects()->list();

function formatDate($val){
  $date = date_create($val);
  return date_format($date, "F d, Y g:i A");
}

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
      <div class="card-box table-responsive">
        <h4 class="page-title">Special Projects</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Project Name</th>
              <th>Content</th>
              <th>Posted Date</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>

           <?php foreach($projectsList as $row) {

            if ($row->isDeleted==0){
              $id = $row->Id;
              ?>
              <tr>
                <td><?=$row->title;?></td>
                <td style="word-break:break-all;"><?=$row->content;?></td>
                <td><?=formatDate($row->createDate);?></td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#update-account-modal-<?=$row->Id?>" class=" btn btn-info btn-xs" title="Click To View"  data-trigger="hover" data-toggle="tooltip"><span class="fa fa-pencil"></span> Edit</a>
                </td>
                <td>
                  <a href="process.php?action=removeProjects&Id=<?=$row->Id;?>"  class=" btn btn-danger btn-xs tooltips" title="Click To Edit"><span class="fa fa-close"></span>Remove</a>
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
        <h4 class="modal-title" id="myModalLabel">Add New Project</h4>
      </div>
      <div class="modal-body">
        <form id="default-wizard" action="process.php?action=addProject" method="POST" enctype="multipart/form-data">
          <p class="m-b-0">
            <?=$error?>
          </p>
          <div class="row m-t-20">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Project Title</label>
                <input type="text" class="form-control" name="title" placeholder="">
              </div>

              <div class="form-group">
              <label>Content</label>
              <textarea id="message" class="form-control" name="content"
                                data-parsley-trigger="keyup" data-parsley-minlength="20"
                                data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                data-parsley-validation-threshold="10"></textarea>
              </div>

              <div class="form-group">
                <label>Upload Image</label>
                <input type="file" class="form-control" name="upload_file" placeholder="" accept=".png, .jpg, .jpeg">
                <span class="help-block"><small>Supported File: .png, .jpg, .jpeg</small></span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary stepy-finish">Add Project</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>

<?php foreach ($projectsList as $row) {?>
  <div id="update-account-modal-<?=$row->Id;?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myLargeModalLabel">Update Projects</h4>
              </div>
              <div class="modal-body">
                <form id="default-wizard" action="process.php?action=updateProjects" method="POST">
                   <p class="m-b-0">
                      <?=$error?>
                  </p>
                  <input type="hidden" name="Id" value="<?=$row->Id;?>">
                  <div class="row m-t-20">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="<?=$row->title;?>">
                      </div>

                      <div class="form-group">
                      <label>Content</label>
                      <textarea  class="form-control" name="content"
                                        data-parsley-trigger="keyup" data-parsley-minlength="20"
                                        data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                        data-parsley-validation-threshold="10"><?=$row->content;?></textarea>
                      </div>

                      <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" class="form-control" name="upload_file" accept=".png, .jpg, .jpeg">
                        <span class="help-block"><small>Supported File: .png, .jpg, .jpeg</small></span>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary stepy-finish btn-sm">Update Projects</button>
                  </div>
                </form>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php } ?>
