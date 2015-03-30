<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DS', DIRECTORY_SEPARATOR);
define('WWW_ROOT', __DIR__ . DS);

$routes = array(
    'home' => array(
        'controller' => 'Goochelen',
        'action' => 'index'
    ),
    'welcome' => array(
    	'controller' => 'Goochelen',
    	'action' => 'welcome'
	),
    'login' => array(
        'controller' => 'Users',
        'action' => 'login'
    ),
    'register' => array(
        'controller' => 'Users',
        'action' => 'register'
    ),
    'logout' => array(
        'controller' => 'Users',
        'action' => 'logout'
    ),
    'session' => array(
        'controller' => 'Goochelen',
        'action' => 'session'
    ), 
    'eerstetotaalscore' => array(
        'controller' => 'Goochelen',
        'action' => 'eerstetotaalscore'
    ), 
    'uploadimg' => array(
        'controller' => 'Goochelen',
        'action' => 'uploadimg'
    ),
    'scoregeplaatst' => array(
        'controller' => 'Goochelen',
        'action' => 'scoregeplaatst'
    ),
    'updatetotaalscore' => array(
        'controller' => 'Goochelen',
        'action' => 'updatetotaalscore'
    ),
    'cms' => array(
        'controller' => 'Users',
        'action' => 'cms'
    ),
    'cmss' => array(
        'controller' => 'Users',
        'action' => 'cmss'
    ),
    'cmssettings' => array(
        'controller' => 'Goochelen',
        'action' => 'cmssettings'
    ),
    'getwinnaar' => array(
        'controller' => 'Goochelen',
        'action' => 'getwinnaar'
    ),

);

if(empty($_GET['page'])) {
    $_GET['page'] = 'home';
}

// if(empty($_SESSION['user'])){
//     header('Location: index.php?page=welcome');
//     exit();
// }

if(empty($routes[$_GET['page']])) {
    header('Location: index.php');
    exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once WWW_ROOT . 'controller' . DS . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();