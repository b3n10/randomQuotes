<?php

class Quote extends DB {

	// retrieve random quote
	public function getRandom() {

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
