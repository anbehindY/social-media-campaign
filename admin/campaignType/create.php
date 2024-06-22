<?php
include '../../connection.php';
global $connection;

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$campaignType        = $_POST['campaignType'];
	$check_campaign_name = "SELECT * FROM CAMPAIGN_TYPE WHERE name = '$campaignType'";
	$result              = mysqli_query( $connection, $check_campaign_name );
	$count               = mysqli_num_rows( $result );

	if ( $count > 0 ) {
		echo "<script>window.alert('Campaign type already exists.')</script>";
		echo "<script>window.location='./'</script>;";
	}
	$query = "INSERT INTO CAMPAIGN_TYPE (name) VALUES ('$campaignType')";

	$result = mysqli_query( $connection, $query );

	if ( $result ) {
		echo "<script>window.alert('Campaign type added successfully.')</script>";
	} else {
		echo "<script>window.alert('Failed to add campaign type.')</script>";
	}
	echo "<script>window.location='./'</script>;";
}
