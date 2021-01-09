<html>
<head>
	<title>Admin</title>
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
	<div class="form_box">

	 <form action="" method="post" enctype="multipart/form-data">
	   
	   <table align="center" width="100%">
	     
		 <tr>
		   <td colspan="7">
		   <h2>Add Song</h2>
		   <div class="border_bottom"></div><!--/.border_bottom -->
		   </td>
		 </tr>
		 
		 <tr>
		   <td><b>Song Title:</b></td>
		   <td><input type="text" name="song_title" size="60" required/></td>
		 </tr>
		 
		 <tr>
		   <td><b>Genre:</b></td>
		   <td>
		    <select name="genre">
			  <option>Select a Category</option>
			  
			  <?php 
			  $get_genre ="select * from genre";
		
		$run_genre = mysqli_query($con, $get_genre);
		
		while($row_genre=mysqli_fetch_array($run_genre)){
		    $genre_id = $row_genre['genre_id'];
			
			$genre_name = $row_genre['genre_name'];
			
			echo "<option value='$genre_id'>$genre_name</option>";
		}
			  ?>
			</select>
		   </td>
		   
		 </tr>
		
        <tr>
		  <td><b>Song Image: </b></td>
		  <td><input type="file" name="song_image" /></td>
		</tr>
		
		<tr>
		  <td><b>Song File: </b></td>
		  <td><input type="file" name="song_file" /></td>
		</tr>

		<tr>
		   <td valign="top"><b>Lyrics:</b></td>
		   <td><textarea name="song_desc"  rows="10"></textarea></td>
		</tr>
		
		
		<tr>
		  <td><b>Product Keywords: </b></td>
		  <td><input type="text" name="keyword" required/></td>
		</tr>
		
		<tr>
		   <td></td>
		   <td colspan="7"><input type="submit" name="insert_post" value="Add Song"/></td>
		</tr>
	   </table>
	   
	 </form>
	 
  </div><!-- /.form_box -->

<?php 

if(isset($_POST['insert_post'])){
   $song_title = $_POST['song_name'];
   $genre_name = $_POST['genre_name'];
   $song_image = $_POST['song_image'];
   $song_file = $_POST['song_file'];
   $song_desc = trim(mysqli_real_escape_string($con,$_POST['song_desc']));
   $keyword = $_POST['keyword']; 
   
   
   // Getting the image from the field
   $song_image  = $_FILES['song_image']['name'];
   $song_image_tmp = $_FILES['song_image']['tmp_name'];
   $song_file = $_FILES['song_file']['file'];
   $song_file_tmp = $_FILES['song_file_tmp']['tmp_file'];
   
   move_uploaded_file($song_image_tmp,"images/$song_image");
   move_uploaded_file($song_file_tmpm, "sounds/$song_file");
   
   $add_song = " insert into song (genre_id,song_name,product_desc,song_image,keyword) 
   values ('$genre_id','$song_name','$song_desc','$song_image','$keyword') ";

   $insert_song = mysqli_query($con, $add_song);
   
   if($insert_song){
    echo "<script>alert('New song has been added!')</script>";
	
	//echo "<script>window.open('index.php?insert_product','_self')</script>";
   }
   
   }
?>

</body>