<?php
ini_set('display_errors', '1');
error_reporting(E_ALL | E_STRICT);

//include "../Backend/credentials.php";
//include '../Backend/databaseHandler.php';

// DO NOT USE CONSOLE.PHP OVER AND OVER! IT KEEPS RE-DECLAIRING!!!!
include "../Backend/console.php";

if (isset($_POST['submit'])) {
	$server = "mysql.jawad.se";
	$username = "kassa";
	$password = "cGZZ2.I2mYPE*T@p";
	$dbname = "kassa";
	$port = 80;
	
	$newPass	  = $_POST['floatingPassword'];
	$newPassAgain = $_POST['floatingPasswordCheck'];

	// Kollar ifall lösenorden är likadana 
	if ($newPass !== $newPassAgain) {
		echo ("<script>alert('Your passwords do not match!');</script>");
	} else {
		$conn = mysqli_connect($server, $username, $password, $dbname, $port);
		if (!$conn) {
			console("Connection failed due to:" . mysqli_connect_error());
		} else {
			console("Connection success!");

			$newAdmin 	= $_POST['username'];
			$exists = $conn->query("SELECT * FROM Admin WHERE username = '$newAdmin'");
			if (mysqli_num_rows($exists) > 0) {
				echo ("<script>alert('That username is already taken!');</script>");
			} else {

				$hashedPass	= password_hash($newPass, PASSWORD_BCRYPT);
				$userAgent  =   $_SERVER['HTTP_USER_AGENT'];

				$newAdminQuery = "INSERT INTO Admin (`id`, `username`, `password`, `last_login`, `user_agent`, `reg_date`)
			VALUES (NULL, '$newAdmin', '$hashedPass', current_timestamp(), '$userAgent', current_timestamp())";

				if ($conn->query($newAdminQuery)) {
					console("Query works, wooooooo");
				} else {
					console("Something went wrong");
				}
			}
		}
	}
}
