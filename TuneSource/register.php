
<html>
<head>
	<title>TuneSource</title>
	<meta charset="utf-8"></meta>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="styles/style.css">
</head>

<body style="background-color: dimgray;">
<!-- NAV Pre/HEADER -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
		<div class="container">
				<a class="navbar-brand" href="index.php">
							<!--  <img src="http://placehold.it/150x50?text=Logo" alt="">  -->
							Tune Source
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Home
										<span class="sr-only"></span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Your Cart</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" data-toggle="modal" data-target="#modalLoginForm">Sign In</a>
							</li>
					</ul>
				</div>
			</div>
	</nav>

	<div class="wrapper">
		<div class="container-form d-flex justify-content-center">
				<form action="" method="post">
						<div class="row">
								<div class="col-12">
										<div class="control-group mt-3" style="text-align: center;">
											<h1>Sign Up</h1>
											<p>Please fill in this form to create an account.</p>
										</div>

										<div class="control-group">
											<label class="control-label" for="email"><b>Email</b></label>
											<input type="text" placeholder="Enter Email" name="email" id="email" required>
										</div>

										<div class="control-group">
											<label class="control-label" for="username"><b>Your username</b></label>
											<input type="text" placeholder="Enter Username" name="username" id="username" required>
										</div>

										<div class="control-group">
											<label class="control-label" for="psw"><b>Password</b></label>
											<input type="password" placeholder="Enter Password" name="psw" id="psw" required>
										</div>

										<div class="control-group">
											<p>By creating an account you agree to our <a href="policy.html">Terms & Privacy</a>.</p>
											<button type="submit" class="registerbtn" id="reg_user">Register</button>
										</div>
								</div>
						</div>
				</form>
		</div>
	</div>


<?php
	$con= mysqli_connect('localhost','root','','tunesource');
	if ($con)
	{
		error_log("Connection succesful");
	}
	else
	{
		error_log("Connection failed");
	}
	if (isset($_POST['reg_user']))
	{
		if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']))
		{
			$email = $_POST['email'];
			$username = $_POST['username'];
			$psw = $_POST['password'];
			$check_exist_email = mysqli_master_query($con, "SELECT * FROM account WHERE email = '$email'");
			$check_exist_username = mysqli_master_query($con, "SELECT * FROM account WHERE username = '$username'");
			$username_count = mysqli_num_rows($check_exist_username);
			$email_count = mysqli_num_rows($check_exist_email);
			$row_register = mysqli_fet_array($check_exist_email, $check_exist_username);
			if ($email_count > 0 || $username_count > 0) 
			{
				echo "<script>alert('Your email or username has already existed.</script>";
			}
			else 
			{
				$run_insert = mysqli_master_query($con, "INSERT INTO account VALUES ('$email', '$username', '$psw')");
				if ($run_insert) 
				{
					echo "<script>alert('WELCOME TO TUNESOURCE')</script>";
					echo "<script>window.open('index.php','_self')</script>";
				}
			}
		}
	}
?>



<footer class="page-footer font-small bg-dark blue pt-4">
		<div class="container text-center text-md-left">
				<div class="row">
						<div class="col-md-6 mt-md-0 mt-3">
								<h5 style="color: white;">Tune Source</h5>
								<p style="color: white;">SOMETHING TO WRITE</p>
						</div>

						<hr class="clearfix w-100 d-md-none pb-3">

						<div class="col-md-3 mb-md-0 mb-3">
							<ul class="list-unstyled">
								<li>
										<a href="about.html">About us</a>
								</li>
								<li>
										<a href="#!">Contact</a>
								</li>
								<li>
										<a href="#!">Our stores</a>
								</li>
								<li>
										<a href="policy.html">Policy</a>
								</li>
							</ul>
						</div>
					<div class="col-md-3 mb-md-0 mb-3">
							<ul class="list-unstyled">
						<li>
							<p>(+49) 43 263784</p>
						</li>
						<li>
							<p>support@tunesource.com</p>
						</li>
							</ul>
				</div>
				</div>
		</div>
		<div class="footer-copyright text-center py-3" style="color: white;">
			© 2020 Copyright. TuneSource
		</div>
</footer>
</body>