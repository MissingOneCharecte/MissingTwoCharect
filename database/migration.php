<?php
require_once'connect.php';

$dbc->exec(
		'DROP TABLE IF EXISTS listed_items;'
	);
$dbc->exec('CREATE TABLE listed_items(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(32) NOT NULL,
    title VARCHAR(200) NOT NULL,
    sales DECIMAL(10,2) NOT NULL,
    publish_date VARCHAR(40) NOT NULL,
    category VARCHAR(50) NOT NULL,
    description TEXT, 
    images VARCHAR(700),
    PRIMARY KEY (id)
)');
 ;
$dbc->exec(
        'DROP TABLE IF EXISTS users;'
    );
$dbc->exec('CREATE TABLE users (
    id INT unsigned NOT NULL AUTO_INCREMENT,
    username varchar(32) NOT NULL,
    password TEXT,
    email varchar(100) NOT NULL,
    first_name varchar(75),                  
    last_name VARCHAR(75),
    PRIMARY KEY (id),
    UNIQUE KEY (username),
    UNIQUE KEY (email)
)');

?>