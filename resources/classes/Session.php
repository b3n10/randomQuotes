<?php

class Session {

	public static function create() {
		$_SESSION['start']	= time();
		$_SESSION['end']		= $_SESSION['start'] + (30 * 60);
	}

	public static function check() {
		if (!isset($_SESSION['id'])) {
			Redirect::to('', 'home');
			die();
		} else {
			$now = time();

			if ($now > $_SESSION['end']) {
				unset($_SESSION['start']);
				unset($_SESSION['end']);
				unset($_SESSION['id']);
				Redirect::to('', 'home');
				die();
			}
		}
	}

}
