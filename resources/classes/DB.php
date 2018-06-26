<?php
// uses singleton method

class DB {

	protected $_pdo;
	private static $_instance = null;

	public function __construct() {

		try {
			if (!getenv("DATABASE_URL"))
				$db = parse_url('postgres://nblrtactkhqfmo:7c3b903cfff2476f836ec606714d06fbc1aa6dbd664d612e876ee49ff586ca79@ec2-54-235-70-253.compute-1.amazonaws.com:5432/dq2ug9i8fp2h0');
			else
				$db = parse_url(getenv("DATABASE_URL"));

			$this->_pdo = new PDO("pgsql:" . sprintf(
			    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
			    $db["host"],
			    $db["port"],
			    $db["user"],
			    $db["pass"],
			    ltrim($db["path"], "/")
			));

		} catch (PDOException $e) {

			die($e->getMessage());

		}

	}

	public static function getInstance() {
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
			// INSERT, UPDATE, DELETE no need for results, so return true on success
			try {
				$fetch_results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				return true;
			}

			// if mulitple or all sets of array are requested
			if (count($fetch_results) > 1) {
				return $fetch_results;
			}

			// if only 1 set of array is requested
			foreach ($fetch_results as $array) {
				foreach ($array as $key => $val) {
						$results_array += [$key => $val];
				}
			}

			// if try-catch didn't return true for INSERT, UPDATE, DELETE
			if (empty($results_array)) return true;

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
