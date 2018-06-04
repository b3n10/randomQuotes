<?php

class DB {

	private $_connection = null;

	public function __construct() {

		if (!$this->_connection) {

			return true;

		}

		return false;
	}


}
