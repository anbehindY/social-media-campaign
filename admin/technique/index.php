<?php
include '../../connection.php';
include '../../navigation.php';
global $connection;

session_start();
if ( isset( $_SESSION['user_id'] ) ) {
	$id   = $_SESSION['user_id'];
	$name = $_SESSION['username'];
} else {
	echo "<script>window.alert('Please login.') </script>";
	header( '/smc_project/login' );
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Technique</title>
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
	/>
	<style>
        th,
        td {
            border: 1px solid rgb(160 160 160);
            /*padding: 8px 10px;*/
            /*text-align: left;*/
            /*vertical-align: top;*/
        }
	</style>
</head>
<body>
<section class="flex flex-col items-center px-8 py-6 gap-4">
	<?php include 'techniqueForm.php'; ?>
	<hr>
	<?php include 'techniqueListing.php'; ?>
</body>
</html>