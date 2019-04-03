<?php
$mysqli = new mysqli('localhost', 'root', '', 'crickfest');
date_default_timezone_set("Asia/Calcutta");
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}else{
	//echo "Connected successfully";
}
?>