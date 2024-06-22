<?php
include '../connection.php';
global $connection;

$tech_query = "CREATE TABLE TECHNIQUE (
	id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	description VARCHAR(255) NOT NULL,
	photo1 VARCHAR(255) NOT NULL,
	photo2 VARCHAR(255) NOT NULL,
	media_id INT(6) NOT NULL,
	FOREIGN KEY (media_id) REFERENCES MEDIA(id)
)";

$query = mysqli_query($connection, $tech_query);

if($query){
	echo "Technique table created successfully";
} else {
	echo "Error: " . $tech_query . "<br>" . mysqli_error($connection);
}