<?php
define('DB_HOST','127.0.0.1');
define('DB_NAME','list_db');
define('DB_USER','root');
define('DB_PASS','');
$dbc = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbc->exec(
		'DROP TABLE IF EXISTS electronics'
	);
$dbc->exec('CREATE TABLE electronics(
    user_name VARCHAR(32) NOT NULL,
    sales DECIMAL(10,2) NOT NULL,
    publish_date VARCHAR(40) NOT NULL,
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id),
    UNIQUE (user_name)
)');
$dbc->exec(
		'DROP TABLE IF EXISTS furniture'
	);
$dbc->exec('CREATE TABLE furniture(
    user_name VARCHAR(32) NOT NULL,
    sales DECIMAL(10,2) NOT NULL,
    publish_date VARCHAR(40) NOT NULL,
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id),
    UNIQUE (user_name)
)');
$dbc->exec(
		'DROP TABLE IF EXISTS cars'
	);
$dbc->exec('CREATE TABLE cars(
    user_name VARCHAR(32) NOT NULL,
    sales DECIMAL(10,2) NOT NULL,
    publish_date VARCHAR(40) NOT NULL,
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id),
    UNIQUE (user_name)
)');
$dbc->exec(
		'DROP TABLE IF EXISTS clothes'
	);
$dbc->exec('CREATE TABLE clothes(
    user_name VARCHAR(32) NOT NULL,
    sales DECIMAL(10,2) NOT NULL,
    publish_date VARCHAR(40) NOT NULL,
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id),
    UNIQUE (user_name)
)');
$dbc->exec(
		'DROP TABLE IF EXISTS pets'
	);
$dbc->exec('CREATE TABLE pets(
    user_name VARCHAR(32) NOT NULL,
    sales DECIMAL(10,2) NOT NULL,
    publish_date VARCHAR(40) NOT NULL,
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id),
    UNIQUE (user_name)
)');
?>