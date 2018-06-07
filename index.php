<?php

require_once "libs/init.php";

// get $results as array
$results = DB::connect()->getRandomQuote();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Project 1</title>
		<link rel="stylesheet" href="libs/css/style.css">
	</head>
	<body>
		<div class="container">
			<div class="div-body">
				<div class='div-maintext'>
					<p id='p-text'>
					<?php echo $results['body']; ?>
					</p>
					<p class="p-author">
					<?php echo $results['title']; ?>
					</p>
				</div>
			</div>
			<div class="div-button">
				<button id='btn-next'>Next</button>
				<button id='btn-next'>Submit own</button>
			</div>
		</div>
		<script src="libs/js/dist/main.js">
		</script>
	</body>
</html>
