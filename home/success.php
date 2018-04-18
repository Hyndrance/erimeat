<?php
$email = (isset($_GET['email']) && $_GET['email'] != '') ? $_GET['email'] : '';
$comp = company()->get("email='$email'");
$res = candidate()->get("email='$email'");
$app = application()->get("email='$email'");
?>

<?php
  if($comp!=null){
?>
  <div class="container-80 container-fluid text-center m-t-30 m-b-30">
    <h3>Thank You for your interest, <?=$comp->name;?></h3>
    <p>We've sent a confirmation email to <?=$comp->email;?>.
  </div>
<?php
}else if($res!=null){
?>
  <div class="container-80 container-fluid text-center m-t-30 m-b-30">
    <h3>Thank You for your interest, <?=$res->firstName;?></h3>
    <p>We've sent a confirmation email to <?=$res->email;?>.
  </div>
<?php
}else if($app!=null){
?>
<div class="container-80 container-fluid text-center m-t-30 m-b-30">
  <h3>Thank You for your interest, <?=$app->firstName;?></h3>
  <p>We've sent a confirmation email to <?=$app->email;?>.
</div>
<?php
}else{
?>
  <div class="container-80 container-fluid text-center m-t-30 m-b-30">
    <h3>Thank You. We appreciate your feedback.</h3>
  </div>
<?php
}
?>
