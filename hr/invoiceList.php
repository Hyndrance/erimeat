<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$invoiceList = invoice()->list();

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
        <h4 class="page-title">Invoice</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Username</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

           <?php foreach($invoiceList as $row) {
              ?>
              <tr>
                <td><?=$row->owner?></td>
                <td>
                  <button class="btn btn-sm btn-success" onclick="location.href='?view=invoiceDetail&Id=<?=$row->timesheetId;?>'">View Invoice</button>
                </td>
              </tr>
          <?php
              }

            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
