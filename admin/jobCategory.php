<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$jobList = job_function()->all();
?>

  <div class="row">
    <div class="col-sm-12">
     <br>
    <div class="pull-right">
      <button type="button" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New</button>

    </div>
    <p class="m-b-0">
      <?=$message?>
    </p>
    <br>
      <div class="card-box table-responsive">
          <h4 class="page-title">Job Functions</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Job Function</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           <?php foreach($jobList as $row) {
            if ($row->isDeleted==0){
              ?>
              <tr>
                <td><?=$row->option;?></td>
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
                <input type="text" class="form-control" name="option" placeholder="">
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
