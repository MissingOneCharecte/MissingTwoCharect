<?php
	define('DB_HOST', '127.0.0.1');
	define('DB_NAME', 'list_db');
	define('DB_USER', 'Codeup');
	define('DB_PASS', 'password');
	require_once 'migration.php';

	$electronics [
		['user_name' => 'IpodBoy71' , 'sales' => '120.01', 'publish_date' => '06-25-2015'],
		['user_name' => 'Toasterlover' , 'sales' => '25.50', 'publish_date' => '06-27-2015'],
		['user_name' => 'Iron_Maid' , 'sales' => '300', 'publish_date' => '06-28-2015'],
		['user_name' => 'xXSn1p3r1337Xx' , 'sales' => '400', 'publish_date' => '06-28-2015'],
		['user_name' => 'HotBoy01' , 'sales' => '3.99', 'publish_date' => '07-01-2015'],
		['user_name' => 'Great_m8' , 'sales' => '6000', 'publish_date' => '07-02-2015']	

	];

	$furniture [
		['user_name' => 'KingSofa' , 'sales' => '1200', 'publish_date' => '06-20-2015'],
		['user_name' => 'QueenSofa' , 'sales' => '1199', 'publish_date' => '06-24-2015'],
		['user_name' => 'LazyGuyzzzz' , 'sales' => '600.50', 'publish_date' => '06-26-2015'],
		['user_name' => 'GhoastHunter' , 'sales' => '640', 'publish_date' => '06-27-2015']
	];

	$clothes [
		['user_name' => 'Bagginsses' , 'sales' => '40', 'publish_date' => '06-20-2015'],
		['user_name' => 'SamTheHam' , 'sales' => '13.13', 'publish_date' => '06-20-2015'],
		['user_name' => 'GhoulMan' , 'sales' => '66.66', 'publish_date' => '06-25-2015'],
		['user_name' => 'MissingOneCharecte' , 'sales' => '20', 'publish_date' => '06-26-2015'],
		['user_name' => 'R000001' , 'sales' => '75', 'publish_date' => '07-02-2015'],
		['user_name' => 'BEEEEEEF' , 'sales' => '40.75', 'publish_date' => '07-06-2015'],

	];

	$cars [
		['user_name' => 'HotRod1909' , 'sales' => '15039.01', 'publish_date' => '06-20-2015'],
		['user_name' => 'FordIsTheBest02' , 'sales' => '13000', 'publish_date' => '06-20-2015'],
		['user_name' => 'Mustang_Mustard' , 'sales' => '7000.08', 'publish_date' => '06-27-2015'],
	];

	$pets [
		['user_name' => 'HamsterHammand' , 'sales' => '30', 'publish_date' => '06-22-2015'],
		['user_name' => 'Trimau5' , 'sales' => '79', 'publish_date' => '06-24-2015'],
		['user_name' => 'MagicTimeMachine' , 'sales' => '200', 'publish_date' => '06-26-2015'],
		['user_name' => 'PapersTreesLife' , 'sales' => '140.50', 'publish_date' => '06-28-2015'],
		['user_name' => 'All4LoveandPeace' , 'sales' => '400', 'publish_date' => '07-02-2015'],

	];

	$deleteQuery = 'TRUNCATE electronics , furniture , clothes , cars , pets';
	$dbc->exec($deleteQuery);

?>