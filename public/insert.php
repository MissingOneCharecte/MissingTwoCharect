<?php
session_start();
require_once'../database/connect.php';
if (!empty($_POST['username']) && !empty($_POST['sales']) && !empty($_POST['publish_date']) && !empty($_POST['description']) && !empty($_POST['description'])) {		
		$stmt = $dbc->prepare('INSERT INTO listed_items (username, sales, publish_date, category, description) VALUES (:username, :sales, :publish_date, :category, :description)');
		$stmt->bindValue(':username', $_POST['username'],  PDO::PARAM_STR);
		$stmt->bindValue(':sales', $_POST['sales'],  PDO::PARAM_INT);
		$stmt->bindValue(':publish_date', $_POST['publish_date'],  PDO::PARAM_STR);
		$stmt->bindValue(':category',  $_POST['category'],  PDO::PARAM_STR);
		$stmt->bindValue(':description', $_POST['description'],  PDO::PARAM_STR);
		$stmt->execute();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Marketing Homepage</title>
	<link rel="icon" href="img/favicon.ico"/>
	<link class='link' rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<?php require_once'../views/partials/navbar.php'; ?>
	<div class="index" id="content">
			<form class='list' method="post">
			<!-- Username will be removed once we have a system working -->
				<input class="lineUp" placeholder=" Username" type="text" name="username"><br>
				<input class="lineUp" placeholder=" Sales" type="text" name="sales"><br>
				<input class="lineUp" placeholder=" Publish Date" type="text" name="publish_date"><br>
				<input class="lineUp" placeholder=" Category" type="text" name="category"><br>
				<input class="lineUp" placeholder=" Description" type="text" name="description"><br>
				<input id="sub" type="submit">
			</form>
	</div>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="/js/media.js">
</script><?php require_once'../views/partials/footer.php' ?>
</body>
</html>