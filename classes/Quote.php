<?php

class Quote {

	private $_db = null;

	public function __construct($db) {
		$this->_db = $db;
	}

	public function get() {

		// pass results array
		return $this->_db->find();

	}

}
