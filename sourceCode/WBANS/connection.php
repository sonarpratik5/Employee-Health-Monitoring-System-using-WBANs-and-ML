<?php 
	
	$database_host = 'localhost';
	$database_user = 'root';
	$database_password = '';
	$database_name = 'wbans';

	$conn = mysqli_connect($database_host,$database_user,$database_password,$database_name);

	if($conn)
	{
		//echo "all Good";
	}
	else
	{
		echo "connection not found sucessfully". $conn->error();
	}


?>