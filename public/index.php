<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Marketing Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../views/partials/header.php">
	<link rel="stylesheet" type="text/css" href="../views/partials/footer.php">
	<link rel="stylesheet" type="text/css" href="../views/partials/navbar.php">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
			position: relative;
			margin-top: 50px;
			padding: 20px;
			height: 30%;
			width: 30%;
			float: left;
		}
		.test {
			position: relative;
			float: left;
			height: 100px;
			width: 100px;
		}
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
		    width: 70%;
		    margin: auto;
		}
	</style>
</head>
<body>
	<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img_chania.jpg" alt="Chania" width="460" height="345">
      </div>

      <div class="item">
        <img src="img_chania2.jpg" alt="Chania" width="460" height="345">
      </div>
    
      <div class="item">
        <img src="img_flower.jpg" alt="Flower" width="460" height="345">
      </div>

      <div class="item">
        <img src="img_flower2.jpg" alt="Flower" width="460" height="345">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="/js/media.js"></script><?php require_once'../views/partials/footer.php' ?>
<?php require_once'../views/partials/navbar.php'; ?></body>
</html>