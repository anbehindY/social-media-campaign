<?php
include "../../connection.php";
global $connection;
session_start();

if ( isset( $_POST['signup'] ) ) {
	$username               = $_POST['username'];
	$firstName              = $_POST['firstName'];
	$lastName               = $_POST['lastName'];
	$role                   = "admin";
	$address                = htmlspecialchars( $_POST['address'] );
	$email                  = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL );
	$phone                  = $_POST['phone'];
	$password               = $_POST['password'];
	$confirm_password       = $_POST['confirm_password'];
	$hashed_password        = password_hash( $_POST['password'], PASSWORD_DEFAULT ); // Hash the password
	$hasNum                 = preg_match( '@[0-9]@', $password );
	$hasUpperCase           = preg_match( '@[A-Z]@', $password );
	$hasLowerCase           = preg_match( '@[a-z]@', $password );
	$hasSpecialChar         = preg_match( '@[^\w]@', $password );
	$checkEmail             = "select * from USER where email='$email'";
	$checkEmailQuery        = mysqli_query( $connection, $checkEmail );
	$duplicateEmailCount    = mysqli_num_rows( $checkEmailQuery );
	$checkPhoneNum          = "select * from USER where phone='$phone'";
	$checkPhoneNumQuery     = mysqli_query( $connection, $checkPhoneNum );
	$duplicatePhoneNumCount = mysqli_num_rows( $checkPhoneNumQuery );
	function ErrorResponse( $message ) {
		if ( isset( $_GET['error'] ) ) {
			$url = explode( '?', $_SERVER['HTTP_REFERER'] )[0];
		} else {
			$url = $_SERVER['HTTP_REFERER'];
		}
		$error = urlencode( $message );
		header( "Location: $url?error=$error" );
		exit();
	}

	if ( $password != $confirm_password ) {
		ErrorResponse( "Passwords do not match" );
	} elseif ( $duplicateEmailCount > 0 ) {
		ErrorResponse( "Email already exists" );
	} elseif ( $duplicatePhoneNumCount > 0 ) {
		ErrorResponse( "Phone number already exists" );
	} elseif ( ! $hasNum || ! $hasUpperCase || ! $hasLowerCase || ! $hasSpecialChar ) {
		ErrorResponse( "Password must contain at least one number, one uppercase letter, one lowercase letter and one special character" );
	}

	$query = "INSERT INTO user (username, firstName, lastName , address, email, phone, password, role) VALUES ('$username', '$firstName', '$lastName','$address', '$email', '$phone', '$hashed_password', '$role')";

	if ( mysqli_query( $connection, $query ) ) {
    $getUserQuery = "SELECT * FROM user WHERE email='$email'";
    $getUser = mysqli_query($connection, $getUserQuery);

	  $result = mysqli_fetch_array($getUser);
	  $user_id = $result['id'];
	  $username = $result['username'];
	  $_SESSION['user_id'] = $user_id;
	  $_SESSION['username'] = $username;
		header( "Location: /smc_project/admin/dashboard" );
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error( $connection );
	}
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign up</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include "registerForm.php"
?>

</body>
</html>