<?php

class Redirect {

	public static function to($msg = '', $loc = null) {

		switch ($loc) {
		case 'error':
			$_SESSION['error'] = $msg;
			// change to only /error/ in production
			header('Location: ' . self::getProtocol() . $_SERVER['SERVER_NAME'] . '/randomQuotes/error/');
			break;
		case 'home':
			$_SESSION['msg'] = $msg;
			// change to only / in production
			header('Location: ' . self::getProtocol() . $_SERVER['SERVER_NAME'] . '/randomQuotes/');
			break;
		case 'adminpage':
			// change to only /adminapproval.php in production
			header('Location: ' . self::getProtocol() . $_SERVER['SERVER_NAME'] . '/randomQuotes/adminapproval.php');
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
