<?php
require_once'../database/connect.php';
$dbc->exec("USE list_db"); 
$count = $dbc->query('SELECT count(*) FROM listed_items')->fetchColumn();
$increment = 5;
if (isset($_GET['page']) && $_GET['page'] < $count - $increment && $_GET['page'] >= 1) {
	$number = $_GET['page'];
} else {
	$number = 1;
}
$offSet = $number * $increment - $increment;
if (isset($_GET['category'])) {
	if ($_GET['category'] == "electronics") {
		$something = 'electronics';
	} elseif ($_GET['category'] == "furniture") {
		$something = 'furniture';
	} elseif ($_GET['category'] == "clothes") {
		$something = 'clothes';
	} elseif ($_GET['category'] == "cars") {
		$something = 'cars';
	} elseif ($_GET['category'] == "pets") {
		$something = 'pets';
	}
	$count = $dbc->query("SELECT count(*) FROM listed_items WHERE category = '$something'")->fetchColumn();

	$stmt = $dbc->prepare("SELECT * FROM listed_items WHERE category = '$something' ORDER BY publish_date DESC LIMIT " . $increment . " OFFSET " . $offSet); 
} else {
	$stmt = $dbc->prepare('SELECT * FROM listed_items ORDER BY publish_date DESC LIMIT ' . $increment . ' OFFSET ' . $offSet);
}
// $test = 'electronics';
// 	$stmt = $dbc->prepare("SELECT * FROM listed_items WHERE category = '$test' ORDER BY publish_date DESC LIMIT " . $increment . " OFFSET " . $offSet); 	
$stmt->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Marketing Homepage</title>
	<link class='link' rel="stylesheet" type="text/css" href="css/main.css">
	<link class='link' rel="stylesheet" type="text/css" href="../views/partials/header.php">
	<link class='link' rel="stylesheet" type="text/css" href="../views/partials/footer.php">
	<link class='link' rel="stylesheet" type="text/css" href="../views/partials/navbar.php">
	<style type="text/css">
	</style>
</head>
<body>
	<?php require_once'../views/partials/navbar.php'; ?>
	<div class="index" id="content">
		<?php if ($number > 1 ) { ?>
			<a  class='page' href="?page=<?= $number - 1;?>">Previous</a>
		<?php } ?>
		<span class="sell electronics">
			<a class='link' href="?category=electronics?page=<?= $number; ?>">Electronics</a>
		</span>
		<span class="sell furniture">
			<a class='link' href="?category=furniture?page=<?= $number; ?>">Furniture</a>
		</span>
		<span class="sell clothes">
			<a class='link' href="?category=clothes?page=<?= $number; ?>">Clothes</a>
		</span>
		<span class="sell cars">
			<a class='link' href="?category=cars?page=<?= $number; ?>">Cars</a>
		</span>
		<span class="sell pets">
			<a class='link' href="?category=pets?page=<?= $number; ?>">Pets</a>
		</span>
	<table class='list'>
	<tr>
		<?php
		foreach($stmt as $id => $item) { ?>
		<tr>
			<td>User: <?= $item['username']; ?></td>
			<td>Cost: <?= $item['sales']; ?></td>
			<td>Date: <?= $item['publish_date']; ?></td>
			<td>Price: <?= $item['category']; ?></td>
			<tr/>
			<?php } ?>
			<tr/>
		<?php if($number < $count / $increment) { ?>
		<a class='page' href="?page=<?= $number + 1;?>">Next</a>
		<?php } ?>
		</table>
	</div>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="/js/media.js"></script><?php require_once'../views/partials/footer.php' ?>
</body>
</html>