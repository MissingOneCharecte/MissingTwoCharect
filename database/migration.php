<?php
define('DB_HOST','127.0.0.1');
define('DB_NAME','list_db');
define('DB_USER','root');
define('DB_PASS','');
$dbc = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbc->exec(
		'DROP TABLE IF EXISTS listed_items'
	);
$dbc->exec('CREATE TABLE listed_items(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(32) NOT NULL,
    sales DECIMAL(10,2) NOT NULL,
    publish_date VARCHAR(40) NOT NULL,
    category VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (username)
)');
?>