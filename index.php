<?php
require_once 'config/config.php';
require_once 'config/functions.php';
require_once 'config/database.php';
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

$app->post('/welcome', function ($request, $response){

    # Get body data
    $data = $request->getParsedBody();
    # Instantiate the client
    $client = new \Http\Adapter\Guzzle6\Client();
    $messageClient = new \Mailgun\Mailgun(MAILGUN_PRIVATE_APIKEY, $client);

    # Email Variables
    # postData
    $from       = filter_var($data['from'],     FILTER_SANITIZE_EMAIL);
    $to         = filter_var($data['to'],       FILTER_SANITIZE_EMAIL);
    $subject    = filter_var($data['subject'],  FILTER_SANITIZE_STRING);
    $name       = filter_var($data['name'],     FILTER_SANITIZE_STRING);
    $password   = filter_var($data['password'], FILTER_SANITIZE_STRING);

    # Create html file to send
    $templates  = new HTML();
    $data = array(
        'name'      => $name,
        'email'     => $to,
        'password'  => $password,
    );
    $templateRoute = $templates->CreateTemplate("bienvenida", $data);
    # Get the file in memory to attached
    $html = file_get_contents($templateRoute);

    # Now, compose the mail and call the client to send it
    $result = $messageClient->sendMessage(MAILGUN_DOMAIN,array(
        'from'                  =>  "Agoo.com.co <".$from.">",
        'to'                    =>  $to,
        'subject'               =>  $subject,
        'html'                  =>  $html
    ));

    # Results
    $httpResponseCode = $result->http_response_code;
    $httpResponseBody = $result->http_response_body;

    $mailgunId = $httpResponseBody->id;
    $mailgunMessage = $httpResponseBody->message;

    $now = date("Y-m-d H:i:s");
    $data = array(
        "email"     => $to,
        "nombre"    => $name,
        "html"      => $templateRoute,
        "serial"    => $mailgunId,
        "codigo"    => $httpResponseCode,
        "enviado"   => $now,
        "mensaje"   => $mailgunMessage
    );
    # Create a MySQL connecton
    $db = new Database();
    $id = $db->insert('se_mailing', $data);
    $data = array(
        "mailingId"     => $id,
        "mailgunCode"   => $httpResponseCode,
        "mailgunId"     => $mailgunId,
        "sent_at"       => $now,
        "message"       => $mailgunMessage
    );
    unset($db);
    $response->withJson($data);
});

// ================================================================
// TICKET
$app->get('/ticket', function ($request, $response, $args) {
    $response->getBody()->write("Ticket");
    return $response;
});

$app->post('/ticket', function ($request, $response){
    # Get body data
    $data = $request->getParsedBody();
    # Instantiate the client
    $client = new \Http\Adapter\Guzzle6\Client();
    $messageClient = new \Mailgun\Mailgun(MAILGUN_PRIVATE_APIKEY, $client);

    # Email Variables
    # postData
    $from       = filter_var($data['from'],     FILTER_SANITIZE_EMAIL);
    $to         = filter_var($data['to'],       FILTER_SANITIZE_EMAIL);
    $subject    = filter_var($data['subject'],  FILTER_SANITIZE_STRING);
    $name       = filter_var($data['name'],     FILTER_SANITIZE_STRING);
    $password   = filter_var($data['password'], FILTER_SANITIZE_STRING);

    # Create html file to send
    $templates  = new HTML();
    $data = array(
        'name'      => $name,
        'email'     => $to,
        'password'  => $password,
    );
    $templateRoute = $templates->CreateTemplate("compra", $data);
    # Get the file in memory to attached
    $html = file_get_contents($templateRoute);

    # postFiles
    $attachment = array('/path/to/file.txt');

    # Now, compose the mail and call the client to send it
    $result = $messageClient->sendMessage(MAILGUN_DOMAIN,array(
        'from'                  =>  "Agoo.com.co <".$from.">",
        'to'                    =>  $to,
        'subject'               =>  $subject,
        'html'                  =>  $html
    ), array(
        'attachment'    =>  $attachment
    ));

    # Results
    $httpResponseCode = $result->http_response_code;
    $httpResponseBody = $result->http_response_body;

    echo $from,$to,$subject,$name,$password, $templateRoute, " codigo: ", $httpResponseCode, ", mensaje: ", $httpResponseBody;
    die();
});


