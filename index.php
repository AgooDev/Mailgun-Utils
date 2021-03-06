<?php
/**
 * Copyright (c) 2016-present, Agoo.com.co <http://www.agoo.com.co>.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree or translated in the assets folder.
 */
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
    $from       = "Agoo.com.co <info@agoo.com.co>";
    $to         = filter_var($data['to'],       FILTER_SANITIZE_EMAIL);
    $subject    = "Bienvenido a Agoo.com.co";
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
        'from'                  =>  $from,
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
    $from       = "Agoo.com.co <info@agoo.com.co>";
    $to         = filter_var($data['to'],       FILTER_SANITIZE_EMAIL);
    $subject    = "Gracias por comprar en Agoo.com.co";
    $name       = filter_var($data['name'],     FILTER_SANITIZE_STRING);
    $pdf        = filter_var($data['pdf'], FILTER_SANITIZE_STRING);

    # Create html file to send
    $templates  = new HTML();
    $data = array(
        'name'      => $name,
        'email'     => $to,
        'pdf'       => $pdf,
    );
    $templateRoute = $templates->CreateTemplate("compra", $data);
    # Get the file in memory to attached
    $html = file_get_contents($templateRoute);

    # postFiles
    $attachment = TICKET_ROOT . $pdf;

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
// RECOVERY
$app->get('/recovery', function ($request, $response, $args) {
    $response->getBody()->write("Recovery");
    return $response;
});

$app->post('/recovery', function ($request, $response){
    # Get body data
    $data = $request->getParsedBody();
    # Instantiate the client
    $client         = new \Http\Adapter\Guzzle6\Client();
    $messageClient  = new \Mailgun\Mailgun(MAILGUN_PRIVATE_APIKEY, $client);

    # Email Variables
    # postData
    $from       = "Agoo.com.co <info@agoo.com.co>";
    $to         = filter_var($data['to'],       FILTER_SANITIZE_EMAIL);
    $subject    = "Recuperar Contraseña Agoo.com.co";
    $url        = filter_var($data['url'], FILTER_SANITIZE_STRING);

    # Create html file to send
    $templates  = new HTML();
    $data = array(
        'email'     => $to,
        'url'       => $url,
    );
    $templateRoute = $templates->CreateTemplate("recuperar", $data);
    # Get the file in memory to attached
    $html = file_get_contents($templateRoute);

    # Now, compose the mail and call the client to send it
    $result = $messageClient->sendMessage(MAILGUN_DOMAIN,array(
        'from'                  =>  $from,
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
        "nombre"    => $to,
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

$app->run();