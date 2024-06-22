<?php
const ROOT_PATH = __DIR__;
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
  <title>Document</title>
</head>
<body>
<section class="p-16 grid place-items-center h-dvh">
	<h1 class="text-5xl font-medium text-clifford mb-5">Social Media Campaign</h1>
	<div class="flex gap-8 w-full justify-center text-white">
		<a href="auth/register"><button>Register</button></a>
		<a href="auth/login"><button>Login</button></a>
	</div>
</section>
</body>
</html>