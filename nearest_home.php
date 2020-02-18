<?php
include 'credentials.php';
$c_lat = $_POST["lat"];
$c_long = $_POST["long"];

$sql_get_email = "SELECT id,name,phone_no,( 3959 * acos( cos( radians('$c_lat') ) * cos( radians( gps_lat ) ) * cos( radians( gps_lng ) - radians('$c_long') ) + sin( radians('$c_lat') ) * sin( radians( gps_lat ) ) ) ) AS distance FROM customer HAVING distance<20 ORDER BY distance LIMIT 0 ,5";
$conn = mysqli_connect($servername, $username, $password,$db);

$result = mysqli_query($conn, $sql_get_email);
if (mysqli_num_rows($result) > 0) {
 // output data of each row
	while($row = mysqli_fetch_assoc($result)) {

	 echo "id: " . $row["id"]." NAME: ".$row["name"]." Phone No: ".$row["phone_no"]. " DISTANCE: " . $row["distance"]."\n";
 }
} else {
 echo "0";
}
?>
