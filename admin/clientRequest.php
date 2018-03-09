<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$company = company()->all();
?>

<div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Client Request</h4>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
<div class="card-box">
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
        <h4 class="m-t-0 header-title"><b>List of Talent Request</b></h4>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Company Name</th>
              <th>ABN</th>
              <th>Company Representative</th>
              <th>Work Email</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           <?php foreach($company as $row) {
              if ($row->isApproved!=1){
           ?>
            <tr>
              <td><?=$row->name;?> </td>
              <td><?=$row->abn;?> </td>
              <td><?=$row->contactPerson;?> </td>
              <td><?=$row->email;?> </td>
              <td>
              <?php if($row->isApproved==0){ ?>
              <div class=" btn btn-success btn-xs tooltips">
                Pending
              </div>
              <?php }else{ ?>
              <div class=" btn btn-warning btn-xs tooltips">
                Waiting for Info
              </div>
              <?php } ?>
              </td>
              <td>
                <a href="?view=clientDetail&id=<?=$row->Id;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> View Details</a>
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
