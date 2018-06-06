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

	// retrieve $item based on $id
	public function find($item, $id) {

		$sql = 'SELECT ' . $item . ' FROM posts WHERE id = ?';

		$stmt = $this->_pdo->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();

		if ($stmt->rowCount()) {

			// return result as array of obj
			return $stmt->fetchAll(PDO::FETCH_OBJ);

		}

		return false;

	}

}
