<?php
// Install the library via PEAR or download the .zip file to your project folder.
// This line loads the library
include_once('/var/www/twilio/Services/Twilio.php');
$sid = "AC1debe6383d230e0f08093c91bfaf86b1"; // Your Account SID from www.twilio.com/user/account
$token = "b7b68ae971b65e73422e5af1e714ec7e"; // Your Auth Token from www.twilio.com/user/account

$response = new Services_Twilio_Twiml();
$response->say("Hello Martin");

$client = new Services_Twilio($sid, $token);
try
{
  $message = $client->account->calls->create(
  '+48128810839', // From a valid Twilio number
  '+48791984496', // Text this number
  http://http://178.32.208.249/message
  );
}
catch(Exception $e)
{
  echo $e;
}
print $message->sid;
?>
