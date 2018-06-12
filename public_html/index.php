<?php

require_once "../resources/init.php";

$quote = new Quote();

if (!empty($_GET['id'])) {
	// get $results as array
	$results = $quote->getRandom($_GET['id']);
} else {
	$results = $quote->getRandom();
}

if (!$results) {
	Redirect::to(404);
}

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
					<p id='pbody'><?php echo $results['body'] ?></p>
					<p id='ptitle'><?php echo $results['title'] ?></p>
				</div>
			</div>
			<div class="div_button">
				<a class="next">next</a>
				<a class="sharefb">sharefb</a>
				<a class="sharetw">sharetw</a>
			</div>
		</div>
	</div>
		<script>
			// add id to URL onload
			window.onload = function() {
				var url = window.location.href.indexOf('?') ? window.location.href.substr(0, window.location.href.indexOf('?')) : window.location.href;
				window.history.replaceState('', '', url + "?id=<?php echo $results['id'];?>");
			};
		</script>
		<script src="./dist/js/main.js">
		</script>
	</body>
</html>
