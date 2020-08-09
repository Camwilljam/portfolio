<?php


//include database connection file
include_once ('inc/connection.inc.php');

$query = "SELECT * 
FROM prescriptions 

";

 
	
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
		<li><a href="find_patient.php">View Patients</li></a>
		<li><a class="active" href="view_perscription.php">View Prescription</li></a>
		<li><a href="diagnosis.php">View Diagnosis</li></a>
		<li><a href="visits.php">View Visit</li></a>
		<li><a href="search.php">Patient Search</li></a>
		<li><a href="index.php">Log Out</li></a>
	
	</ul>
	</div>
	</div>
	
	<form class = "order" name="order" method="post"  >
	
	<input type="submit" name=" ID num" value="prescription ID">
	
	<input type="submit" name="drug" value="drug ID">
	
	<input type="submit" name="doctor" value="Doc ID">
	
	<input type="submit" name="visit" value="visit date">
	
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
	echo "<p><strong>Pescription ID: ";
	echo "<br>";
	echo $row['presID'];
	echo "<p>";
	
	
	echo "<p><strong> Drug: ";
	echo "<br>";
	echo $row['drugID'];
	echo "</p>";
	
	
	echo "<p><strong> Patient: ";
	echo "<br>";
	echo $row ['patID'];
	echo "</p>";
	
	echo "<p><strong> Doctor: ";
	echo "<br>";
	echo $row ['docID'];
	echo "</p>";
	
	echo "<p><strong> Visit Date: ";
	echo "<br>";
	echo $row ['visitID'];
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