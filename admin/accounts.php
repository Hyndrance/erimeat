<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$adminList = admin()->list();
$jfList = job_function()->list("isDeleted='0'");

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
        <h4 class="page-title">Accounts</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Username</th>
              <th>Job Category</th>
              <th>Email</th>
              <th>Level</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>

           <?php foreach($adminList as $row) {

            if ($row->isDeleted==0){
              $id = $row->Id;
              ?>
              <tr>
                <td><?=$row->firstName;?> <?=$row->lastName;?> </td>
                <td><?=$row->username;?></td>
                <td><?=$row->jobFunctionId;?></td>
                <td><?=$row->email;?></td>
                <td><?=$row->level;?></td>
                <td>
                  <?php
                    echo  '<a href="#" onclick="getAccount('.$id.')" class=" btn btn-info btn-xs" title="Click To View"  data-trigger="hover" data-toggle="tooltip"><span class="fa fa-pencil"></span> Edit</a>';
                  ?>
                </td>
                <td>
                  <a href="process.php?action=removeAccounts&Id=<?=$row->Id;?>"  class=" btn btn-danger btn-xs tooltips" title="Click To Edit"><span class="fa fa-close"></span>Remove</a>
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
        <h4 class="modal-title" id="myModalLabel">Add New Account</h4>
      </div>
      <div class="modal-body">
        <form id="default-wizard" action="process.php?action=addAccount" method="POST">
          <p class="m-b-0">
            <?=$error;?>
          </p>
          <div class="row m-t-20">
            <div class="col-sm-12">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstName" placeholder="">
              </div>

              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastName" placeholder="">
              </div>

              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username"  placeholder="">
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password"  placeholder="">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email"  placeholder="">
              </div>

              <div class="form-group">
                <label>Level</label>
                <select id="level" class="form-control select2" name="level">
                  <option>Select Position</option>
                  <option value="admin">Admin</option>
                  <option value="hr">HR</option>
                  <option value="payroll">Payroll</option>
                </select>
              </div>

              <!--HR-->

              <div id="hr" style='display:none;'>
                <div class="form-group">
                    <label>Job Category <span style="color: red;">*</span></label>
                    <select class="form-control" name="jobFunctionId" required="">
                     <option>Please Select</option>
                      <?php
                        foreach($jfList as $row) {
                      ?>
                        <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary stepy-finish">Add Account</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>

  <div id="myModal1" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myLargeModalLabel">Update Accounts</h4>
              </div>
              <div class="modal-body">
                <form id="default-wizard" action="process.php?action=updateAccounts" method="POST">
                   <p class="m-b-0">
                      <?=$error?>
                  </p>
                  <input type="hidden" name="Id" id="getId">
                  <div class="row m-t-20">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" id="getUsername">
                      </div>

                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstName" id="getFirstName">
                      </div>

                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastName" id="getLastName">
                      </div>

                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" id="getEmail">
                      </div>

                      <div class="form-group">
                        <label>Level</label>
                        <input type="text" class="form-control" name="level" id="getLevel">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary stepy-finish btn-sm">Update Accounts</button>
                  </div>
                </form>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
