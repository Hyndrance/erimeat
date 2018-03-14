<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$faqList = faq()->all();

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
        <h4 class="m-t-0 header-title"><b>List of FAQ</b></h4>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
            <th>Answer</th>
            <th>Question</th>
            <th>Level</th>
            <th></th>
            <th></th>
            </tr>
          </thead>
          <tbody>

           <?php foreach($faqList as $row) {

            if ($row->isDeleted==0){
              ?>
              <tr>
                <td><?=$row->question;?></td>
                <td><?=$row->answer;?></td>
                <td><?=$row->level;?></td>
                <td>
                  <a href="#"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-edit"></span> Edit</a>
                </td>
                <td>
                  <a href="process.php?action=removeFaq&Id=<?=$row->Id;?>"  class=" btn btn-danger btn-xs tooltips" title="Click To Edit"><span class="fa fa-close"></span>Remove</a>
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
        <h4 class="modal-title" id="myModalLabel">Add New FAQ</h4>
      </div>
      <div class="modal-body">
        <form id="default-wizard" action="process.php?action=addFAQ" method="POST" method="POST">
           <p class="m-b-0">
              <?=$error?>
          </p>
          <div class="row m-t-20">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Question</label>
                <input type="text" class="form-control" name="question" placeholder="">
              </div>

              <div class="form-group">
              <label>Answer</label>
              <textarea id="message" class="form-control" name="answer"
                                data-parsley-trigger="keyup" data-parsley-minlength="20"
                                data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                data-parsley-validation-threshold="10"></textarea>
              </div>

              <div class="form-group">
                <select class="form-control" name="level" required="">
                 <option>Please Select</option>
                   <option value="employer">Employer</option>
                   <option value="employee">Job Seeker</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary stepy-finish btn-sm">Add FAQ</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div><!-- End row -->
