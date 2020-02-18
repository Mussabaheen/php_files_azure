<?php
include 'credentials.php';

$c_id = $_POST["id"];

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

if (mysqli_error($conn)) {
    die("Connection failed: " . mysqli_error($conn));
}else{

$sql_get_email ="SELECT * FROM waste_hunters.utility_store where id='$c_id'";

$result = $conn->query($sql_get_email);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	    echo json_encode(array('used'=>$row["used"],
		    'not_used'=>$row["not_used"]));
}    

}
 else {
    echo "0";


}




$conn->close();

}
?>

