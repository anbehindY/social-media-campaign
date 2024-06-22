<?php
include '../connection.php';
global $connection;

$campaign_query = "CREATE TABLE CAMPAIGN (
id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
campaign_type_id INT(6) NOT NULL,
media_id INT(6) NOT NULL,
name VARCHAR(50) NOT NULL,
status VARCHAR(50) NOT NULL,
description VARCHAR(255) NOT NULL,
photo1 VARCHAR(255) NOT NULL,
photo2 VARCHAR(255) NOT NULL,
photo3 VARCHAR(255) NOT NULL,
start_date DATE NOT NULL,
end_date DATE NOT NULL,
fees INT(6) NOT NULL,
aim VARCHAR(255) NOT NULL,
vision VARCHAR(255) NOT NULL,
map VARCHAR(255) NOT NULL,
FOREIGN KEY (campaign_type_id) REFERENCES CAMPAIGN_TYPE(id),
FOREIGN KEY (media_id) REFERENCES MEDIA(id)
)";

$query = mysqli_query($connection, $campaign_query);

if($query){
	echo "Campaign table created successfully";
} else {
	echo "Error: " . $campaign_query . "<br>" . mysqli_error($connection);
}