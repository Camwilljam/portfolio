<?php

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
			}
			else {
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