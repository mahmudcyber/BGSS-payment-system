<?php
	session_start();
	$dbname = "paymentsystem";
	$username = "root";
	$password = "";
	$localhost = "localhost";

	$conn = mysqli_connect($localhost,$username,$password,$dbname);
	if (!$conn) {
		die(mysqli_connect_error());
	}
?>
