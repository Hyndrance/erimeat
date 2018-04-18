<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$jobFunc = job_function()->list("code='0' and isDeleted='0'");
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
          <h4 class="page-title">Job Functions</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Job Function</th>
              <th>Description</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
           <?php foreach($jobFunc as $row) {
            if ($row->isDeleted==0){
              $id = $row->Id;
              ?>
              <tr>
                <td><?=$row->option;?></td>
                <td><?=$row->description;?></td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#update-account-modal-<?=$row->Id?>" class=" btn btn-info btn-xs" title="Click To View"  data-trigger="hover" data-toggle="tooltip"><span class="fa fa-pencil"></span> Edit</a>
                </td>
                <td>
                  <a href="process.php?action=removeJobFunction&Id=<?=$row->Id;?>"  class=" btn btn-danger btn-xs tooltips" title="Click To Edit"><span class="fa fa-close"></span>Remove</a>
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
        <h4 class="modal-title" id="myModalLabel">Add New Job Function</h4>
      </div>
      <div class="modal-body">
        <form id="default-wizard" action="process.php?action=addJobFunction" method="POST">
          <p class="m-b-0">
            <?=$error?>
          </p>
          <div class="row m-t-20">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Job Function</label>
                <input type="text" class="form-control" name="option" placeholder="" required>
              </div>

              <div class="form-group">
                  <label>Description</label>
                  <textarea  class="form-control" name="description"
                                      data-parsley-trigger="keyup" data-parsley-minlength="20"
                                      data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                      data-parsley-validation-threshold="10"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary stepy-finish">Add</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>

  <?php foreach ($jobFunc as $row) {?>
  <div id="update-account-modal-<?=$row->Id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myModalLabel">Update a Job Function</h4>
        </div>
        <div class="modal-body">
          <form id="default-wizard" action="process.php?action=updateJobFunction" method="POST">
            <input type="hidden" name="Id" value="<?=$row->Id;?>">
            <p class="m-b-0">
              <?=$error;?>
            </p>
            <div class="row m-t-20">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" value="<?=$row->option;?>" name="option" placeholder="">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea  class="form-control" name="description"
                                        data-parsley-trigger="keyup" data-parsley-minlength="20"
                                        data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                        data-parsley-validation-threshold="10"><?=$row->description;?></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary stepy-finish">Update Job Function</button>
            </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div>
<?php } ?>
