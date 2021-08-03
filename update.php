<?php
//
// attempt database connection
	$mysqli = new mysqli("localhost", "root", "root", "projectlemons");
  
	
if(isset($_POST['submit']))
{	

$lemo = mysqli_real_escape_string($mysqli, $_POST['lemo']);

	
$result = mysqli_query($mysqli, "UPDATE ideas SET lemoncount='$lemo' WHERE id=ii-002");
header("Location: login.php");

}	
	
	
	
	
	
	
	
	
	
	
	
	
?>