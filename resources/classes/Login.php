<?php

class Login extends DB {

	public function user($login = array()) {

		$sql = 'SELECT id FROM users WHERE usertype = :usertype AND password = :password';
		$status = $this->action($sql, $login);

		return $status;

	}

}
