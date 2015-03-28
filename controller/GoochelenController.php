<?php
require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'GoochelenDAO.php';
require_once WWW_ROOT . 'dao' . DS . 'UserDAO.php';
require_once WWW_ROOT . 'php-image-resize' . DS . 'ImageResize.php';

class GoochelenController extends Controller {
private $goochelenDAO;
private $userDAO;

	function __construct() {
		$this->goochelenDAO = new goochelenDAO();
		$this->userDAO = new UserDAO();
	}

	public function index() {

		$session = $_SESSION['user'];
		$this->set("session", $session);
	}

	public function welcome() {

	}

	public function home(){

	}

	public function session(){

		$session = $_SESSION['user'];

		header('Content-Type: application/json');
	    echo json_encode($session);
	    die();
	}

	public function scoreeen(){

		$data = $_POST;

		if($data){

			$scoreeen= $this->goochelenDAO->introscore($data);
		  	
			if(!$scoreeen){

			}else{
        
				$confirm = true;
	        
	        header('Content-Type: application/json');
	        echo json_encode(array('result' => true));
	        die();
				}
	  	}
	}

	public function scoretwee(){

		$data = $_POST;

		if($data){

			$scoreeen= $this->goochelenDAO->tweescore($data);
		  	
			if(!$scoreeen){

			}else{
        
				$confirm = true;
	        
	        header('Content-Type: application/json');
	        echo json_encode(array('result' => true));
	        die();
				}
	  	}
	}

	public function scoredrie(){

		$data = $_POST;

		if($data){

			$scoreeen= $this->goochelenDAO->driescore($data);
		  	
			if(!$scoreeen){

			}else{
        
				$confirm = true;
	        
	        header('Content-Type: application/json');
	        echo json_encode(array('result' => true));
	        die();
				}
	  	}
	}

}