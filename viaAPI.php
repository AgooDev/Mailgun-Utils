<?php
# Include autoloader
require_once 'config/config.php';
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Email Variables
$from = '';
$text = '';
$to = '';
$subject = '';
$text = '';
$html = '';
$recipientVariables = '';
$from = '';
$from = '';
$from = '';


# Instantiate the client
$messageClient = new Mailgun(MAILGUN_APIKEY);

# Now, compose the mail and call the client to send it
$messageClient->sendMessage(MAILGUN_DOMAIN,array(
    'from'  =>  $from,
    
));
