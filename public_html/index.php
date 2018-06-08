<?php

require_once "../resources/init.php";

// get $results as array
$quote = new Quote();
$results = $quote->getRandom();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Project 1</title>
		<link rel="stylesheet" href="./dist/css/style.css">
	</head>
	<body>
	<div class="nav">
		<div class="logo">
			<a href="#">randomQuotes</a>
		</div>
		<a href="#">about</a>
		<a href="#">submit quote</a>
	</div>
	<div class="container">
		<div class="div_mainbody">
			<div class="div_container_text">
				<div class="div_text">
					<p><?php echo $results['body'] ?></p>
					<p><?php echo $results['title'] ?></p>
				</div>
			</div>
			<div class="div_button">
				<a class="next">next</a>
				<a class="sharefb">sharefb</a>
				<a class="sharetw">sharetw</a>
			</div>
		</div>
	</div>
		<script src="./dist/js/main.js">
		</script>
	</body>
</html>
