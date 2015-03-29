<?php
require_once WWW_ROOT . 'dao' . DIRECTORY_SEPARATOR . 'DAO.php';
class UserDAO extends DAO {


	public function selectAll() {
    $sql = "SELECT * 
    				FROM `komen_users` WHERE `chosen` != '' ORDER BY `chosen` ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':chosen', "1");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }   

	public function insertcms($data){
	    $sql = 'UPDATE komen_cms
	                SET currentdag = :dag, eindeweek = :week';
	    $stmt = $this->pdo->prepare($sql);
	    $stmt->bindValue(':dag', $data['dag']);
	    $stmt->bindValue(':week', $data['week']);

	    if($stmt->execute()){
	    
	    }
	    return array();
	}


	public function insert($data) {
		$errors = $this->getValidationErrors($data);
		if(empty($errors)) {
			$sql = "INSERT INTO `komen_users` (`email`, `password`, `photo`, `extension`) VALUES (:email, :password, :photo, :extension)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':email', $data['email']);
			$stmt->bindValue(':password', $data['password']);
			$stmt->bindValue(':photo', $data['photo']);
			$stmt->bindValue(':extension', $data['extension']);
			if($stmt->execute()) {
				$insertedId = $this->pdo->lastInsertId();
				return $this->selectById($insertedId);
			}
		}
		return false;
	}

	public function createNewWeek($data) {
			$sql = "INSERT INTO `komen_weken` (`maandag`, `empty`) VALUES (:maandag, :empty)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':maandag', $data['email']);
			$stmt->bindValue(':empty', "1");
			if($stmt->execute()) {
				$insertedId = $this->pdo->lastInsertId();
				return $this->selectById($insertedId);
			}
		
		return false;
	}

	public function selectByEmail($email) {
		$sql = "SELECT * FROM `komen_users` WHERE `email` = :email";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result){
			return $result;
		}
		return [];
	}

	public function selectByEmailCMS($email) {
		$sql = "SELECT * FROM `komen_users` WHERE `email` = :email AND `cms` = :cms";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':cms', "1");
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result){
			return $result;
		}
		return [];
	}


	public function findFullWeek() {
		$sql = "SELECT * FROM `komen_weken` WHERE `empty` = :empty";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':empty', "2");
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function findOngoingWeek() {
		$sql = "SELECT * FROM `komen_weken` WHERE `empty` = :empty";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindValue(':empty', "1");
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

	public function updatedinsdag($data){
        $sql = 'UPDATE komen_weken
                    SET dinsdag = :dinsdag
                    WHERE empty=:empty';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':dinsdag', $data['email']);
        $stmt->bindValue(':empty', '1');
        if($stmt->execute()){
          
        }
        return array();
    }

    public function updatewoensdag($data){
        $sql = 'UPDATE komen_weken
                    SET woensdag = :woensdag
                    WHERE empty=:empty';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':woensdag', $data['email']);
        $stmt->bindValue(':empty', '1');
        if($stmt->execute()){

        }
        return array();
    }

    public function updatedonderdag($data){
        $sql = 'UPDATE komen_weken
                    SET donderdag = :donderdag , empty = :vol
                    WHERE id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':donderdag', $data['email']);
        $stmt->bindValue(':id', $data['id']);
        $stmt->bindValue(':vol', '2');
        if($stmt->execute()){
        
        }
        return array();
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