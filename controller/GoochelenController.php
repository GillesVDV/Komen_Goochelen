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

	public function getwinnaar(){
		$winnaar= $this->goochelenDAO->getwinnaar();

		header('Content-Type: application/json');
	    echo json_encode($winnaar);
	    die();
	}

	public function cmssettings(){

		$cmssettings= $this->goochelenDAO->getcms();

		header('Content-Type: application/json');
	    echo json_encode($cmssettings);
	    die();
	}


	public function updatetotaalscore(){

		$data = $_POST;

		if($data){

			$updatetotaalscore= $this->goochelenDAO->updatetotaalscore($data);
		  	
			if(!$updatetotaalscore){

			}else{
        
				$confirm = true;
	        
	        header('Content-Type: application/json');
	        echo json_encode(array('result' => true));
	        die();
				}
	  	}
	}

	public function session(){

		$session = $_SESSION['user'];

		header('Content-Type: application/json');
	    echo json_encode($session);
	    die();
	}

	public function scoregeplaatst(){


		$scoregeplaatst= $this->goochelenDAO->scoreGeplaatst();

		header('Content-Type: application/json');
	    echo json_encode($scoregeplaatst);
	    die();
	}

	public function eerstetotaalscore(){

		$data = $_POST;

		if($data){

			$eerstetotaalscore= $this->goochelenDAO->eerstetotaalscore($data);
		  	
			if(!$eerstetotaalscore){

			}else{
        
				$confirm = true;
	        
	        header('Content-Type: application/json');
	        echo json_encode(array('result' => true));
	        die();
				}
	  	}
	}


	public function uploadimg(){

  		$data = $_POST;
  			
		$name = preg_replace("/\\.[^.\\s]{3,4}$/", "", $_FILES["image"]["name"]);
		$extension = explode($name.".", $_FILES["image"]["name"])[1];

		$imageresize = new Eventviva\ImageResize($_FILES['image']['tmp_name']);
		$imageresize->save(WWW_ROOT."uploads/images".DS.$name.".".$extension);

		move_uploaded_file($_FILES['image']["tmp_name"], WWW_ROOT."uploads/images".DS.$_FILES["image"]["name"]);
		$image = $this->goochelenDAO->insertimage(array(
			"photo"=>$name,
			"extension"=>$extension
		));

  	}

  	private function _handleLogin() {
		$errors = array();
		if(empty($_POST['loginEmail'])) {
			$errors['loginEmail'] = 'Please enter your email';
		}
		if(empty($_POST['loginPassword'])) {
			$errors['loginPassword'] = 'Please enter your password';
		}
		if(empty($errors)) {
			$existing = $this->userDAO->selectByEmail($_POST['loginEmail']);
			if(!empty($existing)) {
				$hasher = new \Phpass\Hash;
				if ($hasher->checkPassword($_POST['loginPassword'], $existing['password'])) {
					$_SESSION['user'] = $existing;
					$this->redirect('index.php?page=cmss');
				} else {
					$_SESSION['error'] = 'Unknown username / password';
				}
			} else {
				$_SESSION['error'] = 'Unknown username / password';
			}
		} else {
			$_SESSION['error'] = 'Unknown username / password';
		}
		$this->set('errors', $errors);
	}

}