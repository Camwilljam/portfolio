<?php


//include database connection file
include_once ('inc/connection.inc.php');

$query = "select*from visits";

 
	
	$result=$db -> query ($query);
	
	$num = mysqli_num_rows($result);


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
	
		<li><a href="add_patient.php">Add Patient</li></a>
		<li><a href="find_patient.php">View Patients</li></a>
		<li><a href="view_perscription.php">View Prescription</li></a>
		<li><a href="diagnosis.php">View Diagnosis</li></a>
		<li><a class="active" href="visits.php">View Visit</li></a>
		<li><a href="search.php">Patient Search</li></a>
		<li><a href="index.php">Log Out</li></a>
	
	</ul>
	</div>
	</div>
		
		<form class = "order" name="order" method="post"  >
	
	<input type="submit" name="visitID" value="Visit ID">
	
	<input type="submit" name="doctor" value="doctor">
	
	<input type="submit" name="visit" value="Visit Date">
	
	</form>
		
			<section id="main-content">
		<?php	
	$num = mysqli_num_rows($result);
		for ($i=0; $i < $num; $i++)
		
{
			
	$row = $result->fetch_assoc();
?>

	
	<section class="patrecord">
<?php
	echo "<p><strong>Visit ID: ";
	echo "<br>";
	echo $row['visitID'];
	echo "<p>";
	
	
	echo "<p><strong> Patient: ";
	echo "<br>";
	echo $row['patID'];
	echo "</p>";
	
	
	echo "<p><strong> Doctor: ";
	echo "<br>";
	echo $row ['docID'];
	echo "</p>";
	
	echo "<p><strong> Visit Date: ";
	echo "<br>";
	echo $row ['visitDate'];
	echo "</p>";
	
?>
</section>
	<?php
	
	}
	?>
		
		

			
				
			

	</body>
</html>
