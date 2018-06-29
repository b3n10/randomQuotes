<?php

class Session {

	public static function create() {
		$_SESSION['start']	= time();
		$_SESSION['end']		= $_SESSION['start'] + (30 * 60);
	}

	public static function check($name) {
		return isset($_SESSION[$name]);
	}

	public static function get($name) {
		return $_SESSION[$name];
	}

	public static function destroy($array = []) {
		foreach ($array as $arr) {
			unset($_SESSION[$arr]);
		}
	}

	public static function isLoggedIn() {
		if (!self::check('id')) {
			Redirect::to('No privilege to access page!', 'home');
			die();
		} else {

			$now = time();

			if ($now > self::get('end')) {
				self::destroy(['start', 'end', 'id']);
				Redirect::to('Session already expired!', 'home');
				die();
			}
		}
	}

}
