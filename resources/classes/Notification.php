<?php

class Notification {

	public static function message($type, $msg) {

		$html = "<div class='notification ${type}'>" . $msg . "</div>";

		return $html;

	}

}
