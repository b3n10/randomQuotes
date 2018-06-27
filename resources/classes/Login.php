<?php

class Login {

	private $_db;

	public function __construct() {
		$this->_db = DB::getInstance();
	}

	public function user($login = array()) {

		$sql = 'SELECT id FROM users WHERE usertype = :usertype AND password = :password';
		$status = $this->_db->action($sql, $login);

		return $status;

	}

}
