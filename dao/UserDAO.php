<?php
require_once WWW_ROOT . 'dao' . DIRECTORY_SEPARATOR . 'DAO.php';
class UserDAO extends DAO {


	public function selectAll() {
    $sql = "SELECT * 
    				FROM `komen_users`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }   


	public function insert($data) {
		$errors = $this->getValidationErrors($data);
		if(empty($errors)) {
			$sql = "INSERT INTO `komen_users` (`email`, `password`) VALUES (:email, :password)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':email', $data['email']);
			$stmt->bindValue(':password', $data['password']);
			if($stmt->execute()) {
				$insertedId = $this->pdo->lastInsertId();
				return $this->selectById($insertedId);
			}
		}
		return false;
	}

	public function selectByEmail($email) {
		$sql = "SELECT * FROM `komen_users` WHERE `email` = :email";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function selectById($id) {
		$sql = "SELECT * FROM `komen_users` WHERE `id` = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function getValidationErrors($data) {
		$errors = array();
		if(!isset($data['email'])) {
			$errors['email'] = "Please fill in a email";
		}
		if(!isset($data['password'])) {
			$errors['password'] = "Please fill in a password";
		}
		return $errors;
	}

	

	

}