<?php

class Quote {

	private $_db = null;

	public function __construct($db) {
		$this->_db = $db;
	}

	public function get($item) {

		// $id = random_number()
		$id = 1;

		// get first index (which is an obj) of returned array
		// then access the $item from obj
		return $this->_db->find($item, $id)[0]->{$item};

	}

}
