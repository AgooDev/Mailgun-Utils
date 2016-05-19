<?php
# Include autoloader
require_once 'config/config.php';
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Email Variables
# postData
$from = '';
$to = '';
$cc = '';
$bcc = '';
$subject = '';
$text = '';
$html = file_get_contents('assets/templates/hello.html');
$recipientVariables = '{"name-1@gmail.com": {"first":"Name-1", "id":1}, "name-2@gmail.com": {"first":"Name-2", "id": 2}}';

# postFiles
$attachment = array('/path/to/file.txt','/the/second/file/to/attach.pdf');
$images = '';


# Instantiate the client
$messageClient = new Mailgun(MAILGUN_PRIVATE_APIKEY);

# Now, compose the mail and call the client to send it
$messageClient->sendMessage(MAILGUN_DOMAIN,array(
    'from'                  =>  $from,
    'to'                    =>  $to,
    'cc'                    =>  $cc,
    'bcc'                   =>  $bcc,
    'subject'               =>  $subject,
    'text'                  =>  $text,
    'html'                  =>  $html,
    'recipient-variables'   =>  $recipientVariables
), array(
    'attachment'    =>  $attachment
));