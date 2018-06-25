<?php

class Redirect {

	public static function to($msg = '', $loc = null) {
		switch ($loc) {
		case 'error':
			$_SESSION['error'] = $msg;
			header('Location: ' . self::getProtocol() . $_SERVER['SERVER_NAME'] . '/error/');
			break;
		case 'home':
			$_SESSION['msg'] = $msg;
			header('Location: ' . self::getProtocol() . $_SERVER['SERVER_NAME'] . '/');
			break;
		case 'adminpage':
			header('Location: ' . self::getProtocol() . $_SERVER['SERVER_NAME'] . '/adminapproval.php');
			break;
		default:
			echo 'none';
			break;
		}
	}

	private static function getProtocol() {
		return empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
	}
}
