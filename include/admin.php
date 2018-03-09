<?php
 session_start();
 if(!isset($_SESSION["user_session"]))
 {
   	header('Location: ../user/');
  }
  else{
    $obj = new Admin;
    $profile = $obj->readOne($_SESSION["user_session"]);
  }
 ?>
 Dashboard
 <!DOCTYPE html>
 <html>
     <head>
         <?php include_once($headScript);?>
     </head>
     <body>
         <!-- Navigation Bar-->
         <header id="topnav">
             <div class="topbar-main">
                 <div class="container">
                     <!-- Logo container-->
                     <div class="logo">
                         <!-- Text Logo -->
                         <!--<a href="index.html" class="logo">-->
                         <!--Adminox-->
                         <!--</a>-->
                         <!-- Image Logo -->
                         <a href="../home" class="logo">
                           Teamire
                         </a>
                     </div>
                     <!-- End Logo container-->
                     <div class="menu-extras topbar-custom">
                         <?php include_once("mainToolBar.php");?>
                     </div>
                     <!-- end menu-extras -->
                     <div class="clearfix"></div>
                 </div> <!-- end container -->
             </div>
             <!-- end topbar-main -->
             <div class="navbar-custom">
                 <div class="container">
                     <?php
                     if ($profile->level=="company")
                     {
                       include 'navigationAdmin.php';
                     }
                     else{
                       include 'navigation.php';
                     }
                     ?>
                 </div> <!-- end container -->
             </div> <!-- end navbar-custom -->
         </header>
         <!-- End Navigation Bar-->
         <div class="wrapper">
             <div class="container">
               <br>
               <?php
                 include $content;
               ?>
             </div> <!-- end container -->
         </div>
         <!-- end wrapper -->
         <!-- Footer -->
         <footer class="footer">
             <div class="container">
                 <div class="row">
                     <div class="col-12 text-center">
                         2018 © Hyndrance - hyndrance.com
                     </div>
                 </div>
             </div>
         </footer>
         <!-- End Footer -->
         <?php
           include_once($footScript);
         ?>
     </body>
 </html>
