<?php

class Validator {

	private $_errors = [];

	public function validate($author, $text) {

		if (empty($author) || empty($text)) {
			$this->_errors += [
				'empty'	=>	'Empty input(s) not allowed !'
			];
		} else if (ctype_space($author) || ctype_space($text)) {
			$this->_errors += [
				'whitespace'	=>	'Whitespace(s) only not allowed !'
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
