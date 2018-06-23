<?php

class Page {

	public static function className($title, $link) {
		if (isset($title) && !empty($title)) {
			if ($title === $link) {
				return 'active';
			} else {
				return '';
			}
		}
	}

	public static function heading($title) {
		if (isset($title) && !empty($title)) {
			return "<div class='page_title'><p>${title} Page</p></div>";
		}
	}

}
