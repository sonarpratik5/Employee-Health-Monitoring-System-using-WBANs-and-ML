<?php
include("connection.php");

$employee_id = $_GET['id'];

//deleting the row from table
$sql =  "DELETE FROM employee WHERE id=$employee_id";
$result = mysqli_query($conn,$sql);

//redirecting to the display page 
header("Location:employees.php");
?>