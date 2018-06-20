	<div class="nav">
		<div class="logo">
			<a href="/">randomQuotes</a>
		</div>
		<div class="navlinks">
			<ul>
				<li><a href="./about.php">about</a></li>
				<?php if (isset($_SESSION['id'])): ?>
				<li>
					<a href="./adminapproval.php">approval</a>
				</li>
				<?php endif ?>
				<li><a href="./submit.php">submit</a></li>
			</ul>
		</div>
	</div>
