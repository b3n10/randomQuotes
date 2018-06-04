<?php

class Config {

	public static function get($text) {

		return $_SESSION['config'][$text];

	}

}
