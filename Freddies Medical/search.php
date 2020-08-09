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

$query = "SELECT * FROM patients WHERE patient '%username%'"; 


$result = $db->query($query);
if ($result)

	echo 'user inserted into database';
	$db->close();
}

?>
<html>

	<head>
		<title>Search</title>
		<link rel="stylesheet" href="css/med.css">
	</head>
	
	<body>
		
		<div class ="header">
		<h2>Freddies Medical</h2>

	<div class="nav">
	
	<ul>
	
		<li><a href="add_patient.php">Add Patient</li></a>
		<li><a href="find_patient.php">View Patients</li></a>
		<li><a href="view_perscription.php">View Prescription</li></a>
		<li><a href="diagnosis.php">View Diagnosis</li></a>
		<li><a href="visits.php">View Visit</li></a>
		<li><a class="active" href="search.php">Patient Search</li></a>
		<li><a href="index.php">Log Out</li></a>
	
	</ul>
	</div>
	</div>
		
		
		
		<section id="main-content">
			<div class="container">
				
				
					
			
			<form id="search" class = "add_patient" name="search" method="post" action="search.php?$username = $username">
			<h1> Search</h1>
			
			<div class="namebox">
			
			<input type= "text" name="search" placeholder="Seach for patients "> 

			<br>
			<input type="submit" name="submit" value="submit">
			
			</div>
			
			
			
  

				</section>
				
			</div>
		</section>

	</body>
</html>
