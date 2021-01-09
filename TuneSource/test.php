<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<meta charset="utf-8"></meta>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="wrapper">
	<div class="container-sm" id="Content">
		<div class="row">
			<div class="col-md-12">
				<ul class='list-group-flush'>						
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
					 	$pro_cat = $row_pro['genre_id'];
					 	$pro_title = $row_pro['song_name'];
				// 	$pro_price = $row_pro['song_price']; //
				 		$pro_image = $row_pro['song_image'];
						$product_file = $row_pro['song_file'];
					  

						echo "
							<li class='list-group-item'>
								<div class='row border-bottom'>
									<img src='images/$pro_image' width='60' height='60' />
									<div class='col-4'>
										<h6 class='card-title'>$pro_title</h6>
									</div>
									<div class='col-6'>
										<audio style='width: 100%' id='audio_1' control preload='none'>
											<source src='sounds/$product_file' />
										</audio>
									</div>
									<div class='col-sm-1'>
										<a href='index.php?add_cart=$pro_id'>
									  		<button class='btn btn-danger mt-4 style='float: right'><span class='glyphicon glyphicon-shopping-cart'></span></button>
										</a>
									</div>
								</div>
							</li>
									";
					
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