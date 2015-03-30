<?php

$goochelenDAO = new GoochelenDAO();


//GET -> /galerij/
$app->get('/galerij/?',function() use ($goochelenDAO){
    header("Content-Type: application/json");
    echo json_encode($goochelenDAO->selectAll(), JSON_NUMERIC_CHECK);
    exit();
});

$app->get('/galerij/:id/?', function($id) use ($goochelenDAO){
    header("Content-Type: application/json");
    echo json_encode($goochelenDAO->selectById($id), JSON_NUMERIC_CHECK);
    exit();
});