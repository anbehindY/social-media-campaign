<?php
include( "../../connection.php" );
global $connection;

session_start();

$campaignId = $_GET['id'];
$deletePitchType = "delete from campaign_type where id=$campaignId ";
$result = mysqli_query( $connection, $deletePitchType );

if ( $result ) {
	echo "<script>window.alert('Successfully Deleted!')</script>";
} else {
	echo "<script>window.alert('Something went wrong in Campaign Type Delete')</script>";
}
header( "Location: ./" );
