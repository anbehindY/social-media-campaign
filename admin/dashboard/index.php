<?php
include '../../connection.php';
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
  <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
  />
  <title>Admin dashboard</title>
</head>
<body>
<?php include '../../navigation.php'; ?>
<h1>Welcome to Admin Dashboard.</h1>
<?php if (isset($id) && isset($name)) { ?>
  <p><?= $id ?></p>
  <p><?= $name ?></p>
<?php } ?>
</body>
</html>
