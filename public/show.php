<?php
session_start();
require_once'../database/connect.php';
$dbc->exec("USE list_db"); 
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
            <tr>
			<td>User Name: <?= $value[1]; ?></td>
			<td>Cost: <?= $value[2]; ?></td>
			<td>Date: <?= $value[3]; ?></td>
			<td>Price: <?= $value[4]; ?></td>
			<tr/>
			<?php } ?>
			<tr/>
        </ul>
        <?php } ?>
	</div>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="/js/media.js"></script><?php require_once'../views/partials/footer.php' ?>
</body>
</html>