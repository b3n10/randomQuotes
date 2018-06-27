<?php

session_start();

if (!isset($_SESSION['config'])) {
	if (getenv("DATABASE_URL"))
		$db = parse_url(getenv("DATABASE_URL"));
	else
		$db = parse_url('postgres://nblrtactkhqfmo:7c3b903cfff2476f836ec606714d06fbc1aa6dbd664d612e876ee49ff586ca79@ec2-54-235-70-253.compute-1.amazonaws.com:5432/dq2ug9i8fp2h0');

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
