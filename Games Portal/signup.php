<?php
SESSION_START();
// Include database connection file
include_once('inc/connection.inc.php');
//this checks to see if the login form has been submited
if(isset($_POST['submit']))
{		
//check to see all fields have been completed
$logName = $_POST['logName'];
$username = $_POST['username'];
$password = $_POST['password']; 

//create an SQL queary to add the comment 

$query = "INSERT INTO login (username, password, logName) VALUES ('$username', '$password', '$logName')"; 


$result = $db->query($query);
if ($result)

	echo 'user inserted into database';
	$db->close();

		
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
	
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~REGISTER~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

	
	<form class = "loginform" name="login" method="post"> <!-- this is the form to log in-->
			
			<h2> Register</h2>
			
			<label for="logName">Name</label>
			<input type= "text" name="logName" placeholder="Enter Your Name">
			<br>
			
			<label for="username">Username</label>
			<input type= "text" name="username" placeholder="Enter A Username">
			<br>
			
			<label for="password">Password</label>
			<input type= "password" name="password" placeholder="Enter A Password">
			
			
			
			<input type="submit" name="submit" value="Register">
		</form>
	

	
			
			
		
		
		</div>



	
	
</html>