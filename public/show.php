<?php
session_start();
require_once'../database/connect.php';
$all = $dbc->prepare('SELECT * FROM listed_items ORDER BY publish_date DESC');
$all->execute();
?>
<html>
<head>
	<title>Show Ad</title>
	<link rel="icon" href="img/favicon.ico"/>
	<link class='link' rel="stylesheet" type="text/css" href="css/main.css">
	<link class='link' rel="stylesheet" type="text/css" href="../views/partials/header.php">
	<link class='link' rel="stylesheet" type="text/css" href="../views/partials/footer.php">
	<link class='link' rel="stylesheet" type="text/css" href="../views/partials/navbar.php">
</head>
<body>
	<?php require_once'../views/partials/navbar.php'; ?>
	<div class="index" id="content">
		<?php foreach ($all as $key => $value) {
        	if($_GET['which'] == $key) { ?>
	            
					<p class='showItems'>Title: <?= $value[2]; ?> </p>
					<p class='showItems'>Cost: $<?= $value[3]; ?> </p>
					<p class='showItems'>Description: <?= $value[6]; ?> </p>
					<p class='showItems'>User Name: <?= $value[1]; ?> </p>
					<p class='showItems'>Date/Time: <?= $value[4]; ?> </p>
				
				<?php } ?>
        <?php } ?>
	</div>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="/js/media.js"></script><?php require_once'../views/partials/footer.php' ?>
</body>
</html>