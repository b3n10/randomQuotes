<?php

session_start();

if (!isset($_SESSION['config'])) {
	$db = parse_url(getenv("DATABASE_URL"));

	$_SESSION['config'] = [
		'host'			=>	$db['host'],
		'port'			=>	$db['port'],
		'dbname'		=>	ltrim($db["path"], "/"),
		'charset'		=>	'charset=utf8',
		'user'			=>	$db['user'],
		'pass'			=>	$db['pass']
	];
}


spl_autoload_register(function($class) {
	require_once "classes/" . $class . ".php";
});
