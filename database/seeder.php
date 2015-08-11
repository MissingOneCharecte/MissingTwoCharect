<?php
	require_once 'migration.php';

	$electronics = [
		['user_name' => 'IpodBoy71' , 'sales' => '120.01', 'publish_date' => '06-25-2015'],
		['user_name' => 'Toasterlover' , 'sales' => '25.50', 'publish_date' => '06-27-2015'],
		['user_name' => 'Iron_Maid' , 'sales' => '300', 'publish_date' => '06-28-2015'],
		['user_name' => 'xXSn1p3r1337Xx' , 'sales' => '400', 'publish_date' => '06-28-2015'],
		['user_name' => 'HotBoy01' , 'sales' => '3.99', 'publish_date' => '07-01-2015'],
		['user_name' => 'Great_m8' , 'sales' => '6000', 'publish_date' => '07-02-2015']	

	];

	$furniture = [
		['user_name' => 'KingSofa' , 'sales' => '1200', 'publish_date' => '06-20-2015'],
		['user_name' => 'QueenSofa' , 'sales' => '1199', 'publish_date' => '06-24-2015'],
		['user_name' => 'LazyGuyzzzz' , 'sales' => '600.50', 'publish_date' => '06-26-2015'],
		['user_name' => 'GhoastHunter' , 'sales' => '640', 'publish_date' => '06-27-2015']
	];

	$clothes = [
		['user_name' => 'Bagginsses' , 'sales' => '40', 'publish_date' => '06-20-2015'],
		['user_name' => 'SamTheHam' , 'sales' => '13.13', 'publish_date' => '06-20-2015'],
		['user_name' => 'GhoulMan' , 'sales' => '66.66', 'publish_date' => '06-25-2015'],
		['user_name' => 'MissingOneCharecte' , 'sales' => '20', 'publish_date' => '06-26-2015'],
		['user_name' => 'R000001' , 'sales' => '75', 'publish_date' => '07-02-2015'],
		['user_name' => 'BEEEEEEF' , 'sales' => '40.75', 'publish_date' => '07-06-2015'],

	];

	$cars = [
		['user_name' => 'HotRod1909' , 'sales' => '15039.01', 'publish_date' => '06-20-2015'],
		['user_name' => 'FordIsTheBest02' , 'sales' => '13000', 'publish_date' => '06-20-2015'],
		['user_name' => 'Mustang_Mustard' , 'sales' => '7000.08', 'publish_date' => '06-27-2015'],
	];

	$pets = [
		['user_name' => 'HamsterHammand' , 'sales' => '30', 'publish_date' => '06-22-2015'],
		['user_name' => 'Trimau5' , 'sales' => '79', 'publish_date' => '06-24-2015'],
		['user_name' => 'MagicTimeMachine' , 'sales' => '200', 'publish_date' => '06-26-2015'],
		['user_name' => 'PapersTreesLife' , 'sales' => '140.50', 'publish_date' => '06-28-2015'],
		['user_name' => 'All4LoveandPeace' , 'sales' => '400', 'publish_date' => '07-02-2015'],

	];

	$truncateQuery = 'TRUNCATE TABLE electronics; 
		TRUNCATE TABLE furniture; 
		TRUNCATE TABLE clothes; 
		TRUNCATE TABLE cars;
		TRUNCATE TABLE pets';
	$dbc->exec($truncateQuery);

	$electronicsSTMT = $dbc->prepare("INSERT INTO electronics (user_name , sales , publish_date) VALUES (:user_name, :sales , :publish_date)");
	$furnitureSTMT = $dbc->prepare("INSERT INTO furniture (user_name , sales , publish_date) VALUES (:user_name, :sales , :publish_date)");
	$clothesSTMT = $dbc->prepare("INSERT INTO clothes (user_name , sales , publish_date) VALUES (:user_name, :sales , :publish_date)");
	$carsSTMT = $dbc->prepare("INSERT INTO cars (user_name , sales , publish_date) VALUES (:user_name, :sales , :publish_date)");
	$petsSTMT = $dbc->prepare("INSERT INTO pets (user_name , sales , publish_date) VALUES (:user_name, :sales , :publish_date)");

	foreach ($electronics as $electronic) {
		$electronicsSTMT->bindValue(':user_name', $electronic['user_name'], PDO::PARAM_STR);
		$electronicsSTMT->bindValue(':sales', $electronic['sales'], PDO::PARAM_STR); 
		$electronicsSTMT->bindValue(':publish_date', $electronic['publish_date'], PDO::PARAM_STR);
		$electronicsSTMT->execute();
	}

	foreach ($furniture as $something) {
		$furnitureSTMT->bindValue(':user_name', $something['user_name'], PDO::PARAM_STR);
		$furnitureSTMT->bindValue(':sales', $something['sales'], PDO::PARAM_STR); 
		$furnitureSTMT->bindValue(':publish_date', $something['publish_date'], PDO::PARAM_STR);
		$furnitureSTMT->execute();
	}

	foreach ($clothes as $clothing) {
		$clothesSTMT->bindValue(':user_name', $clothing['user_name'], PDO::PARAM_STR);
		$clothesSTMT->bindValue(':sales', $clothing['sales'], PDO::PARAM_STR); 
		$clothesSTMT->bindValue(':publish_date', $clothing['publish_date'], PDO::PARAM_STR);
		$clothesSTMT->execute();
	}

	foreach ($cars as $car) {
		$carsSTMT->bindValue(':user_name', $car['user_name'], PDO::PARAM_STR);
		$carsSTMT->bindValue(':sales', $car['sales'], PDO::PARAM_STR); 
		$carsSTMT->bindValue(':publish_date', $car['publish_date'], PDO::PARAM_STR);
		$carsSTMT->execute();
	}

	foreach ($pets as $pet) {
		$petsSTMT->bindValue(':user_name', $pet['user_name'], PDO::PARAM_STR);
		$petsSTMT->bindValue(':sales', $pet['sales'], PDO::PARAM_STR); 
		$petsSTMT->bindValue(':publish_date', $pet['publish_date'], PDO::PARAM_STR);
		$petsSTMT->execute();
	}

?>