<?php
include 'credentials.php';
$c_id = $_POST["driver_id"];
$c_lat = $_POST["lat"];
$c_long = $_POST["long"]; 

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
  $offset=5*60*60; //converting 4 hours to seconds.
  $dateFormat="d-m-Y"; //set the date format
  $date=gmdate($dateFormat, time()+$offset);
    $dateFormat="h:i:s"; //set the date format
  $time_true=gmdate($dateFormat, time()+$offset);
$sql = "INSERT INTO driver_position (gps_lat,gps_lng,driver_id,date,time) VALUES ('$c_lat','$c_long','$c_id','$date','$time_true')";
if(mysqli_query($conn, $sql)){
		echo "Records inserted successfully CRedit";
	}
	else
	{
		echo "ERROR: Could not able to execute $sql. CREDIT" . mysqli_error($conn);
	}

$conn->close();
?>

