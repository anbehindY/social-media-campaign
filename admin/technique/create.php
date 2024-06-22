<?php
include "../../connection.php";
global $connection;

if(isset($_POST['submit'])) {
	$name        = $_POST['name'];
	$description = $_POST['description'];

	$filePhoto1 = $_FILES['photo1']['name'];
	$filePhoto2 = $_FILES['photo2']['name'];
	$mediaId = $_POST['mediaId'];

	$folder = "../assets/";

	$fileName1 = $folder . '_' . $filePhoto1;
	$copy1 = copy($_FILES['photo1']['tmp_name'], $fileName1);

	if(!$copy1) {
		echo "<p>Technique icon cannot upload";
		exit();
	}

	$fileName2 = $folder . '_' . $filePhoto2;
	$copy = copy($_FILES['photo2']['tmp_name'], $fileName2);

	if(!$copy) {
		echo "<p>Technique icon cannot upload";
		exit();
	}

	$insertQuery = "insert into technique (name, description, photo1, photo2, media_id) values ('$name', '$description', '$fileName1', '$fileName2', '$mediaId')";
	$result = mysqli_query($connection, $insertQuery);

	if($result) {
		header("Location: ./");
	} else {
		echo "<p>Technique cannot be added";
	}
}