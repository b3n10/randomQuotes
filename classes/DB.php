<?php

class DB {

	private $_connection = null;

	public function __construct() {

		try {

			if (!$this->_connection) {

				$db = new PDO('mysql:host=' . Config::get('host') . ';dbname=' . Config::get('dbname') , Config::get('user') , Config::get('password'));

				$this->_connection = $db;

			}

		} catch (PDOException $e) {

			die($e->getMessage());

		}

	}

	public function connect() {
		return $this->_connection;
	}

}
