<!DOCTYPE html>
<html>
    <head>
        <?php include_once($headScript);?>
    </head>
    <body>
        <!-- Navigation Bar-->
        <header id="topnav">
              <?php
                include 'navVisitor.php';
              ?>
              <div class="clearfix"></div>
            <!-- end topbar-main -->

        </header>
        <!-- End Navigation Bar-->
        <div class="wrapper">

              <?php
                include $content;
              ?>

        </div>
        <!-- end wrapper -->
        <!-- Footer -->
        <footer style="padding: 0; padding-left: 0 !important; color: #FFFFFF; background-color: #4A555C;">
            <div class="container-fluid m-b-30 " style="padding: 30px 60px 45px 45px; color: #FFFFFF; background-color: #4a555c; bottom: 0;">
                <div class="row center-page container">
                  <div class="container-fluid col-12 col-lg-3">
                    <h4 class="text-white">ABOUT US</h4>
                    <p><a style="color: white;" href="../home/?view=aboutUs#howWeDoThis">How we do this</a></p>
                    <p><a style="color: white;" href="../home/?view=aboutUs#ourVision">Our Vision</a></p>
                    <p><a style="color: white;" href="../home/?view=aboutUs#ourObjectives">Our Objectives</a></p>
                    <p><a style="color: white;" href="../home/?view=logins">Timesheets</a></p>
                    <p><a style="color: white;" href="../home/?view=contactUs">Contact Us</a></p>
                  </div>
                  <div class="container-fluid col-12 col-lg-3">
                    <h4 class="text-white">RESOURCES</h4>
                    <p><a style="color: white;" href="../home/?view=services">Our Services</a></p>
                    <p><a style="color: white;" href="../home/?view=projects">Projects</a></p>
                  </div>
                  <div class="container-fluid col-12 col-lg-3">
                    <h4 class="text-white">LEGAL</h4>
                    <p>Fraud Alert</p>
                    <p>Privacy Policy</p>
                    <p>Terms of Use</p>
                    <p>Government Notice</p>
                  </div>
                  <div class="container-fluid col-12 col-lg-3">
                    <!-- <h4 class="text-white">FOLLOW US</h4>
                    <i class="fa fa-facebook-square fa-2x"></i>&nbsp;&nbsp;<span>Facebook</span><br><br>
                    <i class="fa fa-linkedin-square fa-2x"></i>&nbsp;&nbsp;<span>LinkedIn</span><br><br>
                    <i class="fa fa-twitter-square fa-2x"></i>&nbsp;&nbsp;<span>Twitter</span><br><br>
                    <i class="fa fa-youtube-square fa-2x"></i>&nbsp;&nbsp;<span>Youtube</span><br><br>
                    <i class="fa fa-instagram fa-2x"></i>&nbsp;&nbsp;<span>Instagram</span> -->
                  </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div style="border: none;" class="container-80 center-page">
              <div class="col-md-8"><h4 class="text-white">+61452 364 793</h4>
              <p>© 2018 <a style="color:white;" href="../home/">Teamire</a>. Catalyst in Continuous Improvement</p></div>
              <!-- <div class="col-md-4 text-center">Lorem ipsum</div> -->
              <div class="clearfix"></div>
            </div>

            <div style="padding: 30px 0; margin-top: 0; bottom: 0; background-color: #394249; flex: 0 0 100%; max-width: 100%;">
                <p style="font-size: 40px;" class="text-center"><a href="#" class="text-white">
                  IT'S TIME WE ALL WORK HAPPY.
                </a></p>
            </div>
        </footer>
        <!-- End Footer -->
        <?php
          include_once($footScript);
        ?>
    </body>
</html>
