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

$app->post('/welcome', function ($request, $response){
    # Get body data
    $data = $request->getParsedBody();
    # Instantiate the client
    $messageClient = new Mailgun(MAILGUN_PRIVATE_APIKEY);
    # Email Variables
    # postData
    $from       = filter_var($data['from'], FILTER_SANITIZE_EMAIL);
    $to         = filter_var($data['from'], FILTER_SANITIZE_EMAIL);
    $subject    = filter_var($data['from'], FILTER_SANITIZE_STRING);
    $name       = filter_var($data['from'], FILTER_SANITIZE_STRING);
    $password   = filter_var($data['from'], FILTER_SANITIZE_STRING);
    
    # Create html file to send
    global $templates;
    $data = array(
        'name'      => $name,
        'username'  => $to,
        'password'  => $password,
    );
    $templateRoute = $templates->CreateTemplate("bienvenida", $data);
    $html       = file_get_contents($templateRoute);

    # postFiles
    $attachment = array('/path/to/file.txt','/the/second/file/to/attach.pdf');

    # Now, compose the mail and call the client to send it
    $result = $messageClient->sendMessage(MAILGUN_DOMAIN,array(
        'from'                  =>  $from,
        'to'                    =>  $to,
        'subject'               =>  $subject,
        'html'                  =>  $html
    ), array(
        'attachment'    =>  $attachment
    ));

    # Results
    $httpResponseCode = $result->http_response_code;
    $httpResponseBody = $result->http_response_body;

    # Create a MySQL connecton
    global $mysql;
    $db= $mysql->connect();
    $data = array(
        "email"     => $to,
        "nombre"    => $name,
        "html"      => $templateRoute,
        "estado"    => $httpResponseBody->items[0]->hap,
        "codigo"    => $httpResponseCode,
        "enviado"   => $httpResponseBody->items[0]->created_at,
        "mensaje"   => $httpResponseBody->items[0]->message,
    );

});

// ================================================================
// TICKET
$app->get('/ticket', function ($request, $response, $args) {
    $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
    $txt = "John Doe\n";
    fwrite($myfile, $txt);
    $txt = "Jane Doe\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    $response->getBody()->write("Ticket");
    return $response;
});

// ================================================================
// FREE
$app->get('/free', function ($request, $response, $args) {
    $response->getBody()->write("Free");
    return $response;
});
// ================================================================
// RECOVERY
$app->get('/recovery', function ($request, $response, $args) {
    $response->getBody()->write("Recovery");
    return $response;
});

$app->run();