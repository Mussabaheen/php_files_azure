<?php
include 'credentials.php';
$c_name = $_POST["name"];
$c_email = $_POST["email"];
$c_password = $_POST["password"];
$c_phone = $_POST["phone_no"];
$c_lat = $_POST["lat"];
$c_long = $_POST["long"]; 
$c_address = $_POST["address"];

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

if (mysqli_error($conn)) {
    die("Connection failed: " . mysqli_error($conn));
}else{

$sql_get_email ="SELECT email FROM Customer where email='$c_email'";

$result = $conn->query($sql_get_email);

if ($result->num_rows > 0) {
    // output data of each row
//    while($row = $result->fetch_assoc()) {
	echo "1";    

}
 else {
    echo "0 results";


echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
 
$sql = "INSERT INTO Customer (name,address, email,phone_no,gps_lat,gps_lng,password,credit) VALUES ('$c_name','$c_address','$c_email','$c_phone','$c_lat','$c_long','$c_password','0')";
if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
	

$sql_get_email ="SELECT id FROM Customer where email='$c_email'";

$result = $conn->query($sql_get_email);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $id =  $row["id"];



$sql_data = "INSERT INTO Credit (customerId,date) VALUES ($id,CURDATE())";
	if(mysqli_query($conn, $sql_data)){
		echo "Records inserted successfully CRedit";
	}
	else
	{
		echo "ERROR: Could not able to execute $sql. CREDIT" . mysqli_error($conn);
	}
}
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}




}
$conn->close();
}
}
?>

