<?php
# Include autoloader
require_once 'config/config.php';
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Email Variables
# postData
$from = '';
$text = '';
$to = '';
$cc = '';
$bcc = '';
$subject = '';
$text = '';
$html = '';
$recipientVariables = '';

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
    'recipient-variables'   =>  '{}'
), array(
    'attachment'    =>  $attachment,

));