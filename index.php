<?php

require_once "libs/init.php";

$quote = new Quote(DB::connect());

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Project 1</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<div class='div-body'>
			<p id='p-text'>
				<?php echo $quote->get('body'); ?>
			</p>
			<p class="p-author">
				<?php echo $quote->get('title'); ?>
			</p>
		</div>
		<div class="div-button">
			<button id='btn-next'>Next</button>
		</div>
	</div>
	<script src="main.js">
	</script>
</body>
</html>
