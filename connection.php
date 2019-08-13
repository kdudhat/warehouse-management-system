<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "warehouse";

// Create connection
$conn = new mysqli($servername, $username, $password);
if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
// Check connection
$db_select = mysqli_select_db($conn, 'warehouse');
if (!$db_select) {
    die("Database selection failed: " . mysqli_error($conn));
}
else
{
	///echo "Database connection is successfully";
}


?>