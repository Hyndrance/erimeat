<?php
$email = (isset($_GET['email']) && $_GET['email'] != '') ? $_GET['email'] : '';
$job = job()->count("workEmail='$email'");
?>

<?php
  if($job>1){
?>
  <div class="container-80 container-fluid text-center m-t-30 m-b-30">
    <h3>Thank You for your interest.</h3><br>
    <p>
      It appears like you're already registered, please use your existing login credentials.<br>
      Alternatively, you can contact our hr team for assistance<br>
      hrcoordinator@teamire.com or call +61 452 364 793.
    </p>
  </div>
<?php
}else{
?>
  <div class="container-80 container-fluid text-center m-t-30 m-b-30">
    <h3>Thank You for your interest.</h3><br>
    <p>
      We are on the midst of processing your talent request in order for you to proceed we're<br>
      inviting you to register your company to our website for you to have access on you Hiring Dashboard.<br>
      Alternatively, you can contact our hr team for assistance<br>
      hrcoordinator@teamire.com or call +61 452 364 793.
    </p>
  </div>
<?php
}
?>
