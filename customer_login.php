<?php
include 'credentials.php';
$c_email = $_POST["email"];

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

if (mysqli_error($conn)) {
    die("Connection failed: " . mysqli_error($conn));
}else{

$sql_get_email ="SELECT password,id FROM Customer where email='$c_email'";

$result = $conn->query($sql_get_email);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	
	echo json_encode(array('password'=>$row["password"],'id'=>$row["id"]));
}    

}
 else {
    echo "0";


}




$conn->close();

}
?>

