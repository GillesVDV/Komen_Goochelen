<?php
require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'WhiteBoardDAO.php';
require_once WWW_ROOT . 'dao' . DS . 'ItemDAO.php';
require_once WWW_ROOT . 'dao' . DS . 'InviteDAO.php';
require_once WWW_ROOT . 'dao' . DS . 'UserDAO.php';
require_once WWW_ROOT . 'php-image-resize' . DS . 'ImageResize.php';

class WhiteBoardsController extends Controller {
private $whiteboardDAO;
private $itemDAO;
private $inviteDAO;
private $userDAO;

	function __construct() {
		$this->whiteboardDAO = new WhiteBoardDAO();
		$this->itemDAO = new ItemDAO();
		$this->inviteDAO = new InviteDAO();
		$this->userDAO = new UserDAO();
	}

	public function index() {

		if (!empty($_SESSION["user"])) {
			header('Location: index.php?page=welcome');
		}

	}