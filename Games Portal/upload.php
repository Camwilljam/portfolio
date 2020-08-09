<?php
SESSION_START();

//include database connection file
include_once ('inc/connection.inc.php');

//check to see if the form has been submitted 
if (isset($_POST['submit']))
	
	{
//check to see all fields have been completed
$logID = $_SESSION['logID'];
$artDate = $_POST ['artDate'];
$artAuthor = $_SESSION['logName'];
$artName = $_POST ['artName'];
$artBody = $_POST ['artBody'];

//create an SQL queary to add the comment 

$query = "INSERT INTO articles (logID, artDate, artAuthor, artName, artBody) VALUES ('$logID', '$artDate', '$artAuthor', '$artName', '$artBody')"; 


$result = $db->query($query);
if ($result)

	echo 'Article has been uploaded';
	$db->close();
}



$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk  = 1;
$imageFileType = pathinfo ($target_file,PATHINFO_EXTENSION);


//check to see if its an actual image or a fake image

if(isset ($_POST['image'])) {
	$check = getimagesize ($_FILES["fileToUpload"] ["tmp_name"]);
	if($_check !== false) {
		echo "file is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	}else {
		echo "file is not an image.";
		$uploadOk = 0;
	}
}

	//check to see if file already exsists 
	if (file_exists($target_file)) {
		echo "Sorry, file already exsists.";
		$uploadOk = 0;
	}
	
	//check file size 
	if ($_FILES ["fileToUpload"] ["size"] >500000) {
		echo "Sorry, Files too big.";
		$uploadOk = 0;
	}
	
	//Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !="jpeg" && $imageFileType != "gif") {
		echo "Sorry,  this file is not supported";
		$uploadOk = 0;
	}
	
	//check to see $uploadOk is set to 0 by an error
	if($uploadOk ==0) {
		echo "sorry, your file was not uploaded";
		
	}
	
	//if there is no errors try to upload the file
	else{
		if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"], $target_file)) {
			echo "The file ".basename( $_FILES["$fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
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
	
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~WELCOME MESSAGE~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->	
	<h2>
			<?php echo $_SESSION['logName'].','?>
			<span class="blue"> This is where you can upload your articles </span>
			<br>	
	</h2>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~REGISTER~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

	
	<form class = "uploadform" name="upload" method="post"> <!-- this is the form to log in-->
			
			<br><h2> Upload</h2>
			
			<label for="artDate">artDate</label>
			<input type= "date" name="artDate" placeholder="YYYY-MM-DD">
			<br>
			
			<label for="artName">artName</label>
			<input type= "text" name="artName" placeholder="Name of Article">
			<br>
			
			<label for="artBody">artBody</label>
			<textarea name="artBody" rows="10" cols="30" placeholder="Article Body"> </textarea>
			<br>
			
			
			<input type="submit" name="submit" value="Upload">
		</form>
	
	<form action="upload.php" method="post" enctype="multipart/form-data">
	Select an image to upload:
	<input type="file" name="fileToUpload" id="fileToUpload">
	<input type="submit" value="Upload Image" name="image">
	
	</form>
	
			
			
		
		
		</div>



	
	
</html>