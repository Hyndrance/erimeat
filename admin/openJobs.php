<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$Id = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';

$jobList = job()->list();

function getJobFunction($Id){
  $jf = job_function()->get("Id='$Id'");
  echo $jf->option;
}
?>

  <div class="row">
    <div class="col-sm-12">
     <br>
    <div class="pull-right">
      <button type="button" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target="#add-faq-modal"><i class="fa fa-plus"></i> Add New</button>

    </div>
    <br>
    <br>
      <div class="card-box table-responsive">
        <h4 class="m-t-0 header-title"><b>Job Lists</b></h4>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
            <th>Company</th>
            <th>ABN</th>
            <th>Classification</th>
            <th>Category</th>
            <th></th>
            </tr>
          </thead>
          <tbody>

           <?php foreach($jobList as $row) { ?>
              <tr>
                <td><?=$row->company;?></td>
                <td><?=$row->abn;?></td>
                <td><?=$row->position;?></td>
                <td><?=getJobFunction($row->jobFunctionId);?></td>
                <td>
                  <a href="#"  class=" btn btn-success btn-xs tooltips" title="Click To Edit">Assign Candidate</a>
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
