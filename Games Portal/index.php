<?php
SESSION_START();

//include database connection file
include_once ('inc/connection.inc.php');

$query = "SELECT* FROM articles ORDER BY artDate DESC LIMIT 4";
	
	$result=$db -> query ($query);
	
	

?>
<html>
	<head>
		<link rel="stylesheet" href="css/blog.css">
		
		<link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css?family=Nova+Flat" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css?family=Martel+Sans" rel="stylesheet">
		
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

		<title>Games Portal</title>
	</head>

	<div class="wrapperhead">

		<div class="row">
		<div class="col-12 col-t-12">

		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~NAV BAR~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

		
		<div class="nav">

				<ul>	
					<li><a href="index.php">Home</li></a>
					<li><a href="articles.php">Articles</li></a>
					<li><a href="signup.php">Sign Up</li></a>
					
				<?php if(isset($_SESSION['logged']))
				{ ?>
					<li><a href="members.php">Members</li></a>
				<? } ?>
				
				<?php if($_SESSION['level'] == "creator"){ ?>
					<li><a href="upload.php">Upload</li></a>
					<li><a href="myuploads.php">My Uploads</li></a>
				<? } ?>
				
				<?php if($_SESSION['level'] == "admin"){ ?>
					<li><a href="adminuploads.php">All Uploads</li></a>
				<? } ?>
				
				
				<?php if(isset($_SESSION['logged']))
				{ ?>
					<li><a href="logout.php">Logout</li></a>
				<? } ?>
				</ul>
				
			</div>
			
			<div class="header">

				<h1>Games <span class="blue">Portal</span></h1>

			</div>
			
		
		
		</div>
	</div>
	
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~LATEST ARTICLES~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

	<div class="row">
		<div class="col-12 col-t-12 ">

		
		<h2>Latest <span class="blue">Articles</span></h2>
		
		<p> To see more articles click the "articles page, while you're there you can log in to see exclusive content</p>
		
<?php	
	$num = mysqli_num_rows($result);
		for ($i=0; $i < $num; $i++)
		
{
			
	$row = $result->fetch_assoc();
?>
	
			
			
			<div class="articletease">
			
<?php
	echo "<h3><strong> ";
	echo $row['artName'];
	echo "</h3>";
	echo "<p><strong> Author: ";
	echo $row['artAuthor'];
	echo "</p>";
	echo "<p><strong> Date Published: ";
	echo $row ['artDate'];
	echo "</p>";
	echo "<br><br>";
	echo $row ['artBody'];
			
?>
				</div>
			</div>

<?php	
	}
?>	
			
		
		</div>



	
	
</html>