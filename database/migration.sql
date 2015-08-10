USE list_db;
DROP TABLE IF EXISTS "list_items";
CREATE TABLE albums (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    author_name VARCHAR(100) NOT NULL DEFAULT 'User Name',
    sales DECIMAL(10,2) NOT NULL,
    release_date INT NOT NULL,
    section CHAR(100) NOT NULL,
    PRIMARY KEY (id)
);