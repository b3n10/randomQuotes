<?php
// uses singleton method

class DB {

	private static $_connection = null;
	private $_pdo;

	public function __construct() {

		try {

				$this->_pdo = new PDO('mysql:host=' . Config::get('host') . ';dbname=' . Config::get('dbname') , Config::get('user') , Config::get('password'));

		} catch (PDOException $e) {

			die($e->getMessage());

		}

	}

	public static function connect() {

		if (!isset(self::$_connection)) {

			self::$_connection = new DB();

		}

		return self::$_connection;

	}

}
