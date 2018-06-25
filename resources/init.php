<?php

session_start();

$db = parse_url(getenv("DATABASE_URL"));

// $pdo = new PDO("pgsql:" . sprintf(
//     "host=%s;port=%s;user=%s;password=%s;dbname=%s",
//     $db["host"],
//     $db["port"],
//     $db["user"],
//     $db["pass"],
//     ltrim($db["path"], "/")
// ));

$_SESSION['config'] = [
	'host'			=>	$db['host'],
	'port'			=>	$db['port'],
	'dbname'		=>	ltrim($db["path"], "/"),
	'charset'		=>	'charset=utf8',
	'user'			=>	$db['user'],
	'password'	=>	$db['pass']
];

spl_autoload_register(function($class) {
	require_once "classes/" . $class . ".php";
});
