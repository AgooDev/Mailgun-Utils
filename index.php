<?php
require_once 'config/config.php';
require 'vendor/autoload.php';
use Mailgun\Mailgun;
use Mailing\database\Mysql as MySQL;
use Mailing\Funtions\HTML as TemplateFunctions;

$app        = new \Slim\App();
$mysql      = new MySQL();
$templates  = new TemplateFunctions();

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