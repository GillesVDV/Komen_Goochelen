<?php
require_once __DIR__ . '/DAO.php';
class GoochelenDAO extends DAO {


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

	public function introscore($data) {

			$sql = "INSERT INTO `komen_score` (`user_id`, `intro_trick`, `beoordeler_id`) VALUES (:userid,:score ,:beoordelerid)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':userid', $data['userid']);
			$stmt->bindValue(':beoordelerid', $data['beoordelerid']);
			$stmt->bindValue(':score', $data['score']);
			if($stmt->execute()) {

			}
		
		return false;
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