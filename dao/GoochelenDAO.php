<?php
require_once __DIR__ . '/DAO.php';
class GoochelenDAO extends DAO {


	public function introscore($data) {

			$sql = "INSERT INTO `komen_score` (`user_id`, `intro_trick`, `beoordeler_id`, `feedbackintro`) VALUES (:userid,:score ,:beoordelerid,:feedback)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':userid', $data['userid']);
			$stmt->bindValue(':beoordelerid', $data['beoordelerid']);
			$stmt->bindValue(':score', $data['score']);
            $stmt->bindValue(':feedback', $data['feedback']);
			if($stmt->execute()) {

			}
		
		return false;
	}


	public function tweescore($data){
        $sql = 'UPDATE komen_score
                    SET main_trick = :score, feedbackmain = :feedback
                    WHERE user_id = :userid AND beoordeler_id = :beoordelerid';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':score', $data['score']);
        $stmt->bindValue(':userid', $data['userid']);
        $stmt->bindValue(':beoordelerid', $data['beoordelerid']);
        $stmt->bindValue(':feedback', $data['feedback']);
        if($stmt->execute()){
        
        }
        return array();
    }

    public function driescore($data){
        $sql = 'UPDATE komen_score
                    SET finale_trick = :score, feedbackfinale = :feedback
                    WHERE user_id = :userid AND beoordeler_id = :beoordelerid';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':score', $data['score']);
        $stmt->bindValue(':userid', $data['userid']);
        $stmt->bindValue(':beoordelerid', $data['beoordelerid']);
        $stmt->bindValue(':feedback', $data['feedback']);
        if($stmt->execute()){
        
        }
        return array();
    }


	

}