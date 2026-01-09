<?php
include("connection.php");

$doctor_id = $_GET['id'];

//deleting the row from table
$sql =  "DELETE FROM doctor WHERE id=$doctor_id";
$result = mysqli_query($conn,$sql);

//redirecting to the display page 
header("Location:doctor.php");
?>