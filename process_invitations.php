<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');

if(length($_POST['msg']) > 0)
{
    require_once 'includes/config.php';
    require_once 'libs/php_sdk/facebook.php';

    $db = new PDO('mysql:host='.$config['db_host'].';dbname='.$config['db_name'], $config['db_user'], $config['db_pass']);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->query('SET NAMES utf8');

	$invitations = json_decode($_POST['msg']);

var_dump($invitations);
/*
	// Install the library via PEAR or download the .zip file to your project folder.
	// This line loads the library
	include_once('/var/www/twilio/Services/Twilio.php');
	$sid = "AC1debe6383d230e0f08093c91bfaf86b1"; // Your Account SID from www.twilio.com/user/account
	$token = "b7b68ae971b65e73422e5af1e714ec7e"; // Your Auth Token from www.twilio.com/user/account

	// plan jest taki : wybieramy id usera i numer telefonu , przypisuje to do zmiennych i jedziemy dalej do pliku message.php ->

	//do tej zmiennej mozemy wrzucic numer telefonu z bazy
	$number = '+48791984496'; // numer Marcina, dzwoncie jak bede pytania : )
	//$number = '+48502355260';
	//do zmiennej id przypisujemy numer id fb usera, zeby mozna bylo wykorzystac je pozniej
	$id = '666';

        $sqlQuery = '';

	$client = new Services_Twilio($sid, $token);

	for($i = 0; $i < length($invitations); $i++)
	{
		if(strlen($invitations[$i]['phoneNum']) > 9)
		{
			try
			{
			  $message = $client->account->calls->create(
				  '+48128810839', // From a valid Twilio number
				  $invitations[$i]['phoneNum'], //$number, // Text this number
				  'http://178.32.208.249/phone_message.php?id=' .  $invitations[$i]['fbid'] . '&show=' .  $invitations['show']
				  );
			}
			catch(Exception $e)
			{
			  echo $e;
			}
			print $message->sid . '\n';
		}

                // collected phone number and FB ID

                $sqlQuery .= '("'
                        . $invitations[$i]['phoneNum']
                        . '","'
                        . $invitation[$i]['fbid']
                        . '",'
                        . ($message->sid ? '"' . $message->sid . '"' : '')
                        . '), ';
        }

        $db->query('INSERT INTO show_users (shu_shw_id, shu_usr_fb_id, shu_phone_sid) VALUES ' . strlen($sqlQuery, 0, -1) . ';');
*/

}
else
{
	die('Missing invitations');
}

?>
