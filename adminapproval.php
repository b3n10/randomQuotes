<?php

require_once "./resources/init.php";
$quote = new Quote();
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
	<div class="nav">
		<div class="logo">
			<a href="/">randomQuotes</a>
		</div>
		<div class="navlinks">
			<a href="#">about</a>
			<a href="./submit.php">submit</a>
		</div>
	</div>
	<?php if (isset($error_arr['empty'])): ?>
		<?php echo Notification::message('fail', $error_arr['empty']); ?>
	<?php endif ?>
	<div class="tbl_container">
		<table class='tbl_head'>
			<tr>
				<td>ID</td>
				<td>Author</td>
				<td>Text</td>
				<td>
					<button type="button" class="update">Update</button>
				</td>
			</tr>
		</table>
		<div class="tbl_data">
			<table class='tbl_body'>
				<tbody>
					<?php foreach($results as $result): ?>
					<tr>
						<?php foreach ($result as $key => $val): ?>
							<td>
							<?php if ($key === 'approved' && $val === '1'): ?>
								<select id="select<?php echo $result['id']; ?>" name="select<?php echo $result['id']; ?>">
									<option value="Pending">Pending</option>
									<option value="Approve" selected>Approve</option>
									<option value="Delete">Delete</option>
								</select>
							<?php elseif ($key === 'approved' && $val === '0'): ?>
								<select id="select<?php echo $result['id']; ?>" name="select<?php echo $result['id']; ?>">
									<option value="Pending" selected>Pending</option>
									<option value="Approve">Approve</option>
									<option value="Delete">Delete</option>
								</select>
							<?php elseif ($key === 'id' && $result['approved'] === '1'): ?>
								<a href="/randomQuotes/?id=<?php echo $val; ?>">
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
	</div>
		<script src="./public/dist/js/validate.js?version=<?php echo uniqid(); ?>">
		</script>
	</body>
</html>
