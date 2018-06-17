<?php

class Sanitize {

	public static function get($value) {

		return (isset($_POST[$value]) && !empty($_POST[$value])) ? htmlspecialchars($_POST[$value]) : '';

	}

}
