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

	// retrieve random $item
	public function find() {

		$sql = '
			SELECT
				title, body
			FROM posts
				ORDER BY RAND()
			LIMIT 1';

		$stmt = $this->_pdo->prepare($sql);
		$stmt->execute();

		if ($stmt->rowCount()) {

			// return result as array
			return $stmt->fetch();

		}

		return false;

	}

}
