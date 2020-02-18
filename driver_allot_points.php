<?php
include 'credentials.php';

$conn = mysqli_connect($servername, $username, $password,$db);

$c_id = $_POST["id"];
$c_plastic = $_POST["paper"];
$c_paper = $_POST["plastic"];
$c_metal = $_POST["metal"];
$c_organic= $_POST["organic"];
$c_total = $_POST["total"];

$sql_update_points="UPDATE `waste_hunters`.`credit` 
set 
amount=amount+'$c_total',
Plastic=Plastic+'$c_plastic',
Metal=Metal+'$c_metal',
organic=organic+'$c_organic',
Paper=Paper+'$c_paper'
 where customerid='$c_id'";

if(mysqli_query($conn, $sql_update_points)){
		echo "Records inserted successfully CRedit";
	}
	else
	{
		echo "ERROR: Could not able to execute $sql. CREDIT" . mysqli_error($conn);
	}

echo "Hello";
?>
