<?php

require_once "./resources/init.php";

$quote = new Quote();

// if no id passed in URL
if (empty($_GET['id'])) {
	$results = $quote->fetch();
// if URL has id
} else {
	$results = $quote->fetch($_GET['id']);
	if (!$results) {
		Redirect::to('404 Not Found!', 'error');
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Project 1</title>
		<link rel="stylesheet" href="./public/dist/css/style.css">
	</head>
	<body>
	<div class="nav">
		<div class="logo">
			<a href="#">randomQuotes</a>
		</div>
		<div class="navlinks">
			<a href="#">about</a>
			<a href="./submit.php">submit</a>
		</div>
	</div>
	<?php if (isset($_SESSION['submitted'])): ?>
		<?php echo Notification::message('success', $_SESSION['submitted']); ?>
		<?php unset($_SESSION['submitted']); ?>
	<?php endif ?>
	<div class="container">
		<div class="div_mainbody">
			<div class="div_container_text">
				<div class="div_text">
					<p id='ptext'><?php echo $results['text'] ?></p>
					<p id='pauthor'><?php echo $results['author'] ?></p>
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
		<script src="./public/dist/js/main.js?version=<?php echo uniqid(); ?>">
		</script>
	</body>
</html>
