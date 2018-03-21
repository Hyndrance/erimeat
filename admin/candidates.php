<?php
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$resumeList = resume()->list();
?>
<p class="m-b-0">
  <?=$message?></p>
</div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
        <h4 class="page-title">Candidates</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Candidate Reference #</th>
              <th>Candidate Name</th>
              <th>Candidate Email</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($resumeList as $row) {
            ?>
            <tr>
              <td><?=$row->refNum;?></td>
              <td><?=$row->firstName;?> <?=$row->lastName;?></td>
              <td><?=$row->email;?></td>
              <td>
                <?php if($row->isHired==0){ ?>
                <div class=" btn btn-warning btn-xs tooltips">
                  Pending
                </div>
                <?php }else{ ?>
                <div class=" btn btn-success btn-xs tooltips">
                  Hired
                </div>
                <?php } ?>
              </td>
              <td>
                <a href="?view=candidatesDetail&Id=<?=$row->Id;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> View Details</a>
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
