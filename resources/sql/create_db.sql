DROP DATABASE IF EXISTS quotes;

CREATE DATABASE quotes;

USE quotes;

CREATE TABLE posts (
	id					int(5)				not null AUTO_INCREMENT PRIMARY KEY,
	author				VARCHAR(30),
	text				VARCHAR(200),
	approved 		tinyint(1)		default 0
);

CREATE TABLE users (
	id					int(5)				not null AUTO_INCREMENT PRIMARY KEY,
	usertype		VARCHAR(5),
	password		VARCHAR(30)
);
