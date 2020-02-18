<?php
include 'credentials.php';

$conn = mysqli_connect($servername, $username, $password,$db);

$c_id = $_POST["id"];
$c_total = $_POST["total"];

$sql_update_points="UPDATE `waste_hunters`.`credit` 
set 
amount=amount-'$c_total' where customerid='$c_id'";


if(mysqli_query($conn, $sql_update_points)){
		echo "Records inserted successfully CRedit";
	}
	else
	{
		echo "ERROR: Could not able to execute $sql. CREDIT" . mysqli_error($conn);
	}

echo "Hello";

$sql_next="UPDATE `waste_hunters`.`utility_store`
set
used=used+'$c_total',not_used=not_used-'$c_total' where id='1'";

if(mysqli_query($conn, $sql_next)){
                echo "Records inserted successfully CRedit";
        }
        else
        {
                echo "ERROR: Could not able to execute $sql. CREDIT" . mysqli_error($conn);
        }

?>
