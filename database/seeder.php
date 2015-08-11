<?php
	require_once 'migration.php';
	require_once '../utils/Input.php';

	$listed_items = [
		['username' => 'IpodBoy71' , 'sales' => '120.01', 'publish_date' => '06-25-2015', 'category' => 'electronics'],
		['username' => 'Toasterlover' , 'sales' => '25.50', 'publish_date' => '06-27-2015', 'category' => 'electronics'],
		['username' => 'Iron_Maid' , 'sales' => '300', 'publish_date' => '06-28-2015', 'category' => 'electronics'],
		['username' => 'xXSn1p3r1337Xx' , 'sales' => '400', 'publish_date' => '06-28-2015', 'category' => 'electronics'],
		['username' => 'HotBoy01' , 'sales' => '3.99', 'publish_date' => '07-01-2015', 'category' => 'electronics'],
		['username' => 'Great_m8' , 'sales' => '6000', 'publish_date' => '07-02-2015', 'category' => 'furniture'],
		['username' => 'KingSofa' , 'sales' => '1200', 'publish_date' => '06-20-2015', 'category' => 'furniture'],
		['username' => 'QueenSofa' , 'sales' => '1199', 'publish_date' => '06-24-2015', 'category' => 'furniture'],
		['username' => 'LazyGuyzzzz' , 'sales' => '600.50', 'publish_date' => '06-26-2015', 'category' => 'furniture'],
		['username' => 'GhoastHunter' , 'sales' => '640', 'publish_date' => '06-27-2015', 'category' => 'furniture'],
		['username' => 'Bagginsses' , 'sales' => '40', 'publish_date' => '06-20-2015', 'category' => 'clothes'],
		['username' => 'SamTheHam' , 'sales' => '13.13', 'publish_date' => '06-20-2015', 'category' => 'clothes'],
		['username' => 'GhoulMan' , 'sales' => '66.66', 'publish_date' => '06-25-2015', 'category' => 'clothes'],
		['username' => 'MissingOneCharecte' , 'sales' => '20', 'publish_date' => '06-26-2015', 'category' => 'clothes'],
		['username' => 'R000001' , 'sales' => '75', 'publish_date' => '07-02-2015', 'category' => 'clothes'],
		['username' => 'BEEEEEEF' , 'sales' => '40.75', 'publish_date' => '07-06-2015', 'category' => 'clothes'],
		['username' => 'HotRod1909' , 'sales' => '15039.01', 'publish_date' => '06-20-2015', 'category' => 'cars'],
		['username' => 'FordIsTheBest02' , 'sales' => '13000', 'publish_date' => '06-20-2015', 'category' => 'cars'],
		['username' => 'Mustang_Mustard' , 'sales' => '7000.08', 'publish_date' => '06-27-2015', 'category' => 'cars'],
		['username' => 'HamsterHammand' , 'sales' => '30', 'publish_date' => '06-22-2015', 'category' => 'pets'],
		['username' => 'Trimau5' , 'sales' => '79', 'publish_date' => '06-24-2015', 'category' => 'pets'],
		['username' => 'MagicTimeMachine' , 'sales' => '200', 'publish_date' => '06-26-2015', 'category' => 'pets'],
		['username' => 'PapersTreesLife' , 'sales' => '140.50', 'publish_date' => '06-28-2015', 'category' => 'pets'],
		['username' => 'All4LoveandPeace' , 'sales' => '400', 'publish_date' => '07-02-2015', 'category' => 'pets']
	];

	$truncateQuery = 'TRUNCATE TABLE listed_items;'; 
	$dbc->exec($truncateQuery);

	$stmt = $dbc->prepare('INSERT INTO listed_items (username , sales , publish_date , category) VALUES (
		:username, 
		:sales, 
		:publish_date, 
		:category )'
	);
	
	foreach ($listed_items as $item) {
		$stmt->bindValue(':username', $item['username'], PDO::PARAM_STR);
		$stmt->bindValue(':sales', $item['sales'], PDO::PARAM_STR); 
		$stmt->bindValue(':publish_date', $item['publish_date'], PDO::PARAM_STR);
		$stmt->bindValue(':category', $item['category'], PDO::PARAM_STR);

		//commented out for now
		// if(inputHas('description')) {
		// 	$descriptionVar = escape(inputGet('description'));
		// 	$stmt->bindValue(':description' , $_POST['description'] , PDO::PARAM_STR);
		// } 
		$stmt->execute();
	}

	$sort = $dbc->prepare('SELECT * FROM listed_items ORDER BY sales DESC;');
	$sort->execute();

	//Users section /////////////////////////////////////////////////
	$truncateQuery = 'TRUNCATE TABLE users;'; 
	$dbc->exec($truncateQuery);
	$users = [
		['username' => 'howie' , 'password' => 'salad' , 'email' => 'HowieSalad@yahoo.com']
	];

	$stmt = $dbc->prepare('INSERT INTO users (username , password , email) VALUES (
		:username, 
		:password, 
		:email )'
	);
	
	foreach ($users as $user) {
		$stmt->bindValue(':username', $user['username'], PDO::PARAM_STR);
		$stmt->bindValue(':password', $user['password'], PDO::PARAM_STR); 
		$stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
		
		// $stmt->bindValue(':first_name', $user['first_name'], PDO::PARAM_STR);
		// $stmt->bindValue(':last_name', $user['last_name'], PDO::PARAM_STR);

		$stmt->execute();
	}


?>