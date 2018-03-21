<?php
$faqList = faq()->list("level='employee'");
?>
<div style="position:relative;" class="container">
  <img style="position: absolute; top:0; width: 100%; z-index: -1;" src="../include/assets/images/our-services-bg.png">
<h2 class="text-center m-t-30 m-b-30">Job Seeker FAQs</h2>
<p class="text-center m-b-20">Looking for the right candidate? <a href="../home?view=employerFaq" class="text-primary">See employers FAQs.</a></p>
<div class="clearfix"></div>

<!-- Start Form Container -->
<?php
  foreach($faqList as $row){
?>
  <div class="container-80 center-page">
    <h3 class="faq-container">Q: <?=$row->question;?></h3>
    <div class="container center-page">
      <p class="m-b-30">
        <?=$row->answer;?>
      </p>
    </div>
  </div> <!-- End Form Container -->
<?php }?>
</div>
