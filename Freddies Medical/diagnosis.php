<?php


//include database connection file
include_once ('inc/connection.inc.php');

$query = "select*from diagnosis";

 
	
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
		<li><a class="active" href="diagnosis.php">View Diagnosis</li></a>
		<li><a href="visits.php">View Visit</li></a>
		<li><a href="search.php">Patient Search</li></a>
		<li><a href="index.php">Log Out</li></a>
	
	</ul>
	</div>
	</div>
	
	<form class = "order" name="order" method="post"  >
	
	<input type="submit" name="diagID" value="diagnosis ID">
	
	<input type="submit" name="patient" value="patient">
	
	<input type="submit" name="date" value="date">
	
	<input type="submit" name="conditions" value="conditions">
	
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
	echo "<p><strong>Diagnosis ID: ";
	echo "<br>";
	echo $row['diagID'];
	echo "<p>";
	
	
	echo "<p><strong> patient ID: ";
	echo "<br>";
	echo $row['patID'];
	echo "</p>";
	
	
	echo "<p><strong> date of diagnosis: ";
	echo "<br>";
	echo $row ['diagdate'];
	echo "</p>";
	
	echo "<p><strong> conditions: ";
	echo "<br>";
	echo $row ['conditions'];
	echo "</p>";
	
?>
</section>
	<?php
	
	}
	?>
		
		

			
				
			

	</body>
</html>
