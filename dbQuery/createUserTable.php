<?php
include '../connection.php';
global $connection;

$user_query = "CREATE TABLE USER (
	id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50) NOT NULL,
	firstName VARCHAR(50) NOT NULL,
	lastName VARCHAR(50) NOT NULL,
	address VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	phone VARCHAR(50) NOT NULL,
	password VARCHAR(255) NOT NULL,
	role VARCHAR(50) NOT NULL
)";

$query = mysqli_query($connection, $user_query);

if($query){
	echo "Admin table created successfully";
} else {
	echo "Error: " . $user_query . "<br>" . mysqli_error($connection);
}


