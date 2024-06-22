<?php
include '../../connection.php';
global $connection;

session_start();

$id                   = $_GET['id'];
$deleteTechniqueQuery = "delete from technique where id=$id ";
$deleteTechnique      = mysqli_query( $connection, $deleteTechniqueQuery );

if ( $deleteTechnique ) {
	echo "<script>window.alert('Successfully Deleted!')</script>";
} else {
	echo "<script>window.alert('Something went wrong')</script>";
}
header( "Location: ./" );