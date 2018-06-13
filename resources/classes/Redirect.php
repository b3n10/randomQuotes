<?php

class Redirect {

	public static function to($loc = null) {

		switch ($loc) {
		case 404:
			header('Location: ../resources/errors/404.php');
			break;
		default:
			echo 'none';
			break;
		}

	}
}
