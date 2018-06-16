<?php

class Validator {

	private $_errors = [];

	public function validate($author, $text) {

		if (strlen($author) > 30) {
			$this->_errors += [
				'author'	=>	'Max characters allowed: 30'
			];
		}

		if (strlen($text) > 200) {
			$this->_errors += [
				'bodyText'	=>	'Max characters allowed: 200'
			];
		}

		return $this;

	}

	public function failed() {
		return !empty($this->_errors);
	}

	public function errors() {
		return $this->_errors;
	}

}
