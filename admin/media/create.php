<?php
include "../../connection.php";
global $connection;

if(isset($_POST['submit'])) {
	$mediaName = $_POST['mediaName'];
	$mediaLink = $_POST['mediaLink'];

	$filePhoto = $_FILES['mediaIcon']['name'];
	$folder = "../assets/";
	$fileName = $folder . '_' . $filePhoto;
	echo $fileName;
	$copy = copy($_FILES['mediaIcon']['tmp_name'], $fileName);

	if(!$copy) {
		echo "<p>Media icon cannot upload";
		exit();
	}

	$insertQuery = "insert into media (name, link, photo) values ('$mediaName', '$mediaLink', '$fileName')";
	$result = mysqli_query($connection, $insertQuery);

	if($result) {
		header("Location: ./");
	} else {
		echo "<p>Media cannot be added";
	}
}