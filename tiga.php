<?php
$server = "localhost";
$username = "useruap";
$password = "inipasswordroot";
$database = "db_uap0003";

$conn = new mysqli($server, $username, $password, $database);
if($conn->connect_error){
	die('Gagal terhubung '.$conn->connect_error);
// }else{
	//echo "<h3>Berhasil terhubung</h3>";
}
?>