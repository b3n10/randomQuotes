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
	} else {
		$_SESSION['submitted'] = 'Submitted quote waiting for approval!';
		Redirect::to('home');
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
			<a href="/">randomQuotes</a>
		</div>
		<div class="navlinks">
			<a href="#">about</a>
			<a href="./submit.php" class="active">submit quote</a>
		</div>
	</div>
	<?php echo Notification::message('fail', (isset($error_arr['empty'])) ? $error_arr['empty'] : ''); ?>
	<div class="container">
		<div class="div_mainbody">
			<form action="" method="POST">
				<div class="div_submit">
				<input id="author" type="text" name="author" placeholder="Author of quote" autocomplete="off" value="<?php echo Sanitize::get('author'); ?>">
					<p id="p_author_limit">Max characters allowed: 30</p>
				</div>
				<div class="div_submit">
				<textarea id="bodyText" name="bodyText" placeholder="Body of text"><?php echo Sanitize::get('bodyText'); ?></textarea>
					<p id="p_bodytext_limit">Max characters allowed: 200</p>
				</div>
				<div class="div_submit">
					<button type="submit" id="btn_submit">Submit</button>
					<button type="button" id="btn_clear">Clear</button>
				</div>
			</form>
		</div>
	</div>
		<script src="./public/dist/js/validate.js">
		</script>
	</body>
</html>
