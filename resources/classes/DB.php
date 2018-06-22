<?php
// uses singleton method

class DB {

	protected $_pdo;
	private static $_instance = null;

	public function __construct() {

		try {

			$this->_pdo = new PDO('mysql:host=' . Config::get('host') . ';dbname=' . Config::get('dbname') . ';' . Config::get('charset') , Config::get('user') , Config::get('password'), [
				PDO::ATTR_ERRMODE	=>	PDO::ERRMODE_EXCEPTION
			]);

		} catch (PDOException $e) {

			die($e->getMessage());

		}

	}

	public function getInstance() {
		if (!self::$_instance) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function action($sql, $bindParams = array()) {

		$results_array = array();
		$stmt = $this->_pdo->prepare($sql);

		if (!empty($bindParams)) {
			foreach ($bindParams as $key => &$val) {
				$stmt->bindParam($key, $val);
			}
		}

		if ($stmt->execute()) {
			$fetch_results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($fetch_results as $fr) {
				foreach ($fr as $key => $val) {
					$results_array += [$key => $val];
				}
			}

			return $results_array;
		}

		return false;
	}

	public function find($table, $where) {

		$sql = "SELECT * FROM $table"; //WHERE usertype = :usertype AND password = :password';

		if (!empty($where)) {
			foreach ($where as $k => $v) {
				echo $k . ' ' . $v . '<br>';
			}
		}

		die();

	}

}
