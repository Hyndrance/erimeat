<?php
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$companyList = company()->list();
?>


<p class="m-b-0">
  <?=$message?></p>

  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
        <h4 class="page-title">Companies</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Company Name</th>
              <th>Company ABN</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($companyList as $row) {
              if ($row->isApproved==1){
            ?>
            <tr>
              <td><?=$row->name;?> </td>
              <td><?=$row->abn;?> </td>
              <td>
                <a href="?view=companyDetail&Id=<?=$row->Id;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> View Details</a>
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
