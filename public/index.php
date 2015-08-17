<?php
session_start();
require_once 'bootstrap.php';
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
	if ($_GET['category'] == "home") {
		$something = 'home';
		$stmt = $dbc->prepare('SELECT * FROM listed_items ORDER BY publish_date DESC LIMIT ' . $increment . ' OFFSET ' . $offSet);
	} else {
		$count = $dbc->query("SELECT count(*) FROM listed_items WHERE category = '$something'")->fetchColumn();
		$stmt = $dbc->prepare("SELECT * FROM listed_items WHERE category = '$something' ORDER BY publish_date DESC LIMIT " . $increment . " OFFSET " . $offSet); 
	}
} else {
	$something = 'home';
	$stmt = $dbc->prepare('SELECT * FROM listed_items ORDER BY publish_date DESC LIMIT ' . $increment . ' OFFSET ' . $offSet);
}
// $test = 'electronics';
// 	$stmt = $dbc->prepare("SELECT * FROM listed_items WHERE category = '$test' ORDER BY publish_date DESC LIMIT " . $increment . " OFFSET " . $offSet); 	
$stmt->execute();
if (empty($_SESSION['items'])) {
	$_SESSION['items'] = [];
	$all = $dbc->prepare('SELECT * FROM listed_items ORDER BY publish_date DESC');
	$all->execute();
	foreach ($all as $key => $value) {
		$enter =  $value['username'];
		array_push($_SESSION['items'], $enter);
	}
}
$test = $_SESSION['items'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Marketing Homepage</title>
	<link rel="icon" href="img/favicon.ico"/>
	<link class='link' rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="index" id="content">
		<span class="sell all">
			<a class='link' href="?category=home&page=1">All</a>
		</span>
		<span class="sell electronics">
			<a class='link' href="?category=electronics&page=1">Electronics</a>
		</span>
		<span class="sell furniture">
			<a class='link' href="?category=furniture&page=1">Furniture</a>
		</span>
		<span class="sell clothes">
			<a class='link' href="?category=clothes&page=1">Clothes</a>
		</span>
		<span class="sell cars">
			<a class='link' href="?category=cars&page=1">Cars</a>
		</span>
		<span class="sell pets">
			<a class='link' href="?category=pets&page=1">Pets</a>
		</span>
		<table class='list'>
		<tr>
			<?php
			foreach($stmt as $id => $item) { ?>
			<tr>
				<td><?= $item['title']; ?></td>
				<td><img class='blah' src="/img/grey.png"></td>
				<td>Price: <?= $item['sales']; ?></td>
				<td>Date: <?= $item['publish_date']; ?></td>
				<td>Category: <?= $item['category']; ?></td>
				<td>User: <a href="http://missingonecharecte.dev/show.php?which=<?= array_search($item['username'], $test); ?>"><?= $item['username']; ?></a></td>
				<tr/>
				<?php } ?>
				<tr/>
		</table>
		<div>
			<?php if ($number > 1 ) { ?>
			<a  class='page' id='prev' href="?category=<?= $something;?>&page=<?= $number - 1;?>">Previous</a>
			<?php } ?>
			<?php if($number < $count / $increment) { ?>
			<a class='page' id='next' href="?category=<?= $something;?>&page=<?= $number + 1;?>">Next</a>
			<?php } ?>
			</div>
		<div>
			<?php if (!empty($_SESSION['username'])) { ?>
			<button type="button" id='but' class="btn btn-primary btn-lg">
			Create your ad here!</button>
			<?php } ?>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="/js/media.js"> </script>
	<script>
		
	$("#but").on("click" , function() {
		location.replace("http://missingonecharecte.dev/create.php")
	});
		
	</script>
</body>
</html>