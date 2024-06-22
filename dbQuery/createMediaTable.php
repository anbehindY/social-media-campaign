<?php
include '../connection.php';
global $connection;


$media_query = "CREATE TABLE MEDIA (
	id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	photo VARCHAR(255) NOT NULL,
	link VARCHAR(255) NOT NULL
)";

$query = mysqli_query($connection, $media_query);

if($query){
	echo "Media table created successfully";
} else {
	echo "Error: " . $media_query . "<br>" . mysqli_error($connection);
}