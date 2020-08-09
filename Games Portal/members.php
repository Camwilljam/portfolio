<?php
SESSION_START();

//include database connection file
include_once ('inc/connection.inc.php');


$query = "SELECT* FROM articles";
	
	$result=$db -> query ($query);
	
	if(isset($_POST['submit']))
{		
$dates = $_POST['dates'];
}
	
	
	

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

		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~NAV BAR~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

		
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
	
	
	<div class="row">
		<div class="col-12 col-t-12 ">
	
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~WELCOME MESSAGE~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

		<h2>
			Welcome 
				<span class="blue">
					<?php echo $_SESSION['logName'].','?>
				</span> 
			You are a 
				<span class="blue">
					<?php echo $_SESSION['level']?>
				</span>
		</h2>
		
		
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~SEARCH FORM~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	
	
	<form class = "searchform" name="delete" method="post" action="display.php?$dates = $dates"> <!-- this is the form to log in-->
			
		
			<input type= "text" name="dates" placeholder="Enter Date">
			
			
			<input type="submit" name="submit" value="Search">
			</form>
		
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ARTICLES~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

		
<?php	
	$num = mysqli_num_rows($result);
		for ($i=0; $i < $num; $i++)
		
{
			
	$row = $result->fetch_assoc();
?>
	
			
			
			<div class="myarticle">
			
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