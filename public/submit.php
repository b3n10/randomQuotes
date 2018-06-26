<?php

require_once "../resources/init.php";

if ($_POST) {
	$author = trim($_POST['author'], '-“\'"” ');
	$text		= trim($_POST['bodyText'], '-“\'"” ');

	$author	= htmlspecialchars(str_replace(array('\r', '\n'), "", trim($author, '-“\'"” ')));
	$text		= htmlspecialchars(str_replace(array('\r', '\n'), "", trim($text, '-“\'"” ')));

	$validator = new Validator();

	$validation = $validator->validate(
		$_POST['author'],
		$_POST['bodyText']
	);

	if ($validation->failed()) {
		$error_arr = $validation->errors();
	} else {
		$quote = new Quote();
		$result = $quote->addNew($author, $text);

		if ($result) {
			Redirect::to('Submitted quote waiting for approval!', 'home');
			die();
		}

		// if error inserting
		Redirect::to('Error submitting your quote :(', 'error');
		die();
	}
}

$page_title = 'Submit';
require_once 'navigation.php';

if (isset($error_arr)) {
	foreach ($error_arr as $error) {
		echo Notification::message('fail', $error);
	}
}
?>
	<div class="container">
		<div class="div_mainbody">
			<form action="" method="POST">
				<div class="div_submit">
				<input id="author" type="text" name="author" placeholder="Author of quote" autocomplete="off" value="<?php echo Input::get('author'); ?>">
					<p id="p_author_limit">Max characters allowed: 30</p>
				</div>
				<div class="div_submit">
				<textarea id="bodyText" name="bodyText" placeholder="Body of text"><?php echo Input::get('bodyText'); ?></textarea>
					<p id="p_bodytext_limit">Max characters allowed: 200</p>
				</div>
				<div class="div_submit">
					<button type="submit" id="btn_submit">Submit</button>
					<button type="button" id="btn_clear">Clear</button>
				</div>
			</form>
		</div>
	</div>
		<script src="./dist/js/validate.js?version=<?php echo uniqid(); ?>"></script>
		<script src="./dist/js/notification.js?version=<?php echo uniqid(); ?>"></script>
	</body>
</html>
