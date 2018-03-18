<?php
$Id = $_GET['id'];
$job = job()->get("Id='$Id'");
$resumeList = resume()->list("jobId='$Id'");

function getJobClassification($Id){
  $job = job()->get("Id='$Id'");
  return $job->position;
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Personal-Information -->
        <div class="card-box">
            <h4 class="header-title mt-0 m-b-20">Job Detail</h4>
            <div class="panel-body">
                <div class="text-left">
                    <p class="text-muted font-13"><strong>Job Reference Number :</strong>
                      <span class="m-l-15"><?=$job->refNum;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Job Position :</strong>
                      <span class="m-l-15"><?=$job->position;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Company Name:</strong>
                      <span class="m-l-15"><?=$job->company;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Company ABN:</strong>
                      <span class="m-l-15"><?=$job->abn;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Work Email :</strong>
                      <span class="m-l-15"><?=$job->workEmail;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Contact Person:</strong>
                      <span class="m-l-15"><?=$job->contactName;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Job Title :</strong>
                      <span class="m-l-15"><?=$job->jobTitle;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Business Phone :</strong>
                      <span class="m-l-15"><?=$job->businessPhone;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Address :</strong>
                      <span class="m-l-15"><?=$job->address;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Required Experience :</strong>
                      <span class="m-l-15"><?=$job->requiredExperience;?></span>
                    </p>
                    <p class="text-muted font-13"><strong>Comment :</strong>
                      <span class="m-l-15"><?=$job->comment;?></span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Personal-Information -->
    </div>
  </div>

<div class="row">
 <div class="col-sm-12">
   <div class="card-box table-responsive">
     <h4 class="m-t-0 header-title"><b>List of Employees</b></h4>
     <table id="datatable" class="table table-striped table-bordered">
       <thead>
         <tr>
           <th>Employee Reference #</th>
           <th>Job Classification</th>
           <th>Full Name</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach($resumeList as $row) {
         ?>
         <tr>
           <td><?=$row->refNum;?></td>
           <td><?=getJobClassification($row->jobId);?></td>
           <td><?=$row->firstName;?> <?=$row->lastName;?></td>
           <td>
             <!--TODO:-->
             <a href="?view=timesheets&jobId=<?=$row->jobId;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> View Timesheet</a>
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
