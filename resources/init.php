<?php

session_start();

$_SESSION['config'] = [
	'host'			=>	'ec2-54-235-70-253.compute-1.amazonaws.com',
	'dbname'		=>	'dq2ug9i8fp2h0',
	'charset'		=>	'charset=utf8',
	'user'			=>	'nblrtactkhqfmo',
	'password'	=>	'7c3b903cfff2476f836ec606714d06fbc1aa6dbd664d612e876ee49ff586ca79'
];

spl_autoload_register(function($class) {
	require_once "classes/" . $class . ".php";
});
