<?php


{
	$db = new mysqli ('localhost' , 'cwilliams', '12410' , 'cwilliams_gameportal');
	
	if (mysqli_connect_errno())
	{
		echo 'Error: could not  connect to the database. Please try again  later.';
		exit;
	}
	
}?>