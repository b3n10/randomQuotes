<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo $_SESSION['error'] ?></title>
	<link rel="stylesheet" href="../public/dist/css/style.css">
</head>
<body>
	<div class="error">
		<h1><?php echo $_SESSION['error'] ?></h1>
		<a href="/">..back to Home</a>
	</div>
</body>
</html>
<?php unset($_SESSION['error']); ?>
