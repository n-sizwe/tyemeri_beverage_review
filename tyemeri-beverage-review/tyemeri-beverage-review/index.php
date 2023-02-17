<?php 
include 'Connection.php';
session_start();
$page = "";
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
	   <!-- FontAwesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>MovieIt</title>
</head>
<body  style="background-color: #202020;">
<!-- =====================Header section=============================== -->
	
	<div class="container-fluid " >
		<div class="row" style="background-color:black;">
			<div class="container">
				<div class="row">
						<h1 class="titleHead"style="padding-right:30px;color: #CC0066;font-style: italic; font-family: serif;font-weight: bold;margin-right: 80px;">BevReviews</h1>
					<form method="post">
						<input class="search-input" type="text" name="headerSearch" placeholder="Search..">	
					</form>
					<div class="topnav" id="myTopnav">
							
							<a href="index.php" class="active" style="margin-left: 15px;">Home</a>
							<a href="BrowseMovies.php?page =one" style="margin-left: 15px;" >Browse Beverages</a>
							
							<?php
								
								
									if (($_SESSION['isUser'])== TRUE)
									{
										echo '<a href="UserProfile.php" style="margin-left: 15px;" ><i class="fa fa-user" aria-hidden="true"></i>UserProfile</a>';
									    echo '<a href="Signout.php" style="margin-left: 5px;" ><i class="fas fa-sign-out-alt" style="color:white;"></i></a>';
									}
									else
									{
										echo '<a href="SignIn.php" style="margin-left: 20px;" >Sign In</a>';
									
									}
							?>
							<a href="ContactUs.php" style="margin-left: 10px;" >Contact Us</a>
							<a href="javascript:void(0);" class="icon" onclick="myFunction()">
    						<i class="fa fa-bars"></i></a>
					    </div>
				</div>
			
			</div>
		</div>
	</div>

	<script>
		function myFunction() {
		  var x = document.getElementById("myTopnav");
		  if (x.className === "topnav") {
		    x.className += " responsive";
		  } else {
		    x.className = "topnav";
		  }
		}
		$(document).ready(function() {
  jQuery.fn.carousel.Constructor.TRANSITION_DURATION = 1000 // 2 seconds
});
	</script>


<!-- =====================Carousel section=============================== -->

<!-- =====================Popular section=============================== -->
<div class="row" style="background-color: black;">
	<div>
		<h5 class="popular">Popular Reviews</h5>
	</div>
</div>



<!-- =====================Movie grid view section=============================== -->
<div class="container">
	<div class="row" style="margin-left: 70px;">
	<?php  
		$movie_query = "SELECT * FROM movieinfo WHERE rating >=4  LIMIT 6 ";
		if(isset($_POST['headerSearch'])){
			$headSearch = $_POST['headerSearch'];
			$movie_query = "SELECT * FROM movieinfo WHERE movieName LIKE '%".$headSearch."%'";
	
		}
	    $result = mysqli_query($link,$movie_query);
	while($row = mysqli_fetch_array($result)) 
		{   
		?>
		<div class='browse-movies col-md-4 mt-5 p-4'>
			<?php /*<form  action ="ViewDetails.php" method="post"> */ ?>
				<?php echo '<img class="img-responsive" src="data:image/jpeg;base64,'.base64_encode( $row['poster'] ).'"width = "200" height = "305"/>'; ?>
				<content>
					<span class="iconStar"></span>
					<input type="hidden" name="hidden_id" value="<?php echo $row['movieId'];?>"/>
					<input type="hidden" name="hiddenName" value="<?php echo $row['movieName'];?>"/>
					
					<h4 class="rating"><?php echo $row['rating'];  ?></h4>
					<h4 class ="genre"><?php echo $row['genre'];  ?></h4>

					<input type="submit" name="ViewDetails" class="gridButton" onclick="window.location.href = 'ViewDetails.php?movieId=<?php echo $row['movieId']; ?>';" value="Learn More">

				</content>
					<div>
						<h6 class="movieName"><?php echo $row['movieName'];?></h6>
						<h7 class="movieYear"><?php echo $row['year'];  ?></h7>
					</div>
			<?php /*</form> */?>
		</div>
		<?php	
		}	?>
	</div> 
</div>	
		
	</div> 
</div>
<!-- =====================footer section=============================== -->
<footer class="foot">
	<div class="row">
		<h6 class=" mb-0 col-12 text-center p-4 "> &copy <a href="index.html">BevReviews by Teresa Tyemeri</h6>							
	</div>
</footer>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
