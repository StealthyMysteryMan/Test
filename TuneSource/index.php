
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
<!-- NAV -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
		<div class="container">
    		<a class="navbar-brand" href="index.php">
          		Tune Source
        </a>
        <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="What are you interested in today?" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
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

	<!-- LOGIN FORM CODE -->
	<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  		aria-hidden="true">
  		<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header text-center">
	        		<h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
		        <div class="modal-body mx-3">
		        	<div class="md-form mb-5">
			          	<i class="fas fa-envelope prefix grey-text"></i>
			          	<input type="email" id="email" class="form-control validate">
			          	<label data-error="wrong" data-success="right" for="email">Email address</label>
			        </div>

		        	<div class="md-form mb-4">
			          	<i class="fas fa-lock prefix grey-text"></i>
			         		<input type="password" id="psw" class="form-control validate">
			          	<label data-error="wrong" data-success="right" for="psw">Password</label>
		        	</div>

		        	<div class="md-form mb-3">
		        		<a href="register.php">Haven't got an account? SIGN UP NOW</a>
		        	</div>
		      	</div>
		      	<div class="modal-footer d-flex justify-content-center">
					<button class="btn btn-danger" id="login_user">Login</button>
		      	</div>
	    	</div>
  		</div>
	</div>

<?php
	$con = mysqli_connect('localhost', 'root', '','tunesource');
	if ($con)
	{
		error_log("Connection succesful");
	}
	else
	{
		error_log("Connection failed");
	}
	if (isset($_POST['login_user'])) 
	{
		$email = $_POST['email'];
		$psw = $_POST['password'];
		$result = mysqli_query($con, "SELECT * FROM account WHERE email='$email; AND password='$psw'");
		$check_login = mysqli_num_rows($result);
		$row_login = mysqli_fetch_array($result);
		if($check_login == 0)
		{
			echo "<script>alert('Email or password is incorrect, please try again.')</script>";
			exit();
		}
		if ($check_login > 0)
		{
			echo "<script>alert('WELCOME BACK user')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
?>

	<!-- SIGN UP FORM CODE -->
<!--	<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header text-center">
			        <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        <span aria-hidden="true">&times;</span>
			        </button>
      			</div>
      			<div class="modal-body mx-3">
        			<div class="md-form mb-5">
			          	<i class="fas fa-user prefix grey-text"></i>
			          	<input type="text" id="orangeForm-name" class="form-control validate">
			          	<label data-error="wrong" data-success="right" for="orangeForm-username">Your username</label>
			        </div>

        			<div class="md-form mb-5">
		          		<i class="fas fa-envelope prefix grey-text"></i>
		          		<input type="email" id="orangeForm-email" class="form-control validate">
		          		<label data-error="wrong" data-success="right" for="orangeForm-email">	Your email address</label>
		        	</div>

        			<div class="md-form mb-5">
			          	<i class="fas fa-lock prefix grey-text"></i>
			          	<input type="password" id="orangeForm-pass" class="form-control validate">
			          	<label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
			        </div>

      			</div>
      			<div class="modal-footer d-flex justify-content-center">
        			<button class="btn btn-deep-orange">Sign up</button>
      			</div>
    		</div>
  		</div>
	</div>
-->
	<!-- CAROUSEL -->

	<div id="carouselExampleIndicators" class="carousel slide mt-0" data-ride="carousel">
		<div class="container">
			<div class="row">
				<ol class="carousel-indicators">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner">
				    <div class="carousel-item active">
				      	<img class="d-block w-100" src="images/classicbanner.jpg" alt="First slide">
				    </div>
				    <div class="carousel-item">
				      	<img class="d-block w-100" src="images/rockbanner.jpg" alt="Second slide">
				    </div>
				    <div class="carousel-item">
				      	<img class="d-block w-100" src="images/countrybanner.jpg" alt="Third slide">
				    </div>
				    <div class="carousel-item">
				      	<img class="d-block w-100" src="images/folkbanner.jpg" alt="Fourth slide">
				    </div>
				
				  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  	</a>
				  	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  	</a>
				  </div>
			</div>
		</div>
	</div>

	<br>
	<br>
	<br>
<!-- YOU MAY LIKE -->
	<div class="container">
		<h3 style="text-align: center;"><b>Song for you</b></h3>
		<br>
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
					$get_pro = " select * from song order by RAND() LIMIT 1";
		
					$run_pro = mysqli_query($con, $get_pro);
		
					while($row_pro = mysqli_fetch_array($run_pro))
					{
					  	$pro_id = $row_pro['song_id'];
					  	$pro_title = $row_pro['song_name'];
					// 	$pro_price = $row_pro['song_price']; //
					 	$pro_image = $row_pro['song_image'];
						$product_file = $row_pro['song_file'];
						echo
						"
					    <div class='row'>
						    <div class='col-xl-12'>
						    	<div class='row'>
						    		<div class='col-xl-12'
											<img class='spin' src='images/$pro_image' width='70' height='70' />
											<h5>$pro_title</h5>
											<audio class='mt-2' style='width: 100%' id='audio_1' controls='autoplay' loop>
												<source src='sounds/$product_file'/>
											</audio>
										</div>
									</div>
								</div>
							</div>
						";
						}
?>
	</div>
	<br>
	<br>
	<br>
<!-- GENRES
	<div>
		<button type="button" class="btn"><a href="#CLASSIC">Classic Jazz</a></button>
		<button type="button" class="btn"><a href="#ROCK">Rock</a></button>
		<button type="button" class="btn"><a href="#Country">Country</a></button>
		<button type="button" class="btn"><a href="#FOLK">Folk</a></button>
	</div>
     NAV OG
	<div class="row">
		<ul class="nav">
			<li class="nav-item">
				<a href="#classic-jazz" class="nav-link">Classic Jazz</a>
			</li>
			<li class="nav-item">
				<a href="#rock" class="nav-link">Rock</a>
			</li>
			<li class="nav-item">
				<a href="#country" class="nav-link">Country</a>
			</li>
			<li class="nav-item">
				<a href="#folk" class="nav-link">Folk</a>
			</li>
		</ul>
	</div>
-->

<div class="wrapper">
	<div class="container">
		<div class="row">
			<h3>TOP DOWNLOADED SONGS</h3>
			<div class="col-xl-12">
				<ul class="list-group-flush">
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
					$get_pro = " select * from song order by RAND() LIMIT 0,6";
		
					$run_pro = mysqli_query($con, $get_pro);
		
					while($row_pro = mysqli_fetch_array($run_pro))
					{
					  	$pro_id = $row_pro['song_id'];
					  	$pro_title = $row_pro['song_name'];
					// 	$pro_price = $row_pro['song_price']; //
					 	$pro_image = $row_pro['song_image'];
						$product_file = $row_pro['song_file'];
					  
					echo "
							<li class='list-group-item'  style='background: dimgray;'>
								<div class='row border-bottom'>
									<img src='images/$pro_image' width='60' height='60' />
									<div class='col-xl-4'>
										<h6 class='card-title'>$pro_title</h6>
									</div>
									<div class='col-xl-6'>
										<audio control preload='none'>
											<source src='sounds/$product_file' />
										</audio>
									</div>
									<div class='col-xl-1'>
										<a href='index.php?add_cart=$pro_id'>
									  		<button class='btn btn-danger mt-4 style='float: right'><span class='glyphicon glyphicon-shopping-cart'></span></button>
										</a>
									</div>
								</div>
							</li>
									"



					/*
							"
					    <div class='col-md-4 col-sm-6 col-xs-12'>
								<h5>$pro_title</h5>
								<img src='images/$pro_image' width='100' height='100' />
								<audio class='mt-2' style='width: 100%' id='audio_1' controls preload='none'>
									<source src='sounds/$product_file'/>
								</audio>

								<a href='index.php?add_cart=$pro_id'>
					  			<button class='btn btn-danger mt-2 mb-3' style='float:right'><span class='glyphicon glyphicon-shopping-cart'></span></button>
								</a>
							</div>
							"
					*/
					;
					}
				?>
				</ul>
			</div>
		</div>
	</div>
</div>



<footer class="page-footer font-small bg-dark blue pt-4">
  	<div class="container text-center text-md-left">
    	<div class="row">
	    	<div class="col-md-6 mt-md-0 mt-3">
	        	<h5 style="color: white;">Tune Source</h5>
	        	<p style="color: white;">LISTEN TO THE PAST</p>
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