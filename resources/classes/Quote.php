<?php

class Quote {

	private $_db;

	public function __construct() {
		$this->_db = DB::getInstance();
	}

	// fetch a quote
	public function fetch($id = '', $editing = false) {
		$isApproved = false;
		$arr = [];

		if (!empty($id)) {
			// select by $id
			$sql = 'SELECT * FROM posts WHERE id = :id';

			$results = $this->_db->action($sql, [
				':id'	=>	$id
			]);

			if ($editing) return $results;

			return $this->getArr($results);
		} else {

			while (!$isApproved) {
				$sql = 'SELECT * FROM posts ORDER BY RAND() LIMIT 1';
				$results = $this->_db->action($sql);
				$isApproved = $this->isApproved($results['approved']);
			}

			return $this->getArr($results);
		}
	}

	public function fetchAll() {
		$sql = 'SELECT * FROM posts ORDER BY id DESC';
		$results = $this->_db->action($sql);

		return $results;
	}

	public function addNew($author, $text) {
		$sql = 'INSERT INTO posts (author, text) VALUES (:author, :text)';
		$results = $this->_db->action($sql, [
			':author'	=>	$author,
			':text'		=>	$text
		]);

		if ($results) return true;

		return false;
	}

	public function update($array = array()) {
		foreach ($array as $id => $setting) {
			$sql = 'SELECT approved FROM posts WHERE id=:id';

			$results = $this->_db->action($sql, [
				':id'	=>	$id
			]);

			if ($results) {
				$status = (int)$results['approved'];

				if ($status === 1 && $setting === 'Pending') {
					$newSetting = 0;
					$sql = 'UPDATE posts SET approved=:newSetting WHERE id=:id';
				} else if ($status === 0 && $setting === 'Approve') {
					$newSetting = 1;
					$sql = 'UPDATE posts SET approved=:newSetting WHERE id=:id';
				} else if ($setting === 'Delete') {
					$sql = 'DELETE FROM posts WHERE id=:id';
				} else {
					// if status not changed
					return false;
				}

				if (isset($newSetting)) {
					// UPDATE: newSetting, id
					$results = $this->_db->action($sql, [
						':newSetting'	=>	$newSetting,
						':id'					=>	$id
					]);

					if ($results) return 'update';
				} else {
					// DELETE: id
					$results = $this->_db->action($sql, [
						':id'	=>	$id
					]);

					if ($results) return 'delete';
				}
			}
			return false;
		}
	}

	public function edit($id, $author, $text) {
		$sql = 'UPDATE posts set author=:author, text=:text WHERE id=:id';

		$results = $this->_db->action($sql, [
			':id'			=>	$id,
			':author'	=>	$author,
			':text'		=>	$text
		]);

		if ($results) return true;
		var_dump($results);
		die();

		return false;
	}

	// return array with data
	// if quote is not approved, return false
	private function getArr($arr) {
		if (isset($arr['approved']) && $this->isApproved($arr['approved'])) {
			return array(
				'id'			=>	$arr['id'],
				'text'		=>	$arr['text'],
				'author'	=>	$arr['author']
			);
		}
		return false;
	}

	// check if quote is approved
	private function isApproved($approve) {
		return $approve ? true : false;
	}

}
