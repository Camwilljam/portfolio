<?php
// Include database connection file
include_once('inc/connection.inc.php');
//this checks to see if the login form has been submited
if(isset($_POST['submit']))
{		
$username = $_POST['username'];
$password = $_POST['password'];
	
$query= "SELECT username, password FROM loginstaff WHERE username = '$username' AND password = '$password'";
	
$result =$db -> query($query);
	
if ($result -> num_rows >0)
{
	header('location: add_patient.php'); //this is the redirection for the log in page that only works if the details are correct
}
	
else
{
	
 echo "username or password is incorrect"; // this is what displays when the details are incorrect
	
}

		
}
?>
	<html>
	<head>
	
	
	<title> Log In </title>
	
	<link rel="stylesheet" type="text/css" href="css/med.css"> 
	
	<link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
	
	</head>

	<div class ="loginbody">
	
	<div class="loginbox">
	
		<form class = "loginform" name="login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!-- this is the form to log in-->
			
			<h1> Log in</h1>
			
			<label for="username">Username</label>
			<input type= "text" name="username" placeholder="Enter Username"> 
			
			<label for="password">Password</label>
			<input type= "password" name="password" placeholder="Enter Password">
			
			<input type="submit" name="submit" value="Log in">
		</form>
		
		
		
	</div>
	
	</div>






</html>