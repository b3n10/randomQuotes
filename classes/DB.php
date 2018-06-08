<?php
// uses singleton method

class DB {

	protected $_pdo;

	public function __construct() {

		try {

				$this->_pdo = new PDO('mysql:host=' . Config::get('host') . ';dbname=' . Config::get('dbname') , Config::get('user') , Config::get('password'));

		} catch (PDOException $e) {

			die($e->getMessage());

		}

	}

}
