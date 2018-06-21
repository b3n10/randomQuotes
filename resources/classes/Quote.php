<?php

class Quote extends DB {

	// fetch a quote
	public function fetch($id = '') {

		$isApproved = false;
		$arr = [];

		if (!empty($id)) {

			$sql = '
			SELECT
				*
			FROM posts
			WHERE id = :id';

			$stmt = $this->_pdo->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			if ($stmt->rowCount()) {
				$arr = $stmt->fetch();
				return $this->getArr($arr);
			}

			return false;

		} else {

			while (!$isApproved) {

				$sql = '
				SELECT
					*
				FROM posts
				ORDER BY RAND() LIMIT 1';
				$stmt = $this->_pdo->prepare($sql);
				$stmt->execute();

				if ($stmt->rowCount()) {

					// return result as array
					$arr = $stmt->fetch();
					$isApproved = $this->isApproved($arr['approved']);

				}

			}

			return $this->getArr($arr);

		}

	}

	public function fetchAll() {

		$arr = [];
		$sql = '
				SELECT
					*
				FROM posts ORDER BY id DESC';

		$stmt = $this->_pdo->prepare($sql);
		$stmt->execute();

		if ($stmt->rowCount()) {

			// return result as array
			$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

		}

		return $arr;
	}

	public function addNew($author, $text) {

		$sql = '
			INSERT INTO posts
				(author, text)
			VALUES
				(:author, :text)
			';

		$stmt = $this->_pdo->prepare($sql);
		$stmt->bindParam(':author', $author);
		$stmt->bindParam(':text', $text);
		// var_dump($author, $text);
		// die();

		if ($stmt->execute()) {
			return true;
		}

		return false;

	}

	public function update($arr = array()) {

		foreach ($arr as $id => $setting) {

			$sql = 'SELECT approved FROM posts WHERE id=:id';

			$stmt = $this->_pdo->prepare($sql);
			$stmt->bindParam(':id', $id);

			if ($stmt->execute()) {

				$status = (int)$stmt->fetch()['approved'];

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

				$stmt = $this->_pdo->prepare($sql);

				if (isset($newSetting)) {
					$stmt->bindParam(':newSetting', $newSetting);
				}

				$stmt->bindParam(':id', $id);

				if ($stmt->execute()) {
					return 'success';
				}

			}

		}

	}

	// return array with data
	// if quote is not approved, return false
	private function getArr($arr) {
		if ($this->isApproved($arr['approved'])) {
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
