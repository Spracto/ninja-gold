<?php
session_start();
// $_SESSION = array();	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Ninja Gold</title>
</head>
<body>
	<div id="container">
		<p>Your Gold:</p><div id='score'><?= isset($_SESSION['money']) ? $_SESSION['money'] : 0 ?></div>
		<div id="locations">
			<div id='farmbox'>
				<h2>Farm</h2>
				<h3>(earns 10-20 golds)</h3>
				<form action='process.php' method='post'>
					<input type='hidden' name='action' value='farm'>
				    <input type='submit' value='Get Gold!'>
				</form>
			</div>
			<div id='cavebox'>
				<h2>Cave</h2>
				<h3>(earns 5-10 golds)</h3>
				<form action='process.php' method='post'>
					<input type='hidden' name='action' value='cave'>
					<input type='submit' value='Get Gold!'>
				</form>
			</div>
			<div id='housebox'>
				<h2>House</h2>
				<h3>(earns 2-5 golds)</h3>
				<form action='process.php' method='post'>
					<input type='hidden' name='action' value='house'>
					<input type='submit' value='Get Gold!'>
				</form>
			</div>
			<div id='casinobox'>
				<h2>Casino</h2>
				<h3>(earns/takes 0-50 golds)</h3>
				<form action='process.php' method='post'>
					<input type='hidden' name='action' value='casino'>
					<input type='submit' value='Get Gold!'>
				</form>
			</div>
		</div>
		<div class='restart'>
				<form id='restart-form' action="process.php" method="post">
					<input type="hidden" name="action" value="restart-form">
					<input type="submit" value="RESET">
				</form>
		</div>
		Activities:<div id='activity'>
			<?= isset($_SESSION['activity']) ? implode('', array_reverse($_SESSION['activity'])) :
			""

			?>

		</div>
	</div>
</body>
</html>