<?php

require_once "./resources/init.php";

if ($_POST) {
	$author = $_POST['author'];
	$text = $_POST['bodyText'];

	$validator = new Validator();

	$validation = $validator->validate(
		$_POST['author'],
		$_POST['bodyText']
	);

	if ($validation->failed()) {
		$error_arr = $validation->errors();
	}

	// $quote = new Quote();
	// $quote->addNew();
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
			<a href="/">randomQuotes</a>
		</div>
	</div>
	<div class="container">
		<div class="div_mainbody">
			<form action="" method="POST">
				<div class="div_submit">
					<input id="author" type="text" name="author" placeholder="Author of quote" autocomplete="off">
					<p id="p_author_limit"><?php echo isset($error_arr) && !empty($error_arr) ? $error_arr['author'] : ''; ?></p>
				</div>
				<div class="div_submit">
					<textarea id="bodyText" name="bodyText" placeholder="Body of text"></textarea>
					<p id="p_bodytext_limit"><?php echo isset($error_arr) && !empty($error_arr) ? $error_arr['bodyText'] : ''; ?></p>
				</div>
				<div class="div_submit">
					<button type="submit" id="btn_submit">Submit</button>
					<button type="button" id="btn_clear">Clear</button>
				</div>
			</form>
		</div>
	</div>
		<script src="">
		</script>
	</body>
</html>