// ================================================================
// FREE
$app->get('/free', function ($request, $response, $args) {
    $response->getBody()->write("Free");
    return $response;
});

$app->post('/free', function ($request, $response){
    # Get body data
    $data = $request->getParsedBody();
    # Instantiate the client
    $client = new \Http\Adapter\Guzzle6\Client();
    $messageClient = new \Mailgun\Mailgun(MAILGUN_PRIVATE_APIKEY, $client);

    # Email Variables
    # postData
    $from       = filter_var($data['from'],     FILTER_SANITIZE_EMAIL);
    $to         = filter_var($data['to'],       FILTER_SANITIZE_EMAIL);
    $subject    = filter_var($data['subject'],  FILTER_SANITIZE_STRING);
    $name       = filter_var($data['name'],     FILTER_SANITIZE_STRING);
    $password   = filter_var($data['password'], FILTER_SANITIZE_STRING);

    # Create html file to send
    $templates  = new HTML();
    $data = array(
        'name'      => $name,
        'email'     => $to,
        'password'  => $password,
    );
    $templateRoute = $templates->CreateTemplate("free", $data);
    # Get the file in memory to attached
    $html = file_get_contents($templateRoute);

    # Now, compose the mail and call the client to send it
    $result = $messageClient->sendMessage(MAILGUN_DOMAIN,array(
        'from'                  =>  "Agoo.com.co <".$from.">",
        'to'                    =>  $to,
        'subject'               =>  $subject,
        'html'                  =>  $html
    ));

    # Results
    $httpResponseCode = $result->http_response_code;
    $httpResponseBody = $result->http_response_body;

    echo $from,$to,$subject,$name,$password, $templateRoute, " codigo: ", $httpResponseCode, ", mensaje: ", $httpResponseBody;
    die();
});
// ================================================================
// RECOVERY
$app->get('/recovery', function ($request, $response, $args) {
    $response->getBody()->write("Recovery");
    return $response;
});

$app->post('/recovery', function ($request, $response){
    # Get body data
    $data = $request->getParsedBody();
    # Instantiate the client
    $client = new \Http\Adapter\Guzzle6\Client();
    $messageClient = new \Mailgun\Mailgun(MAILGUN_PRIVATE_APIKEY, $client);

    # Email Variables
    # postData
    $from       = filter_var($data['from'],     FILTER_SANITIZE_EMAIL);
    $to         = filter_var($data['to'],       FILTER_SANITIZE_EMAIL);
    $subject    = filter_var($data['subject'],  FILTER_SANITIZE_STRING);
    $name       = filter_var($data['name'],     FILTER_SANITIZE_STRING);
    $password   = filter_var($data['password'], FILTER_SANITIZE_STRING);

    # Create html file to send
    $templates  = new HTML();
    $data = array(
        'name'      => $name,
        'email'     => $to,
        'password'  => $password,
    );
    $templateRoute = $templates->CreateTemplate("recuperar", $data);
    # Get the file in memory to attached
    $html = file_get_contents($templateRoute);

    # Now, compose the mail and call the client to send it
    $result = $messageClient->sendMessage(MAILGUN_DOMAIN,array(
        'from'                  =>  "Agoo.com.co <".$from.">",
        'to'                    =>  $to,
        'subject'               =>  $subject,
        'html'                  =>  $html
    ));

    # Results
    $httpResponseCode = $result->http_response_code;
    $httpResponseBody = $result->http_response_body;

    echo $from,$to,$subject,$name,$password, $templateRoute, " codigo: ", $httpResponseCode, ", mensaje: ", $httpResponseBody;
    die();
});
// ================================================================

$app->run();