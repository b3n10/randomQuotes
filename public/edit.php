<?php

require_once "../resources/init.php";

Session::isLoggedIn();

$quote = new Quote();

if ($_POST) {
	$error_arr = [];
	$id			= $_POST['postID'];
	$author	= trim($_POST['author'], ' ');
	$text		= trim($_POST['bodyText'], ' ');

	$author	= trim($author, '-“\'"” ');
	$text		= trim($text, '-“\'"” ');

	$author	= str_replace(array('\r', '\n'), "", $author);
	$text		= str_replace(array('\r', '\n'), "", $text);

	$validator = new Validator();

	$validation = $validator->validate(
		$_POST['author'],
		$_POST['bodyText']
	);

	if ($validation->failed()) {
		$error_arr = $validation->errors();
	} else {
		$result = $quote->edit($id, $author, $text);

		if ($result) {
			$status_check = 'success';
		} else {
			$status_check = 'fail';
		}
	}
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$result = $quote->fetch($_GET['id'], true);
	if (!$result) {
		Redirect::to('404 Not Found!', 'error');
		die();
	}
} else {
	Redirect::to('404 Not Found!', 'error');
	die();
}

$page_title = 'Edit';
require_once 'navigation.php';

if (isset($status_check)) {
		if ($status_check === 'success') {
			echo Notification::message('alert', 'Successfully updated posts :)');
		} else {
			echo Notification::message('fail', 'Error updating post :(');
		}
} elseif (isset($error_arr)) {
	foreach ($error_arr as $error) {
		echo Notification::message('fail', $error);
	}
}
?>

	<div class="container">
		<div class="div_mainbody">
			<form action="" method="POST">
				<div class="div_submit">
				<input id="author" type="text" name="author" placeholder="Author of quote" autocomplete="off" value="<?php echo $result['author']; ?>">
					<p id="p_author_limit">Max characters allowed: 30</p>
				</div>
				<div class="div_submit">
				<textarea id="bodyText" name="bodyText" placeholder="Body of text"><?php echo $result['text']; ?></textarea>
					<p id="p_bodytext_limit">Max characters allowed: 200</p>
				</div>
				<div class="div_submit">
					<input type="hidden" name="postID" value="<?php echo $result['id']; ?>">
				</div>
				<div class="div_submit">
					<button type="submit" id="btn_submit">Update</button>
					<button type="button" id="btn_clear">Clear</button>
				</div>
			</form>
		</div>
	</div>
	<script src="./dist/js/validate.js?version=<?php echo uniqid(); ?>"></script>
	<script src="./dist/js/notification.js?version=<?php echo uniqid(); ?>"></script>
