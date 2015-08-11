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
    description TEXT, 
    PRIMARY KEY (id),
    UNIQUE (username)
)');

$dbc->exec('CREATE TABLE "users" (
  "id" int(11) unsigned NOT NULL AUTO_INCREMENT,
  "username" varchar(32) NOT NULL DEFAULT,
  "email" varchar(100) NOT NULL DEFAULT,
  "first_name" varchar(75) DEFAULT NULL,
  "last_name" int(75) DEFAULT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "username" ("username"),
  UNIQUE KEY "email" ("email")
)');

?>