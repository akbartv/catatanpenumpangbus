<?php

class Database
{

	public static function connect()
	{
		$servername = "localhost";
		$username 	= "root";
		$password 	= "";
		$dbname 	= "si_penumpang_bus";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}

}

	
?>