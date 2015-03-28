<?php
session_start();

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
    'scoreeen' => array(
        'controller' => 'Goochelen',
        'action' => 'scoreeen'
    ), 
    'scoretwee' => array(
        'controller' => 'Goochelen',
        'action' => 'scoretwee'
    ), 
    'scoredrie' => array(
        'controller' => 'Goochelen',
        'action' => 'scoredrie'
    ), 
);

if(empty($_GET['page'])) {
    $_GET['page'] = 'home';
}
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