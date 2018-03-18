<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
?>

  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
          <h4 class="page-title">Invoice</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Username</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Username</td>
              <td>
                <a href="?view=timesheets&jobId=<?=$row->Id;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> View Details</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
