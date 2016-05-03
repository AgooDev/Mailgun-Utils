<?php
require 'vendor/autoload.php';

$app = new \Slim\App();

$app->get('/', function ($request, $response, $args) {
    return $response->withStatus(200)->write('Service Available');
});

// TEMPLATES FUNCTIONS
// ================================================================
// WELCOME

$app->get('/welcome', function ($request, $response, $args) {
    $response->getBody()->write("Welcome");
    return $response;
});



$app->run();