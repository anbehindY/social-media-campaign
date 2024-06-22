<?php
include '../../connection.php';
global $connection;

session_start();

$id               = $_GET['id'];
$deleteMediaQuery = "delete from media where id=$id ";
$deleteMedia      = mysqli_query($connection, $deleteMediaQuery);

if($deleteMedia) {
	echo "<script>window.alert('Successfully Deleted!')</script>";
} else {
	echo "<script>window.alert('Something went wrong in Media Delete')</script>";
}
header("Location: ./");