<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'UserDAO.php';
require_once WWW_ROOT . 'phpass' . DS . 'Phpass.php';
require_once WWW_ROOT . 'php-image-resize' . DS . 'ImageResize.php';

class UsersController extends Controller {

	private $userDAO;

	function __construct() {
		$this->userDAO = new UserDAO();
	}

	public function cms(){

		if(!empty($_POST['action'])) {
			if($_POST['action'] == 'Login') {
				$this->_handleLoginCMS();
			} 
		}

	}

	public function cmss(){

		if(!empty($_POST['action'])) {
			if($_POST['action'] == 'submit') {
				$cmssetting = $this->userDAO->insertcms(array(
				'dag' => $_POST['dag'],
				'week' => $_POST['week']
			));
			} 
		}

	}

	public function login() {
		if(!empty($_POST['action'])) {
			if($_POST['action'] == 'Login') {
				$this->_handleLogin();
			} 
		}
	}

	public function register(){
		if(!empty($_POST['action'])) {
			if($_POST['action'] == 'Register') {
				$this->_handleRegister();
			} 
		}
	}

	private function _handleLoginCMS() {
		$errors = array();
		if(empty($_POST['loginEmail'])) {
			$errors['loginEmail'] = 'Please enter your email';
		}
		if(empty($_POST['loginPassword'])) {
			$errors['loginPassword'] = 'Please enter your password';
		}
		if(empty($errors)) {
			$existing = $this->userDAO->selectByEmailCMS($_POST['loginEmail']);
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
					$this->redirect('index.php#overview');
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

	private function _handleRegister() {
		$errors = array();
		if(empty($_POST['registerEmail'])) {
			$errors['registerEmail'] = 'Please enter your email';
		} else {
			$existing = $this->userDAO->selectByEmail($_POST['registerEmail']);
			if(!empty($existing)) {
				$errors['registerEmail'] = 'Email address is already in use';
			}
		}
		if(empty($_POST['registerPassword'])) {
			$errors['registerPassword'] = 'Please enter a password';
		}
		if($_POST['registerPassword2'] != $_POST['registerPassword']) {
			$errors['registerPassword2'] = 'Passwords do not match';
		}

		if (!empty($_FILES['image']['error'])) {
			$errors['image'] = "Profielfoto kon niet worden toegevoegd";
		}

		if (empty($errors['image'])) {
			$size = getimagesize($_FILES['image']['tmp_name']);
			if (empty($size)) {
				$errors['image'] = "Profielfoto kon niet worden toegevoegd";
			}
		}

		if(empty($errors)) {

			$name = preg_replace("/\\.[^.\\s]{3,4}$/", "", $_FILES["image"]["name"]);
			$extension = explode($name.".", $_FILES["image"]["name"])[1];

			$imageresize = new Eventviva\ImageResize($_FILES['image']['tmp_name']);
			$imageresize->save(WWW_ROOT."uploads/images".DS.$name.".".$extension);

			move_uploaded_file($_FILES['image']["tmp_name"], WWW_ROOT."uploads/images".DS.$_FILES["image"]["name"]);


			$hasher = new \Phpass\Hash;
			$inserteduser = $this->userDAO->insert(array(
				'email' => $_POST['registerEmail'],
				'password' => $hasher->hashPassword($_POST['registerPassword']),
				'photo'=>$name,
				'extension'=>$extension
			));

			if(!empty($inserteduser)) {
				$_SESSION['info'] = 'Registration Successful!';
				$_SESSION['user'] = $inserteduser;
				$this->redirect('index.php#overview');
			}
		}
		$_SESSION['error'] = 'Registration Failed!';
		$this->set('errors', $errors);
	}

	public function logout(){
		unset($_SESSION['user']);
		$this->redirect('index.php?page=welcome');
	}


}