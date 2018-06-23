<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Random Quotes :)</title>
		<link rel="stylesheet" href="./public/dist/css/style.css?version=<?php echo uniqid(); ?>">
	</head>
	<body>
	<div class="nav">
		<div class="logo">
			<a href="/">randomQuotes</a>
		</div>
		<div class="navlinks">
			<ul>
				<li>
					<a href="./about.php" class="<?php echo Page::className($page_title, 'About'); ?>">about</a>
				</li>
				<?php if (isset($_SESSION['id'])): ?>
				<li>
					<a href="./adminapproval.php" class="<?php echo Page::className($page_title, 'Approval'); ?>">approval</a>
				</li>
				<?php endif ?>
				<li>
					<a href="./submit.php" class="<?php echo Page::className($page_title, 'Submit'); ?>">submit</a>
				</li>
			</ul>
		</div>
	</div>
	<?php echo Page::heading($page_title); ?>
