<?php

require_once "./resources/init.php";

if (!isset($_SESSION['id'])) {
	Redirect::to('', 'home');
	die();
}

$quote = new Quote();

if (isset($_POST['submit'])) {

	$status_check = array();

	foreach ($_POST as $key => $val) {

		if ($key !== 'submit') {

			$status_check[] = $quote->update([
				$key	=>	$val
			]);

		}

	}

}

$results = $quote->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Project 1</title>
		<link rel="stylesheet" href="./public/dist/css/style.css?version=<?php echo uniqid(); ?>">
	</head>
	<body>
	<?php require_once 'navigation.php'; ?>
	<?php if (isset($status_check) && in_array('success', $status_check)): ?>
		<?php echo Notification::message('success', 'Successfully updated posts!'); ?>
	<?php elseif (isset($status_check) && !in_array('success', $status_check)): ?>
		<?php echo Notification::message('fail', 'No posts updated!'); ?>
	<?php endif ?>
	<div class="tbl_container">
		<form action="" method="POST">
		<table class='tbl_head'>
			<tr>
				<td>ID</td>
				<td>Author</td>
				<td>Text</td>
				<td>
				<?php if (isset($_SESSION['id']) && $_SESSION['id'] === 2): ?>
					<button type="submit" class="update" name='submit'>Update</button>
				<?php endif ?>
				</td>
			</tr>
		</table>
		<div class="tbl_data">
			<table class='tbl_body'>
				<tbody>
					<?php foreach($results as $result): ?>
						<?php if ($result['approved'] === '0'): ?>
							<tr class='pending'>
						<?php else: ?>
							<tr>
						<?php endif ?>
						<?php foreach ($result as $key => $val): ?>
							<td>
							<?php if ($key === 'approved' && $val === '1'): ?>
								<select name="<?php echo $result['id']; ?>">
									<option value="Pending">Pending</option>
									<option value="Approve" selected>Approve</option>
									<option value="Delete">Delete</option>
								</select>
							<?php elseif ($key === 'approved' && $val === '0'): ?>
								<select name="<?php echo $result['id']; ?>">
									<option value="Pending" selected>Pending</option>
									<option value="Approve">Approve</option>
									<option value="Delete">Delete</option>
								</select>
							<?php elseif ($key === 'id' && $result['approved'] === '1'): ?>
								<a href="/randomQuotes/?id=<?php echo $val; ?>" target="_blank">
									<strong>
										<?php echo htmlspecialchars($val); ?>
									</strong>
								</a>
							<?php else: ?>
								<?php echo htmlspecialchars($val); ?>
							<?php endif ?>
							</td>
						<?php endforeach ?>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		</form>
	</div>
		<script src="./public/dist/js/notification.js?version=<?php echo uniqid(); ?>"></script>
	</body>
</html>
