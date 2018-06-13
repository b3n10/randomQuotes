<?php

class Redirect {

	public static function to($loc = null) {

		switch ($loc) {
		case 404:
			$_SESSION['error'] = '404 Not Found';
			// change to only /error/ on production
			header('Location: ' . self::getProtocol() . $_SERVER['SERVER_NAME'] . '/randomQuotes/public_html/error/');
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
