<?php

$goochelenDAO = new GoochelenDAO();


$app->get('/winnaars/?',function() use ($goochelenDAO){
    header("Content-Type: application/json");
    echo json_encode($goochelenDAO->getWinnaars(), JSON_NUMERIC_CHECK);
    exit();
});
