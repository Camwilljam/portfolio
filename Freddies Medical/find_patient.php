<html>
<?php


//include database connection file
include_once ('inc/connection.inc.php');

$query = "SELECT*FROM patients";
	
	$result=$db -> query ($query);
	
	

?>


	<head>
		<title>View Patient</title>
		<link rel="stylesheet" href="css/med.css">
		
		
		
	</head>
	<body>
		
		
		
		<div class ="header">
		<h2>Freddies Medical</h2>

	<div class="nav">
	
	<ul>
	
		<li><a href="add_patient.php">Add Patient</li></a>
		<li><a class="active" href="find_patient.php">View Patients</li></a>
		<li><a href="view_perscription.php">View Prescription</li></a>
		<li><a href="diagnosis.php">View Diagnosis</li></a>
		<li><a href="visits.php">View Visit</li></a>
		<li><a href="search.php">Patient Search</li></a>
		<li><a href="index.php">Log Out</li></a>
	
	</ul>
	</div>
	</div>

			<form class = "order" name="order" method="post"  >
	
	<input type="submit" name="patient num" value="patient ID">
	
	<input type="submit" name="age" value="age">
	
	<input type="submit" name="doctor" value="Doc ID">
	
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
	echo "<p><strong>Patient ID: ";
	echo "<br>";
	echo $row['patID'];
	echo "<p>";
	
	
	echo "<p><strong> Name: ";
	echo "<br>";
	echo $row['name'];
	echo "</p>";
	
	
	echo "<p><strong> D.O.B: ";
	echo "<br>";
	echo $row ['birth'];
	echo "</p>";
	
	
	echo "<p><strong> Phone Number: ";
	echo "<br>";
	echo $row ['phoneNum'];
	echo "</p>";
	
	
	echo "<p><strong> address: ";
	echo "<br>";
	echo $row ['address'];
	echo "</p>";
	
	echo "<p><strong> Doctor ID: ";
	echo "<br>";
	echo $row ['docID'];
	echo "</p>";
?>
</section>
	<?php
	
	}
	?>
	
				</section>
				
			</div>
		</section>
		
	</body>
</html>