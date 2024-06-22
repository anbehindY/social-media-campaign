<?php

session_start();

include( "../../connection.php" );
global $connection;

if ( isset( $_POST['login'] ) ) {

	$email    = $_POST['email'];
	$password = $_POST['password'];
	$query    = "select * from user where email='$email'";
	$result   = mysqli_query( $connection, $query );
	$count    = mysqli_num_rows( $result );

	if ( $count > 0 ) {
		$getUser  = mysqli_fetch_array( $result );
		$user_id  = $getUser['id'];
		$username = $getUser['name'];
		if ( password_verify( $password, $getUser['password'] ) ) {

			$_SESSION['user_id']  = $getUser['id'];
			$_SESSION['username'] = $getUser['username'];

			echo "<script>window.alert('login success.')</script>";

			echo "<script>window.location='/smc_project/admin/dashboard'</script>";
		} else {
			echo "<script>window.alert('login fail.')</script>";
			echo "<script>window.location='./'</script>";
		}
	} else {
		echo "<script>window.alert('login fail.')</script>";
		echo "<script>window.location='./'</script>";
	}
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Form</title>
</head>

<body>
<?php include 'adminLoginForm.php' ?>


</body>
</html>