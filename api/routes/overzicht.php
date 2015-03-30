<?php

$userDAO = new UserDAO();


//GET -> /albums/
$app->get('/overzicht/?',function() use ($userDAO){
    header("Content-Type: application/json");
    echo json_encode($userDAO->selectAll(), JSON_NUMERIC_CHECK);
    exit();
});

$app->get('/overzicht/:id/?', function($id) use ($userDAO){
    header("Content-Type: application/json");
    echo json_encode($userDAO->selectById($id), JSON_NUMERIC_CHECK);
    exit();
});