<?php


//include database connection file
include_once ('inc/connection.inc.php');

//check to see if the form has been submitted 
if (isset($_POST['submit']))
	
	{
//check to see all fields have been completed
$name = $_POST['name'];
$birth = $_POST ['birth'];
$phoneNum = $_POST ['phoneNum'];
$address = $_POST ['address'];
$docID = $_POST ['docID'];

//create an SQL queary to add the comment 

$query = "INSERT INTO patients (name, birth, phoneNum, address, docID) VALUES ('$name', '$birth', '$phoneNum', '$address', '$docID')"; 


$result = $db->query($query);
if ($result)

	echo 'user inserted into database';
	$db->close();
}

?>
<html>

	<head>
		<title>Add Patient</title>
		<link rel="stylesheet" href="css/med.css">
	</head>
	
	<body>
		
		<div class ="header">
		<h2>Freddies Medical</h2>

	<div class="nav">
	
	<ul>
	
		<li><a class="active" href="add_patient.php">Add Patient</li></a>
		<li><a href="find_patient.php">View Patients</li></a>
		<li><a href="view_perscription.php">View Prescription</li></a>
		<li><a href="diagnosis.php">View Diagnosis</li></a>
		<li><a href="visits.php">View Visit</li></a>
		<li><a href="search.php">Patient Search</li></a>
		<li><a href="index.php">Log Out</li></a>
	
	</ul>
	</div>
	</div>
		
		
		
		<section id="main-content">
			<div class="container">
				
				
					
			
			<form class = "add_patient" name="add_patient" method="post"  >
			
			<h1> Add Patient</h1>
			
			<div class="namebox">
			<p><label for="name">Name</label></p>
			
			<input type= "text" name="name" placeholder="Name"> 	
			
			</div>
			
			<div class="namebox">
			
			<label for="birth">D.O.B </label>
			<br>
			<input type= "date" name="birth" placeholder="YYYY/MM/DD">
			<br>
			
			</div>
			
			<div class="namebox">
			
			<label for="phoneNum">Addresses</label>
			
			<input type="text" name="phoneNum" placeholder="phone number">
			
			<input type="text" name="address" placeholder="address">
			
			</div>
			
			<div class="namebox">
			
			<label for="docID">Doctor ID </label>
				<br>
				<input type= "text" name="docID" placeholder="00">
				<br>
			</div>
				<br>			
				<input type="submit" name="submit" value="submit">



 </form>
  

				</section>
				
			</div>
		</section>

	</body>
</html>
