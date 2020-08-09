<?php
SESSION_START();

//include database connection file
include_once ('inc/connection.inc.php');


$query = "SELECT* FROM articles";
	
	$result=$db -> query ($query);
	
if(isset($_POST['submit']))
{		
$username = $_POST['username'];
$password = $_POST['password'];

	
$query= "SELECT logID, username, password, level, logName FROM login WHERE username = '$username' AND password = '$password'";
	
$result =$db -> query($query);
	
	$row = $result->fetch_assoc();

	if ($result -> num_rows >0)
{
	$_SESSION ['logged'] = 1;
	$_SESSION ['username'] = $row['username'];
	$_SESSION ['level'] = $row['level'];
	$_SESSION ['logName'] = $row['logName'];
	$_SESSION ['logID'] = $row['logID'];
	
	header('location: members.php'); //this is the redirection for the log in page that only works if the details are correct
}

else
{
	
 echo "username or password is incorrect"; // this is what displays when the details are incorrect
	
}

		
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
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~LOG IN FORM~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	
	
	<form class = "loginform" name="login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!-- this is the form to log in-->
			
			<h2> Log in</h2>
			
			<label for="username">Username</label>
			<input type= "text" name="username" placeholder="Enter Username">
			<br>
			
			<label for="password">Password</label>
			<input type= "password" name="password" placeholder="Enter Password">
			
			<input type="submit" name="submit" value="Log in">
		</form>
		
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ARTICLES~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

	
	<div class="row">
		<div class="col-12 col-t-12 ">

		
		<h2>All <span class="blue">Articles</span></h2>
		<p> To see the articles you must log in or create an account</p>
		
<?php	
	$num = mysqli_num_rows($result);
		for ($i=0; $i < $num; $i++)
		
{
			
	$row = $result->fetch_assoc();
?>
	
			
			
			<div class="article">
			
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
			
?>
				</div>
			</div>

<?php	
	}
?>	
			
		
		</div>



	
	
</html>