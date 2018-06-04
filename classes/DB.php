<?php

class DB {

	private $_connection = null;

	public function __construct() {

		if (!$this->_connection) {

			$this->_connection = $this->connect();

		}

		return $this->_connection;
	}

	private function connect() {

		try {

		$db = new PDO('mysql:host=' . Config::get('host') . ';dbname=' . Config::get('dbname') , Config::get('user') , Config::get('password'));

		return $db;

		} catch (PDOException $e) {

			die($e->getMessage());

		}

	}

}
