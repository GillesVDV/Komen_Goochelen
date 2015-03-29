<?php
require_once __DIR__ . '/DAO.php';
class GoochelenDAO extends DAO {



public function getWinnaars() {
    $sql = "SELECT *
            FROM komen_score
            LEFT JOIN komen_users
            ON komen_users.id = komen_score.user_id
            ORDER BY totaalscore DESC
            LIMIT 4";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getwinnaar() {
    $sql = "SELECT *
            FROM komen_score
            LEFT JOIN komen_users
            ON komen_users.id = komen_score.user_id
            ORDER BY totaalscore DESC
            LIMIT 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function selectAll() {
    $sql = "SELECT * 
                    FROM `komen_pictures`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }   

  public function getcms() {
    $sql = "SELECT * 
                    FROM `komen_cms`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }   

  public function scoreGeplaatst() {
    $sql = "SELECT * 
                    FROM `komen_score` WHERE user_id = :user_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':user_id', $_GET['userid']);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }   

	public function eerstetotaalscore($data) {

			$sql = "INSERT INTO `komen_score` (`user_id`, `totaalscore`) VALUES (:userid,:totaalscore)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':userid', $data['userid']);
			$stmt->bindValue(':totaalscore', $data['totaalscore']);
			if($stmt->execute()) {

			}
		
		return false;
	}

    public function updatetotaalscore($data){
        $sql = 'UPDATE komen_score
                    SET totaalscore = :updatescore
                    WHERE user_id = :userid';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':updatescore', $data['updatescore']);
        $stmt->bindValue(':userid', $data['userid']);
        if($stmt->execute()){
        
        }
        return array();
    }


	public function tweescore($data){
        $sql = 'UPDATE komen_score
                    SET main_trick = :score
                    WHERE user_id = :userid AND beoordeler_id = :beoordelerid';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':score', $data['score']);
        $stmt->bindValue(':userid', $data['userid']);
        $stmt->bindValue(':beoordelerid', $data['beoordelerid']);
        if($stmt->execute()){
        
        }
        return array();
    }

    public function driescore($data){
        $sql = 'UPDATE komen_score
                    SET finale_trick = :score
                    WHERE user_id = :userid AND beoordeler_id = :beoordelerid';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':score', $data['score']);
        $stmt->bindValue(':userid', $data['userid']);
        $stmt->bindValue(':beoordelerid', $data['beoordelerid']);
        if($stmt->execute()){
        
        }
        return array();
    }

    public function insertimage($data) {
            $sql = "INSERT INTO `komen_pictures` (`picture`, `extension`) VALUES (:photo, :extension)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':photo', $data["photo"]);
            $stmt->bindValue(':extension', $data["extension"]);          
            if($stmt->execute()) {
                
            }
        
        return false;
    }


	

}