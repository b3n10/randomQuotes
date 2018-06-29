<?php

class Redirect {

	public static function to($msg = '', $loc = null) {
		switch ($loc) {
		case 'error':
			$_SESSION['error_msg'] = $msg;
			header('Location: ' . self::getHostAddr());
			break;
		case 'home':
			$_SESSION['success_msg'] = $msg;
			header('Location: ' . self::getHostAddr());
			break;
		case 'adminpage':
			header('Location: ' . self::getHostAddr() . '/adminapproval.php');
			break;
		default:
			echo 'none';
			break;
		}
	}

	private static function getHostAddr() {
		return (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];
	}
}
