<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';

if (!$_SESSION['temp_session'])
	{
		header("Location: ../admin/");
	}
else{
	$user = $_SESSION['temp_session'];
}
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

<body>
	<div id="sticky_header">
		<a href="../home/index.php"><img src="../include/assets/images/branding.jpg" ></a>
	</div>
	<section >
		<div class="row">
			<div class="col-md-12">
				<div class="account-pages">
					<div class="login-left-box" >
						<div class="account-box" style="">
							<div class="account-logo-box">
								<h5 class="text-uppercase text-center text-white">
										<span>Hi Admin.<br>
										It seems that it is your first time to visit
										this site. We recommend you to create your own password
										before entering your home page. Thank you!
										</span><br><br>
										<div class="center-page login-label">
										Change Password
										</div>
								</h5>
								<p class="m-b-0">
									<?=$error?></p>
								</div>
								<div class="account-content">
										<form class="form-horizontal" action="process.php?action=changepassword" method="POST">
												<input type="hidden" name="username" value="<?=$user?>">
												<div class="form-group m-b-0 row">
														<div class="col-12">
															<label for="password">New Password</label>
															<input class="form-control" type="password" required="" name="password" placeholder="New Password">
														</div>
												</div>
												<div class="form-group row m-b-5">
														<div class="col-12">
															<label for="password">Confirm Password</label>
															<input class="form-control" type="password" required="" name="password2" placeholder="Confirm Password">
														</div>
												</div>
												<div class="form-group row text-center m-t-4">
														<div class="col-2 pull-left">
																<button class="btn btn-sm btn-block btn-info waves-effect waves-light" type="submit">Submit</button>
																<br>
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
 <!-- end wrapper -->
						</div>
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
