DROP DATABASE IF EXISTS quotes;

CREATE DATABASE quotes;

USE quotes;

CREATE TABLE posts (
	id int(5)		not null AUTO_INCREMENT PRIMARY KEY,
	title				VARCHAR(20),
	body				VARCHAR(200)
);
