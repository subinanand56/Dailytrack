<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname="dashboard";

$base_url="http://localhost/admin";

$image_url="http://localhost/admin/uploads";


$conn=mysqli_connect($server,$username ,$password ,$dbname);
if (!$conn) {
	echo "Connection failed!";
}
?>

