<?php
// uses singleton method

class DB {

	protected $_pdo;

	public function __construct() {

		try {

			$this->_pdo = new PDO('mysql:host=' . Config::get('host') . ';dbname=' . Config::get('dbname') . ';' . Config::get('charset') , Config::get('user') , Config::get('password'), [
				PDO::ATTR_ERRMODE	=>	PDO::ERRMODE_EXCEPTION
			]);

		} catch (PDOException $e) {

			die($e->getMessage());

		}

	}

}
