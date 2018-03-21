<!DOCTYPE html>
<html>
    <head>
        <?php
          include_once($headScript);
          $jfList = job_function()->list("isDeleted='0'");
        ?>
        <link rel="stylesheet" type="text/css" href="../include/assets/css/footer_responsive.css">
    </head>
    <body>
        <!-- Navigation Bar-->
        <header id="topnav">
          <div class="bg-darkgrey">
              <?php
                include 'navVisitor.php';
              ?>
              <div class="clearfix"></div>
            <!-- end topbar-main -->
          </div>
        </header>
        <!-- End Navigation Bar-->
        <div class="wrapper">
          <div style="width: 1350px; max-width: 100%; margin: 0 auto;">
              <?php
                include $content;
              ?>
            </div>
        </div>
        <!-- end wrapper -->
        <!-- Footer -->

        <footer style="padding: 0; padding-left: 0 !important; color: #FFFFFF; background-color: #4A555C;">
          <div class="row">
            <nav style="padding-left: 2%;" class="foot">
             <label for="drop2" class="toggle2" style="background-color: #022664;color: #fff;" >ABOUT US <b class="fa fa-chevron-right m-l-15 text-white"></b></label>
              <input type="checkbox" id="drop2" />
              <ul class="menu1">
                <li>
                    <label for="drop-1" class="toggle2 footer-res"><a  href="../home/?view=projects" ><a style="color: white;" href="../home/?view=aboutUs#howWeDoThis">How we do this</a></label>
                </li>
                <li>
                    <label for="drop-2" class="toggle2 footer-res"> <a style="color: white;" href="../home/?view=aboutUs#ourVision">Our Vision</a></label>
                </li>
                 <li>
                    <label for="drop-2" class="toggle2 footer-res"> <a  href="../home/?view=downloads" >Downloads</a></label>
                </li>
                 <li>
                    <label for="drop-2" class="toggle2 footer-res"><a style="color: white;" href="../home/?view=aboutUs#ourObjectives">Our Objectives</a></label>
                </li>
                 <li>
                    <label for="drop-2" class="toggle2 footer-res"><a style="color: white;" href="../home/?view=logins">Timesheets</a></label>
                </li>
                 <li>
                    <label for="drop-2" class="toggle2 footer-res"><a style="color: white;" href="../home/?view=contactUs">Contact Us</a></label>
                </li>
            </ul>
         </nav>
          <nav style="padding-left: 2%;" class="foot2">
            <label for="drop23" class="toggle23" style="background-color: #022664;color: #fff;" >RESOURCES <b class="fa fa-chevron-right m-l-15 text-white"></b></label>
                <input type="checkbox" id="drop23" />
                  <ul class="menu23">
                <li>
                    <label for="drop-1" class="toggle23 footer-res"><a style="color: white;" href="../home/?view=services">Our Services</a></label>
                </li>
                <li>
                    <label for="drop-2" class="toggle23 footer-res"><a class="text-white" href="../home/?view=projects">Projects</a></label>
                </li>
                <li style="visibility: hidden;">
                    <label for="drop-2" class="toggle23 footer-res" >Government Notice</label>
                </li>
            </ul>
          </nav>
           <nav style="padding-left: 2%;" class="foot3">
              <label for="drop24" class="toggle24" style="background-color: #022664;color: #fff;" >LEGAL <b class="fa fa-chevron-right m-l-15 text-white"></b></label>
                <input type="checkbox" id="drop24" />
                  <ul class="menu24">
                <li>
                    <label for="drop-1" class="toggle24 text-white footer-res" style="padding: 20px 40px;">Fraud Alert</label>
                </li>
                <li>
                    <label for="drop-2" class="toggle24 text-white footer-res" style="padding: 20px 40px;">Privacy Policy</label>
                </li>
                  <li>
                    <label for="drop-2" class="toggle24 text-white footer-res" style="padding: 20px 40px;">Terms of Use</label>
                </li>
                  <li>
                    <label for="drop-2" class="toggle24 text-white" style="margin-bottom: 0; padding: 20px 40px;">Government Notice</label>
                </li>
            </ul>
          </nav>
          <div id="center_email">
              <center class="well" style="background-color: #797979;">
                <div class="container" id="emai_form">
                 <h4 class="text-center text-white">Send us an email</h4>
                    <div class="row">
                      <form id="default-wizard" action="process.php?action=sendInquiry" method="POST" data-parsley-validate="">
                      <div class="col-md-12">
                          <!-- Start Dropdown-->
                          <div class="p-r-10 w-50-p pull-left">
                          <div class="form-group">
                            <label for="username"><span class="text-white">First Name </span><span style="color: red;">*</span></label>
                            <input type="text" class="form-control font-13" style="height: 33px;" name="firstName" required>
                          </div>
                          </div>

                          <div class="p-l-10 w-50-p pull-left">
                          <div class="form-group">
                            <label for="username"><span class="text-white">Last Name </span><span style="color: red;">*</span></label>
                            <input type="text" class="form-control  font-13" style="height: 33px;" name="lastName" required>
                          </div>
                          </div>

                          <div class="p-r-10 w-50-p pull-left">
                          <div class="form-group">
                              <label for="firstname"><span class="text-white">Our Services </span><span style="color: red;">*</span></label>
                              <select class="form-control font-13" style="height: 33px;" name="jobFunctionId" required>
                                <option>Please Select</option>
                                <?php foreach($jfList as $row) {?>
                                  <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                                <?php } ?>
                              </select>
                          </div>
                          </div>

                          <div class="p-l-10 w-50-p pull-left">
                          <div class="form-group">
                            <label for="username"><span class="text-white">Work Email </span><span style="color: red;">*</span></label>
                            <input type="text" class="form-control  font-13" style="height: 33px;" name="workEmail" required>
                          </div>
                          </div>

                          <div class="p-r-10 w-50-p pull-left">
                          <div class="form-group">
                            <label for="username"><span class="text-white">Business Phone </span><span style="color: red;">*</span></label>
                            <input type="text" class="form-control  font-13" style="height: 33px;" name="phoneNumber"  data-mask="(02) 9999-9999" required>
                          </div>
                          </div>

                          <div class="p-l-10 w-50-p pull-left">
                          <div class="form-group">
                            <label for="username"><span class="text-white">Postal Code </span><span style="color: red;">*</span></label>
                            <input type="text" class="form-control font-13" style="height: 33px;" name="zipCode" required>
                          </div>
                          </div>

                          <div class="form-group">
                          <label for="username"><span class="text-white">Message </span><span style="color: red;">*</span></label>
                          <textarea id="message" class="form-control font-13" name="message"
                                            data-parsley-trigger="keyup" data-parsley-minlength="20"
                                            data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                            data-parsley-validation-threshold="10"></textarea>
                        </div>
                        <div class="row">
                          <div class="col-12 col-lg-9">
                            <p class="font-13">This information will not be transferred, disclosed, or shared with a third party,
                              or used for marketing purposes.</p>
                            </div>
                            <div class="col-12 col-lg-3">
                              <button type="submit" class="btn-sm btn-blue stepy-finish pull-right"> SUBMIT </button>
                        </div>
                        </div>
                        </form>
                  </div>
               </div>
              </center>
              </div>
        </div>
            <div class="container-fluid m-b-30 " style="padding: 30px 60px 10px 45px; color: #FFFFFF; background-color: #4a555c; bottom: 0;" id="con">
                <div class="row center-page container">
                  <div class="container-fluid col-12 col-lg-2">
                    <h4 class="text-white" style="padding-left: 40px;">ABOUT US</h4>
                    <ul style="list-style-type:none;">
                      <li><a style="color: white; padding:none;" href="../home/?view=aboutUs#howWeDoThis">How we do this</a></li>
                      <li><a style="color: white;" href="../home/?view=aboutUs#ourVision">Our Vision</a></li>
                      <li><a style="color: white;" href="../home/?view=aboutUs#ourObjectives">Our Objectives</a></li>
                      <li><a style="color: white;" href="../home/?view=logins">Timesheets</a></li>
                      <li><a style="color: white;" href="../home/?view=contactUs">Contact Us</a></li>
                    </ul>
                  </div>
                  <div class="container-fluid col-12 col-lg-2">
                    <h4 class="text-white" style="padding-left: 40px;">RESOURCES</h4>
                    <ul style="list-style-type:none;">
                      <li><a style="color: white;" href="../home/?view=services">Our Services</a></li>
                      <li><a style="color: white;" href="../home/?view=projects">Projects</a></li>
                    </ul>
                  </div>
                  <div class="container-fluid col-12 col-lg-2">
                    <h4 class="text-white" style="padding-left: 40px">LEGAL</h4>
                    <ul style="list-style-type:none;">
                    <li>Fraud Alert</li>
                    <li>Privacy Policy</li>
                    <li>Terms of Use</li>
                    <li>Government Notice</li>
                  </ul>
                  </div>
                  <div class="col-12 col-lg-1"></div>
                  <div class="container-fluid col-12 col-lg-5">
                    <!-- <h4 class="text-white">FOLLOW US</h4>
                    <i class="fa fa-facebook-square fa-2x"></i>&nbsp;&nbsp;<span>Facebook</span><br><br>
                    <i class="fa fa-linkedin-square fa-2x"></i>&nbsp;&nbsp;<span>LinkedIn</span><br><br>
                    <i class="fa fa-twitter-square fa-2x"></i>&nbsp;&nbsp;<span>Twitter</span><br><br>
                    <i class="fa fa-youtube-square fa-2x"></i>&nbsp;&nbsp;<span>Youtube</span><br><br>
                    <i class="fa fa-instagram fa-2x"></i>&nbsp;&nbsp;<span>Instagram</span> -->
                    <h4 class="text-center text-white">Send us an email</h4>
                    <div class="">
                      <form id="default-wizard" action="process.php?action=sendInquiry" method="POST" data-parsley-validate="">
                      <div class="row">
                          <!-- Start Dropdown-->
                          <div class="p-r-10 w-50-p pull-left">
                          <div class="form-group">
                            <label for="username"><span class="text-white">First Name </span><span style="color: red;">*</span></label>
                            <input type="text" class="form-control font-13" style="height: 33px;" name="firstName" required>
                          </div>
                          </div>

                          <div class="p-l-10 w-50-p pull-left">
                          <div class="form-group">
                            <label for="username"><span class="text-white">Last Name </span><span style="color: red;">*</span></label>
                            <input type="text" class="form-control  font-13" style="height: 33px;" name="lastName" required>
                          </div>
                          </div>

                          <div class="p-r-10 w-50-p pull-left">
                          <div class="form-group">
                              <label for="firstname"><span class="text-white">Our Services </span><span style="color: red;">*</span></label>
                              <select class="form-control font-13" style="height: 33px;" name="jobFunctionId" required>
                                <option>Please Select</option>
                                <?php foreach($jfList as $row) {?>
                                  <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                                <?php } ?>
                              </select>
                          </div>
                          </div>

                          <div class="p-l-10 w-50-p pull-left">
                          <div class="form-group">
                            <label for="username"><span class="text-white">Work Email </span><span style="color: red;">*</span></label>
                            <input type="text" class="form-control  font-13" style="height: 33px;" name="workEmail" required>
                          </div>
                          </div>

                          <div class="p-r-10 w-50-p pull-left">
                          <div class="form-group">
                            <label for="username"><span class="text-white">Business Phone </span><span style="color: red;">*</span></label>
                            <input type="text" class="form-control  font-13" style="height: 33px;" name="phoneNumber"  data-mask="(02) 9999-9999" required>
                          </div>
                          </div>

                          <div class="p-l-10 w-50-p pull-left">
                          <div class="form-group">
                            <label for="username"><span class="text-white">Postal Code </span><span style="color: red;">*</span></label>
                            <input type="text" class="form-control font-13" style="height: 33px;" name="zipCode" required>
                          </div>
                          </div>

                          <div class="form-group">
                          <label for="username"><span class="text-white">Message </span><span style="color: red;">*</span></label>
                          <textarea id="message" class="form-control font-13" name="message"
                                            data-parsley-trigger="keyup" data-parsley-minlength="20"
                                            data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                            data-parsley-validation-threshold="10"></textarea>
                        </div>
                        <div class="row">
                          <div class="col-12 col-lg-9">
                            <p class="font-13">This information will not be transferred, disclosed, or shared with a third party,
                              or used for marketing purposes.</p>
                            </div>
                            <div class="col-12 col-lg-3">
                              <button type="submit" class="btn-sm btn-blue stepy-finish pull-right"> SUBMIT </button>
                        </div>
                        </div>
                        </form>
                  </div>
                </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-6">
                  <b class="text-white">+61 452 364 793</b><br>
                  © 2018 Teamire. Catalyst in continuous improvement.
                </div>
            </div>

            <div style="border: none;" class="container-80 center-page">
              <!-- <div class="col-md-4 text-center">Lorem ipsum</div> -->
              <div class="clearfix"></div>
            </div>

            <div style="padding: 30px 0; margin-top: 0; bottom: 0; background-color: #394249; flex: 0 0 100%; max-width: 100%;">

                <p style="font-size: 40px;" class="text-center"><a href="#" class="text-white">
                  LET US BE YOUR STRENGTH
                </a></p>
            </div>
        </footer>



        <!-- End Footer -->
        <?php
          include_once($footScript);
        ?>

    </body>
</html>
