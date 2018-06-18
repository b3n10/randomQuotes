<?php

session_start();

$_SESSION['config'] = [
	'host'			=>	'127.0.0.1',
	'dbname'		=>	'quotes',
	'charset'		=>	'charset=utf8',
	'user'			=>	'root',
	'password'	=>	'jairah'
];

spl_autoload_register(function($class) {
	require_once "classes/" . $class . ".php";
});
