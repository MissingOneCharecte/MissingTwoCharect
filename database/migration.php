<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'list_db');
define('DB_USER', 'Codeup');
define('DB_PASS', 'password');
$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME , DB_USER, DB_PASS);
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbc->exec(
		"DROP TABLE IF EXISTS electronics"
	);
$dbc->exec("CREATE TABLE electronics(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL DEFAULT 'User Name',
    sales DECIMAL(10,2) NOT NULL,
    publish_date VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)"
);
$dbc->exec(
		"DROP TABLE IF EXISTS furniture"
	);
$dbc->exec("CREATE TABLE furniture(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL DEFAULT 'User Name',
    sales DECIMAL(10,2) NOT NULL,
    publish_date VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)"
);
$dbc->exec(
		"DROP TABLE IF EXISTS cars"
	);
$dbc->exec("CREATE TABLE cars(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL DEFAULT 'User Name',
    sales DECIMAL(10,2) NOT NULL,
    publish_date VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)"
);
$dbc->exec(
		"DROP TABLE IF EXISTS clothes"
	);
$dbc->exec("CREATE TABLE clothes(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL DEFAULT 'User Name',
    sales DECIMAL(10,2) NOT NULL,
    publish_date VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)"
);
$dbc->exec(
		"DROP TABLE IF EXISTS pets"
	);
$dbc->exec("CREATE TABLE pets(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL DEFAULT 'User Name',
    sales DECIMAL(10,2) NOT NULL,
    publish_date VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)"
);
?>