<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Teamire - Catalyst in Continuous Improvement</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Catalyst in Continuous Improvement" name="description" />
        <meta content="Teamire" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../include/assets/images/favicon.ico">

        <!-- App css -->
        <link href="../include/../include/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../include/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../include/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../include/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="../include/assets/js/modernizr.min.js"></script>

    </head>




    <body >
    <div id="sticky_header">
  <a href="../home/index.php"><img src="../include/assets/images/branding.jpg" ></a>


      </div>
        <!-- HOME -->

        <section >
          <div class="p-l-20 m-t-30">
            <a href="../home/index.php"><i class="mdi mdi-home"></i> Go To Homepage</a>
          </div>
                <div class="row">
                    <div class="col-md-12">



                            <div class="account-pages">
                              <div class="login-left-box" >
                                <div class="account-box" style="">
                                    <div class="account-logo-box">
                                      <h5 class="text-uppercase text-center text-white">
                                            Enter your login information to access our Time Reporting and Approval System<br><br>
                                            <div class="center-page login-label">
                                            Payroll Login
                                            </div>
                                      </h5>
                                        <p class="m-b-0">
                                                                                <?=$error?></p>
                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" action="process.php?action=login" method="POST">

                                            <div class="form-group m-b-0 row">
                                                <div class="col-12 m-b-15">
                                                    <label for="emailaddress">Username</label>
                                                    <input class="form-control" type="text" id="emailaddress" name="username" required="" placeholder="">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-5">
                                                <div class="col-12">
                                                    <label for="password" >Password</label>
                                                    <input class="form-control" type="password" required="" id="password" name="password" placeholder="">
                                                </div>
                                            </div>
                                             <div class="form-group row m-t-20 clearfix">
                                               <div class="col-md-8">
                                               </div>
                                               <div class="col-md-4 pull-right">
                                                 <button class="btn btn-sm btn-block btn-warning waves-effect waves-light" type="submit">SIGN IN</button>
                                               </div>
                                             </div>
                                        </form>




                                    </div>


                                </div>


                                         <footer class="footer-default">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12 text-left">
                                                    <br>
                                                    <a href="">Terms of user</a> | <a href="">Privacy Policy</a> | <a href=""> Customer Service</a> <br>
                                                        2018 © Teamire All Rights Reserved
                                                    </div>
                                                </div>
                                            </div>
                                        </footer>

                              </div>



                        <!-- end wrapper -->

                    </div>


                </div>

            </div>

          </section>









        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="../include/assets/js/jquery.min.js"></script>
        <script src="../include/assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="../include/assets/js/bootstrap.min.js"></script>
        <script src="../include/assets/js/metisMenu.min.js"></script>
        <script src="../include/assets/js/waves.js"></script>
        <script src="../include/assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="../include/assets/js/jquery.core.js"></script>
        <script src="../include/assets/js/jquery.app.js"></script>

    </body>
</html>
