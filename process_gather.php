<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');

require_once 'includes/config.php';
require_once 'libs/php_sdk/facebook.php';

$db = new PDO('mysql:host='.$config['db_host'].';dbname='.$config['db_name'], $config['db_user'], $config['db_pass']);
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->query('SET NAMES utf8');

// Tutaj przez $_REQUEST['id'] mozemy pobrac id usera
// page located at http://example.com/process_gather.php
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$digits = intval($_REQUEST['Digits']);
if($digits==0)
{
  echo "<Response><Say>You entered" . $_REQUEST['Digits'] . ". You dont want to go</Say></Response>";
  $db->query('UPDATE show_users SET shu_status = "N" WHERE shu_usr_fb_id = ' . $_REQUEST['id'] . ', shu_shw_id = ' . $_REQUEST['show']);
}
else
{
  // user sie zgadza chcemy do bazy
  // zmienna $_REQUEST['id'] -> fb id usera
  // zmienna $_REQUEST['Digits'] -> jesli dodatni, user sie zgadza, jesli 0, user sie nie zgadza
  echo "<Response><Say>You want to go</Say></Response>";
  $db->query('UPDATE show_users SET shu_status = "Y" WHERE shu_usr_fb_id = ' . $_REQUEST['id'] . ', shu_shw_id = ' . $_REQUEST['show']);
}
?>
