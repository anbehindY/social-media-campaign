<?php
include '../connection.php';
global $connection;

$campaign_type_query = "CREATE TABLE CAMPAIGN_TYPE (
	id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL
)";


$query = mysqli_query($connection, $campaign_type_query);

if($query){
	echo "Campaign type table created successfully";
} else {
	echo "Error: " . $campaign_type_query . "<br>" . mysqli_error($connection);
}