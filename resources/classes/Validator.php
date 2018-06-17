<?php

class Validator {

	private $_errors = [];

	public function validate($author, $text) {

		if (empty($author) || empty($text)) {
			$this->_errors += [
				'empty'	=>	'Input not allowed empty.'
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
