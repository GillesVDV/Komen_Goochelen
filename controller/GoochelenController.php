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

		if (!empty($_SESSION["user"])) {
			header('Location: index.php?page=welcome');
		}

	}

}