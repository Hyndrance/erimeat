<?php
if(!$currentSession)
{
		header('Location: index.php?view=login');
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include $headScript; ?>
    </head>

    <body style="height: auto;">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.php" class="logo">
                        <span>
                            <img src="../include/assets/images/teamire-header.png" alt="" height="60">
                        </span>
                        <i>
                            <img src="../include/assets/images/teamire-small.png" alt="" height="28">
                        </i>
                    </a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container-100">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left nav-menu-left">
                            <li>
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="dripicons-menu" style="color: #205e7d;"></i>
                                </button>
                            </li>


                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <!-- <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="dripicons-bell" style="color: #71777f;"></i>
                                    <span class="badge badge-pink">4</span>
                                </a> -->

                                <ul class="dropdown-menu dropdown-menu-right dropdown-lg user-list notify-list">
                                    <li class="list-group notification-list m-b-0">
                                        <div class="slimscroll">
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="media-left p-r-10">
                                                        <em class="fa fa-diamond bg-primary"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading text-primary">A new order has been placed A new order has been placed</h5>
                                                        <p class="m-0">
                                                            There are new settings available
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="media-left p-r-10">
                                                        <em class="fa fa-cog bg-warning"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading text-warning">New settings</h5>
                                                        <p class="m-0">
                                                            There are new settings available
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="media-left p-r-10">
                                                        <em class="fa fa-bell-o bg-custom"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading text-custom">Updates</h5>
                                                        <p class="m-0">
                                                            There are <span class="text-primary font-600">2</span> new updates available
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="media-left p-r-10">
                                                        <em class="fa fa-user-plus bg-danger"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading text-danger">New user registered</h5>
                                                        <p class="m-0">
                                                            You have 10 unread messages
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="media-left p-r-10">
                                                        <em class="fa fa-diamond bg-primary"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading text-primary">A new order has been placed A new order has been placed</h5>
                                                        <p class="m-0">
                                                            There are new settings available
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="media-left p-r-10">
                                                        <em class="fa fa-cog bg-warning"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading text-warning">New settings</h5>
                                                        <p class="m-0">
                                                            There are new settings available
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <!-- end notification list -->
                                </ul>
                            </li>

                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <div class="img-circle user-img"><i class="fa fa-user-circle fa-2x text-center"></i></div>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li><a href="javascript:void(0)">Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="process.php?action=logout">Logout</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                          <?php include $navigation;?>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
          <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                               <?php include $content;?>
                        </div>




                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © Teamire
                </footer>

            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
        <!-- END wrapper -->

        <?php include $footScript; ?>
    </body>
</html>
