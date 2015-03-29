<?php

define("WWW_ROOT", dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR);

require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'UserDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'GoochelenDAO.php';

require_once WWW_ROOT. "api" .DIRECTORY_SEPARATOR. 'Slim'. DIRECTORY_SEPARATOR .'Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

require_once WWW_ROOT. "api" .DIRECTORY_SEPARATOR. 'overzicht.php';
require_once WWW_ROOT. "api" .DIRECTORY_SEPARATOR. 'galerij.php';

$app->run();

