<?php
session_start();

define('DS', DIRECTORY_SEPARATOR);
define('WWW_ROOT', __DIR__ . DS);

$routes = array(
    'welcome' => array(
    	'controller' => 'Goochelen',
    	'action' => 'index'
	),
    'login' => array(
        'controller' => 'Users',
        'action' => 'login'
    ),
    'register' => array(
        'controller' => 'Users',
        'action' => 'register'
    ),
);

if(empty($_GET['page'])) {
    $_GET['page'] = 'welcome';
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