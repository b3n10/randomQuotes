DROP DATABASE IF EXISTS quotes;

CREATE DATABASE quotes;

USE quotes;

CREATE TABLE posts (
	id					int(5)				not null AUTO_INCREMENT PRIMARY KEY,
	author				VARCHAR(20),
	text				VARCHAR(200),
	approved 		tinyint(1)		default 0
);
