<?php

require_once "../resources/init.php";

$quote = new Quote();

// if no id passed in URL
if (empty($_GET['id'])) {
	$results = $quote->fetch();
// if URL has id
} else {
	$results = $quote->fetch($_GET['id']);
	if (!$results) {
		Redirect::to('Quote not found !', 'error');
		die();
	}
}

$page_title = '';
require_once 'navigation.php';

?>
	<?php if (isset($_SESSION['success_msg'])): ?>
		<?php echo Notification::message('alert', $_SESSION['success_msg']); ?>
		<?php unset($_SESSION['success_msg']); ?>
	<?php elseif (isset($_SESSION['error_msg'])): ?>
		<?php echo Notification::message('fail', $_SESSION['error_msg']); ?>
		<?php unset($_SESSION['error_msg']); ?>
	<?php endif ?>
	<div class="container">
		<div class="div_mainbody">
			<div class="div_container_text">
				<div class="div_wait">
					<p>Please wait...</p>
				</div>
				<div class="div_text">
					<p id='ptext'>
						“<?php echo htmlspecialchars($results['text']); ?>”
					</p>
					<p id='pauthor'>
						<?php echo htmlspecialchars($results['author']); ?>
					</p>
				</div>
			</div>
			<div class="div_button">
				<a class="next">
					next
				</a>
				<a class="sharefb">
					<img src="./img/fb.jpg" alt="fb_logo">
				</a>
				<a class="sharetw">
					<img src="./img/tw.png" alt="fb_logo">
				</a>
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
		<script src="./dist/js/main.js?version=<?php echo uniqid(); ?>"></script>
		<script src="./dist/js/notification.js?version=<?php echo uniqid(); ?>"></script>
	</body>
</html>
