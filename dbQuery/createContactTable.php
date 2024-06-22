<?php
include '../connection.php';
global $connection;

$contact_query = "CREATE TABLE CONTACT (
	id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	subject VARCHAR(255) NOT NULL,
	message TEXT NOT NULL,
    userId INT(6) NOT NULL,
    FOREIGN KEY (userId) REFERENCES USER(id)
)";


$query = mysqli_query($connection, $contact_query);

if($query){
	echo "Contact table created successfully";
} else {
	echo "Error: " . $contact_query . "<br>" . mysqli_error($connection);
}