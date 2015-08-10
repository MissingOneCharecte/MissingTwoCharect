<?php
USE list_db;
DROP TABLE IF EXISTS "electronics";
CREATE TABLE electronics(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL DEFAULT 'User Name',
    sales DECIMAL(10,2) NOT NULL,
    publish_date INT NOT NULL,
    PRIMARY KEY (id)
);
DROP TABLE IF EXISTS "furniture";
CREATE TABLE furniture(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL DEFAULT 'User Name',
    sales DECIMAL(10,2) NOT NULL,
    publish_date INT NOT NULL,
    PRIMARY KEY (id)
);
DROP TABLE IF EXISTS "cars";
CREATE TABLE cars(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL DEFAULT 'User Name',
    sales DECIMAL(10,2) NOT NULL,
    publish_date INT NOT NULL,
    PRIMARY KEY (id)
);
DROP TABLE IF EXISTS "clothes";
CREATE TABLE clothes(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL DEFAULT 'User Name',
    sales DECIMAL(10,2) NOT NULL,
    publish_date INT NOT NULL,
    PRIMARY KEY (id)
);
DROP TABLE IF EXISTS "pets";
CREATE TABLE pets(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL DEFAULT 'User Name',
    sales DECIMAL(10,2) NOT NULL,
    publish_date INT NOT NULL,
    PRIMARY KEY (id)
);

?>