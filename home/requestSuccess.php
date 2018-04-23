<?php
$email = (isset($_GET['email']) && $_GET['email'] != '') ? $_GET['email'] : '';
$job = job()->count("workEmail='$email'");
?>

<?php
  if($job>1){
?>
  <div class="container-80 container-fluid text-center m-t-30 m-b-30">
    <h3>
      Thank You!<br><br>
      It appears you're already registered, please use your existing login credentials.<br>
      Alternatively, you can contact our hr team for assistance.<br>
      Click <a href="http://teamire.com/company/?view=login">here</a> to login.<br><br>
      <i class="fa fa-phone"></i> +61 452 364 793<br>
      <i class="fa fa-envelope"></i> hrcoordinator@teamire.com
    </h3>
  </div>
<?php
}else{
?>
  <div class="container-80 container-fluid text-center m-t-30 m-b-30">
    <h3>
      Thank You!<br><br>
      Please note in order to request talent, we would need you to complete our new<br>
      "Client Registration" click <a href="http://teamire.com/home/?view=clientForm">here</a> to proceed.
    </h3>
  </div>
<?php
}
?>
