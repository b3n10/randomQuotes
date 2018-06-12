<?php

class Quote extends DB {

	// retrieve random quote
	public function getRandom($id = '') {

		$sql = '
			SELECT
				id, title, body
			FROM posts';

		if (!empty($id)) {
			$sql .= ' WHERE id = :id';
			$stmt = $this->_pdo->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
		} else {
			$sql .= ' ORDER BY RAND() LIMIT 1';
			$stmt = $this->_pdo->prepare($sql);
			$stmt->execute();
		}


		if ($stmt->rowCount()) {

			// return result as array
			return $stmt->fetch();

		}

		return false;

	}

}
