<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$countryList = country_option()->list();
?>

  <div class="row">
    <div class="col-sm-12">
    <br>
    <div class="pull-right">
      <button type="button" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target="#add-account-modal"><i class="fa fa-plus"></i> Add New</button>

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
        <h4 class="page-title">Offices</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Offices</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

           <?php foreach($countryList as $row) {

            if ($row->isDeleted==0){
              ?>
              <tr>
                <td><?=$row->country;?></td>
                <td>
                  <a href="process.php?action=removeCountry&Id=<?=$row->Id;?>"  class=" btn btn-danger btn-xs tooltips" title="Click To Edit"><span class="fa fa-close"></span>Remove</a>
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
<div id="add-account-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Add New Country</h4>
      </div>
      <div class="modal-body">
        <form id="default-wizard" action="process.php?action=addCountry" method="POST">
          <p class="m-b-0">
            <?=$error;?>
          </p>
          <div class="row m-t-20">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Country</label>
                <input type="text" class="form-control" name="country" required="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary stepy-finish">Add Country</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>
