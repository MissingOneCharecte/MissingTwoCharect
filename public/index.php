<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Marketing Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="../views/partials/header.php">
	<link rel="stylesheet" type="text/css" href="../views/partials/footer.php">
	<link rel="stylesheet" type="text/css" href="../views/partials/navbar.php">
	<style type="text/css">
		.index {
			position: absolute;
			height: 7%;
			width: 75%;
			left: 10%;
			top: 13%;
			text-align: center;
		}
		.sell {
			margin-top: 50px;
			padding: 20px;
			height: 30%;
			width: 30%;
		}
	</style>
</head>
<body>
	<div id="wrapper">
			<?php require_once'../views/partials/navbar.php'; ?>
		<div class="index" id="content">
			<span class="sell electronics">
				<a rel="stylesheet" type="text/css" href="electronics">Electronics</a>
			</span>

			<span class="sell furniture">
				<a rel="stylesheet" type="text/css" href="furniture">Furniture</a>
			</span>

			<span class="sell cloths">
				<a rel="stylesheet" type="text/css" href="cloths">Cloths</a>
			</span>

			<span class="sell cars">
				<a rel="stylesheet" type="text/css" href="cars">Cars</a>
			</span>

			<span class="sell pets">
				<a rel="stylesheet" type="text/css" href="pets">Pets</a>
			</span>
		</div>
		
		<?php require_once'../views/partials/footer.php' ?>
	</div>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="/js/media.js"></script>
</body>
</html>